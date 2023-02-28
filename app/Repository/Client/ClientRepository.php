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

    public function searchByFilters($filters)
    {
        return Client::when(array_key_exists('name', $filters) && !empty($filters['name']), function($query) use($filters) {
                return $query->where('name', 'LIKE', "%{$filters['name']}%");
            })
            ->when(array_key_exists('fantasyName', $filters) && !empty($filters['fantasyName']), function($query) use($filters) {
                return $query->where('fantasyName', 'LIKE', "%{$filters['fantasyName']}%");
            })
            ->when(array_key_exists('documentNumber', $filters) && !empty($filters['documentNumber']), function($query) use($filters) {
                return $query->where('documentNumber', 'LIKE', "%{$filters['documentNumber']}%");
            })
            ->orderBy('name')
            ->get();
    }

    public function delete($id)
    {
        return Client::where('id', $id)->delete();
    }
}
