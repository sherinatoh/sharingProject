<html>
<head> <title>WELCOME!</title> </head>

<body>
<table>
<tr> <td colspan="2" style="background-color:#FFA500;">
<h1>Please enter your email and password</h1>
</td> </tr>

<?php
$dbconn = pg_connect("host=localhost port=5432 dbname=Sharing user=postgres
password=12345678")
    or die('Could not connect: ' . pg_last_error());
?>

<tr>
<td style="background-color:#eeeeee;">
<form>

	Email: <input type="text" name="Email" id="Email">
    Password: <input type="text" name="Password" id="Password">

    <input type="submit" name="formSubmit" value="Login" >
        
</form>
	
	<?php
if(isset($_GET['formSubmit'])) 
{
    $query = "SELECT 'email', 'password' FROM user WHERE 'email' = '".$_GET['Email']."' AND 'password' = '".$_GET['Password']."'";
    
    echo "<b>SQL:   </b>".$query."<br><br>";
    $result = pg_query($query) or die('Search failed: ' . pg_last_error());


    if (pg_num_rows($result) == 1) {
    	echo "true";
    	header("Location:BrowsingPage.php");
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
<td colspan="2" style="background-color:#FFA500; text-align:center;"> Copyright &#169; CS2102
</td> </tr>
</table>

</body>
</html>
