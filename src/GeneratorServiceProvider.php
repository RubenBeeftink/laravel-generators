<?php

namespace RubenBeeftink\Generators;

use Illuminate\Support\ServiceProvider;
use RubenBeeftink\Commands\Generators\ControllerMakeCommand;
use RubenBeeftink\Commands\Generators\EndpointMakeCommand;
use RubenBeeftink\Commands\Generators\ModelMakeCommand;
use RubenBeeftink\Commands\Generators\RepositoryMakeCommand;
use RubenBeeftink\Commands\Generators\RequestMakeCommand;
use RubenBeeftink\Commands\Generators\ResourceMakeCommand;
use RubenBeeftink\Commands\Generators\ValidationMakeCommand;

class GeneratorServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(): void
    {
        $this->commands([
            ControllerMakeCommand::class,
            EndpointMakeCommand::class,
            ModelMakeCommand::class,
            RepositoryMakeCommand::class,
            RequestMakeCommand::class,
            ResourceMakeCommand::class,
            ValidationMakeCommand::class,
        ]);
    }
}
