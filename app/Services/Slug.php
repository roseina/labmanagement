<?php
/**
 * Created by PhpStorm.
 * User: Sanjay
 * Date: 11/22/2017
 * Time: 9:24 AM
 */

namespace App\Services;


use App\Organization;
// use App\JobProvider;
// use App\JobSeeker;

class Slug
{
    /**
     * @param $title
     * @param int $id
     * @return string
     * @throws \Exception
     */
//    public function __construct(JobProvider $jobProvider,Job $job, JobSeeker $jobSeeker)
//    {
//        $this->jobProvider = $jobProvider;
//        $this->job = $job;
//        $this->jobSeeker = $jobSeeker;
//    }

    public function createSlug($title,$model, $id = 0)
    {
        // Normalize the title
        $slug = str_slug($title);
        // Get any that could possibly be related.
        // This cuts the queries down by doing it once.
        $allSlugs = $this->getRelatedSlugs($slug,$model, $id);
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
    protected function getRelatedSlugs($slug,$model, $id = 0)
    {
        if($model=='Organization')
            return Organization::select('slug')->where('slug', 'like', $slug.'%')->where('id', '<>', $id)->get();
    }
}