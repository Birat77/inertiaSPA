<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Builder;
use Prettus\Repository\Eloquent\BaseRepository as PrettusBaseRepository;

/**
 * Class BaseRepository
 * @package App\Repositories
 */
abstract class BaseRepository extends PrettusBaseRepository
{
    /**
     * @var
     */
    protected $repositoryModel;

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return $this->repositoryModel;
    }
}
