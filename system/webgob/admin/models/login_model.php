<?php

class Login_Model extends Model {

    public function __construct() {
        parent::__construct();
    }

    public function run() {
        $sth = $this->db->prepare("SELECT iduser, nameuser FROM user WHERE 
				nameuser = :login AND password = :password");
        $sth->execute(array(
            ':login' => $_POST['login'],
            ':password' => Hash::create('sha256', $_POST['password'], HASH_PASSWORD_KEY)
        ));

        $data = $sth->fetch();

        $count = $sth->rowCount();
        if ($count > 0) {
            // login
            Session::init();
            Session::set('iduser', $data['iduser']);
            Session::set('nameuser', $data['nameuser']);
            Session::set('sessionTime', date('r'));
            Session::set('loggedIn', true);
            $controller = $this->db->prepare("SELECT `controller`.`idcontroller` FROM `user`
LEFT JOIN `user_has_profile` ON `user`.`iduser` = `user_has_profile`.`user_iduser` 
LEFT JOIN `profile` ON `user_has_profile`.`profile_idprofile` = `profile`.`idprofile` 
LEFT JOIN `profile_has_method` ON `profile`.`idprofile` = `profile_has_method`.`idprofile`
LEFT JOIN `method` ON `profile_has_method`.`idmethod` = `method`.`idmethod`
LEFT JOIN `controller` ON `method`.`idcontroller` = `controller`.`idcontroller`
WHERE `user`.`iduser`=:iduser GROUP BY `controller`.`idcontroller`");
            $controller->execute(array(
                ':iduser' => $data['iduser'],
            ));
            while ($listController = $controller->fetch()) {
                $array[] = $listController['idcontroller'];
            }
            Session::set('controller', $array);
            $profile = $this->db->prepare("SELECT `profile`.`idprofile` FROM user_has_profile
LEFT JOIN `profile` ON `user_has_profile`.`profile_idprofile` = `profile`.`idprofile` WHERE `user_has_profile`.`user_iduser`=:iduser");
            $profile->execute(array(
                ':iduser' => $data['iduser'],
            ));
            while ($listProfile = $profile->fetch()) {
                $array[] = $listProfile['idprofile'];
            }
            Session::set('profile', $array);
            $data = array('fn'=>'postLogin', 'url' => PATH_NAV . 'index');
        } else {
            //$data = array('result_error' => $sth->queryString . '//' . Hash::create('sha256', $_POST['password'], HASH_PASSWORD_KEY));
            $data = array('fn'=>'postLogin', 'result_error' => 'Error al iniciar Sesion' . Hash::create('sha256', $_POST['password'], HASH_PASSWORD_KEY));
        }
        echo json_encode($data);
    }

}