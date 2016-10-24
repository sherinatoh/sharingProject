<html>
<head><title>History of Loans</title></head>

<body>
	<table width="100%" border="0" cellspacing="0.4" cellpadding="0.4">
		<tr> <td style="background-color:#6666C1;">
			<h1 style="text-align:center; color:#FFF8DC; font-family: "Impact, Charcoal, sans-serif";>List of Loans</h1>
		</td></tr>
		<?php
		$dbconn = pg_connect("host=localhost port=5432 dbname=Sharing user=postgres password=postgres")
		or die('Could not connect: HERE' . pg_last_error());
        ?>

        <tr>
        	<td style="background-color:#c1c1c1; border:solid;" align="center";>
        	<?php
        		session_start();
                $user = $_SESSION['user'];
                $query = "SELECT o.itemname, l.returnDate, l.borrowDate, l.owner FROM object o, loan l WHERE l.borrower = '".$user."' AND l.productID = o.productID";
                $result = pg_query($query) or die('Query failed: ' . pg_last_error());
                echo "<table border=\"1\" >
                <col width=\"50%\">
                <col width=\"50%\">
                <col width=\"50%\">
                <col width=\"50%\">
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