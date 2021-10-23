<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>麻辣讲留言板系统</title>
    <link rel="shortcut icon" type="image/x-icon" href="https://static.malajiang.com/assets/web/img/favicon.png"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <h2 class="text-center">麻辣讲留言板系统</h2>
    <h6 class="text-center">Laravel 最佳实践</h6>
    @if(Session::has('message'))
        <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
    @endif
    <hr>
    <form action="{{ route("store") }}" method="post">
        @csrf
        <div class="form-group">
            <label for="name">您的姓名</label>
            <input type="text" name="name" class="form-control form-inline" id="name" placeholder="请输入您的姓名">
        </div>
        <div class="form-group">
            <label for="phone">您的手机</label>
            <input type="text" class="form-control" name="phone" id="phone" placeholder="请输入您的手机号码">
        </div>
        <div class="form-group">
            <label for="title">留言标题</label>
            <input type="text" class="form-control" name="title" id="title" placeholder="请输入您的留言标题">
        </div>
        <div class="form-group">
            <label for="content">留言内容</label>
            <textarea class="form-control" name="content" rows="5" placeholder="在这里输入您的留言内容"></textarea>
        </div>
        <hr>
        <button type="submit" class="btn btn-default">提交</button>
    </form>
    <h4>已经有留言({{ $records->count() }} 条)</h4>
    <hr>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th width="10">ID</th>
            <th width="80">留言者</th>
            <th width="100">手机号码</th>
            <th width="150">标题</th>
            <th>内容</th>
            <th width="100">留言时间</th>
            <th width="100">操作</th>
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
                    <a href="{{ route("edit", $record->id) }}" class="btn btn-primary">编辑</a>
                    <form action="{{ route('destroy', $record->id)}}" method="post">
                        @CSRF
                        @method("delete")
                        <button type="submit" class="btn btn-danger" onclick="return confirm('确认删除？')">删除</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="100" class="text-center">暂无留言</td>
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
