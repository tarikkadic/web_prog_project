<?php

require_once dirname(__FILE__).'/../dao/UserDao.class.php';
require_once dirname(__FILE__).'/BaseService.class.php';
require_once dirname(__FILE__).'/../clients/SMTPClient.class.php';

use \Firebase\JWT\JWT;

class UserService extends BaseService {

  public function __construct(){
    $this->dao = new UserDao();
    $this->smtpClient = new SMTPClient();
  }

  public function get_users($search, $offset, $limit, $order){
    if($search){
      return $this->dao->get_users($search, $offset, $limit, $order);
    }else{
      return $this->dao->get_all($offset, $limit, $order);
    }
  }

  public function register($user){
    if (!isset($user['username'])) throw new Exception("Username is not set!");
     try {

       $user = parent::add([
         "username"  => $user['username'],
         "email"  => $user['email'],
         "password"  => md5($user['password']),
         "status" => "PENDING",
         "reported" => "0",
         "role" => "USER",
         "created"  => date(Config::DATE_FORMAT),
         "token"  => md5(random_bytes(16))
       ]);
     } catch (\Exception $e) {
       if(strpos($e->getMessage(), 'username_unique')){
         throw new Exception("Account with same username or email already exists!", 400, $e);
       }else{
       throw $e;}
     }

     $this->smtpClient->send_register_user_token($user);

        // TODO: send email for validation

      return $user;
}

  public function confirm($token){
    $user = $this->dao->get_user_by_token($token);

    if (!isset($user['id'])) throw new Exception("Invalid token!", 400);

    $this->dao->update($user['id'], ["status" => "ACTIVE", "token" => NULL]);

    // TODO: send email confirmation
}

public function login($user){
  $db_user = $this->dao->get_user_by_email($user['email']);

  if(!isset($db_user['id'])) throw new Exception("User doesn't exist!", 400);

  if($db_user['status'] != 'ACTIVE') throw new Exception("Account not active!", 400);

  if($db_user['password'] != md5($user['password'])) throw new Exception("Invalid password!", 400);

  $jwt = \Firebase\JWT\JWT::encode(["id" => $db_user["id"], "r" => $db_user["role"]],"JWT SECRET");

  return ["token" => $jwt];
}

public function forgot($user){
  $db_user = $this->dao->get_user_by_email($user['email']);

  if(!isset($db_user['id'])) throw new Exception("User doesn't exist!", 400);

  if(strtotime(date(Config::DATE_FORMAT)) - strtotime($db_user['token_created']) < 300) throw new Exception("Token reseting... wait 5 minutes!", 400);

  $db_user = $this->update($db_user['id'], ['token' => md5(random_bytes(16)), 'token_created' => date(Config::DATE_FORMAT)]);

  $this->smtpClient->send_user_recovery_token($db_user);
}

public function reset($user){
  $db_user = $this->dao->get_user_by_token($user['token']);

  if (!isset($db_user['id'])) throw new Exception("Invalid token!", 400);

  if(strtotime(date(Config::DATE_FORMAT)) - strtotime($db_user['token_created']) > 300) throw new Exception("Token expired!", 400);

  $this->update($db_user['id'], ['password' => md5($user['password']), 'token' => NULL]);
}

//public function update_account($user, $id, )

}
 ?>
