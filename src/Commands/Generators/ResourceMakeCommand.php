<?php

namespace App\Console\Commands\Generators;

use Illuminate\Console\GeneratorCommand;
use Illuminate\Contracts\Filesystem\FileNotFoundException;

class ResourceMakeCommand extends GeneratorCommand
{
    /**
     * Guess the name of the resource class.
     *
     * @return string
     */
    protected function guessResourceClass(): string
    {
        return $this->getName() . 'Resource';
    }

    // =======================================================================//
    //          Overrides
    // =======================================================================//

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new resource class for a model';

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'make:resource';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'Resource';

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    public function getStub(): string
    {
        return __DIR__ . '/stubs/resource.stub';
    }

    /**
     * Get the default namespace for the class.
     *
     * @param string $rootNamespace
     *
     * @return string
     */
    public function getDefaultNamespace($rootNamespace): string
    {
        return 'App\Http\Resources';
    }

    /**
     * Build the class with the given name.
     *
     * @param string $name
     *
     * @return string
     *
     * @throws FileNotFoundException
     */
    protected function buildClass($name): string
    {
        $stub = parent::buildClass($name);

        str_replace('DummyResourceClass', 'App\\Http\\Resources\\' . $this->guessResourceClass(), $stub);

        return $stub;
    }
}
