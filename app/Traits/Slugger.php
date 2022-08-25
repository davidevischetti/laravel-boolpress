<?php

namespace App\Traits;

use Illuminate\Support\Str;

trait Slugger
{
    static public function getSlug($startStr) {
        $slugStart = Str::slug($startStr) . '';
        $slug = $slugStart;

        $i = 1;
        while (self::where('slug', $slug)->first()) {
            $slug = $slugStart . '-' . $i;
            $i++;
        }

        return $slug;
    }
}
