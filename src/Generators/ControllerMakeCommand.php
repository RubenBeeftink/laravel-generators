<?php

namespace App\Console\Commands\Generators;

use\Illuminate\Routing\Console\ControllerMakeCommand as baseControllerMakeCommand;

class ControllerMakeCommand extends baseControllerMakeCommand
{
    /**
     * Guess the name of the model class.
     *
     * @return string
     */
    protected function guessModelClass(): string
    {
        return str_replace('Controller', '', $this->getNameInput());
    }

    /**
     * Guess the name of the repository class.
     *
     * @return string
     */
    protected function guessRepositoryClass(): string
    {
        return $this->guessModelClass() . 'Repository';
    }

    /**
     * Guess the name of the resource class.
     *
     * @return string
     */
    protected function guessResourceClass(): string
    {
        return $this->guessModelClass() . 'Resource';
    }

    // =======================================================================//
    //          Overrides
    // =======================================================================//

    /**
     * Get the default namespace for the class.
     *
     * @param string $rootNamespace
     *
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace): string
    {
        return "App\Http\Controllers\Api";
    }

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub(): string
    {
        return __DIR__ . '/stubs/controller.stub';
    }

    /**
     * Build the class with the given name.
     *
     * @param string $name
     *
     * @return string
     */
    protected function buildClass($name): string
    {
        $stub = parent::buildClass($name);

        $model = $this->guessModelClass();
        $repository = $this->guessRepositoryClass();
        $resource = $this->guessResourceClass();

        $stub = str_replace('FullDummyRepositoryClass', 'App\\Repositories\\' . $repository, $stub);
        $stub = str_replace('DummyRepositoryClass', $repository, $stub);
        $stub = str_replace('FullDummyModelClass', 'App\\Models\\' . $model, $stub);
        $stub = str_replace('DummyModelClass', $model, $stub);
        $stub = str_replace('FullDummyResourceClass', 'App\\Http\\Resources\\' . $resource, $stub);
        $stub = str_replace('DummyResourceClass', $resource, $stub);

        return $stub;
    }
}
