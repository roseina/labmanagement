<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Organization;
use Input;
use Image;

class OrganizationController extends Controller
{
	public function __construct(Organization $org)
	{
		$this->model=$org;
		$this->redirectUrl='admin/organizations';
	}

	public function index()
	{
		$allDatas=$this->model->getAllDatas();
		return view('admin.organization.index',compact('allDatas'));
	}
	public function create()
	{
		return view('admin.organization.create');
	}
	public function store(Request $request)
	{
		$input=$request->all();
		if (Input::hasFile('image')) {
			$path = public_path('uploads/organizations/images');
			if (!file_exists($path)) {
				mkdir($path, 0777, true);
			}
			$directory = $path;
			$image_name = str_replace(' ', '', $request->organization_name) . uniqid();
			$fileName = $image_name . '_image' . '.' . $request->file('image')->getClientOriginalExtension();

			$fileNameDir = $directory . '/' . $fileName;

			$image = Image::make($request->file('image'));
			$image->fit(200, 200);

			$image->save($fileNameDir, 100);
			$input['image'] = $fileName;

		}
		if (Input::hasFile('logo')) {
			$path = public_path('uploads/organizations/logos');
			if (!file_exists($path)) {
				mkdir($path, 0777, true);
			}
			$directory = $path;
			$logo_name = str_replace(' ', '', $request->organization_name). uniqid();;
			$fileName = $logo_name . '_logo' . '.' . $request->file('logo')->getClientOriginalExtension();

			$fileNameDir = $directory . '/' . $fileName;

			$logo = Image::make($request->file('logo'));
			$logo->fit(200, 200);

			$logo->save($fileNameDir, 100);
			$input['logo'] = $fileName;

		}
		$input['organization_code']= mt_rand(1,10).'org'.mt_rand(1,10);
		$input['slug']=$input['organization_name'];
		if($this->model->create($input))
		{
return redirect($this->redirectUrl)->withErrors(['alert-success'=>'The data has been successfully saved!']);
		}
		else
		{
			return redirect($this->redirectUrl)->withErrors(['alert-danger'=>'The data couldnot be saved now!']);
		}



	}
}
