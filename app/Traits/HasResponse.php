<?php

/*
 * Copyright (C) HPCM HOLDING - All Rights Reserved
 * Unauthorized copying of this file, via any medium is strictly prohibited
 * Proprietary and confidential
 */

namespace App\Traits;

use Illuminate\Container\Container;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

trait HasResponse
{
    private $jsonWith = [];
    private $jsonContent = [];

    /**
     * Add another keys to the response.
     *
     * @param array | mixed $with
     *
     * @return $this
     */
    protected function jsonWith($with)
    {
        $this->jsonWith = collect($this->jsonWith)->merge($with)->toArray();

        return $this;
    }

    /** @noinspection PhpDocMissingThrowsInspection */

    /**
     * Creates a json formatted api response.
     *
     * @param $objToReturn
     * @param null|string $message
     * @param array       $errors
     * @param int         $responseCode
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function responseAsJson(
        $objToReturn,
        string $message = null,
        array $errors = [],
        int $responseCode = null
    ) {
        // Successfully executed a call
        $message = $message ?? 'Operação executada com sucesso';
        $headers = [];

        //$this->jsonWith['meta'] = empty($this->jsonWith['meta']) ? new \stdClass() : $this->jsonWith['meta'];

        if ($objToReturn instanceof JsonResource) {
            /** @noinspection PhpUnhandledExceptionInspection */
            /** @var Request $request */
            $request = Container::getInstance()->make('request');
            $response = $objToReturn->toResponse($request);
            // set response code if not defined
            $responseCode = $responseCode ?? $response->getStatusCode();
            // define headers
            $headers = $response->headers->all();
            $response = (array) json_decode($objToReturn->toResponse($request)->getContent());
            $objToReturn = [];
            $this->jsonWith($response);
        }

        $responseCode = $responseCode ?? 200;

        $this->jsonContent['errors'] = $errors;
        $this->jsonContent['message'] = $message;
        $this->jsonContent['status_code'] = $responseCode;

        $this->debugResponse();

        $data = collect(['data' => $objToReturn])
            ->merge($this->jsonWith)
            ->merge($this->jsonContent)
            ->toArray()
        ;

        return response()->json($data, $responseCode ?? 200, $headers);
    }

    private function debugResponse()
    {
        if (isset($this->jsonWith['debug'])) {
            // forces debug to go on as the last item
            if (true === config('app.debug')) {
                $this->jsonContent['debug'] = $this->jsonWith['debug'];
            }
            // always remove debug key  so we only show when in debug mode
            unset($this->jsonWith['debug']);
        }
    }
}
