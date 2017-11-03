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
                    <li class="active">控制面板</li>
                </ul>
            </div>
            <!-- /Page Breadcrumb -->

            <!-- Page Body -->
            <div class="page-body">

                <div style="text-align:center; line-height:1000%; font-size:24px;">
                    涛的个人博客后台首页<br>

                </div>


            </div>
            <!-- /Page Body -->
        </div>
        <!-- /Page Content -->
    </div>
</div>

@include('admin/public/foot')