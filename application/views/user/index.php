


<?php include(APPPATH . 'views/common/header.php') ?>

<?php include(APPPATH . 'views/common/top.php') ?>

<?php include(APPPATH . 'views/common/left.php') ?>




        <!-- 主体内容 -->
        <div class="layui-body" id="LAY_app_body">
            <div class="layadmin-tabsbody-item layui-show">
                <!-- 页面标签 -->
                <div class="layui-fluid">
                    <div class="layui-card">
                        <div class="layui-card-header">添加分类</div>
                        <div class="layui-card-body" style="padding: 15px;">
                            <form class="layui-form" action="/user/add_category" lay-filter="component-form-group" method="post">
                                <div class="layui-form-item">
                                    <label class="layui-form-label">标题</label>
                                    <div class="layui-input-block">
                                        <input type="text" name="title" lay-verify="title" autocomplete="off" placeholder="请输入标题" class="layui-input">
                                    </div>
                                </div>

                                <div class="layui-form-item layui-layout-admin">
                                    <div class="layui-input-block">
                                        <div class="layui-footer" style="left: 0;">
                                            <button class="layui-btn" lay-submit="" lay-filter="component-form-demo1">立即提交</button>
                                            <button type="reset" class="layui-btn layui-btn-primary">重置</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>



<?php include(APPPATH . 'views/common/footer.php') ?>



