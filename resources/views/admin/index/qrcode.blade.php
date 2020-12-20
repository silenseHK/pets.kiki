@extends('admin.layout.main')

@section('content')
    <div id="content">
        <img src="{{(new \chillerlan\QRCode\QRCode)->render("123") }}" />
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
