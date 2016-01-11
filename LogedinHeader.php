   
<header>
	<div class="header">
	   <a href="MainPage.php" id="Logo">Company Name</a>
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
            <a class="HeaderLink" href="LogOut.php">Log Out</a>
            <a class="HeaderLink" href="MyProfile.php">View ProFile</a>
                  
 </div>
	</header>