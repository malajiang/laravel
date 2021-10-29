<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>编辑留言</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div class="container mx-auto p-5">
    <h4 class="text-center text-2xl mb-4">编辑留言 <a href="{{ route("index") }}" class="ml-2 text-base text-gray-400">返回留言</a></h4>
    @if(Session::has('message'))
        <div class="malajiang-tips" role="alert">{{ Session::get('message') }}</div>
    @endif
    <hr>
    <form action="{{ route("update", $record->id) }}" class="mt-5" method="post">
        @csrf
        @method("put")
        <div class="form-group">
            <label for="name">您的姓名</label>
            <input type="text" name="name" class="malajiang-input" id="name" placeholder="请输入您的姓名" value="{{ $record->name }}">
        </div>
        <div class="py-3">
            <label for="phone">您的手机</label>
            <input type="text" class="malajiang-input" name="phone" id="phone" placeholder="请输入您的手机号码" value="{{ $record->phone }}">
        </div>
        <div class="py-3">
            <label for="title">留言标题</label>
            <input type="text" class="malajiang-input" name="title" id="title" placeholder="请输入您的留言标题" value="{{ $record->title }}">
        </div>
        <div class="py-3">
            <label for="content">留言内容</label>
            <textarea class="malajiang-input text-yellow-600" name="content" rows="5" placeholder="在这里输入您的留言内容">{{ $record->content }}</textarea>
        </div>
        <hr>
        <button type="submit" class="malajiang-button">提交</button>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/jquery@1.12.4/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js"></script>
</body>
</html>
