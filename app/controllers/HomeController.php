<?php

class HomeController extends BaseController {

	// External controllers
	private $usersController;
	private $wordsController;

	// layout master file
	protected $layout = 'master';

	/**
	* Building the main page.
	*
	*/
	public function index() {

		$usersController = new usersController();
		$wordsController = new WordsController();
		
		$users = $usersController->index();
		$words = $wordsController->index();

		$this->layout->inputWord = View::make('words.inputWord');
		//$this->layout->words = View::make('words.index', ['words' => $words]);
		$this->layout->relatedPeople = View::make('users.relatedPeople');

	}

	public function showWelcome()
	{
		return View::make('hello');
	}

}