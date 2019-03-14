<?php

namespace RubenBeeftink;

use Illuminate\Support\ServiceProvider;

class GeneratorServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
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
}
