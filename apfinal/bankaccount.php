<?php
class baNew{
    private $id;
    private $cvv; 
    private $password;
    private $bbalance;
    function __construct($x,$y,$z,$k){
        $this -> id = intval($x);
        $this -> cvv = intval($y);
        $this -> password = intval($z);
        $this -> bbalance = intval($k);
    }

    function getid(){
        return $this -> id;
    }

    function getcvv(){
        return $this -> cvv;
    }

    function getpassword(){
        return $this -> password;
    }

    function getbbalance(){
        return $this -> bbalance;
    }

    function setbbalance($x){
        $this -> bbalance = $x;
    }
}

class bamanager{
    private $balist = array();
    public $cnt = 0;
    // function Print(){
    //     foreach ($this -> userlist as $i){
    //          echo($i);
    // }}
    
    public function GetBalist(){
        return $this -> balist;
    }
    public function Addba($x,$y,$z,$k){
        $myba = new baNew($x,$y,$z,$k);
        array_push($this -> balist, $myba);
        $this -> cnt = $this -> cnt + 1;
    }

    public function ChangeBalance($x,$y){
        foreach ($this -> balist as $i){
            if ($i -> getid() == $x){
                $i -> setbbalance($y);
            }
        }
    } 


    function check($x, $y, $z){
        $bool = False;
        foreach ($this -> GetBaList() as $i){
            if ($i -> getid() == intval($x) && $i -> getpassword() == intval($y) && $i -> getcvv() == intval($z)){
                $bool = True;
                return intval($i -> getbbalance());
                break;
            }  
        }

        if (!$bool){
            return "";
        }
    }
}

?>