<?php

namespace App\Entities;

use App\Entities\AbstractData;

class Article extends AbstractData
{
    public function __construct(string $title=null, string $summary=null, string $url=null){
        $this->title = is_null($title) ? "" : $title;
        $this->summary = is_null($summary) ? "" : $summary;
        $this->url = is_null($url) ? "" : $url;
    }
}