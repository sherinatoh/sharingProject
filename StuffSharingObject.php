<html>
<head> <title>Stuff Sharing Catalog</title> </head>

<body>
    <a href="browsing.php"><button>Go to Browsing Page</button></a>
    <table>
        <tr> <td colspan="5" style="background-color:#AAA500;">
            <h1> Stuff Sharing</h1>
        </td> </tr>
        <?php
        ob_start(); 
        session_start(); 
        
        $dbconn = pg_connect("host=localhost port=5432 dbname=Sharing user=postgres password=cs2102")
        or die('Could not connect: HERE' . pg_last_error());
        
        ?>

        <tr>
            <td style="background-color:#eeeeee;">
                <form action="upload.php" method="post" enctype="multipart/form-data">
                    Category: <input type="text" name="category" id="category"><br/>
                    Item Name: <input type="text" name="itemName" id="itemName"><br/>
                    Description: <input type="text" name="description" id="description"><br/>
                    Price: <input type="text" name="price" id="price"><br/>
                    Location: <input type="text" name="location" id="location"> <br/>
                    Available Date: <input type="text" name="availableDate" id="availableDate"> <br/>
                    Availability: <input type="text" name="availability" id="availability"> <br/>
                    Image: <input type="file" name="fileToUpload" id="fileToUpload">
                    <input type="submit" name="formSubmit" value="Add Item!" >
                </form>
                <?php
                if(isset($_GET['formSubmit']))
                {   
                    $_SESSION['productID'] = $_SESSION['productID'] + 1; 
                    $query = "INSERT INTO object VALUES('".$_GET['category']."','".$_GET['itemName']."','".$_GET['description']."','".$_GET['price']."','".$_GET['location']."','".$_GET['availableDate']."','".$_GET['availability']."', '".$_SESSION['productID']"')";
    //echo "<b>SQL:   </b>".$query."<br><br>";
                    $result = pg_query($query) or die('Query failed: ' . pg_last_error());
                    if(!result){
                        echo "Please enter all fields";
                    }
                    else{
                        header("Location:welcome.php");
                        exit;
                    }
                }
                ?>

            </td> </tr>
            <?php
            pg_close($dbconn);
            ?>
            <tr>
                <td colspan="2" style="background-color:#FFA500; text-align:center;"> Copyright &#169; CS2102 Project
                </td> </tr>
            </table>

        </body>
        </html>
