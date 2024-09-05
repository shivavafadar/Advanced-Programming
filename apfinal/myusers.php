<?php
class UserNew{
    private $email;
    private $mobile; 
    private $balance;
    function __construct($x,$y,$z){
        $this -> email = $x;
        $this -> mobile = $y;
        $this -> balance = $z;
    }

    function getemail(){
        return $this -> email;
    }

    function getmobile(){
        return $this -> mobile;
    }

    function getbalance(){
        return $this -> balance;
    }


    function setbalance($x){
        $this -> balance = $x;
    }


    function Print(){
        echo ($this -> email);
        echo ('<br>');
        echo ($this -> mobile);
        echo ('<br>');
        echo ($this -> balance);
        echo ('<br>');
    }
}

class Usermanager{
    private $userlist = array();
    public $cnt = 0;
    // function Print(){
    //     foreach ($this -> userlist as $i){
    //          echo($i);
    // }}
    
    public function GetUserlist(){
        return $this -> userlist;
    }
    public function AddUser($x,$y,$z){
        $myuser = new UserNew($x,$y,$z);
        array_push($this -> userlist, $myuser);
        $this -> cnt = $this -> cnt + 1;
    }

    public function ChangeBalance($x,$y){
        foreach ($this -> userlist as $i){
            if ($i -> getemail() == $x){
                $i -> setbalance($y);
            }
        }
    } 


    function check($x,$y){
        $bool = False;
        foreach ($this -> GetUserList() as $i){
            if ( $i -> getemail() == $x && $i -> getmobile() == $y){
                $bool = True;
                return intval($i -> getbalance());
                break;
            }  
        }
        if (!$bool){
            return "";
        }
    }
}

?>






