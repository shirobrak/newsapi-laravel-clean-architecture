<?php

namespace App\Repositories;

// 自作パッケージ
use App\Adapters\TopicsNewsGetterInterface;

// 外部パッケージ
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;


class NewsApiRepository implements TopicsNewsGetterInterface
{
    protected $client;

    public function __construct(){
        try{
            $this->client = new Client([
                'base_uri' => 'https://newsapi.org/v2/',
                'timeout'  => 10,
            ]);
        }catch(GuzzleException $e){
            print($e);
        }
    }

    // 指定されたジャンルのトピックス記事を取得する. 
    public function getNews(string $genre){
        $headers = [
                'Content-Type: application/json',
                'Authorization' => 'Bearer ' .config("api.newsapi.token"),
        ];
        try{
            $response = $this->client->request('GET', 'top-headlines', [
                'query' => [
                    'country' => 'us',
                ],
                'headers' => $headers
            ]);
        }catch(GuzzleException $e){
            print($e);
        }
        return $response->getBody();
    }
}