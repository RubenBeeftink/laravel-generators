<?php

namespace Tests;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Foundation\Testing\TestCase;

class GeneratorTest extends TestCase
{
    use CreatesApplication;

    /** @test */
    public function it_generates_a_model_class()
    {
        Artisan::call('make:model', ['name' => 'Test']);

        $this->assertTrue(file_exists('app/models/Test.php'));
    }

    /** @test */
    public function it_generates_a_controller_class()
    {
        Artisan::call('make:controller', ['name' => 'Test']);

        $this->assertTrue(file_exists('/App/Http/Controllers/Api/TestController'));
    }

    /** @test */
    public function it_generates_a_repository_class()
    {
        Artisan::call('make:repository', ['name' => 'Test']);

        $this->assertTrue(file_exists('App/Repositories/TestRepository'));
    }

    /** @test */
    public function it_generates_a_request_class()
    {
        Artisan::call('make:request', ['name' => 'TestUpdate']);

        $this->assertTrue(file_exists('App/Http/Requests/TestUpdateRequest'));
    }

    /** @test */
    public function it_generates_a_resource_class()
    {
        Artisan::call('make:resource', ['name' => 'Test']);

        $this->assertTrue(file_exists('App/Http/Resources/TestResource'));
    }

    /** @test */
    public function it_generates_a_validation_class()
    {
        Artisan::call('make:validation', ['name' => 'Test']);

        $this->assertTrue(file_exists('App/Validation/TestValidation'));
    }

    /** @test */
    public function it_generates_all_classes_for_an_endpoint()
    {
        Artisan::call('make:endpoint', ['name' => 'Test']);

        $this->assertTrue(file_exists('app/models/Test.php'));

        $this->assertTrue(file_exists('App/Http/Controllers/Api/TestController'));

        $this->assertTrue(file_exists('App/Repositories/TestRepository'));

        $this->assertTrue(file_exists('App/Http/Requests/TestStoreRequest'));

        $this->assertTrue(file_exists('App/Http/Requests/TestUpdateRequest'));

        $this->assertTrue(file_exists('App/Http/Resources/TestResource'));

        $this->assertTrue(file_exists('App/Validation/TestValidation'));

        $this->assertTrue(file_exists('App/Validation/TestValidation'));
    }
}
