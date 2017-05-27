<?php

class SaveHtmlDocumentToFileCommandTest extends TestCase {

	/**
	 * Test file is created with proper content
	 *
	 * @return void
	 */
	public function testFileIsCreatedWithProperContent()
	{
		$name = rand(1000000, 9999999);
		$content = 'Lorem ipsum';

		Artisan::call(
			'saveHtmlDocumentToFile', [
				'name' => $name,
				'content' => $content,
			]
		);

		$storagePath = app()['path.storage'];
		$pathToExpectedFile = "$storagePath/app/htmlDocuments/$name.html";

		$this->assertFileExists($pathToExpectedFile);
		$this->assertEquals($content, file_get_contents($pathToExpectedFile));
	}
}
