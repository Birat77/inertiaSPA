<?php

namespace App\Http\Controllers\Api;

use App\Http\Services\OrganizationService;
use App\Http\Resources\OrganizationResource;

/**
 * Class OrganizationApiController
 * @package App\Http\Controllers\API
 */
class OrganizationApiController
{

    /**
     * @var OrganizationService
     */
    private $organizationService;
    /**
     * OrganizationApiController constructor.
     *
     * @param OrganizationService $organizationService
     */
    public function __construct(OrganizationService $organizationService)
    {
        $this->organizationService = $organizationService;
    }

    /**
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function index()
    {
        $organizationsPaginated = $this->organizationService->getPaginated();

        return OrganizationResource::collection($organizationsPaginated);
    }
}
