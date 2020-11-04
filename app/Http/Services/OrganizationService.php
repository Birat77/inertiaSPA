<?php

namespace App\Http\Services;

use App\Criteria\OrganizationCriteria;
use App\Models\Organization;
use App\Repositories\OrganizationRepository;

/**
 * class OrganizationService
 * @package App/Services
 */
class OrganizationService
{
    /**
     * @var OrganizationRepository
     */
    private $organizationRepository;

    /**
     * OrganizationService constructor.
     *
     * @param OrganizationRepository $organizationRepository
     */
    public function __construct(OrganizationRepository $organizationRepository)
    {
        $this->organizationRepository = $organizationRepository;
    }

    /**
     * @param array $with
     * @param int   $perPage
     *
     * @return mixed
     */
    public function getPaginated($with = [], $perPage = 6)
    {
        return $this->organizationRepository->pushCriteria(new OrganizationCriteria())->with($with)->paginate($perPage);
    }

    /**
     * @param array $data
     *
     * @throws Exception
     */
    public function store(array $data)
    {
        try {
            $this->organizationRepository->create($data);
        } catch (Exception $e) {
            throw new Exception($e);
        }
    }

    /**
     * @param int $id
     *
     * @return Grant
     */
    public function findById(int $id)
    {
        return $this->organizationRepository->find($id);
    }

    /**
     * @param array $data
     * @param int   $id
     *
     * @throws Exception
     */
    public function update(array $data, int $id)
    {
        try {
            $this->organizationRepository->update($data, $id);
        } catch (Exception $e) {
            throw new Exception($e);
        }
    }

    /**
     * @param int $id
     *
     * @throws Exception
     */
    public function delete(int $id)
    {
        try {
            $this->organizationRepository->delete($id);
        } catch (Exception $e) {
            throw new Exception($e);
        }
    }
}
