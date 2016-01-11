<?php require_once 'header.php';
Engine::submit_order();
?>
<!DOCTYPE html>
<html>
	<head>
         <link rel="stylesheet" type="text/css" href="stylesheet/signUp.css">
        <link rel="stylesheet" type="text/css" href="stylesheet/main.css">
        <script src="Script/jquery-1.11.3.min.js"></script>
        <script src="Script/jquery.tabSlideOut.v1.3.js"></script>
        <script src="Script/Scripts.js"></script>
		<title>The Shop</title>
	</head>
<body>
    <div id="WHOLE">
        <?php 
            require_once("HtmlHeader.php");
        ?>
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
                    //echo "dude";
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
        <img id="imageAddedItem" src="Resources/ItemAdded.png" width="130" height="24">
    <div id="footer">
    <footer>
    COPY RIGHT &reg; SAED&BAKR
    </footer>
        </div>
        </div>
</body>
</html>
