<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// API version1の定義
Route::pattern('apiVersion1', 'v1');
Route::group(['namespace' => 'Api\V1', 'prefix' => '{apiVersion1}'], function() {
    Route::get('topics', 'TopicsApiController@getTopics');
});