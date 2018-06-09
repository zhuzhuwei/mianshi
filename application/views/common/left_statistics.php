<ul class="main-nav" style="font-size: 12px;">
<?php if(has_permission('statistics', 'user') && 1 == 2):?>
    <li  <?php echo $left_menu == 'user' ? 'class="btnon"' : '' ?>><a href="/statistics/user">用户统计</a></li>
<?php endif;?>
<?php if(has_permission('statistics', 'order') && 1 == 2):?>
    <li  <?php echo $left_menu == 'order' ? 'class="btnon"' : '' ?>><a href="/statistics/order">销售统计</a></li>
<?php endif;?>

    <li class="<?php echo $left_menu == 'sale' ? 'btnon' : ''?>"><a href="/statistics/sale">销售额统计</a></li>
    <?php if (has_permission('Statistics', 'cancel_class')):?>
        <li class="<?php echo $left_menu == 'cancel_class' ? 'btnon' : ''?>"><a href="/statistics/cancel_class">取消课堂</a></li>
    <?php endif;?>

    <?php if (has_permission('Statistics', 'students_class_statistics')):?>
        <li class="<?php echo $left_menu == 'students_class_statistics' ? 'btnon' : ''?>"><a href="/statistics/students_class_statistics">学员课时情况</a></li>
    <?php endif;?>

<!--    --><?php //if (has_permission('Statistics', 'statistics_students_class')):?>
<!--        <li class="--><?php //echo $left_menu == 'statistics_students_class' ? 'btnon' : ''?><!--"><a href="/statistics/statistics_students_class">学员课时详细情况</a></li>-->
<!--    --><?php //endif;?>

    <?php if (has_permission('Statistics', 'get_public_class')):?>
        <li class="<?php echo $left_menu == 'get_public_class' ? 'btnon' : ''?>"><a href="/statistics/get_public_class">大课堂统计</a></li>
    <?php endif;?>

    <?php if (has_permission('Statistics', 'get_student_order')):?>
        <li class="<?php echo $left_menu == 'get_student_order' ? 'btnon' : ''?>"><a href="/statistics/get_student_order">订单数据</a></li>
    <?php endif;?>

    <?php if (has_permission('Statistics', 'monthly_report')):?>
        <li class="<?php echo $left_menu == 'monthly_report' ? 'btnon' : ''?>"><a href="/statistics/monthly_report">课程明细</a></li>
    <?php endif;?>
</ul>