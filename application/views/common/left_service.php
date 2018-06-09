<ul class="main-nav">

    <?php if (has_permission('service', 'index')): ?>
        <li <?php echo ($class == 'service' && $method == 'index') ? 'class="btnon"' : '' ?>><a href="/service/index">企业管理</a>
        </li>
    <?php endif; ?>
    <?php if (has_permission('service', 'course_index')): ?>
        <li <?php echo ($class == 'service' && $method == 'course_index') ? 'class="btnon"' : '' ?>><a
                href="/service/course_index">课程列表</a></li>
    <?php endif; ?>
    <?php if (has_permission('teacher', 'index')): ?>
        <li <?php echo ($class == 'teacher' && $left_menu == 'index') ? 'class="btnon"' : '' ?>><a
                href="/teacher/index">老师列表</a></li>
    <?php endif; ?>
    <?php if (has_permission('teacher', 'resume_list')): ?>
        <li <?php echo $left_menu == 'resume_list' ? 'class="btnon"' : '' ?>><a href="/teacher/resume_list">简历列表</a>
        </li>
    <?php endif; ?>
</ul>