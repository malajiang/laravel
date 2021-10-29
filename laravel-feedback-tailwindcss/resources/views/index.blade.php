<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>麻辣讲留言板系统</title>
    <link rel="shortcut icon" type="image/x-icon" href="https://static.malajiang.com/assets/web/img/favicon.png"/>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
{{--    <link href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" rel="stylesheet">--}}
</head>
<body>
<div class="container mx-auto p-5">
    <h2 class="text-center text-4xl">麻辣讲留言板系统</h2>
    <h6 class="text-center p-4 text-xl text-gray-500">Laravel + Tailwind CSS 开发实战</h6>
    @if(Session::has('message'))
        <div class="malajiang-tips" role="alert">{{ Session::get('message') }}</div>
    @endif
    <hr>
    <form action="{{ route("store") }}" class="mt-5" method="post">
        @csrf
        <div class="py-3">
            <label for="">您的姓名</label>
            <input type="text" name="name" class="malajiang-input" id="name" placeholder="请输入您的姓名">
        </div>
        <div class="py-3">
            <label for="phone">您的手机</label>
            <input type="text" class="malajiang-input" name="phone" id="phone" placeholder="请输入您的手机号码">
        </div>
        <div class="py-3">
            <label for="title">留言标题</label>
            <input type="text" class="malajiang-input" name="title" id="title" placeholder="请输入您的留言标题">
        </div>
        <div class="py-3">
            <label for="content">留言内容</label>
            <textarea class="malajiang-input text-yellow-600" name="content" rows="5" placeholder="在这里输入您的留言内容"></textarea>
        </div>
        <hr>
        <button type="submit" class="malajiang-button">提交</button>
    </form>
    <h4 class="mt-10 text-gray-500">已经有留言({{ $records->count() }} 条)</h4>
    <hr class="my-2">
    <table class="malajiang-table">
        <thead>
        <tr>
            <th>ID</th>
            <th>留言者</th>
            <th>手机号码</th>
            <th>标题</th>
            <th>内容</th>
            <th>留言时间</th>
            <th width="180">操作</th>
        </tr>
        </thead>
        <tbody>
        @forelse($records as $record)
            <tr>
                <td>{{ $record->id }}</td>
                <td>{{ $record->name }}</td>
                <td>{{ $record->phone }}</td>
                <td>{{ $record->title }}</td>
                <td>{{ $record->content }}</td>
                <td>{{ $record->created_at }}</td>
                <td>
                    <a href="{{ route("edit", $record->id) }}" class="malajiang-btn-primary">编辑</a>
                    <form action="{{ route('destroy', $record->id)}}" class="inline" method="post">
                        @CSRF
                        @method("delete")
                        <button type="submit" class="malajiang-btn-danger" onclick="return confirm('确认删除？')">删除</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="100" class="text-center text-gray-400 p-3">暂无留言</td>
            </tr>
        @endforelse
        </tbody>
    </table>
    {{ $records->links() }}
</div>
<script src="https://cdn.jsdelivr.net/npm/jquery@1.12.4/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js"></script>
</body>
</html>
