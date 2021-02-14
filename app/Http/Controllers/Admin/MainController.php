<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MainController extends Controller
{
  	
	public function index()
	{
		return view('admin.index');
	}
	
	
	public function editor()
	{
		return view('admin.editor');
	}
	
	public function fileUpload()
	{
		return view('admin.fileUpload');
	}
	
	
	public function fileManager()
	{
		return view('admin.fileManager');
	}
	
	public function test()
	{
		return view('admin.test');
	}
	
	
	
	
}
