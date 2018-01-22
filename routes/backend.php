<?php
/* organizations route */
Route::get('admin/organizations','Admin\OrganizationController@index');
Route::get('admin/addorganization','Admin\OrganizationController@create')
?>