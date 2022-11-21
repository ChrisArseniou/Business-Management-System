<?php

	//με το include σιγουρευόμαστε ότι έχει γίνει η σύνδεση με την βάση.
	include '../connect.php';
	
	//με το πάτημα του κουμπιού update, πέρνουμε το στοιχείο από το πεδίο, και το επιλέγουμε από την βάση.
	if(isset($_POST['update'])){
		$afm_to_update = $_POST['afm'];
		$sql = "Select * from `suppliers` where AFM='$afm_to_update'";
		$result = mysqli_query($con,$sql);
		$row=mysqli_fetch_assoc($result);
		
		//ελέγχουμε το αποτελέσμα που επέστρεψε η sql, μετά την εκτέλεση του query. Αν η εκτέλεση είναι επιτυχής και υπάρχει όντως το //στοιχείο, περνάμε το πρωτεύον κλειδί στο κατάλληλο αρχείο που γίνεται η τροποποίηση στοιχείων, ώστε να επιλεχθεί σωστά.		
		if($result){
			if($row){
				header('location:update_supplier.php?updateafm='.$afm_to_update.'');
			}
			else {
				$msg="<span style='color:red'>Invalid AFM</span>";
			}
		}
		else {
			die(mysqli_error($con));
		}
	}
	
	//με το πάτημα του κουμπιού back, πηγαίνουμε στο menu.
	if(isset($_POST['Back'])){
		header('location:../menu.php');		
	}
?>

<!doctype html>
<html lang="en">

	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="general_style.css">
		<link rel="stylesheet" href="update_supplier_from_menu.css">
		<title>Update Supplier</title>
	</head>
	
	<body>
		<!--Αν δεν υπάρχει το στοιχείο που θέλουμε να τροποποιήσουμε, εμφανίζουμε το κατάλληλο μήνυμα λάθους-->
		<?php if(isset($msg)){?>
			<tr>
				<td colspan="2" align="center" valign="top"><?php echo $msg;?></td>
			</tr>
		<?php } ?>
		
		<h1>Update a supplier</h1>
		
		<div class = "container">
			<form method = "post">
				<div class="form-group">
					<label>AFM</label>
					<input type="text", style="color: #03e9f4;", class="form-control" placeholder="Enter supplier's AFM" name="afm" autocomplete="off">
				</div>
				<button type="submit" class="btn btn-primary my-3" name="update">Update</button>
			</form>
	
		</div>
	</body>

	<footer>
		<form action="" method="post" name="Login_Form">	
			<td><input name="Back" type="submit" value="Back" class="ButtonBack"></td>
		</form>
	</footer>
	
</html>