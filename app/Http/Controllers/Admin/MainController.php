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
		return view('admin.testEditor.index');
	}
	
	public function fileUpload()
	{
		return view('admin.testFileUpload.index');
	}
	
	
	public function fileManager()
	{
		return view('admin.testFileManager.index');
	}
	
	public function test()
	{
		
	}
	
	
	
	
}
