<?php

namespace App\Adapters;

interface TopicsNewsGetterInterface
{
    public function getNews(string $genre);
}