<?php

namespace App\Interfaces\Repository\Import;

use App\Models\Import;

interface ImportRepositoryInterface
{
    public function create($parameters);

    public function getImportsNotSend();

    public function setProcessed(Import $import);
}
