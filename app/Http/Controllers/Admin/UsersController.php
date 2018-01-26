<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Validator;
use Input;
use Image;

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
		public function storeUser(Request $request)
		{
			$input=$request->all();
			$rules=[
				'first_name'=>'required'

			];
			$messages=[



			];
			$validate=validator::make($input,$rules,$messages);
			if($validate->fails())
			{
				return redirect()->back()->withErrors($validate)->withInput();
			}
			else
			{
				$input['name']=$request->first_name.' '.$request->middle_name.' '.$request->last_name;

				if (Input::hasFile('signature')) {
					$path = public_path('uploads/users/signatures');
					if (!file_exists($path)) {
						mkdir($path, 0777, true);
					}
					$directory = $path;
					$signature_name = str_replace(' ', '', $request->organization_name) . uniqid();
					$fileName = $signature_name . '_signature' . '.' . $request->file('signature')->getClientOriginalExtension();
					$fileNameDir = $directory . '/' . $fileName;
					$signature = Image::make($request->file('signature'));
					$signature->fit(200, 200);
					$signature->save($fileNameDir, 100);
					$input['signature'] = $fileName;
				}
				if($this->model->create($input))
				{
					return redirect(url('admin/admin'))->withErrors(['alert-success'=>'The data has been successfully saved!']);
				}
				else
				{
					return redirect(url('admin/admin'))->withErrors(['alert-danger'=>'The data couldnot be saved now!']);
				}			}
			}
		}


