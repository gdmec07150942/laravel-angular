@include('admin/public/head')
<!-- 头部 -->
@include('admin/public/top')
<!-- /头部 -->
<div class="main-container container-fluid">
    <div class="page-container">
        <!-- 侧边栏 -->
    @include('admin/public/left')
    <!-- /侧边栏 -->
        <!-- Page Content -->
        <div class="page-content">
            <!-- Page Breadcrumb -->
            <div class="page-breadcrumbs">
                <ul class="breadcrumb">
                    <li>
                        <a href="#">系统</a>
                    </li>
                    <li class="active">管理员管理</li>
                </ul>
            </div>
            <!-- /Page Breadcrumb -->

            <!-- Page Body -->
            <div class="page-body">

                <button type="button" tooltip="添加管理员" class="btn btn-sm btn-azure btn-addon"
                        onClick="javascript:window.location.href = '{:url('add')}'"><i class="fa fa-plus"></i>
                    Add
                </button>
                <div class="row">
                    <div class="col-lg-12 col-sm-12 col-xs-12">
                        <div class="widget">
                            <div class="widget-body">
                                <div class="flip-scroll">
                                    <table class="table table-bordered table-hover">
                                        <thead class="">
                                        <tr>
                                            <th class="text-center">ID</th>
                                            <th class="text-center">用户名称</th>
                                            <th class="text-center">操作</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td align="center">6</td>
                                            <td align="center">test</td>
                                            <td align="center">
                                                <a href="/admin/user/edit/id/6.html"
                                                   class="btn btn-primary btn-sm shiny">
                                                    <i class="fa fa-edit"></i> 编辑
                                                </a>
                                                <a href="#" onClick="warning('确实要删除吗', '/admin/user/del/id/6.html')"
                                                   class="btn btn-danger btn-sm shiny">
                                                    <i class="fa fa-trash-o"></i> 删除
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="center">7</td>
                                            <td align="center">aaaaaa</td>
                                            <td align="center">
                                                <a href="/admin/user/edit/id/7.html"
                                                   class="btn btn-primary btn-sm shiny">
                                                    <i class="fa fa-edit"></i> 编辑
                                                </a>
                                                <a href="#" onClick="warning('确实要删除吗', '/admin/user/del/id/7.html')"
                                                   class="btn btn-danger btn-sm shiny">
                                                    <i class="fa fa-trash-o"></i> 删除
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="center">8</td>
                                            <td align="center">bbb</td>
                                            <td align="center">
                                                <a href="/admin/user/edit/id/8.html"
                                                   class="btn btn-primary btn-sm shiny">
                                                    <i class="fa fa-edit"></i> 编辑
                                                </a>
                                                <a href="#" onClick="warning('确实要删除吗', '/admin/user/del/id/8.html')"
                                                   class="btn btn-danger btn-sm shiny">
                                                    <i class="fa fa-trash-o"></i> 删除
                                                </a>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /Page Body -->
        </div>
        <!-- /Page Content -->
    </div>
</div>
@include('admin/public/foot')