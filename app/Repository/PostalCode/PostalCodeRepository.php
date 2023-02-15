<?php

namespace App\Repository\PostalCode;

use App\Interfaces\Repository\PostalCode\PostalCodeRepositoryInterface;
use App\Models\PostalCode;

class PostalCodeRepository implements PostalCodeRepositoryInterface
{
    public function createOrUpdate($data)
    {
        PostalCode::updateOrCreate(
            [
                'client_id' => $data['client_id'],
                'from_postcode' => $data['from_postcode'],
                'to_postcode' => $data['to_postcode'],
                'from_weight' => $data['from_weight'],
                'to_weight' => $data['to_weight']
            ],
            [
                'from_weight' => $data['from_weight'],
                'to_weight' => $data['to_weight'],
                'cost' => $data['cost']
            ]
        );
    }
}
