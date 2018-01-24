<?php
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