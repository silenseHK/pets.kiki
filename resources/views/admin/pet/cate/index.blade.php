@extends('admin.layout.main')

@section('content')
    <div id="content">
        <el-container>
            <el-header style="height:auto;">
                <el-row type="flex" :gutter="10">
                    <el-col :span="3">
                        <el-input
                            placeholder="请输入内容"
                            v-model="search"
                            clearable>
                        </el-input>
                    </el-col>
                    <el-col>
                        <el-button icon="el-icon-search" circle></el-button>
                    </el-col>
                </el-row>
            </el-header>
            <el-main>
                <el-table
                    :data="tableData"
                    border
                    style="width: 100%">
                    <el-table-column
                        prop="date"
                        label="日期"
                        width="180">
                    </el-table-column>
                    <el-table-column
                        prop="name"
                        label="姓名"
                        width="180">
                    </el-table-column>
                    <el-table-column
                        prop="address"
                        label="地址">
                    </el-table-column>
                </el-table>
            </el-main>
        </el-container>
    </div>
@endsection

@section('js')
    <script>
    const vue = new Vue({
        el: '#content',
        data: {
            search: '',
            tableData: [{
                date: '2016-05-02',
                name: '王小虎',
                address: '上海市普陀区金沙江路 1518 弄'
            }, {
                date: '2016-05-04',
                name: '王小虎',
                address: '上海市普陀区金沙江路 1517 弄'
            }, {
                date: '2016-05-01',
                name: '王小虎',
                address: '上海市普陀区金沙江路 1519 弄'
            }, {
                date: '2016-05-03',
                name: '王小虎',
                address: '上海市普陀区金沙江路 1516 弄'
            }]
        },
    })
    </script>
@endsection
