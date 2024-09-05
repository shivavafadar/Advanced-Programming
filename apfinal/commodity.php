<?php 
class Commodity{
    private $name;
    private $price;
    private $size;
    private $stock;
    private $brand;
    private $rate;
    private $skintype;
    private $skincolor;
    private $durability;
    private $origin;
    function __construct($x,$y,$z,$u){
        $this -> name = $x;
        $this -> price = $y;
        $this -> size = $z;
        $this -> stock = $u;
    }
    function GetName(){
        return $this -> name;
    }
    function GetPrice(){
        return $this -> price;
    }
    function GetSize(){
        return $this -> size;
    }
    function GetStock(){
        return $this -> stock;
    }
    
    function Print(){
        echo $this -> name;
        echo '<br>';
        echo $this -> price;
        echo '<br>';
        echo $this -> size;
        echo '<br>';
        echo $this -> stock;
        echo '<br>';
    }

    
}

class ManageCommodities{
    private $productslist = array();
    private $index = -1;
    
    function AddCommodity($x,$y,$z,$u){
        $newcommodity = new Commodity($x,$y,$z,$u);
        array_push($this -> productslist, $newcommodity);
        $this -> index = $this -> index + 1;
    }
    function GetList(){
        return $this -> productslist;
    }
    function Print(){
        foreach ($this -> productslist as $i){
            echo $i -> GetName();
        }
    }
    function WriteToFile(){
        
        $file = "commodities.txt";
        $f = fopen($file, 'a') or die('fopen failed');
        
        foreach ($this -> productslist as $i){
        fwrite($f, $i -> GetName());
        fwrite($f, ',');
        fwrite($f, $i -> GetPrice());
        fwrite($f, ',');
        fwrite($f, $i -> GetSize());
        fwrite($f, ',');
        fwrite($f, $i -> GetStock());
        fwrite($f,"\n");
        }
        fclose($f);
    }
}

?>