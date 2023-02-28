<?php

namespace App\Services;

use App\Repository\Client\ClientRepository;

class ClientService
{

    /**
     * @var ClientRepository
     */
    var $clientRepository;

    public function __construct()
    {
        $this->clientRepository = new ClientRepository();
    }

    public function getIdAndName()
    {
        return $this->clientRepository->getIdAndName();
    }

    public function getLatest($length = 5)
    {
        return $this->clientRepository->getLatest($length);
    }

    public function create($parameters)
    {
        return $this->clientRepository->create($parameters);
    }

    public function searchByFilters($filters)
    {
        return $this->clientRepository->searchByFilters($filters);
    }

    public function delete($id)
    {
        return $this->clientRepository->delete($id);
    }

}
