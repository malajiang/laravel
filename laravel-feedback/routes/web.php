<?php
Route::get("/", ['as' => 'index', 'uses' => 'FeedbackController@index']); // 留言本访问入口
Route::post("/store", ['as' => 'store', 'uses' => 'FeedbackController@store']); // 存储留言内容
Route::delete("/{id}}", ['as' => 'destroy', 'uses' => 'FeedbackController@destroy']); // 删除留言记录
Route::get("/{id}/edit", ['as' => 'edit', 'uses' => 'FeedbackController@edit']); // 编辑留言记录界面
Route::put("/{id}", ['as' => 'update', 'uses' => 'FeedbackController@update']); // 提交更新留言记录

//Route::resource('/feedback', 'FeedbackController', ['expect' => ['show']]);
