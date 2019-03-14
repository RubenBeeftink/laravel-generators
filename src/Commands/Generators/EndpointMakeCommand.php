<?php

namespace RubenBeeftink\Commands\Generators;


use Illuminate\Support\Facades\Artisan;
use Illuminate\Console\Command;

class EndpointMakeCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:endpoint {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a Model, Controller, Repository, Resource, Request and validation class.';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle(): void
    {
        $name = $this->argument('name');

        Artisan::call('make:model', ['name' => $name]);
        $this->info('Model created successfully.');

        Artisan::call('make:controller', ['name' => $name . 'Controller']);
        $this->info('Controller created successfully.');

        Artisan::call('make:validation', ['name' => $name . 'Validation']);
        $this->info('Validation class created successfully.');

        Artisan::call('make:request', ['name' => $name . 'StoreRequest']);
        $this->info('Store request created successfully.');

        Artisan::call('make:request', ['name' => $name . 'UpdateRequest']);
        $this->info('Update request created successfully.');

        Artisan::call('make:repository', ['name' => $name . 'Repository']);
        $this->info('Repository created successfully.');

        Artisan::call('make:resource', ['name' => $name . 'Resource']);
        $this->info('Resource created successfully.');
    }
}
