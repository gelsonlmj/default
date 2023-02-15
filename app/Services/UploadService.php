<?php

namespace App\Services;

use App\Repository\Import\ImportRepository;
use App\Repository\PostalCode\PostalCodeRepository;

class UploadService
{

    /**
     * @var ImportRepository
     */
    var $importRepository;

    /**
     * @var PostalCodeRepository
     */
    var $postalCodeRepository;

    public function __construct()
    {
        $this->importRepository = new ImportRepository();
        $this->postalCodeRepository = new PostalCodeRepository();
    }

    public function save($clients, $file)
    {
        foreach ($clients as $clientId) {
            $fileName = strtotime('now').'.csv';

            if ($file->storeAs('imports', $fileName)) {
                $this->importRepository->create([
                    'client_id' => $clientId,
                    'filename' => $fileName,
                    'processed' => 0
                ]);
            }
        }
        return true;
    }

    private function treatData($data)
    {
        $data['from_postcode'] = preg_replace('/[^0-9]/', '', $data['from_postcode']);
        $data['to_postcode'] = preg_replace('/[^0-9]/', '', $data['to_postcode']);

        $data['from_weight'] = Util::convertDecimalToDatabase($data['from_weight']);
        $data['to_weight'] = Util::convertDecimalToDatabase($data['to_weight']);
        $data['cost'] = Util::convertDecimalToDatabase($data['cost']);

        return $data;
    }

    public function import($clientId, $header, $data)
    {
        foreach ($data as $data) {
            $postalCode = array_combine($header, $data);
            $postalCode['client_id'] = $clientId;
            $this->postalCodeRepository->createOrUpdate($this->treatData($postalCode));
        }
    }
}
