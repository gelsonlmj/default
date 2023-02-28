<?php

namespace App\Interfaces\Repository\Client;

interface ClientRepositoryInterface
{
    public function create($parameters);

    public function getLatest($length = 5);

    public function getIdAndName();

    public function searchByFilters($filters);

    public function delete($id);
}
