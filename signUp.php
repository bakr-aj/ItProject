<?php
    require_once 'header.php';
    $sql = "Select * from color";
    $res = $database->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Sing Up</title>
    <link rel="stylesheet" type="text/css" href="stylesheet/signUp.css">
</head>
<body>
    <!-- page wrapper starts here -->
    <script type="text/javascript">
    var d = confirm("Thank u for buying U can become a Customer");
    if (!d) {
        window.location = "http://localhost:8080/itproject/";
    }

    </script>
    <div id="singup">
            <h3>Sign Up</h3>
            <form method="post" action="newUser.php">
                <input type="text" id="firstname" name="FirstName" placeholder="Your FirstName">
                <input type="text" id="lastname" name="LastName" placeholder="Your LastName">
                <input type="text" id="username" name="UserName" placeholder="Your usernam">
                <input type="text" id="username" name="Age" placeholder="Your Age">
                <select name="Gender">
                    <option>male</option>
                    <option>female</option>
                </select>
                <select name="Color">
                <?php
                while($row =  mysqli_fetch_assoc($res)){
                    echo "<option style='background-color:#".$row['value']."'>";
                    echo $row['Name'];
                    echo "</option>";
                }
                    
                    ?>
                </select>
                <select name="Size">
                <?php
                $sql = "Select * from size";
                $res = $database->query($sql);
                while($row =  mysqli_fetch_assoc($res)){
                    echo "<option>";
                    echo $row['Number'];
                    echo "</option>";
                }
                    
                    ?>
                </select>
                <input type="password" id="vemail" name="Password" placeholder="Your Password">
                <button type="submit" id="submit" name="singup">Submit</button>
            </form>
    </div>
</div>

    <script src="Script/Scripts.js"></script>
</body>
</html>