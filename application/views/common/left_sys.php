<ul class="main-nav">
	<?php if(has_permission('Admin', 'change_password')):?>
	    <li <?php echo $left_menu == 'change_password' ? 'class="btnon"' : '' ?>><a href="/admin/change_password">修改密码</a></li>
    <?php endif;?>
    <?php if(has_permission('Admin', 'admin_edit')):?>
	    <li <?php echo $left_menu == 'admin_edit' ? 'class="btnon"' : '' ?>><a href="/admin/admin_edit">修改信息</a></li>
	<?php endif;?>
	<?php if(has_permission('Admin', 'admin_add')):?>
    	<li <?php echo $left_menu == 'admin_add' ? 'class="btnon"' : '' ?>><a href="/admin/admin_add">增加账户</a></li>
    <?php endif;?>
    <?php if(has_permission('Accounts', 'accounts_transfer')):?>
        <li <?php echo $left_menu == 'accounts_transfer' ? 'class="btnon"' : '' ?>><a href="/accounts/accounts_transfer">客服转移</a></li>
    <?php endif;?>
    <?php if(has_permission('Accounts', 'getsystempage')):?>
        <li  <?php echo $left_menu == 'getsystempage' ? 'class="btnon"' : '' ?>><a href="/accounts/getsystempage">账户列表</a></li>
    <?php endif;?>
    <?php if(has_permission('Accounts', 'groupsinfo')):?>
        <li  <?php echo $left_menu == 'groupsinfo' ? 'class="btnon"' : '' ?>><a href="/accounts/groupsinfo">部门管理</a></li>
    <?php endif;?>
    <?php if(has_permission('Accounts', 'permission')):?>
        <li  <?php echo $left_menu == 'permission' ? 'class="btnon"' : '' ?>><a href="/accounts/permission">权限管理</a></li>
    <?php endif;?>
</ul>