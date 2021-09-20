<?php
  require_once dirname(__FILE__)."/BaseDao.class.php";

class UserDao extends BaseDao {

  public function __construct(){
    parent::__construct("users");
  }

  public function get_users_param($search, $offset, $limit, $order){

    list($order_column, $order_direction) = self::parse_order($order);

    return $this->query("SELECT *
                         FROM users
                         WHERE LOWER(username) LIKE CONCAT('%', :username, '%')
                         ORDER BY ${order_column} ${order_direction}
                         LIMIT ${limit} OFFSET ${offset}",
                         ["username" => strtolower($search)]);
  }

  public function get_user_by_token($token){
    return $this->query_unique("SELECT * FROM users WHERE token = :token", ["token" => $token]);
  }

    public function get_user_by_email($email){
      return $this->query_unique("SELECT * FROM users WHERE email = :email", ["email" => $email]);
    }

     public function get_user_by_id($id){
       return $this->query_unique("SELECT * FROM users WHERE id = :id", ["id" => $id]);
    }

    public function do_suspend_user($id){
      return $this->query("UPDATE users SET user_status = "."'SUSPENDED'"." WHERE id = :id ", ["id" => $id]);
    }

}
 ?>
