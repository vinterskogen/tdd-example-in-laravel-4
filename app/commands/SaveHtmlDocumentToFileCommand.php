<?php

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class SaveHtmlToFileCommand extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'saveHtmlDocumentToFile';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Save HTML document to file.';

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function fire()
	{
		$name = $this->argument('name');
		$content = $this->argument('content');

		$storagePath = storage_path();
		$pathToFile = "$storagePath/app/htmlDocuments/$name.html";

		File::put($pathToFile, $content);
	}

	/**
	 * Get the console command arguments.
	 *
	 * @return array
	 */
	protected function getArguments()
	{
		return [
			['name', InputArgument::REQUIRED, 'A name of an HTML-document.'],
			['content', InputArgument::REQUIRED, 'Content of an HTML-document.'],
		];
	}

	/**
	 * Get the console command options.
	 *
	 * @return array
	 */
	protected function getOptions()
	{
		return [];
	}
}
