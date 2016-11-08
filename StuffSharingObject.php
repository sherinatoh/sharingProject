<html>
<head> 
    <title>Stuff Sharing Catalog</title> 
    <link href="styles.css" media="all" rel="Stylesheet" type="text/css"/>
</head>

<body>
   
    <table>
   
   
         <div class="sect1">
            <h1>Add Your Item!</h1>
            </div>

   
        <?php
        ob_start(); 
        session_start(); 
        
        $dbconn = pg_connect("host=localhost port=5432 dbname=Sharing user=postgres password=12345678")
        or die('Could not connect: HERE' . pg_last_error());
        
        ?>

        
            <div class="sect2">
            
                <form action="upload.php" method="post" enctype="multipart/form-data">
                    <div class="sect2">
                        <input type="text" name="category" id="category" placeholder="Category"><br/>
                    </div>
                    <div class="sect2">
                     <input type="text" name="itemName" id="itemName" placeholder="Item Name"><br/>
                    </div>
                    <div class="sect2">
                        <input type="text" name="description" id="description" placeholder="Description"><br/>
                    </div>
                    <div class="sect2">
                     <input type="text" name="price" id="price" placeholder="Price"><br/>
                    </div>
                    <div class="sect2">
                     <input type="text" name="location" id="location" placeholder="Location"> <br/>
                    </div>
                    <div class="sect2">
                     <input type="text" name="availableDate" id="availableDate" placeholder="Available Date"> <br/>
                    </div>
                    <div class="sect2">
                     <input type="text" name="availability" id="availability" placeholder="Availability"> <br/>
                    </div>
                    <div class="sect2">
                     <input type="file" name="fileToUpload" id="fileToUpload">
                    </div>
                    <input type="submit" name="formSubmit" value="Add Item!" >
                </form>
                <?php
                if(isset($_GET['formSubmit']))
                {   
                    $_SESSION['productID'] = $_SESSION['productID'] + 1; 
                    $query = "INSERT INTO object VALUES('".$_GET['category']."','".$_GET['itemName']."','".$_GET['description']."','".$_GET['price']."','".$_GET['location']."','".$_GET['availableDate']."','".$_GET['availability']."')";
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

            <?php
            pg_close($dbconn);
            ?>
            <tr>
                <td> Copyright &#169; VYMMS
                </td> </tr>
            </table>
             <a href="browsing.php"><button>Go to Browsing Page</button></a>
        </body>
        </html>
