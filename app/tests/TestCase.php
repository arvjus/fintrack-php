<?php

class TestCase extends Illuminate\Foundation\Testing\TestCase
{
    /**
     * Default preparation for each test
     */
    public function setUp() {
        parent::setUp();

        $this->prepareForTests();
    }

    /**
     * Migrate the database
     */
    private function prepareForTests() {
        Artisan::call('migrate');
    }

    /**
     * Creates the application.
     *
     * @return \Symfony\Component\HttpKernel\HttpKernelInterface
     */
    public function createApplication() {
        $unitTesting = true;

        $testEnvironment = 'testing';

        return require __DIR__ . '/../../bootstrap/start.php';
    }

}
