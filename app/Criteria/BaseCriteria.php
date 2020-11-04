<?php

namespace App\Criteria;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Class BaseCriteria
 * @package App\WE\Criteria
 */
abstract class BaseCriteria implements CriteriaInterface
{
    /**
     * @var array|Request|string
     */
    protected $request;

    /**
     * @var Builder
     */
    protected $builder;

    /**
     * QueryFilter constructor.
     *
     * @param array $request
     */
    public function __construct($request = [])
    {
        $this->request = app()->runningInConsole() ? collect($request) : (empty($request) ? app('request') : collect($request));
    }

    /**
     * Apply criteria in query repository
     *
     * @param                     $model
     * @param RepositoryInterface $repository
     *
     * @return mixed
     */
    public function apply($model, RepositoryInterface $repository)
    {
        $this->builder = $model;

        if (method_exists($this, 'bootstrap')) {
            call_user_func([$this, 'bootstrap']);
        }

        foreach ($this->filters() as $filter => $value) {
            if ($this->isFilterApplicable($filter)) {
                $this->builder = call_user_func_array([$this, $this->getFilterMethodName($filter)], [$value]);
            }
        }

        return $this->builder;
    }

    /**
     * Get the filters from the request url
     *
     * @return array
     */
    private function filters()
    {
        return $this->request->all();
    }

    /**
     * Check if filter is applicable
     *
     * @param string $filter
     *
     * @return bool
     */
    private function isFilterApplicable(string $filter): bool
    {
        return $this->hasMethodFor($filter) && !$this->isEmpty($this->request->get($filter));
    }

    /**
     * Check if the class has method for provided filter
     *
     * @param string $filter
     *
     * @return bool
     */
    private function hasMethodFor(string $filter): bool
    {
        return method_exists($this, $this->getFilterMethodName($filter));
    }

    /**
     * Check if the search value is empty
     *
     * @param string|int|array $value
     *
     * @return bool
     */
    private function isEmpty($value): bool
    {
        if (is_array($value)) {
            return empty(array_filter($value));
        }

        return empty($value);
    }

    /**
     * Get the name of the filter method
     *
     * @param string $filter
     *
     * @return string
     */
    private function getFilterMethodName($filter)
    {
        return Str::camel($filter);
    }
}
