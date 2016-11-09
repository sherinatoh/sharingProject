<html>
<head> 
    <meta charset="utf-8">
    <title>Your Items!</title>
    <link href="styles.css" media="all" rel="Stylesheet" type="text/css"/>
</head>
<body>
    <div class="sect1">
        <h1>View items you have put up for rent!</h1>

        <?php
        $dbconn = pg_connect("host=localhost port=5432 dbname=Sharing user=postgres password=postgres")
        or die('Could not connect: ' . pg_last_error());
        ?>
        <?php
        ob_start();
        session_start();

        if ( isset($_SESSION['user'])=="" ) {
            header("Location: FirstPage.php");
            exit;
        }
        ?>

        <?php
        $user =  $_SESSION['user']; 
        $query = "SELECT category, itemname, price FROM object WHERE owner ='".$user."' ";
        $result = pg_query($query) or die('Query failed: ' . pg_last_error());
        echo "<table border=\"1\" style=\"width:80%\" align=\"center\">
        <col width=\"25%\">
        <col width=\"65%\">
        <col width=\"10%\">
        <tr>
            <th>Category</th>
            <th>Item Name</th>
            <th>Price</th>
        </tr>";
        while($row = pg_fetch_row($result)){
            echo "<tr>";
            echo "<td>" . $row[0] . "</td>";
            echo "<td>" . $row[1] . "</td>";
            echo "<td>" . $row[2] . "</td>";
            echo "</tr>";
        }
        echo"</table>";

        pg_free_result($result);
        ?>

        <?php
        pg_close($dbconn);
        ?>
        <br>
        Copyright &#169; VYMMS<br>
        <a href="AccountPage.php">Back to Account Page</a>
    </div>

</body>
</html>