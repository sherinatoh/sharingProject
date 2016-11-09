<html>
<head><title>Account Page</title></head>
<body>
	<table width="100%" border="0" cellspacing="0.4" cellpadding="0.4">
		<td style="background-color:#6666C1;">
			<h1 style="text-align:center; color:#FFF8DC; font-family: "Impact, Charcoal, sans-serif";>Welcome to Account Page!</h1>
		</td>
		<?php
		session_start();
		if(!isset($_SESSION['user'])){
			echo "Please login <a href='FirstPage.php'>here</a>.";
			header("Location: /Login.php");
			exit();
		}else{
			$user = $_SESSION['user'];
			echo "Welcome ".$user."!";
		}
		?>
		<tr>
		<td style="background-color:#c1c1c1; border:solid;" align="center";>
				<form>
					<select name="View">
						<option value="history">Loan History</option>
						<option value="add">Add Item</option>
						<option value="sale">My Items</option>
					</select>
					<input type="submit" name="formSubmit" value="Go!">
				</form>
			</td></tr>
			<?php
			if(isset($_GET['formSubmit'])){
				$result = $_GET['View'];
				if($result=='history'){
					header("Location: /LoanHistory.php");
				}else if($result=='add'){
					header("Location: /StuffSharingObject.php");
				}else if($result=='sale'){
					header("Location: /UserItems.php");
				}
			}
			?>
			<tr>
				<td colspan="2"> Copyright &#169; VYMMS
				</td> </tr>
			</table>
			<a href="Logout.php?logout">LOGOUT</a>
		</body>
		</html>
