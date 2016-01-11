<?php require_once 'header.php';?>
<header>
    <div class="header">
       <a href="#" id="Logo">Company Name</a>
        <form action="index.php" class="Search" method="POST">
            <div>
            <select id="searchBox" title="Search" type="text" name="nameSearch">
                <option selected disabled hidden value=''></option>
                <option>T-Shirt</option>
                <option>Pants</option>
                <option>Jacket</option>
            </select>
                <select id="colorSearch" name="colorSearch">
                    <?php Engine::available_color(); ?>
                </select>
                <select id="sizeSearch" name="sizeSearch">
                    <?php Engine::available_size(); ?>
                </select>
            <button id="searchButton" type="submit" value="Search" name="search">Search</button>
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
            <form method="post" action="login.php">
                <input type="text" id="vname" name="name" placeholder="Your Name">
                <input type="password" id="vemail" name="Password" placeholder="Your Password">
                <button type="submit" id="submit">Login</button>
            </form>
        </div>
    </div>
<!--end of form-->
        </div>
    </header>