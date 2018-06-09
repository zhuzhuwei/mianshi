


<?php include(APPPATH . 'views/common/header.php') ?>

<?php include(APPPATH . 'views/common/top.php') ?>

<?php include(APPPATH . 'views/common/left.php') ?>





<div class="layui-body" id="LAY_app_body">
    <div class="layadmin-tabsbody-item layui-show">
        <div class="layui-fluid">
<table class="layui-table">
    <colgroup>
        <col width="150">
        <col width="200">
        <col>
    </colgroup>
    <thead>
    <tr>
        <th>问题ID</th>
        <th>问题标题</th>
        <th>所属分类</th>
        <th>添加时间</th>
        <th>操作</th>
    </tr>
    </thead>
    <tbody>

    <?php foreach ($list as $key=>$value) {?>
    <tr>
        <td><?php echo $value['id'];?></td>
        <td><?php echo $value['title'];?></td>
        <td><?php echo $value['name'];?></td>
        <td><?php echo date('Y-m-d',$value['add_time']);?></td>
        <td>编辑</td>
    </tr>
    <?php }?>
    </tbody>
</table>

            <div class="pages">
                <?php echo $pagination
                ?>
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



