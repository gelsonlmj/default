<?php

namespace App\Repository\Import;

use App\Interfaces\Repository\Import\ImportRepositoryInterface;
use App\Models\Import;

class ImportRepository implements ImportRepositoryInterface
{
    public function create($parameters)
    {
        return Import::create($parameters);
    }

    public function getImportsNotSend()
    {
        return Import::where('processed', false);
    }

    public function setProcessed(Import $import)
    {
        $import->processed = true;
        $import->save();
    }
}
