<?php

namespace App\Jobs;

use App\Models\PostalCode;
use App\Helper\Util;
use Illuminate\Bus\Queueable;
use Illuminate\Bus\Batchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class UploadCsvProcess implements ShouldQueue
{
    
    use Batchable, Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    
    public $client_id;
    public $header;
    public $data;

    public function __construct($clientId, $header, $data)
    {
        $this->client_id = $clientId;
        $this->header = $header;
        $this->data = $data;
    }

    public function handle()
    {
        foreach ($this->data as $data) {
            $postalCode = array_combine($this->header, $data);
            $postalCode['client_id'] = $this->client_id;
            $this->save($this->treatData($postalCode));            
        }
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

    private function save($data)
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
