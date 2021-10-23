<?php
namespace App\Http\Controllers;

use App\Models\Feedback;
use Request;

class FeedbackController extends Controller
{
    /**
     * 留言首页
     */
    public function index()
    {
        // 查询记录
        $records = Feedback::orderBy('id', 'DESC')
            ->paginate(10);
        // 渲染模板并传递数据
        return view("index")->with("records", $records);
    }
    /**
     * 存储留言
     */
    public function store()
    {
        Feedback::create([
            "name" => Request::get("name"),
            "phone" => Request::get("phone"),
            "title" => Request::get("title"),
            "content" => Request::get("content"),
        ]);
        return \Redirect::back()->with("message", "留言成功");
    }
    /**
     * 编辑留言
     * @param $id
     */
    public function edit($id)
    {
        // 查询指定 id 的数据库记录
        $record = Feedback::find($id);
        // 渲染模板并传递入数据
        return view("edit")->with("record", $record);
    }
    /**
     * 更新留言
     * @param $id
     */
    public function update($id)
    {
        // 查询出要更新的记录
        $record = Feedback::find($id);
        // 赋值
        $record->name = Request::get("name");
        $record->phone = Request::get("phone");
        $record->title = Request::get("title");
        $record->content = Request::get("content");
        // 保存记录
        $record->save();
        // 跳转回原来页面并闪出提示信息
        return \Redirect::back()->with("message", "编辑成功！");
    }

    /**
     * 删除留言
     * @param $id
     */
    public function destroy($id)
    {
        // 删除记录
        Feedback::destroy($id);
        // 返回之前页面并闪出提示信息
        return \Redirect::back()->with("message", "删除成功");
    }
}
