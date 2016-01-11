<?php require_once 'header.php';
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
<header>
	<div class="header">
	   <a href="#" id="Logo">Company Name</a>
		<form class="Search">
            <div>
			<select id="searchBox" title="Search" type="text" name="search">
                <option>T-Shirt</option>
                <option>Pants</option>
                <option>Jacket</option>
            </select>
                <select id="colorSearch" name="colorSearch">
                    <?php
//                    Engine::available_color();
//                     public static function available_color()
//                        {

                            $colors = ItemSize::get_all_colors();
                            while($row = mysqli_fetch_array($colors))
                                  {
                                          print "<option value=\"".$row['Id']."\"style=\"background-color:".$row['Name'].";\"></option>";

                                  }
//                        }
                    ?>
                </select>
                <select id="sizeSearch" name="sizeSearch">
                    <?php 
//                    Engine::available_size();
//                    public static function available_size()
//                        {
                            $sizes = ItemSize::get_all_size();
                            while($row = mysqli_fetch_array($sizes))
                                  {
                                          print "<option value=\"".$row['Id']."\">".$row['Number']."</option>";
                                  }

//                        }
                    ?>
                </select>
			<button id="searchButton" type="submit" value="Search">Search</button>
		</form>
            </div>

		<div id="Login">
			<button type="submit">Login</button>
        </div>
                    <!--login form-->
        
    <div class="wrapper">
    <div id="black_overlay" style="width: 100%;">
    </div>
    <div class="added">
            <img src="Resources/m_close-icon.png" width="20" height="20" class="close" />
            <h3>Log in</h3>
            <form method="post" action="myProfile.html">
                <input type="text" id="vname" name="name" placeholder="Your Name">
                <input type="password" id="vemail" name="Password" placeholder="Your Password">
                <button type="submit" id="submit">Login</button>
            </form>
        </div>
    </div>
<!--end of form-->
 </div>
	</header>