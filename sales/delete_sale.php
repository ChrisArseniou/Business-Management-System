<?php

	//με το include σιγουρευόμαστε ότι έχει γίνει η σύνδεση με την βάση.
	include '../connect.php';
	
	//με το πάτημα του κουμπιού delete, πέρνουμε τα στοιχεία από τα αντίστοιχα πεδία, και τα διαγράφουμε από την βάση.
	if(isset($_GET['deletenumber'])){
		$number = $_GET['deletenumber'];
		$sql = "delete from `sales` where number='$number'";
		$result = mysqli_query($con,$sql);
		
		//ελέγχουμε το αποτέλεσμα που επέστρεψε η sql, μετά την εκτέλεση του query. Αν η εκτέλεση είναι επιτυχής, προβάλλουμε την προϊγούμενη σελίδα.
		if($result){
			 header("Location: " . $_SERVER["HTTP_REFERER"]);
		}
		else {
			die(mysqli_error($con));
		}
	}
?>