<?php
require_once 'header.php';


class Visitor
{
	public $Id;

	function __construct()
	{
		$Id = rand();
	}
}

class Customer extends Visitor
{
	private $FirstName;
	private $LastName;
	private $UserName;
	private $Age;
	private $Gender;
	private $Size;
	private $Color;
	private $Totall;
	private $Discount;
	private $Password;

	function  __construct($ctm){

		if($_SERVER['HTTP_REFERER']=="http://localhost:8080/itproject/signUp.php")
		{
		$this->Id = rand();
		}
		else
		{
		$this->Id = $ctm['Id'];
		}

		$this->FirstName =$ctm['FirstName'];
		$this->LastName = $ctm['LastName'];
		$this->UserName = $ctm['UserName'];
		$this->Age = $ctm['Age'];
		$this->Gender = $ctm['Gender'];
		$this->Size = $ctm['Size'];
		$this->Color = $ctm['Color'];
		$this->Totall = $ctm['Totall'];
		$this->Discount = $ctm['Discount'];
		$this->Password = $ctm['Password'];
	}
	//return the info of this user
	function getCustomer(){

		$retVal['FirstName']= $this->FirstName;
		$retVal['LastName']= $this->LastName;
		$retVal['UserName']= $this->UserName;
		$retVal['Age']= $this->Age;
		$retVal['Gender']= $this->Gender;
		$retVal['Size']= $this->Size;
		$retVal['Color']= $this->Color;
		$retVal['Totall']= $this->Totall;
		$retVal['Discount']= $this->Discount;
		$retVal['Password']= $this->Password;

		return $retVal;
	}

	function printCustomer(){
		echo $this->Id."<br/>" ;
		echo $this->FirstName."<br/>" ;
		echo $this->LastName."<br/>"  ;
		echo $this->UserName."<br/>"  ;
		echo $this->Age."<br/>"  ;
		echo $this->Gender."<br/>"  ;
		echo $this->Size."<br/>"  ;
		echo $this->Color."<br/>"  ;
		echo $this->Totall."<br/>"  ;
		echo $this->Discount."<br/>"  ;
		echo $this->Password."<br/>"  ;
		//var_dump($_SESSION);
	}

	function addCustomer($database){
		$sql = "insert into customer values (null,'".$this->UserName."','".$this->FirstName."','".$this->LastName."','"
			.$this->Age."','".$this->Gender."','".$this->Size."','".$this->Color."',0,5,'".$this->Password."')";
		//var_dump($sql);
		if ($res = $database->query($sql)) {
			echo "<script>alert('Welcome Mr :".$this->FirstName." !');</script>";
			header("Location:MainPage.php");
		}

	}

	function updateCustomer($database,$ctm){
		$this->FirstName =$ctm['FirstName'];
		$this->LastName = $ctm['LastName'];
		$this->Size = $ctm['Size'];
		$this->Color = $ctm['Color'];
		$this->Password = $ctm['Password'];
		//`itproject`.`customer` SET `UserName`='malk', `FirstName`='m' WHERE  `Id`=4;
		$sql = "UPDATE customer SET FirstName='".$this->FirstName."',LastName='". $this->LastName."',Color='". $this->Color."',
		Size='".$this->Size."',Password='".$this->Password."' WHERE  Id=".$this->Id;
		if ($res = $database->query($sql)) {
			header("Location:MyProfile.php");
		}

	}
    function getId(){
        return $this->Id;
    }
    function getOrders($database){
        $sql = "select Total,Date from orders where UserId=".$this->Id;
        if ($res = $database->query($sql)) {
            return $res;
        }
    }
}

class Item{
    
    public $Id;
    public $Name;
    public $Price;
    public $CountryOfOrigin;
    public $YearOfManfacture;
    public $Manufacturer;
    public $Image;
    
    public function get_all_items()
    {
        global $database;
        $sql = "SELECT * FROM item;";
        return $database->query($sql);
         
        
    }
    public function insert_this_object()
    {
        global $database;
        $sql="INSERT INTO ITEM VALUES(NULL
                                    ,'$this->Name'
                                    ,$this->Price
                                    ,'$this->CountryOfOrigin'
                                    ,'$this->YearOfManfacture'
                                    ,'$this->Manufacturer'
                                    ,'$this->Image');";
            $database->query($sql);
       
        return $database->lastInsertId;
    }
    public function search_query()
    {
//        SELECT * FROM item WHERE Name = 'saed' AND Id IN (SELECT ItemId FROM itemSize WHERE ColorId = 2) AND Id IN (SELECT ItemId FROM itemSize WHERE SizeId = 3)
        global $database;
        $sql = "SELECT * FROM item WHERE ";
        if(isset($_POST['nameSearch']))
            $sql .= " Name = '" .$_POST['nameSearch']."'";
        
        if(isset($_POST['colorSearch']))
        {
            if(isset($_POST['nameSearch']))
                $sql .= " AND Id IN (SELECT ItemId FROM itemSize WHERE ColorId = ". $_POST['colorSearch'] . ")";
            else
                $sql .= " Id IN (SELECT ItemId FROM itemSize WHERE ColorId = ". $_POST['colorSearch'] . ")";
        }
        
        if(isset($_POST['sizeSearch']))
               {
            if(isset($_POST['nameSearch']) || isset($_POST['colorSearch']))
                $sql .= " AND Id IN (SELECT ItemId FROM itemSize WHERE SizeId = ". $_POST['sizeSearch'] . ")";
            else
              $sql .= " Id IN (SELECT ItemId FROM itemSize WHERE SizeId = ". $_POST['sizeSearch'] . ")";
               }
        
        $sql .= " ORDER BY Id DESC";
       //echo $sql;
        return $database->query($sql);
        
    }
}



class ItemSize{
    
    public $ItemId;
    public $SizeId;
    public $Quantity;
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
                                    ,$this->Quantity
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
    public function update_item_quantity()
    {
        global $database;
        $sizeName = "SizeId";
        $colorName = "ColorId";
        $itemId = "ItemId";
        $ItemsNumber = $_POST['NumberOfItems'];
        $sql = "";
        while($ItemsNumber--)
        {
            $sql = "UPDATE itemSize SET Quantity = Quantity - 1 WHERE ItemId =" . $_POST[$itemId . $ItemsNumber] . " AND ColorId = " . $_POST[$colorName . $ItemsNumber] . " AND SizeId = " . $_POST[$sizeName . $ItemsNumber] . ";";
            
        $database->query($sql);
        }
        
    }
}

/**
*  
*/
class Orders
{
    private $CustomerId;
    private $Totall;

    public function __construct($Tot){
        //echo $Tot;

    $this->Totall = $Tot;
    if ($_SESSION['logedin']==true) {
        $this->CustomerId = $_SESSION['Customer']->getId();
    }
    else
        $this->CustomerId = rand();

    }

   public  function insertOrder(){
    //ar_dump($this);
    global $database;
    $sql = "insert into orders values(null,".$this->Totall.",".$this->CustomerId.",null)";
    //var_dump($sql);
    $database->query($sql);
   }

}

class Engine
{
	static function login($database){
		if(isset($_POST))
			$name = $_POST["name"];	
			$password = $_POST["Password"];
			$sql = "select * from customer where UserName like '".$name."' and Password like '".$password."'";
			$res = $database->query($sql);
            $row =  mysqli_fetch_assoc($res);
			if( is_null($row['lengths'])){
                var_dump($row);
                header("Location:MainPage.php");
            }
            else
            {
                $CTM = new Customer($row);
                $_SESSION['Customer'] = $CTM;
                $_SESSION['logedin']='true';
                
            }
				
			
		}
	

    public static function available_color()
    {
        
        $colors = ItemSize::get_all_colors();
        echo "<option selected disabled hidden value=''></option>";
        while($row = mysqli_fetch_array($colors))
              {
                      print "<option value='".$row['Id']."'style='background-color:".$row['Name'].";color:".$row['Name']."'>".$row['Name']."</option>";
                  
              }
    }

    public static function available_size()
    {
        echo "<option selected disabled hidden value=''></option>";
        $sizes = ItemSize::get_all_size();
        while($row = mysqli_fetch_array($sizes))
              {
                      print "<option value='".$row['Id']."'>".$row['Number']."</option>";
              }
                      
    }

          public static function data_entre_submit()
    {
        if(isset($_POST['DEsubmit']))
         {
            $itemSize = new ItemSize();
            $item = new Item();
            $item->Name = $_POST['Name'];
            $item->Price = $_POST['Price'];
            $item->CountryOfOrigin = $_POST['CountryOfOrigin'];
            $item->YearOfManfacture = $_POST['YearOfManfacture'];
            $item->Manufacturer = $_POST['Manufacturer'];
            
            $tempFile = $_FILES['file_upload']['tmp_name'];
            $targetFile = basename($_FILES['file_upload']['name']);
            $uploadDir = "uploads";
            
            $whereUploaded = $uploadDir."/".$targetFile;
            if(move_uploaded_file($tempFile,$whereUploaded)){
                echo "SUCCESS";
            }
            else{
                echo "FAILED";
            }
            echo $_POST['Manufacturer'];
            $item->Image = $whereUploaded;
            
            $itemSize->ItemId = $item->insert_this_object();
            $itemSize->SizeId = $_POST['SizeId'];
            $itemSize->Quantity = $_POST['Quantity'];
            $itemSize->ColorId = $_POST['ColorId'];
            $itemSize->insert_this_object();
            
            header("location:dataEntry.php");
         }
     
    }

       public static function print_item_list()
        {
            $itemsize = new ItemSize();
            $colors = array();
            $result = itemSize::get_all_colors();
            while($row = mysqli_fetch_array($result))
            {
                $colors[$row['Id']] = $row['Name'];
            }
            
            $sizes = array();
            $result = itemSize::get_all_size();
            while($row = mysqli_fetch_array($result))
            {
                $sizes[$row['Id']] = $row['Number'];
            }
            
            $item = new Item();
            $all_rows = $item->get_all_items();
            
                while($row = mysqli_fetch_array($all_rows))
                {
                    echo "<tr>";
                    echo "<td>" . $row['Id'] . "</td>";
                    echo "<td>" . $row['Name'] . "</td>";
                    echo "<td>" . $row['Price'] . "</td>";
                    echo "<td>" . $row['CountryofOrigin'] . "</td>";
                    echo "<td>" . $row['YearofManfacture'] . "</td>";
                    echo "<td>" . $row['Manufacturer'] . "</td>";

                    echo "<td>";
                    $result = $itemSize->get_element_by_id($row['Id']);
                    echo "<select>";
                    while($row1 = mysqli_fetch_array($result))
                    {
                        
                            print "<option value='".$row1['ColorId']."'style='background-color:".$colors[$row1['ColorId']].";\"></option>";
                    }
                    echo "</select>";
                    echo "</td>";

                    echo "<td>";

                    $result = $itemSize->get_element_by_id($row['Id']);
                    echo "<select>";
                    while($row2 = mysqli_fetch_array($result))
                    {
                        if($row2['Quantity'] != 0)
                            print "<option value='".$row2['SizeId']."'>".$sizes[$row2['SizeId']]."</option>";
                    }
                    echo "</select>";
                    echo "</td>";
                    $img = $row['Image'];
                    echo "<td><img src='$img'alt='Smiley face\" height='42' width='42'> </td>";
                    echo "</tr>";

                }
        }

           private static function item_formating($all_rows)
   {
            
            $itemSize = new ItemSize();
            $colors = array();
            $result = $itemSize->get_all_colors();
            while($row = mysqli_fetch_array($result))
            {
                $colors[$row['Id']] = $row['Name'];
            }
            
            $sizes = array();
            $result =  $itemSize->get_all_size();
            while($row = mysqli_fetch_array($result))
            {
                $sizes[$row['Id']] = $row['Number'];
            }
        
            
                while($row = mysqli_fetch_array($all_rows))
                {
                    $quantity = 0;
                    $result = $itemSize->get_element_by_id($row['Id']);
                        while($row1 = mysqli_fetch_array($result))
                        {
                            $quantity += $row1['Quantity'];
                        }
                    if($quantity > 0)
                    {
                        //echo "dude";
                        $img = $row['Image'];
                        echo "<div value=".$row['Id']." class='item'>";
                        echo "<img src='$img'" .
                            "alt=".
                            $row['Name'] .
                            ">";
                        echo "<div class='itemInfo'>";
                        echo "<table id='info'>";
                        echo "<tr>";
                        echo "<td>Price:<spin class='price'>" . $row['Price'] . "$</spin></td>";


                        echo "<td>Size";
                        $result = $itemSize->get_element_by_id($row['Id']);
                        echo "<select onchange='colorsToSize(this)'>";
                        echo "<option selected disabled hidden value=''></option>";
                        while($row2 = mysqli_fetch_array($result))
                        {
                            if($row2['Quantity'] != 0)
                                print "<option value='".$row2['SizeId']."'>".$sizes[$row2['SizeId']]."</option>";
                        }
                        echo "</select>";

                        echo "<td>Color";
                        $result = $itemSize->get_element_by_id($row['Id']);

                        echo "<select class='colors'>";
                        echo "<option selected disabled hidden value=''></option>";
                        while($row1 = mysqli_fetch_array($result))
                        {
                            if($row1['Quantity'] != 0)
                                print "<option display='none' class='".$row1['SizeId']."'value='".$row1['ColorId']."' style='background-color:".$colors[$row1['ColorId']]."; color:".$colors[$row1['ColorId']]."'>".$colors[$row1['ColorId']]."</option>";
                        }
                        echo "</select>";

                        echo "</tr>";
                        echo "</td>";
                        echo "</table>";
                        echo "<button type='submit' onclick='addRow(this)'>Add Item</button>";
                        echo "</div>";
                        echo "</div>";

                    }      
                }
        }

            public static function browse_item()
        {
            $item = new Item();
            $result = $item->get_all_items();
            Engine::item_formating($result);
        }
    public static function search_items()
        {
                $item = new Item();
                $result = $item->search_query();
                //var_dump($result);
                Engine::item_formating($result);
        }
    public static function submit_order()
    {
        if(isset($_POST['Total']))
        {
            // var_dump( $_POST);

            $order = new Orders($_POST['Total']);
            $order->insertOrder();
            $itemsize = new ItemSize();
            $itemsize->update_item_quantity();
            if($_SESSION['logedin'] == true)
                header("location:MainPage.php");
            
            else if($_POST['Total'] > 1000){
                    //echo $_POST['Total'];
                header("location:signUp.php");
            }

            //header("location:index.php");
        }
    }
}
 
?>