@extends('admin.layout.main')

@section('content')
    <div id="content">
        <el-button type="primary" plain @click="uploadImage">主要按钮</el-button>
        <upload-img ref="uploadImg" @choose-image="chooseImage"></upload-img>
    </div>
@endsection

@section('js')
    @include('admin.layout.upload')
    <script>
    const vue = new Vue({
        el: '#content',
        data: {

        },
        methods:{
            chooseImage(res){
                this.handle_form.image = res[0].file_path;
                this.handle_form.image_id = res[0].file_id;
            },
            uploadImage(){
                this.$refs.uploadImg.showWrap();
            }
        },
    })
    </script>
@endsection
