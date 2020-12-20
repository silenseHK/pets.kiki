
<link href="{{asset('static/css/element-ui.css')}}" rel="stylesheet">
<style>
    .image {
        width: 98%;
        display: block;
        height: 150px;
    }
    .image-checked{
        border: 1px solid #0B90C4;
    }
    .image-normal{
        border: 1px solid #fff;
    }
    /*::-webkit-scrollbar{*/
    /*display: none;*/
    /*}*/
    .el-tabs__item{
        width: 140px;
    }
</style>

<template id="upload-wrap">
    <el-dialog title="上传图片" :visible.sync="is_show" @open="handleOpen">
        <el-tabs @tab-remove="delGroup" type="card" closable :tab-position="tabPosition" v-model="current_group" style="height:600px;overflow-y: scroll; overflow-x: hidden" @tab-click="tabCLick" v-loading="loading">
            <el-tab-pane :label="item.group_name.substring(0,6)" v-for="(item, key) in file_list" :key="key" :name="key">
                <el-container>
                    <el-header height="auto">
                        <el-row :gutter="10" justify="space-around" align="middle">
                            <el-col :span="2.5">
                                <el-button size="small" type="primary" @click="addGroup">增加分类</el-button>
                            </el-col>
                            <el-col :span="2.5">
                                <el-upload
                                    class="upload-demo"
                                    :action="action"
                                    name="image"
                                    :multiple="true"
                                    :on-success="handleSuccess"
                                    :on-error="handleError"
                                    :data="{group_id:file_list[current_group].group_id}"
                                    :show-file-list="false">
                                    <el-button size="small" type="primary">点击上传</el-button>
                                </el-upload>
                            </el-col>

                            <el-col :span="2.5">
                                <el-button size="small" type="primary" @click="del">删除</el-button>
                            </el-col>
                        </el-row>
                    </el-header>
                    <el-main>
                        <el-row :gutter="10" justify="space-around" align="middle">
                            <el-col style="margin-bottom: 10px;" :span="6" v-for="(it, k) in item.files" :key="k">
                                <el-card :body-style="{ padding: '0px' }" align="center">
                                    <el-image :style="{cursor: 'pointer'}" :class="{'image-checked':!it['is_checked'], 'image-normal':it['is_checked']}" @click="chooseImage(it)" :src="it.file_path" class="image" fit="contain"></el-image>
                                </el-card>
                            </el-col>
                        </el-row>
                    </el-main>
                    <el-footer height="auto">
                        <el-pagination
                            background
                            layout="prev, pager, next"
                            :page-size="size"
                            :pager-count="9"
                            hide-on-single-page
                            :current-page="page"
                            @current-change="changeCurPage"
                            :total="total">
                        </el-pagination>
                    </el-footer>
                </el-container>
            </el-tab-pane>
        </el-tabs>
        <el-row type="flex" justify="end">
            <el-col :span="2">
                <el-button type="primary" plain size="medium" @click="sureImages">确定</el-button>
            </el-col>
            <el-col :span="2">
                <el-button type="primary" plain size="medium" @click="cancelSure">取消</el-button>
            </el-col>
        </el-row>
    </el-dialog>
</template>

<script type="text/javascript" src="{{asset('static/js/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('static/js/vue.js')}}"></script>
<script type="text/javascript" src="{{asset('static/js/element-ui.js')}}"></script>
<script>
    Vue.component('upload-img',{
        template:"#upload-wrap",
        data(){
            return{
                tabPosition: 'left',
                is_show: false,
                action: "<php>request()->host()</php>" + "/api/admins/uploadOne",
                file_list: [],
                check_list: [],
                current_group: 0,
                page: 1,
                size: 32,
                total: 0,
                loading: false
            }
        },
        props: {
        },
        methods: {
            showWrap(){
                this.is_show = true;
            },
            hideWrap(){
                this.is_show = false;
            },
            uploadImgs(e){
                console.log(e)
            },
            showUploadDir(){
                this.$refs.iptRef.click()
            },
            handleSuccess(res){
                let type = 'error';
                if(res.code == 1){
                    type = 'success';
                    if('undefined' == typeof this.file_list[this.current_group].files)this.file_list[this.current_group].files = [];
                    this.file_list[this.current_group].files.push({file_id:res.data.file_id, file_name:res.data.file_name, file_path:res.data.file_path, is_checked:res.data.file_id, storage:'local'})
                }
                this.$message({
                    message: res.msg,
                    type
                });
            },
            handleError(e){
                console.log(e)
            },
            handleOpen(){
                this.getGroupList();
            },
            getImages(){
                let that = this;
                this.loading = true;
                $.post("{{url('/admin/upload/uploadList')}}", {group_id:this.file_list[this.current_group].group_id, page:this.page, size:this.size}, function(res){
                    that.loading = false;
                    Vue.set(that.file_list[that.current_group],'files',res.data.data)
                    // that.file_list[that.current_group].files = res.data.data;
                    that.total = res.data.total;
                    that.check_list = [];
                }, 'json')
            },
            chooseImage(it){
                it.is_checked = it.is_checked > 0 ? 0 : 1;
                if(it.is_checked > 0){
                    this.check_list.forEach((v, k)=>{
                        if(v == it.file_id){
                            this.check_list.splice(k,1);
                            return;
                        }
                    })
                }else{
                    this.check_list.push(it.file_id);
                }
            },
            addGroup(){
                this.$prompt('请输入分类名', '提示', {
                    confirmButtonText: '确定',
                    cancelButtonText: '取消',
                }).then(({ value }) => {
                    if($.trim(value) == ''){
                        this.$message({
                            type: 'info',
                            message: '请输入分类名'
                        });
                        return false;
                    }
                    let that = this;
                    $.post("/api/admins/uploadAddGroup", {group_name: value}, function(res){
                        let type = 'error';
                        if(res.code == 1) {
                            type = 'success';
                            that.file_list.push({files:[],group_id:res.data.group_id,group_name:res.data.group_name,sort:res.data.sort})
                        }
                        that.$message({
                            message: res.msg,
                            type
                        });
                    }, 'json')
                }).catch(() => {
                    this.$message({
                        type: 'info',
                        message: '取消输入'
                    });
                });
            },
            del(){
                if(this.check_list.length <= 0){
                    this.$message({
                        message: '请选择需要操作的图片',
                        type: 'error'
                    });
                }
                let that = this;
                $.post('/api/admins/uploadDelImages', {file_ids:this.check_list}, function(res){
                    if(res.code == 1){
                        that.getImages();
                    }else{
                        that.$message({
                            message: res.msg,
                            type: 'error'
                        });
                    }
                }, 'json')
            },
            getGroupList(){
                let that = this;
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                });
                $.post('{{url('/admin/upload/groupList')}}', {}, function(res){
                    if(res.code == 200){
                        that.file_list = res.data
                        that.getImages();
                    }else{
                        that.$message({
                            message: res.msg,
                            type: 'error'
                        });
                    }
                }, 'json')
            },
            tabCLick(e){
                this.page = 1;
                this.getImages();
                this.check_list = [];
            },
            changeCurPage(e){
                this.page = e;
                this.getImages();
            },

            sureImages(){
                let check_list = this.check_list;
                if(check_list.length <= 0){
                    this.$message({
                        message: '请选择图片',
                        type: 'error'
                    });
                    return false;
                }
                let that = this;
                $.post('/api/admins/uploadGetImages', {file_ids:check_list}, function(res){
                    if(res.code == 1){
                        that.$emit('choose-image', res.data);
                        that.hideWrap();
                    }else{
                        that.$message({
                            message: res.msg,
                            type: 'error'
                        });
                    }
                }, 'json');
            },
            cancelSure(){
                this.is_show = false;
            },

            delGroup(e){
                this.$confirm('分组删除后图片将转移到未分组?', '提示', {
                    confirmButtonText: '确定',
                    cancelButtonText: '取消',
                    type: 'warning'
                }).then(() => {
                    let that = this;
                    let group_id = this.file_list[e].group_id;
                    if(group_id == 0){
                        this.$message({
                            type: 'error',
                            message: '未分组不能删除'
                        });
                        return false;
                    }
                    $.post('/api/admins/uploadDelGroup', {group_id}, function(res){
                        if(res.code == 1){
                            that.file_list.splice(e,1);
                        }else{
                            that.$message({
                                type: 'error',
                                message: res.msg
                            });
                        }
                    }, 'json')

                }).catch(() => {});
            },
        },
        created(){
            // console.log(this.show_status)
            // this.getLists();
        }
    })
</script>
