
<!-- 侧边菜单 -->
<div class="layui-side layui-side-menu">
    <div class="layui-side-scroll">
        <div class="layui-logo" lay-href="home/console.html">
            <span>layuiAdmin</span>
        </div>

        <ul class="layui-nav layui-nav-tree" lay-shrink="all" id="LAY-system-side-menu" lay-filter="layadmin-system-side-menu">
            <li data-name="home" class="layui-nav-item layui-nav-itemed">
                <a href="/user/index" lay-tips="主页" lay-direction="2">
                    <i class="layui-icon layui-icon-home"></i>
                    <cite>管理平台</cite>
                </a>
                <dl class="layui-nav-child">
                    <dd data-name="console" class="layui-this">
                        <a href="/user/index">分类</a>
                    </dd>
                    <dd data-name="console">
                        <a href="/user/add_question">添加问题</a>
                    </dd>
                    <dd data-name="console">
                        <a href="/user/get_question_list">问题列表</a>
                    </dd>
                </dl>
            </li>

        </ul>
    </div>
</div>