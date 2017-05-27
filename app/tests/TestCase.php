<?php

use Illuminate\Filesystem\Filesystem;

class TestCase extends Illuminate\Foundation\Testing\TestCase {

	/**
	 * Path to storage directory for tests
	 *
	 * @var sting
	 */
	private $testingStoragePath;

	/**
	 * Creates the application.
	 *
	 * @return \Symfony\Component\HttpKernel\HttpKernelInterface
	 */
	public function createApplication()
	{
		$unitTesting = true;
		$testEnvironment = 'testing';
		$testingStoragePath = '/tmp/tests_storage_'.uniqid();

		$this->testingStoragePath = $testingStoragePath;
		$this->createStorageDirectoryForTests();

		return require __DIR__.'/../../bootstrap/start.php';
	}

	/**
	 * Create storage directory for tests
	 *
	 * @param string $testingStoragePath
	 * @return void
	 */
	private function createStorageDirectoryForTests()
	{
		$testingStoragePath = $this->testingStoragePath;

		mkdir($testingStoragePath);
		mkdir($testingStoragePath."/meta");
		mkdir($testingStoragePath."/app");
		mkdir($testingStoragePath."/app/htmlDocuments");
	}

	protected function tearDown()
	{
		File::deleteDirectory($this->testingStoragePath);

		parent::tearDown();
	}

}
