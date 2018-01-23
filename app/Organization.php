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
    /*Creating and saving slug automatically*/
    public function setSlugAttribute($value)
    {

       $this->attributes['slug'] = $this->createSlug($value);
       


    }
    public function createSlug($title, $id = 0)
    {

        // Normalize the title
        $slug = str_slug($title);
        // Get any that could possibly be related.
        // This cuts the queries down by doing it once.
        $allSlugs = $this->getRelatedSlugs($slug, $id);

        // If we haven't used it before then we are all good.
        if (! $allSlugs->contains('slug', $slug)){
            return $slug;
        }
        // Just append numbers like a savage until we find not used.
        for ($i = 1; $i <= 10; $i++) {
            $newSlug = $slug.'-'.$i;
            if (! $allSlugs->contains('slug', $newSlug)) {
                return $newSlug;
            }
        }
        throw new \Exception('Can not create a unique slug');
    }
    protected function getRelatedSlugs($slug, $id = 0)
    {
        return $this->select('slug')->where('slug', 'like', $slug.'%')
            ->where('id', '<>', $id)
            ->get();
    }
    /* creating slug ends*/

}
