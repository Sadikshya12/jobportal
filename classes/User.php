<?php
namespace App;
class User {

    private $db;

    public function __construct() {
        $this->db = DB::connect();
    }

    public function register($sql) {
        $result = $this->db->query($sql);

        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function login($sql) {
        $result = $this->db->query($sql);

        if($result){
            return $result->fetch_object();
        }

        return false;
    }

    public function lists() {
        $sql = "select * from user_tbl";
        $result = $this->db->query($sql);
        return $result;
    }

    public function search($keyword) {
        $sql = "select * from user_tbl where username like'" . $keyword . "%' ";
          $result = $db->select($sql);
          //var_dump($result);die;
          return $result;
    }

    public function edit($user_id) {
        $sql = "select * from user_tbl where userid = '$user_id'";
        $result = $this->db->query($sql);
        return $result->fetch_object();
    }

}

?>