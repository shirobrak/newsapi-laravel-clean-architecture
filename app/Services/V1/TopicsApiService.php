<?php

namespace App\Services\V1;

use App\Services\V1\TopicsApiServiceInterface;

class TopicsApiService
{
    protected $topicsNewsGetter;
    public function __construct(TopicsApiServiceInterface $topicsNewsGetter){
        $this->topicsNewsGetter = $topicsNewsGetter;
    }
    // トピックス記事一覧を作成し返却するユースケース
    public function getTopics(string $genre){
        $topicsNews = $this->topicsNewsGetter->getTopicsNews($genre);
        $response = $topicsNews;
        return $response;
    }
}