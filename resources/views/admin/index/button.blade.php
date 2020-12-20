@extends('admin.layout.main')

@section('content')
    <div id="content">
        <el-button type="success" plain>成功按钮</el-button>
    </div>
@endsection

@section('js')
    <script>
    const vue = new Vue({
        el: '#content',
        data: {

        },
    })
    </script>
@endsection
