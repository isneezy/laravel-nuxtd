<?php

namespace App\Services;


use App\Support\DB\Conditions\QueryBuilderCondition;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

/**
 * Class Service
 * @package App\Services
 */
abstract class EloquentService
{
    /**
     * @var Collection
     */
    protected $conditions = null;

    public function find($id, array $columns = ['*']) {
        return $this->newQuery()->findOrFail($id, $columns);
    }

    /**
     * @param array $columns
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function findAll(array $columns = ['*']) {
        $query = $this->newQuery();
        if ($this->conditions) collect($this->conditions)->flatMap->apply($query);
        return $query->paginate(10, $columns);
    }

    /**
     * @param Collection | array $conditions
     * @return static
     */
    public function withConditions(...$conditions) {
        $_conditions = collect();
        foreach ($conditions as $condition) {
            if ($condition instanceof Collection || is_array($condition)) $_conditions->merge($condition);
            elseif ($condition instanceof QueryBuilderCondition) $_conditions->add($condition);
            else throw new \RuntimeException("Invalid condition passed");
        }
        $this->conditions = $_conditions;
        return $this;
    }

    /**
     * @param array $data
     * @return Model
     */
    public function create(array $data) {
        $model = $this->factory($data);
        $model->save();
        return $model;
    }

    /**
     * @param Model $model
     * @param array $data
     * @return Model
     */
    public function update($model, array $data) {
        if (!$model instanceof Model) {
            $model = $this->find($model);
        }
        $model->fill($data)->save();
        return $model;
    }

    /**
     * @return Model
     */
    abstract function getModel();

    /**
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function newQuery() {
        return $this->getModel()->newQuery();
    }

    /**
     * @param array $data
     * @return Model
     */
    protected function factory(array $data = []) {
        return $this->getModel()->newQuery()->newModelInstance()->fill($data);
    }
}
