<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    protected $table='organizations';
    public $fillable=['organization_code', 'organization_name', 'country', 'district', 'zone', 'address1', 'address2', 'phone1', 'Phone 2', 'fax', 'image', 'logo','slug'];
    public function getAllDatas()
    {
    	$allDatas=$this->all();
    	return $allDatas;
    }

}
