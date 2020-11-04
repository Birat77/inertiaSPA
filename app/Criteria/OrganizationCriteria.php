<?php

namespace App\Criteria;

use App\Criteria\BaseCriteria;
use Illuminate\Database\Eloquent\Builder;

/**
 * Class OrganizationCriteriaCriteria.
 *
 * @package namespace App\Criteria;
 */
class OrganizationCriteria extends BaseCriteria
{
    /**
     * @return Builder
     */
    public function bootstrap()
    {
        return $this->builder->latest();
    }

    /**
     * @param string $searchQuery
     *
     * @return Builder
     */
    public function search(string $searchQuery): Builder
    {
        return $this->builder->search($searchQuery);
    }
}
