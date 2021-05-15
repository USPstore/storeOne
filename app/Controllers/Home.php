<?php

namespace App\Controllers;

class Home extends BaseController
{

	public function index()
	{
		return view('welcome_message');
	}
	public function coba()
	{
		echo " umurnya $this->umur"; //localhost:8080/home/coba ,$this->umur adalah properti dari BaseController
	}
}
