<html>
<head> <title>WELCOME!</title> </head>

<body>
    <table>
        <tr> <td colspan="2" style="background-color:#6666C1;">
            <h1 style="font-size:70px; color:#FFF8DC">Registration</h1>
        </td> </tr>

        <?php
        $dbconn = pg_connect("host=localhost port=5432 dbname=Sharing user=postgres password=10220911")
        or die('Could not connect: ' . pg_last_error());
        ?>

        <tr>
            <td style="background-color:#eeeeee;">
                <form>
                    <div style="width:300px">

                       <label style="color:#2D2D2D; width:250px; display: block"><span style="position:relative;">Username:</span><input style="float:right; display:inline" type="text" name="Username" id="Username"></label><br>
                      
                       <label style="color:#2D2D2D; width:250px; display: block"><span style="position:relative;">Email: </span><input style="float:right; display:inline" type="text" name="Email" id="Email"></label> <br>

                       <label style="color:#2D2D2D; width:250px; display: block"><span style="position:relative;">Password: </span><input style="float:right; display:inline" type="text" name="Password" id="Password"></label> <br>

                       <label style="color:#2D2D2D; width:250px; display: block"><span style="position:relative;">Location: </span><input style="float:right; display:inline" type="text" name="Location" id="Location"> </label><br>

                   </div>

                   <input type="submit" name="formSubmit" value="Create Account" >
                   <input type="button" value="Login Now!" onClick="document.location.href='Login.php'"/>
               </form>

               <?php

               if(isset($_GET['formSubmit'])) 
               {
                $query = "INSERT INTO member VALUES('".$_GET['Email']."','".$_GET['Username']."','".$_GET['Password']."','".$_GET['Location']."')";

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
        <td colspan="2" style="background-color:#6666C1; color:#FFF8DC; text-align:center; margin-top: 10px; padding: 10px"> Copyright &#169; VYMMS
        </td> </tr>
    </table>

</body>
</html>
