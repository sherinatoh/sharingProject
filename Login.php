<html>
<head> <title>WELCOME!</title> </head>

<body>
<table>
<tr> <td colspan="2" style="background-color:#6666C1;">
<h1 style="font-size:70px; color:#FFF8DC">Login</h1>
</td> </tr>

<?php
$dbconn = pg_connect("host=localhost port=5432 dbname=Sharing user=postgres
password=10220911")
    or die('Could not connect: ' . pg_last_error());
?>

<?php
    ob_start();
    session_start();

    if ( isset($_SESSION['user'])!="" ) {
        header("Location: Homepage.php");
        exit;
    }
?>

<tr>
<td style="background-color:#eeeeee;">
<form>

	<label style="color:#2D2D2D; width:250px; display: block"><span style="position:relative;">Email: </span><input style="float:right; display:inline" type="text" name="Email" id="Email"></label> <br>

    <label style="color:#2D2D2D; width:250px; display: block"><span style="position:relative;">Password: </span><input style="float:right; display:inline" type="text" name="Password" id="Password"></label> <br>

    <input type="submit" name="formSubmit" value="Login" >
        
</form>
	
	<?php

if(isset($_GET['formSubmit'])) 
{
    $query = "SELECT email, password FROM member WHERE email = '".$_GET['Email']."' AND password = '".$_GET['Password']."'";
    
    echo "<b>SQL:   </b>".$query."<br><br>";
    $result = pg_query($query) or die('Search failed: ' . pg_last_error());


    if (pg_num_rows($result) == 1) {
    	echo "true";
        $_SESSION['user'] = $_GET['Email'];
    	header("Location:Homepage.php");
    	//Change page
    	exit;
    } else {
    	echo "Wrong Password!";
    }
    
    pg_free_result($result);
}
?>

</td> </tr>
	<?php
	pg_close($dbconn);
	?>

<tr>
<td colspan="2" style="background-color:#6666C1; color:#FFF8DC; text-align:center; margin-top: 10px; padding: 10px"> Copyright &#169; VYMMS
</td> </tr>
</table>

</body>
</html>
