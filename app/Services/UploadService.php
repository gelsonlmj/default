<?php

namespace App\Services;

use App\Jobs\UploadCsvProcess;
use Illuminate\Support\Facades\Bus;

class UploadService
{

    CONST LENGTH = 1000;

    public function __construct()
    {
    }

    public function save($clients, $file)
    {
        $chunks = array_chunk($file, self::LENGTH);
        foreach ($clients as $clientId) {
            $this->processClientData($clientId, $chunks);
        }
        return true;
    }

    private function processClientData($clientId, $chunks)
    {
        $header = [];

        $batch = Bus::batch([])->dispatch();
    
        foreach ($chunks as $index => $chunk) {
            $data = array_map(function($data){return str_getcsv($data, ";");}, $chunk);

            if ($index == 0) {
                $header = $data[0];
                unset($data[0]);
            }

            $batch->add(new UploadCsvProcess($clientId, $header, $data));
        }
    }
}
