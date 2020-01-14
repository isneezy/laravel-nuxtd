<?php

namespace App\Support\DB\Conditions;


use Illuminate\Database\Query\Builder;

abstract class QueryBuilderCondition
{
    protected $column;
    protected $value;

    public function __construct($column, $value)
    {
        $this->column = $column;
        $this->value = $value;
    }

    /**
     * @param Builder | \Illuminate\Database\Eloquent\Builder $query
     * @return Builder | \Illuminate\Database\Eloquent\Builder;
     */
    public abstract function apply($query);
}
