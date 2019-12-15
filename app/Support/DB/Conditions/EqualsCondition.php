<?php

namespace App\Support\DB\Conditions;


use Illuminate\Database\Query\Builder;

class EqualsCondition extends QueryBuilderCondition
{

    /**
     * @param Builder | \Illuminate\Database\Eloquent\Builder $query
     * @return Builder | \Illuminate\Database\Eloquent\Builder;
     */
    public function apply($query)
    {
        return $query->where([$this->column => $this->value]);
    }
}
