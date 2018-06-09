


<?php include(APPPATH . 'views/common/header.php') ?>

<?php include(APPPATH . 'views/common/top.php') ?>

<?php include(APPPATH . 'views/common/left.php') ?>




        <!-- 主体内容 -->
        <div class="layui-body" id="LAY_app_body">
            <div class="layadmin-tabsbody-item layui-show">
                <!-- 页面标签 -->
                <div class="layui-fluid">
                    <div class="layui-card">
                        <div class="layui-card-header">添加问题</div>
                        <div class="layui-card-body" style="padding: 15px;">
                            <form class="layui-form" action="/user/question_save" lay-filter="component-form-group" method="post">
                                <div class="layui-form-item">
                                    <label class="layui-form-label">标题</label>
                                    <div class="layui-input-block">
                                        <input type="text" name="title" lay-verify="title" autocomplete="off" placeholder="请输入标题" class="layui-input">
                                    </div>
                                </div>


                                <div class="layui-form-item">
                                    <label class="layui-form-label">分类</label>
                                    <div class="layui-input-block">
                                        <select name="category_id" lay-filter="aihao">
                                            <?php foreach ($list as $key=>$value) { ?>
                                            <option value=""></option>
                                            <option value="<?php echo $value['id'];?>"><?php echo $value['name'];?></option>
                                            <?php }?>
                                        </select>
                                    </div>
                                </div>

                                <div class="layui-form-item">
                                    <label class="layui-form-label">级别</label>
                                    <div class="layui-input-block">
                                        <select name="level" lay-filter="aihao">

                                            <option value="1">容易</option>
                                            <option value="2">中等</option>
                                            <option value="3">困难</option>

                                        </select>
                                    </div>
                                </div>

                                <div class="layui-form-item layui-form-text">
                                    <label class="layui-form-label">答案</label>
                                    <div class="layui-input-block">
                                        <textarea name="body" placeholder="请输入内容" class="layui-textarea"></textarea>
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
<script>
layui.use('form', function(){
    var form = layui.form; //只有执行了这一步，部分表单元素才会自动修饰成功

//……

//但是，如果你的HTML是动态生成的，自动渲染就会失效
//因此你需要在相应的地方，执行下述方法来手动渲染，跟这类似的还有 element.init();
    form.render();
});
</script>



