<html>
<head> <title>Your Items!</title> </head>
<body>
    <table width="100%" border="0" cellspacing="0.4" cellpadding="0.4">
        <td style="background-color:#6666C1;">
            <h1 style="text-align:center; color:#FFF8DC; font-family: "Impact, Charcoal, sans-serif"; ">View items you have put up for rent!</h1>
        </td> 

        <?php
        $dbconn = pg_connect("host=localhost port=5432 dbname=Sharing user=postgres password=12345678")
        or die('Could not connect: ' . pg_last_error());
        ?>

        <tr>
            <td style="background-color:#c1c1c1; border:solid;">

                <?php
                $user = 'vesaliE@gmail.com'; 
                $query = "SELECT category, itemname, price FROM object WHERE owner ='".$user."' ";
                $result = pg_query($query) or die('Query failed: ' . pg_last_error());
                echo "<table border=\"1\" >
                <col width=\"50%\">
                <col width=\"50%\">
                <col width=\"50%\">
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

            </td> </tr>
            <?php
            pg_close($dbconn);
            ?> 
            <tr>
                <td colspan="2" style="background-color:#6666C1; text-align:center;"> Copyright &#169; CS2102 Group 9
                </td> </tr>
            </table>

        </body>
        </html>