<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Organization;
use Input;
use Image;
use File;
use Validator;
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
		$rules=[
			'organization_name'=>'required',
			'phone1'=>'integer',
			'phone2'=>'integer',
			'logo'=>'mimes:jpeg,jpg,pdf,png|max:2048',
			'image'=>'mimes:jpeg,jpg,pdf,png|max:2048'
		];
		$messages=[
			'organization_name.required'=>'Please give the organization name!',
			'phone1.integer'=>'Please give the valid phone number for Phone 1!',
			'phone2.integer'=>'Please give the valid phone number for Phone 2!',
			'logo.max'=>'please upload the logo smaller than 2 mb!',
			'image.max'=>'please upload the image smaller than 2 mb!',

			
		];
		$validate=validator::make($input,$rules,$messages);
		if($validate->fails())
		{
			return redirect()->back()->withErrors($validate)->withInput();
		}
		else
		{

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
	public function edit()
	{
		$slug=Input::get('identifier');
		$editData=$this->model->where('slug',$slug)->first();
		if(empty($editData))
		{
			return redirect($this->redirectUrl)->withErrors(['alert-danger'=>'Sorry,the data was not found!']);
		}
		
		else
		{
			return view('admin.organization.edit',compact('editData'));
		}
	}
	public function update(Request $request)
	{
		$updateData=$request->all();
		$rules=[
			'organization_name'=>'required',
			'phone1'=>'integer',
			'phone2'=>'integer',
			'logo'=>'mimes:jpeg,jpg,pdf,png|max:2048',
			'image'=>'mimes:jpeg,jpg,pdf,png|max:2048'
		];
		$messages=[
			'organization_name.required'=>'Please give the organization name!',
			'phone1.integer'=>'Please give the valid phone number for Phone 1!',
			'phone2.integer'=>'Please give the valid phone number for Phone 2!',
			'logo.max'=>'please upload the logo smaller than 2 mb!',
			'image.max'=>'please upload the image smaller than 2 mb!',

			
		];
		$validate=validator::make($updateData,$rules,$messages);
		if($validate->fails())
		{
			return redirect()->back()->withErrors($validate)->withInput();
		}
		else
		{

			$id=Input::get('id');
			$data=$this->model->where('id',$id)->first();

			$path=public_path('uploads/organizations/images');
			if (Input::hasFile('image')) {
				if ($data->image != '') {
					$path1 = $path . '/' . $data->image;
					File::delete($path1);
				}

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
				$updateData['image'] = $fileName;
			}
			if (Input::hasFile('logo')) {
				$path = public_path('uploads/organizations/logos');
				if ($data->logo!= '') {
					$path1 = $path . '/' . $data->logo;
					File::delete($path1);
				}

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
				$updateData['logo'] = $fileName;
			}
			if($data->update($updateData))
			{
				return redirect($this->redirectUrl)->withErrors(['alert-success'=>'Data has been successfullly updated!']);
			}
			else
			{
				return redirect($this->redirectUrl)->withErrors(['alert-danger'=>'Sorry,the data couldnot be updated now!']);
			}
		}
	}

	public function delete()
	{
		$slug=Input::get('identifier');
		$delDatas=$this->model->where('slug',$slug)->first();
		$this->removeImage($delDatas);
		$this->delLogo($delDatas);
		if($delDatas->delete())
		{
			return redirect($this->redirectUrl)->withErrors(['alert-success'=>'The data has been successfully deleted!']);
		}
		else
		{
			return redirect($this->redirectUrl)->withErrors(['alert-danger'=>'Sorry,the data couldnot be deleted now!']);
		}


	}
	public function delImage()
	{

		$slug=Input::get('identifier');
		$datas=$this->model->where('slug',$slug)->first();
		$val=$this->removeImage($datas);
		if($val)
		{
			return redirect()->back()->withErrors(['alert-success'=>'The image has been successfullly deleted!']);

		}
		else
		{
			return redirect()->back()->withErrors(['alert-danger'=>'Sorry, the image couldnot be deleted now!']);
		}
	}
	public function delLogo()
	{
		$slug=Input::get('identifier');
		$datas=$this->model->where('slug',$slug)->first();
		$val=$this->removeLogo($datas);
		if($val)
		{
			return redirect()->back()->withErrors(['alert-success'=>'The logo has been successfullly deleted!']);
		}
		else
		{
			return redirect()->back()->withErrors(['alert-danger'=>'Sorry, the logo couldnot be deleted now!']);
		}
	}
	public function removeImage($data)
	{
		$path=public_path('uploads/organizations/images');
		if ($data->image != '') {
			$path1 = $path . '/' . $data->image;
			File::delete($path1);
		}
		return true;
	}
	public function removeLogo($data)
	{
		$path=public_path('uploads/organizations/logos');
		if ($data->logo!= '') {
			$path1 = $path . '/' . $data->logo;
			File::delete($path1);
		}
		return true;
	}
}