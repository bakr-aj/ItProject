<?php
require_once 'header.php';
?>
<!DOCTYPE html>
<html>
	<head>
        <script src="Script/jquery-1.11.3.min.js"></script>
        <script src="Script/jquery.tabSlideOut.v1.3.js"></script>
        <script src="Script/Scripts.js"></script>
        <link rel="stylesheet" type="text/css" href="stylesheet/signUp.css">
        <link rel="stylesheet" type="text/css" href="stylesheet/main.css">
		<title>The Shop</title>
	</head>
<body>
    <?php
        //require_once 'HtmlHeader1.php';
    if ($_SESSION['logedin']=='true') {
        //var_dump($_SESSION);
        require_once 'LogedinHeader.php';
    }
    else
    {
        echo "<script>alert('Sorry but we do not have such a user !');</script>";
        require_once 'HtmlHeader.php';
    }
        
    ?>
           <div id="WHOLE">
        <div class="barOrderList">
        <h1 id="orderHeader">Order List</h1>
            <a class="handle" href="http://link-for-non-js-users.html">Order</a>
              <input hidden id="itemsNumber" disabled value="" name="itemsNumber">
            <table id="orderList">
            </table>
            <div id="orderFooter">
            <span id="total" name="total" value="" >0 $</span>
                <button name="submitOrder" id="submitOrder" type="submit" onclick="orderListArray()">Submit Order</button>
            </div>
        </div>

    <div class="browse">
        <?php 
        if(isset($_POST['search']))
            {
                if(isset($_POST['nameSearch']) || isset($_POST['colorSearch']) || isset($_POST['sizeSearch']))
                {
                    Engine::search_items();
                }
                else
                {
                    Engine::browse_item();
                }
            }
            else
            {
                    Engine::browse_item();
            }
        ?>
    
        </div>
    <div id="footer">
    <footer>
    COPY RIGHT &reg; SAED&BAKR
    </footer>
        </div>
        </div>
    
</body>
</html>
