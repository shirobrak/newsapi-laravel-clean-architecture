<?php

namespace App\Adapters;

use App\Services\V1\TopicsApiServiceInterface;
use App\Adapters\TopicsNewsGetterInterface;

use App\Entities\Article;

class TopicsNewsGetter implements TopicsApiServiceInterface
{

    protected $topicsNewsRepository;
    public function __construct(TopicsNewsGetterInterface $topicsNewsRepository){
        $this->topicsNewsRepository = $topicsNewsRepository;
    }

    public function getTopicsNews(string $genre)
    {
        // NewsAPI からのレスポンスを整形する
        $data = json_decode($this->topicsNewsRepository->getNews($genre), true);

        $newsList = $data["articles"];

        $artiles = [];

        foreach($newsList as $news){
           $artiles[] = new Article($news["title"], $news["description"], $news["url"]);
        }
        
        return $artiles;
    }
}
