<?php
require_once("database.php");

class ItemSize{
    
    public $ItemId;
    public $SizeId;
    public $Count;
    public $ColorId;
    
    
    public static function get_all_colors()
    {
        global $database;
        $sql = "SELECT * FROM color";
        $result = $database->query($sql);
        return $result;
    }
    public static function get_all_size()
    {
        global $database;
        $sql = "SELECT * FROM size";
        $result = $database->query($sql);
        return $result;
    }
    public function insert_this_object()
    {
        global $database;
        $sql="INSERT INTO itemsize VALUES($this->ItemId
                                    ,$this->SizeId
                                    ,$this->Count
                                    ,$this->ColorId);";
        $database->query($sql);
    }
    public function get_element_by_id($id)
    {
        global $database;   
        $sql = "SELECT * FROM itemSize WHERE ItemId=";
        $sql .= $id;
        return $database->query($sql);
        while($row = mysqli_fetch_array($result))
        {
            foreach($row as $cname=>$cvalue)
            {
                print "$cname:$cvalue";
            }
            echo "</br>";
        }
    }
}

$item = new ItemSize();
$item->get_element_by_id(28);
?>