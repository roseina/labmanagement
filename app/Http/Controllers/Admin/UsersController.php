<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Validator;

class UsersController extends Controller
{
	public function __construct(User $user)
	{
		$this->model=$user;
	}
	/* Admin level functions */

	public function getAdmins()
	{
		$admin=$this->model->where('id',1)->first();
		return view('admin.users.admin.index',compact('admin'));
	}

	public function editprofile()
	{
		$admin=$this->model->where('id',1)->first();
		return view('admin.users.admin.edit',compact('admin'));
	}
	public function updateprofile(Request $request)
	{
		$updateData=$request->all();
		$rules=[
			'username'=>'required',
			'email'=>'required|email'
		];
		$messages=[
			'username.required'=>'Username is required!',
			'email.required'=>'Email is required!',
			'email.email'=>'Please give a valid email address!'];
			$validate=Validator::make($updateData,$rules, 
				$messages);
			if($validate->fails())
			{
				return redirect()->back()->withErrors($validate)->withInput();
			}
			else
			{
				$data=$this->model->where('id',1)->first();
				$updateData=$request->all();
				if($data->update($updateData))
				{
					return redirect(url('admin/admin'))->withErrors(['alert-success'=>'The data has been successfully updated!']);
				}
				else
				{
					return redirect(url('admin/admin'))->withErrors(['alert-danger'=>'Sorry,the data couldnot be updated now!']);
				}
			}
		}
		public function updatePassword(Request $request)
		{
			$user=$this->model->where('id',1)->first();
			$rules = [

				'password' => 'required',

				'confirmPassword' => 'required|same:password',

			];

			$messages = [

				'password.required' => 'Please give the new Password!',

				'confirmPassword.required' => 'Please give the password again!',

				'confirmPassword.same' => 'New Password and Confirm Password  should have same values!',

			];

			$this->validate($request, $rules, $messages);

			$input['password'] = bcrypt($request->password);
			if ($user->update($input)) {

				return redirect('/admin/admin')->withErrors(['alert-success' => 'The password has been successfully updated!']);

			} else {

				return redirect('admin/admin')->withErrors(['alert-danger' => 'sorry,the password couldnot be updated now!']);

			}
		}
		/* Users functions*/

		public function getstaffs()
		{
			return view('admin.users.staffs.index');
		}
		public function getusers()
		{
			return view('admin.users.users.index');
		}
		public function addUser()
		{
			return view('admin.users.admin.create');
		}
	}


