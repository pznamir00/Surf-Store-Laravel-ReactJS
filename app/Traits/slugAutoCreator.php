<?php

namespace App\Traits;

trait slugAutoCreator
{
    public function create_slug()
    {
        $slug = $this->title;
        $slug = preg_replace('~[^\pL\d]+~u', '-', $slug);
        $slug = iconv('utf-8', 'us-ascii//TRANSLIT', $slug);
        $slug = preg_replace('~[^-\w]+~', '', $slug);
        $slug = trim($slug, '-');
        $slug = preg_replace('~-+~', '-', $slug);
        $slug = strtolower($slug);
        if (empty($slug)) $slug = 'c-less';
        $this->slug = $slug;
    }
}

?>
