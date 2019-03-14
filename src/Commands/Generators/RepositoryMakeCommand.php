<?php

namespace RubenBeeftink\Commands\Generators;

use Illuminate\Console\GeneratorCommand;
use Illuminate\Contracts\Filesystem\FileNotFoundException;

class RepositoryMakeCommand extends GeneratorCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $description = 'Create a new repository class';

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'make:repository';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'Repository';


    /**
     * Guess the name of the model class.
     *
     * @return string
     */
    protected function guessModelClass(): string
    {
        return preg_replace('/Repository$/', '', $this->getNameInput());
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
        return 'App\Repositories';
    }

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub(): string
    {
        return __DIR__ . '/stubs/repository.stub';
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

        $model = $this->guessModelClass();

        $stub = str_replace('FullDummyModelClass', 'App\\Models\\' . $model, $stub);
        $stub = str_replace('DummyModelClass', $model, $stub);

        return $stub;
    }
}
