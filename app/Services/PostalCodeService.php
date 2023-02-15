<?php

namespace App\Services;

use App\Repository\PostalCode\PostalCodeRepository;

class PostalCodeService
{

    /**
     * @var PostalCodeRepository
     */
    var $postalCodeRepository;

    public function __construct()
    {
        $this->postalCodeRepository = new PostalCodeRepository();
    }

    public function createOrUpdate($parameters)
    {
        return $this->postalCodeRepository->createOrUpdate($parameters);
    }

}
