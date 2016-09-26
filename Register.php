<html>
<head> <title>WELCOME!</title> </head>

<body>
<table>
<tr> <td colspan="2" style="background-color:#FFA500;">
<h1>Please enter a valid email and password and choose a username</h1>
</td> </tr>

<?php
$dbconn = pg_connect("host=localhost port=5432 dbname=Sharing user=postgres
password=10220911")
    or die('Could not connect: ' . pg_last_error());
?>

<tr>
<td style="background-color:#eeeeee;">
<form>

	Username: <input type="text" name="Username" id="Username">
    Email: <input type="text" name="Email" id="Email">
    Password: <input type="text" name="Password" id="Password">
    
    <input type="submit" name="formSubmit" value="Create Account" >
    <input type="button" value="Login Now!" onClick="document.location.href='Login.php'"/>
</form>

<?php

if(isset($_GET['formSubmit'])) 
{
    $query = "INSERT INTO Users VALUES('".$_GET['Email']."','".$_GET['Username']."','".$_GET['Password']."')";
    
    echo "<b>SQL:   </b>".$query."<br><br>";

    $result = pg_query($query);
    //For now it only shows error message in SQL but does not explain what is causing the error to
    //the users

    if (!$result) {
    	echo "Email/Username already taken, please try something else!";
    } else {
    	echo "Account created successfully, please click on Login Now to login!";
    }

    pg_free_result($result);
}
?>

</td> </tr>
<?php
pg_close($dbconn);
?>
<tr>
<td colspan="2" style="background-color:#FFA500; text-align:center;"> Copyright &#169; CS2102
</td> </tr>
</table>

</body>
</html>
