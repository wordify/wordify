<?php

class HomeController extends BaseController {

	private $usersController;
	private $wordsController;

	// layout master file
	protected $layout = 'master';

	public function index() {
		$usersController = new usersController();
		$wordsController = new WordsController();
		
		$users = $usersController->index();
		$words = $wordsController->index();

		$this->layout->content = View::make('users.index');

	}

	public function showWelcome()
	{
		return View::make('hello');
	}

}