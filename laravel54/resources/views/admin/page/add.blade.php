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
                    <li>
                        <a href="{:url('admin/lst')}">管理员管理</a>
                    </li>
                    <li class="active">添加管理员</li>
                </ul>
            </div>
            <!-- /Page Breadcrumb -->

            <!-- Page Body -->
            <div class="page-body">

                <div class="row">
                    <div class="col-lg-12 col-sm-12 col-xs-12">
                        <div class="widget">
                            <div class="widget-header bordered-bottom bordered-blue">
                                <span class="widget-caption">新增管理员</span>
                            </div>
                            <div class="widget-body">
                                <div id="horizontal-form">
                                    <form class="form-horizontal" role="form" action="" method="post">
                                        <div class="form-group">
                                            <label for="name"
                                                   class="col-sm-2 control-label no-padding-right">管理员名称</label>
                                            <div class="col-sm-6">
                                                <input class="form-control" placeholder="" name="name"
                                                       required="" type="text">
                                            </div>
                                            <p class="help-block col-sm-4 red">* 必填</p>
                                        </div>

                                        <div class="form-group">
                                            <label for="password"
                                                   class="col-sm-2 control-label no-padding-right">管理员密码</label>
                                            <div class="col-sm-6">
                                                <input class="form-control" placeholder="" name="password"
                                                       required="" type="password">
                                            </div>
                                            <p class="help-block col-sm-4 red">* 必填</p>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-offset-2 col-sm-10">
                                                <button type="submit" class="btn btn-default">保存信息</button>
                                            </div>
                                        </div>
                                    </form>
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