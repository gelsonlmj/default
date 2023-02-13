<?php

namespace App\Repository\Client;

use App\Interfaces\Repository\Client\ClientRepositoryInterface;
use App\Models\Client;

class ClientRepository implements ClientRepositoryInterface
{
    public function create($parameters)
    {
        return Client::create($parameters);
    }

    public function getLatest($length = 5)
    {
        return Client::latest()->paginate($length);
    }

    public function getIdAndName()
    {
        return Client::orderBy('name')->get()->pluck('name', 'id');
    }
}