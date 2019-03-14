<?php

namespace App\Console\Commands\Generators;

use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Foundation\Console\RequestMakeCommand as BaseRequestMakeCommand;
use Illuminate\Support\Arr;

class RequestMakeCommand extends BaseRequestMakeCommand
{
    /**
     * Guess the name of the validation class.
     *
     * @return string
     */
    protected function guessValidationClass(): string
    {
        preg_match('([A-Z][a-z]*)', $this->getNameInput(), $matches);

        return Arr::first($matches) . 'Validation';
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
        return "App\Http\Requests\Api";
    }

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub(): string
    {
        return __DIR__ . '/stubs/request.stub';
    }

    /**
     * Build the class with the given name.
     *
     * @param string $name
     *
     * @return mixed|string
     *
     * @throws FileNotFoundException
     */
    protected function buildClass($name): string
    {
        $stub = parent::buildClass($name);

        $validationClass = $this->guessValidationClass();

        $stub = str_replace('FullDummyValidationClass', 'App\\Models\Validation\\' . $validationClass, $stub);
        $stub = str_replace('DummyValidationClass', $validationClass, $stub);

        return $stub;
    }
}
