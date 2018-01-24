<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
	public function __construct()
	{

	}
	public function getAdmins()
	{
		return view('admin.users.admin.index');
	}
	public function getstaffs()
	{
		return view('admin.users.staffs.index');
	}
	public function getusers()
	{
		return view('admin.users.users.index');
	}

}

