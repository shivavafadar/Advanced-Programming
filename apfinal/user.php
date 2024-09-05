<?php
class User{
    private $username;
    private $password;
    private $email;
    private $tel;

    function set_username($username){
        $this->username = $username;
    }
    function get_username(){
        return $this->username;
    }

    function set_password($password){
        $this->password = hash('sha256',$password);
    }
    function change_password($oldpass,$newpass){
        if(hash('sha256',$oldpass) == $this->hash('sha256',$password)){
            set_password($newpass);
        }
    }

    function set_email($email){
        $this->email = $email;
    }
    function get_email(){
        return $this->email;
    }

    function print_user(){
        echo $this->username . "  " . $this->password;
        echo ('<br>');
    }

    function __construct($un,$pass){
        $this->username = $un;
        $this->set_password($pass);
    }
}


class UserManager{
    public $cnt;
    private $users = array();
  
    public function add_user($username,$password){
        $user = new User($username,$password);
        // set_email('vafadar.shiva@gmail.com');
        array_push($this->users,$user);
    }
    public function get_users(){
        return $this->users;
    }
    public function WriteToFile(){
        echo "WriteToFile";
        $filename = "users.txt";
        $f = fopen($filename,'w');
        foreach ($this->$users as $u) {
            fwrite($f,$u->get_username());
        fclose($f);  
        echo "end";  
        }
        
        
    }
}

    //$user1 = new User();
    //$user1 -> set_username("shiva");
    //$user1 -> set_password("1381");
    //$user1 -> print_user();
    // $u = new User("shivaa","1346");
    // $u -> print_user();
    // foreach ($x as $u){
    //     $u->print_user();
    // }
    $u = new UserManager();
    $u ->add_user(shiva,1381);
    $u ->add_user(shirin,1373);

?>