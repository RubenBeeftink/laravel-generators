<?php

namespace RubenBeeftink\Commands\Generators;

use Illuminate\Console\GeneratorCommand;

class ValidationMakeCommand extends GeneratorCommand
{
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new Validation class for a model';

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'make:validation';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'Validation';

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    public function getStub(): string
    {
        return __DIR__ . '/stubs/validation.stub';
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
        return 'App\Models\Validation';
    }
}
