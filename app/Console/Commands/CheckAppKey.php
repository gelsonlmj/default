<?php

namespace App\Console\Commands;

use Dotenv\Dotenv;
use Illuminate\Support\Env;
use Illuminate\Console\Command;

class CheckAppKey extends Command
{
    protected $signature = 'app_key:exists';

    protected $description = 'Verificando se a chave existe';

    public function handle()
    {
        Dotenv::createImmutable(__DIR__ . '/../../../')->load();

        if (empty(Env::get('APP_KEY'))) {
            $this->error('Chave não existe');
            exit(1);
        }
        $this->info('Chave já foi criada');
    }
}
