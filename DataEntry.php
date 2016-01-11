<!DOCTYPE html>
<?php 
require_once 'header.php';
Engine::data_entre_submit();
?>
<html>
	<head>

         <link rel="stylesheet" type="text/css" href="stylesheet/signUp.css">
        <link rel="stylesheet" type="text/css" href="stylesheet/main.css">
        <link rel="stylesheet" type="text/css" href="stylesheet/Login.css">
        <link rel="stylesheet" type="text/css" href="stylesheet/dataEntry.css">
        <link rel="stylesheet" type="text/css" href="stylesheet/colorlist.css">
        <script src="Script/jquery-1.11.3.min.js"></script>
        <script src="Script/jquery.tabSlideOut.v1.3.js"></script>
        <script src="Script/Scripts.js"></script>
		<title>Data Entry</title>
	</head>
<body>
    <?php 
        include_once("Header.php");
    ?>
     <div id="WHOLE">
<form id="addItem" action="dataEntry.php" enctype="multipart/form-data" method="POST" >
<!--    <input name="submitDE" value="dataEntre" type="hidden">-->
    <table>
        <tbody id="addItemTable">
        <tr>
            <td><input required name="Name" type="text" placeholder="Name"></input> </td>
        </tr>
        <tr>
            <td><input  required name="Price" type="text" placeholder="Price"></input> </td>
        </tr>
        <tr>
            <td><input required name="CountryOfOrigin" type="text" placeholder="Country Of Origin"></input> </td>
        </tr>
        <tr>
            <td><input required name="YearOfManfacture" type="date" placeholder="Year Of Manfacture"></input> </td>
        </tr>
        <tr>
            <td><input required name="Manufacturer" type="text" placeholder="Manfacturer"/> </td>
        </tr>
        <tr>
            <td><input required type="file" name="file_upload"></input> </td>
        </tr>
</tbody>
    </table>
<div id="itemRows">
    <input id="rowNumbers" value='0' type="hidden">
    <img class="deleteRow" src="Resources/deletered.png" width="10px" height="10px">
    <select class="colorSelecting" name="ColorId" >
<?php 
    Engine::available_color();
?>
        </select>
    <select class="sizeSelecting" name="SizeId" >
        <?php 
    Engine::available_size();
?>
        </select>
<input class="boxCount" name="Count" placeholder="count">
<input type="button" class="anotherRow"  onclick="addRowToDE(this)" value="Add Color">
</div>
<button type="submit" name="DEsubmit" value="upload">Add Item</button>
    </form>
<h1 id="itemListHeader">Items</h1>
<div id="itemList">
<table id="listTable">
    <tbody>
        <tr>
            <td>
                <h4>id</h4>
            </td>
            <td>
                <h4>Name</h4>
            </td>
            <td>
                <h4>Price</h4>
            </td>
            <td>
                <h4>Coutnry Of Origin</h4>
            </td>
            <td>
                <h4>yearOfManfacture</h4>
            </td>
            <td>
                <h4>Manfacturer</h4>
            </td>
            <td>
                <h4>Colors</h4>
                       
            </td>
            <td>
                <h4>Sizes</h4>
            </td>
        <td>
            Photo
        </td>
        
        </tr>
    <?php
        Engine::print_item_list();
?>
    </tbody>
    </table>
</div>
<div id="footer">
    <footer>
    COPY RIGHT &reg; SAED&BAKR
    </footer>
        </div>
        </div>
</body>
</html>
