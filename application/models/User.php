<?php
namespace models;
class User extends \MY_Model
{
    /**
     * 根据uname获取用户
     *
     * @param string $name
     * @param string $fields
     * @param bool $rows 搜索使用
     * @return mixed
     */
    public function get_user_by_name($name, $fields = '*', $rows = false){
        $rows && $this->db->like('user', $name);
        !$rows && $this->db->where('user', $name);

        if($rows){
            $user = $this->db->select('id')->from('user')->get()->result_array();
            if($user) {
                foreach ($user as $value) {
                    $return[] = $value['id'];
                }
            }
            return isset($return) ? $return : array();
        }else{
            return $this->db->select($fields)->from('user')->get()->row_array();
        }
    }

    /**
     * 根据id获取用户信息
     * @param $uid
     * @param string $fields
     * @return mixed
     */
    public function get_user_by_id($uid, $fields = '*')
    {
        return $this->db->select($fields)->from('user')->where(array('id' => $uid))->get()->row_array();
    }


    /**
     * 获取所有分类
     * @param $uid
     * @param string $fields
     * @return mixed
     */
    public function get_all_category()
    {
        return $this->db->select('*')->from('category')->get()->result_array();
    }


}