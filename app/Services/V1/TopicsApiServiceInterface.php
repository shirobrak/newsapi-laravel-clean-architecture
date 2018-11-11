<?php

namespace App\Services\V1;

interface TopicsApiServiceInterface
{
    public function getTopicsNews(string $genre);
}