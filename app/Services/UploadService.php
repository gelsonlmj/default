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

        $header = [];

        $batch = Bus::batch([])->dispatch();

        foreach ($clients as $clientId) {
            foreach ($chunks as $key => $chunk) {
                $data = array_map(function($data){return str_getcsv($data, ";");}, $chunk);
                //$data = array_map('str_getcsv', $chunk, [';']);
                if ($key == 0) {
                    $header = $data[0];
                    unset($data[0]);
                }
                $batch->add(new UploadCsvProcess($clientId, $header, $data));
            }
        }

        return true;
    }
}
