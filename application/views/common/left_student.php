<ul class="main-nav">
    <?php if(has_permission('Student', 'querystudent') || (isset($this->user) && $this->user['remark'] == 1)):?>
    <li <?php echo $left_menu == 'querystudent' ? 'class="btnon"' : '' ?>><a href="/student/querystudent">个人用户</a></li>
    <?php endif;?>
    <?php if(has_permission('Student', 'addstudent')):?>
    <li <?php echo $left_menu == 'addstudent' ? 'class="btnon"' : '' ?>><a href="/student/addstudent">录入用户</a></li>
    <?php endif;?>
    <?php if(has_permission('Student', 'transferuser')):?>
    <li <?php echo $left_menu == 'transferuser' ? 'class="btnon"' : '' ?>><a href="/student/transferuser">转移用户</a></li>
    <?php endif;?>
    <?php if(has_permission('Student', 'batch')):?>
    <li <?php echo $left_menu == 'batch' ? 'class="btnon"' : '' ?>><a href="/student/batch">批量导入</a></li>
    <?php endif;?>
    <?php if(has_permission('Student', 'spare_user')):?>
    <li <?php echo $left_menu == 'spare_user' ? 'class="btnon"' : '' ?>><a href="/student/spare_user">备用用户</a></li>
    <?php endif;?>
</ul>