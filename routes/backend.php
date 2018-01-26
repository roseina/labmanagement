<?php
/* admin-users routes*/
Route::get('admin/admin','Admin\UsersController@getAdmins');
Route::get('admin/staffs','Admin\UsersController@getstaffs');
Route::get('admin/users','Admin\UsersController@getusers');
Route::get('admin/editprofile', 'Admin\UsersController@editprofile');
Route::post('admin/updateprofile','Admin\UsersController@updateprofile');
Route::post('admin/updatepassword','Admin\UsersController@updatePassword');
/*user routes */
Route::get('admin/adduser','Admin\UsersController@addUser');
Route::post('admin/storeuser','Admin\UsersController@storeUser');


/* organizations route */
Route::get('admin/organizations','Admin\OrganizationController@index');
Route::get('admin/addorganization','Admin\OrganizationController@create');
Route::post('storeorganization','Admin\OrganizationController@store');
Route::get('admin/editorganization','Admin\OrganizationController@edit');
Route::post('updateorganization','Admin\OrganizationController@update');
Route::get('admin/deleteorganization','Admin\OrganizationController@delete');
Route::get('admin/organization/delLogo','Admin\OrganizationController@delLogo');
Route::get('admin/organization/delImage','Admin\OrganizationController@delImage');

?>