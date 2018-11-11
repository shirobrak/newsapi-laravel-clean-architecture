<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Api\V1\BaseApiController;
use App\Services\V1\TopicsApiService;
use App\Adapters\TopicsNewsGetter;
use App\Repositories\NewsApiRepository;

class TopicsApiController extends BaseApiController
{

    protected $service;
    public function __construct(){
        // 依存注入
        $repository = new NewsApiRepository;
        $adapter = new TopicsNewsGetter($repository);
        $this->service = new TopicsApiService($adapter);
    }


    public function getTopics(Request $request){

        // Request のパラメータ処理
        $validate_rule = [
            'genre' => 'required|string',
        ];
        $this->validate($request, $validate_rule);

        // レスポンス取得
        $service_response = $this->service->getTopics($request["genre"]);
        return response()->json($service_response, 200);
    }
}