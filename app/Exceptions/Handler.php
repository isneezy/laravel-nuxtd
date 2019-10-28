<?php

namespace App\Exceptions;

use App\Traits\HasResponse;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Support\Arr;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class Handler extends ExceptionHandler
{
    use HasResponse;
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param \Exception $exception
     *
     * @throws Exception
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Exception               $exception
     *
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
        $rendered = parent::render($request, $exception);
        if (!$request->wantsJson()) {
            return $rendered;
        }

        $message = $exception->getMessage();
        $errors = [];

        if ($exception instanceof ValidationException) {
            $errors = Arr::get(json_decode($rendered->getContent(), true), 'errors');
        } elseif ($exception instanceof ModelNotFoundException) {
            $model = ucfirst(collect(explode('\\', $exception->getModel()))->last());
            $message = "{$model} Not Found";
        } elseif ($exception instanceof NotFoundHttpException) {
            $message = $exception->getMessage() ? $exception->getMessage() : 'Resource Not Found';
        }

        $this->jsonWith([
            'debug' => $this->stackTrace($exception),
        ]);

        return $this->responseAsJson(
            [],
            $message,
            $errors,
            $rendered->getStatusCode()
        );
    }

    private function stackTrace(Exception $exception)
    {
        $debug['exception'] = get_class($exception);
        $debug['trace'] = collect($exception->getTrace())
            ->map(function (array $item) {
                return collect($item)
                    ->only(['file', 'line', 'function', 'class'])
                    ->toArray()
                    ;
            })->toArray();

        return $debug;
    }
}
