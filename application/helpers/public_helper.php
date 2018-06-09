<?php
/**
 * 性别显示
 *
 * @param int $sex
 * @return string
 *
 */
function show_sex_str($sex){
    $config = config_item('sex');
    return $config[$sex];
}

/**
 * 重要性显示
 *
 * @param int $import
 * @return string
 *
 */
function show_import_str($import){
    $config = config_item('import');
    return $config[$import];
}

/**
 * 维护状态显示
 *
 * @param int $maintain
 * @return string
 *
 */
function show_maintain_str($maintain){
    $config = config_item('maintain');
    return $config[$maintain];
}

/**
 * 来源显示
 *
 * @param int $source
 * @return string
 *
 */
function show_source_str($source){
    $config = config_item_source('crm_source');
    return $config[$source];
}

function show_source_detail_str($detail){
    $config = config_item('into_details');
    if(isset($config[$detail])){
        return "（{$config[$detail]}）";
    }else{
        return '';
    }

}

function show_feature_str($feature){
    $config = config_item('feature');
    return $config[$feature];
}

//年龄中文
function age_cn($age){
    switch ($age) {
        case 0:
            return '无';
        case 1:
            return '0-10岁';
        case 2:
            return '11-22岁';
        case 3:
            return '23-35岁';
        case 4:
            return '36-45岁';
        case 5:
            return '45岁以上';
        default:
            break;
    }
}

//行业中文行业0 无；1 IT/通信/电子/互联网；2 外企；3 教育行业；4 金融行业；5 政府/非营利机构；6 其他
function industry_cn($industry){
    switch ($industry) {
        case 0:
            return '无';
        case 1:
            return 'IT/通信/电子/互联网';
        case 2:
            return '外企';
        case 3:
            return '教育行业';
        case 4:
            return '金融行业';
        case 5:
            return '政府/非营利机构';
        case 6:
            return '其他';
        default:
            break;
    }
}

//学习目的0请选择1国内考试2出国考试3出境旅游4职业发展5兴趣爱好6其他
function purpose_cn($purpose){
    switch ($purpose) {
        case 0:
            return '无';
        case 1:
            return '国内考试';
        case 2:
            return '出国考试';
        case 3:
            return '出境旅游';
        case 4:
            return '职业发展';
        case 5:
            return '兴趣爱好';
        case 6:
            return '其他';
        default:
            break;
    }
}

//学习目标0请选择;1可满足出国旅游的基本沟通需求;2可满足日常工作的基本沟通需求;
//3可满足工作中谈判、演讲等较复杂沟通;4可满足工作中邮件写作、报告撰写等书面沟通需求;
//5提高国内英语考试的成绩（中学，大学等）;6参加出国类语言考试（SAT，雅思，托福等;7其他
function target_cn($target){
    switch ($target) {
        case 0:
            return '无';
        case 1:
            return '可满足出国旅游的基本沟通需求';
        case 2:
            return '可满足日常工作的基本沟通需求';
        case 3:
            return '可满足工作中谈判、演讲等较复杂沟通';
        case 4:
            return '可满足工作中邮件写作、报告撰写等书面沟通需求';
        case 5:
            return '提高国内英语考试的成绩（中学，大学等）';
        case 6:
            return '参加出国类语言考试（SAT，雅思，托福等';
        case 7:
            return '其他';
        default:
            break;
    }
}

//学习时间范围0请选择;1一个月;2三个月;3半年;4一年;5两年;6三年以上
function time_range_cn($time_range){
    switch ($time_range) {
        case 0:
            return '无';
        case 1:
            return '一个月';
        case 2:
            return '三个月';
        case 3:
            return '半年';
        case 4:
            return '一年';
        case 5:
            return '两年';
        case 6:
            return '三年以上';
        default:
            break;
    }
}

//获取wowtalk渠道0请选择;1户外广告;2百度;3朋友推荐;4期刊杂志;5微博;6其他
function get_wow_source($source){
    switch ($source) {
        case 0:
            return '无';
        case 1:
            return '户外广告';
        case 2:
            return '百度';
        case 3:
            return '朋友推荐';
        case 4:
            return '期刊杂志';
        case 5:
            return '微博';
        case 6:
            return '其他';
        default:
            break;
    }
}

//考试需求0无 1雅思 2托福
function examination_cn($examination){
    switch ($examination) {
        case 0:
            return '无';
        case 1:
            return '雅思';
        case 2:
            return '托福';
        default:
            break;
    }

}

/**
 * @param $gateway
 * @return string
 */
function pay_gateway_cn($gateway)
{
    $dict = array(
        'alipay'=>'支付宝',
        'netpay'=>'银联',
        'paypal'=>'paypal',
        'kqpay'=>'快钱',
        'qufenqi'=>'趣分期',
        PAY_GATEWAY_GIFT=>'系统赠送',
        PAY_GATEWAY_ADMIN=>'管理员赠送',
        PAY_GATEWAY_AGENT=>'代理商充值',
        PAY_GATEWAY_MANUAL=>'管理员确认',
        PAY_COUNTER=>'柜台付款',
    );
    return isset($dict[$gateway]) ? $dict[$gateway]:$gateway;
}

function order_status_cn($status)
{
    $cn_name = '';
    switch ($status) {
        case ORDER_STATUS_DEBT:
            $cn_name = '支付失败';
            break;
        case ORDER_STATUS_SIGN:
            $cn_name = '签名错误';
            break;
        case ORDER_STATUS_FAIL:
            $cn_name = '金额校验错误';
            break;
        case ORDER_STATUS_INIT:
            $cn_name = '待付款';
            break;
        case ORDER_STATUS_SUCC:
            $cn_name = '已付款';
            break;
        case ORDER_STATUS_FINISH:
            $cn_name = '交易成功';
            break;
        case ORDER_STATUS_CANCEL:
            $cn_name = '交易关闭';
            break;
        case ORDER_STATUS_REFUND:
            $cn_name = '已退款';
            break;
    }
    return $cn_name;
}

function get_today_time($end = Null, $date = Null){
    if( $date )
    {
        $time = strtotime($date);
        $y = date('Y', $time);
        $m = date('m', $time);
        $d = date('d', $time);
    }
    else
    {
        $y = date('Y');
        $m = date('m');
        $d = date('d');
    }

    // 结束时间
    $end && $d++;

    return mktime(0, 0, 0, $m, $d, $y);
}

/**
 * @param $mobilephone
 * @return bool
 */
function is_mobilephone($mobilephone)
{
    if(preg_match("/^(13[0-9]{1}[0-9]{8}|15[0-9]{1}[0-9]{8}|18[0-9]{1}[0-9]{8}|14[0-9]{9}|17[0-9]{9}|09[0-9]{8})$/", $mobilephone))
        return true;
    return false;
}

function has_permission($act, $mod){
    $CI = & get_instance();
    $CI->load->model('Permission','permission');
    return $CI->permission->has_permission($act, $mod);
}

function curl_client($url, $data){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_DNS_CACHE_TIMEOUT, 300);
    $output = curl_exec($ch);
    curl_close($ch);
    return $output;
}

/**
 * 验证邮箱格式
 *
 * @param string $email
 * @return boolean
 */
function is_email($email){
	return filter_var($email, FILTER_VALIDATE_EMAIL) ? true : false;
    //return preg_match("/^[a-z0-9]{1}[-_\.|a-z0-9]{0,19}@([a-z0-9]*[-_]?[a-z0-9]+)+[\.][a-z]{0,20}([\.][a-z]{1,3})?$/i",$email) ? true : false;
}

/**
 * 返回支付方式
 *
 * @param string $geteway
 * @return strint 支付方式
 */
function get_geteway($geteway)
{
$dict = array(
            'alipay'=>'支付宝',
            PAY_GATEWAY_GIFT=>'系统赠送',
            PAY_GATEWAY_ADMIN=>'管理员赠送',
            PAY_GATEWAY_AGENT=>'代理商充值',
            PAY_GATEWAY_MANUAL=>'管理员确认',
            PAY_COUNTER=>'柜台付款',
    );

    return $dict[$geteway];
}

/**
 * redis
 * @param $redis_db Redis 数据库名
 *
 * @return object Redis
 */
function redis_client($redis_db) {
    $redis = new Redis();
    $res = $redis->connect(REDIS_HOST);
    $redis->auth('gjdf890rHSJH^#^%}jfkdsjf');
    $redis->select($redis_db);
    return $redis;
}

/**
 * 得到Unix时间戳
 * @param $strtime 字符串形式的时间
 * @return int Unix 时间戳
 *
 */
function get_unix_timestamp($strtime)
{
    if( ! $strtime )    // 检测数据
    {
        return False;
    }
    $strtime .= ':0:0';
    return strtotime($strtime);
}

/**
 * 获取二位数组中的一列
 */
if ( ! function_exists('array_column'))
{
    function array_column($input, $column_key = null, $index_key = null)
    {
        $res = array();
        foreach ($input as $item) {
            $column_val = isset($item[$column_key]) ? $item[$column_key] : null;
            if ($index_key == null || !isset($item[$index_key])) {
                $res[] = $column_val;
            } else {
                $res[$item[$index_key]] = $column_val;
            }
        }
        return $res;
    }
}

//获取注册来源
function config_item_source($source){
    $CI = & get_instance();
    $CI->load->model('User', 'muser');
    $res =  $CI->muser->config_item_source($source);
    return  $res;
}

function cancel_reason($user_type)
{
    switch ($user_type) {
        case USER_TYPE_SYS:
            return '系统';
        case USER_TYPE_ADMIN:
            return '管理员';
        case USER_TYPE_STUDENT:
            return '学生';
        case USER_TYPE_TEACHER:
            return '教师';
        case USER_TYPE_AGENT:
            return '代理商';
        case USER_TYPE_CRM:
            return 'CRM客服';
        default:
            break;
    }
    return null;
}