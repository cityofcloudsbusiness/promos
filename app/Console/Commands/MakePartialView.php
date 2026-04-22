<?php

namespace App\Console\Commands;

use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;

#[Signature('view:partial {name}')]
#[Description('Cria um arquivo em resources/views/site/partials')]
class MakePartialView extends Command
{
    /**
     * Execute the console command.
     */
    public function handle()
    {
        $name = $this->argument('name');

        $path = resource_path("views/site/partials/{$name}.blade.php");

        if(!file_exists($path)){
            file_put_contents($path,'');
            $this->info("View Partial Criada: {$path}");
        }else{
            $this->error("Já Existe");
        }


    }
}
