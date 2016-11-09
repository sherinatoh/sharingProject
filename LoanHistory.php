<html>
<head>
    <meta charset="utf-8">
    <title>History of Loans</title>
    <link href="styles.css" media="all" rel="Stylesheet" type="text/css"/>

</head>
<body>
    
    <div class="sect1">
      <h1>List of Loans</h1>

      <?php
      $dbconn = pg_connect("host=localhost port=5432 dbname=Sharing user=postgres password=postgres")
      or die('Could not connect: HERE' . pg_last_error());
      ?>


      <?php
      session_start();
      $user = $_SESSION['user'];
      $query = "SELECT o.itemname, l.returnDate, l.borrowDate, l.owner FROM object o, loan l WHERE l.borrower = '".$user."' AND l.productID = o.productID";
      $result = pg_query($query) or die('Query failed: ' . pg_last_error());
      echo "<table border=\"1\" style=\"width:80%\" align=\"center\">
      <col width=\"40%\">
      <col width=\"20%\">
      <col width=\"20%\">
      <col width=\"20%\">
      <tr>
        <th>Item Name</th>
        <th>Return Date</th>
        <th>Borrowed Date</th>
        <th>Owner</th>
    </tr>";
    while($row = pg_fetch_row($result)){
        echo "<tr>";
        echo "<td>" . $row[0] . "</td>";
        echo "<td>" . $row[1] . "</td>";
        echo "<td>" . $row[2] . "</td>";
        echo "<td>" . $row[3] . "</td>";
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