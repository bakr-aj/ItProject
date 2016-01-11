<?php
require_once 'header.php';
$CurrentCustomer = $_SESSION['Customer']->getCustomer();
$sql = "Select * from color";
$res = $database->query($sql);
?>
<!DOCTYPE html>
<html>
<head>
	<title>My Profile</title>
	<link rel="stylesheet" type="text/css" href="stylesheet/main.css">
	<link rel="stylesheet" type="text/css" href="stylesheet/signUp.css">
	<link rel="stylesheet" type="text/css" href="stylesheet/myProfile.css">
     <script src="Script/jquery-1.11.3.min.js"></script>
        <script src="Script/jquery.tabSlideOut.v1.3.js"></script>
        <script src="Script/Scripts.js"></script>
</head>
<body>
<?php
require_once 'LogedinHeader.php';
?>
<section>
<div class="wrapper">
	<div id="black_overlay" style="width: 100%;">
	</div>
	<div class="added">
			<img src="resources/m_close-icon.png" width="20" height="20" class="close" />
    		<h3>Info</h3>
    		<form method="post" action="updateProfile.php">
            <?php
                echo "<input type='text' id='FirstName' name='FirstName' placeholder='Your FirstName' value='".$CurrentCustomer['FirstName']."'>";
            ?>
    			<?php
                echo "<input type='text' id='LastName' name='LastName' placeholder='Your LastName' value='".$CurrentCustomer['LastName']."'>";
            ?>
                <span>Color:</span>
    			<select class="largSelect" name="Color">
                <?php
                while($row =  mysqli_fetch_assoc($res)){
                    echo "<option style='background-color:#".$row['value']."'>";
                    echo $row['Name'];
                    echo "</option>";
                }
                    
                    ?>
                </select><br/>
                <span>Size</span>
                <select class="largSelect" name="Size">
                <?php
                $sql = "Select * from size";
                $res = $database->query($sql);
                while($row =  mysqli_fetch_assoc($res)){
                    echo "<option>";
                    echo $row['Number'];
                    echo "</option>";
                }
                    
                    ?>
                </select><br/>
    			<?php
                echo "<input type='password' id='firstname' name='Password' placeholder='Password' value='".$CurrentCustomer['Password']."'>";
            ?>
    			<button type="submit" id="submit">Save</button>
    		</form>
    </div>
</div>
 </section>
 <section id="tableinfo">

<table>
	<tbody id="tablebody">
		<tr class="info">
			<td><label>First Name:</label></td>
            <?php
                echo "<td><input class='profileinfo' type='text' id='FirstName' name='FirstName' value='".$CurrentCustomer['FirstName']."' disabled='disable'></td>";
            ?>
			
		</tr>
		<tr class="info">
			<td><label>Last Name:</label></td>
            <?php
                echo "<td><input class='profileinfo' type='text' id='firstname' name='LastName' value='".$CurrentCustomer['LastName']."' disabled='disable'></td>";
            ?>
    			
    	</tr>
    			<tr class="info">
			<td><label>User Name:</label></td>
    			<?php
                echo "<td><input class='profileinfo' type='text' id='firstname' name='UserName' value='".$CurrentCustomer['UserName']."' disabled='disable'></td>";
            ?>
    			</tr>
    			<tr class="info">
			<td><label>Color:</label></td>
    			<?php
                echo "<td><input class='profileinfo' type='text' id='firstname' name='Color' value='".$CurrentCustomer['Color']."' disabled='disable'></td>";
            ?>
    			</tr>
    			<tr class="info">
			<td><label>Size:</label></td>
    			<?php
                echo "<td><input class='profileinfo' type='text' id='firstname' name='Size' value='".$CurrentCustomer['Size']."' disabled='disable'></td>";
            ?>
    			</tr>
    			<tr class="info">
			<td><label>Password:</label></td>
    			<?php
                echo "<td><input class='profileinfo' type='password' id='firstname' name='Password' value='".$CurrentCustomer['Password']."' disabled='disable'></td>";
            ?>
    			</tr>
    			<tr class="info">
			<td><label>Orders:</label></td>
    			<td>
    				<table>
    					<tbody>
                        <tr><th>Order Totall</th><th>Date</th></tr>
    						<?php
                                $orders = $_SESSION['Customer']->getOrders($database);
                                while ($row = mysqli_fetch_assoc($orders)) {
                                    echo "<tr><td>".$row['Total']."</td><td>".$row['Date']."</td></tr>";
                                }
                            ?>
    					</tbody>
    				</table>
    			</td>
    			</tr>
    			<tr class="info">
			<td><label>Totall:</label></td>
            <?php
                echo "<td><input class='profileinfo' type='text' id='firstname' name='Totall' value='".$CurrentCustomer['Totall']."' disabled='disable'></td>";
            ?>
    			</tr>
    			<tr class="info">
					<td></td>
	    			<td>
	    				<div id="Login">
	        				<h1>Edit</h1>
	 					</div>
	 				</td>
    			</tr>
    			</tbody>
    			</table>
</section>

	<script src="Script/Scripts.js"></script>
</body>
</html>