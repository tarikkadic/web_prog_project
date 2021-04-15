<?php

require_once dirname(__FILE__).'/../dao/UserDao.class.php';
require_once dirname(__FILE__).'/BaseService.class.php';

class UserService extends BaseService {

  public function __construct(){
    $this->dao = new UserDao();
  }

  public function get_users($search, $offset, $limit){
    if($search){
      return $this->dao->get_users($search, $offset, $limit);
    }else{
      return $this->dao->get_all($offset, $limit);
    }
  }

  public function add($user){
    if (!isset($user['username'])) throw new Exception("Username is not set!");

    parent::add([
      "username"  => $user['username'],
      "email"  => $user['email'],
      "password"  => $user['password'],
      "created"  => date(Config::DATE_FORMAT),
      "token"  => md5(random_bytes(16))
    ]);

    // TODO: send email for validation

    return $user;
  }

  public function confirm($token){
    $user = $this->dao->get_user_by_token($token);

    if (!isset($user['id'])) throw Exception("Invalid token!");

    $this->dao->update($user['id'], ["status" => "ACTIVE"]);

    // TODO: send email confirmation
  }

}
 ?>
