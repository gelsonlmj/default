<?php

namespace App\Http\Controllers;

use App\Jobs\UploadCsvProcess;
use App\Repository\Import\ImportRepository;
use Illuminate\Support\Facades\Bus;

class StreamController extends Controller
{
    /**
     * @var ImportRepository
     */
    public $importRepository;

    public function __construct()
    {
        $this->importRepository = new ImportRepository();
    }

    public function stream() {
        return response()->stream(function () {
            while (true) {

                if (!$this->importFiles()) {
                    break;
                }

                ob_flush();
                flush();

                if (connection_aborted()) {
                    break;
                }
                usleep(50000);
            }
        }, 200, [
            'Cache-Control' => 'no-cache',
            'Content-Type' => 'text/event-stream',
        ]);
    }

    private function importFiles()
    {
        $import = $this->importRepository->getImportsNotSend();

        if (!$import->count()) {
            return false;
        }

        $import = $import->first();

        $file    = file(storage_path() .'/app/imports/'.$import->filename);

        $chunks = array_chunk($file, 1000);
        $header = [];
        $batch = Bus::batch([])->dispatch();

        foreach ($chunks as $key => $chunk) {
            $data = array_map(function($data){return str_getcsv($data, ";");}, $chunk);
            if ($key == 0) {
                $header = $data[0];
                unset($data[0]);
            }

            $batch->add(new UploadCsvProcess($import->client_id, $header, $data));

        }
        $this->importRepository->setProcessed($import);
        return true;
    }

}
