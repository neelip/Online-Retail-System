<div id="profiledisplay">
	<style type="text/css">
  		div#sidebar {
    		display:none;
  		}
  		#checkout {
    		display: none;
  		}
	</style>
	<h2>Edit My Account</h2>
	<h3>Enter values in the fields that need to be updated.</h3>
	<br>
	<br>
<?php 
	if (isset($_POST['update'])){
	
		if (isset($_POST['username']) && $_POST['username'] != "") {
			
			$check1 = mysql_query("Select customerID from customer where username = '".$_POST['username']."'");
			$check = mysql_fetch_array($check1);

			if ($check['customerID'] == $_SESSION['custID'] || (mysql_num_rows($check1) == 0)){
				$sql = mysql_query("Update customer set username = '".$_POST['username']."' where customerID = ".$_SESSION['custID']);
				$_SESSION['login_user'] = $_POST['username']; ?>
				<div><span>Username successfully updated.</span></div>
			<?php
			} else {
			?>	<div><span>Username is taken, try another username!</span></div>
			<?php
			}
		}

		if (isset($_POST['password']) && $_POST['password'] != "") {
			$sql = mysql_query("Update customer set password = '".$_POST['password']."' where customerID = ".$_SESSION['custID']); ?>
			<div><span>Password successfully updated.</span></div>
			<?php
		}

		if (empty($_POST['bankname']) && isset($_POST['banknumber']) && $_POST['banknumber'] != ""){
		  	$getid = mysql_fetch_array(mysql_query("Select bankID from banks where bankName = '".$_SESSION['bankname']."'"));
		  	$getnum = $_POST['banknumber']*100 + $getid['bankID'];
		  	$checknum = mysql_num_rows(mysql_query("Select customerID from customer where bankAccountNumber = ".$getnum));
		  	if($checknum == 0){
		  		$sql = mysql_query("Update customer set bankAccountNumber = ".$getnum." where customerID = ".$_SESSION['custID']);
		  		$_SESSION['bankAccountNumber'] = $getnum; ?>
		  		<div><span>Bank account number successfully updated.</span></div>
		  		<?php
		  	} else {
		  		?>
		  		<div><span>Error: Account number at <?php echo $_SESSION['bankname'] ?> is invalid, as it is in use by another customer!</span></div>
		  		<?php
		  	}
		} elseif(isset($_POST['bankname']) && ($_POST['bankname'] != "") && empty($_POST['banknumber'])){

		  	$checkid = mysql_num_rows(mysql_query("Select bankID from banks where bankName = '".$_POST['bankname']."'"));
		  	$_SESSION['bankname'] = $_POST['bankname'];

		  	if ($checkid == 0){
		  		$insertname = mysql_query("Insert into banks(bankName) values('".$_POST['bankname']."')");
		  	}

		  	$getid = mysql_fetch_array(mysql_query("Select bankID from banks where bankName = '".$_SESSION['bankname']."'"));
		  	$getnum = $_SESSION['bankAccountNumber']*100 + $getid['bankID'];
		  	$checknum = mysql_num_rows(mysql_query("Select customerID from customer where bankAccountNumber = ".$getnum));

		  	if($checknum == 0){
		  		$sql = mysql_query("Update customer set bankAccountNumber = ".$getnum." where customerID = ".$_SESSION['custID']);?>
		  		<div><span>Bank name and account number successfully updated.</span></div>
		  		<?php
		  	} else {
		  		?>
		  		<div><span>Error: Account number at bank <?php echo $_SESSION['bankname'] ?> is invalid, as it is in use by another customer!</span></div>
		  		<br>
		  		<?php
		  	}
		} elseif(isset($_POST['bankname']) && ($_POST['bankname'] != "") && isset($_POST['banknumber']) && ($_POST['banknumber'] != "")){
		  	
			  	$checkid = mysql_num_rows(mysql_query("Select bankID from banks where bankName = '".$_POST['bankname']."'"));
			  	$_SESSION['bankname'] = $_POST['bankname'];
			  	if ($checkid == 0){
			  		$insertname = mysql_query("Insert into banks(bankName) values('".$_POST['bankname']."')");
			  	}
			  	$getid = mysql_fetch_array(mysql_query("Select bankID from banks where bankName = '".$_SESSION['bankname']."'"));
			  	$getnum = $_POST['banknumber']*100 + $getid['bankID'];
			  	$checknum = mysql_num_rows(mysql_query("Select customerID from customer where bankAccountNumber = ".$getnum));
			  	if($checknum == 0){
			  		$sql = mysql_query("Update customer set bankAccountNumber = ".$getnum." where customerID = ".$_SESSION['custID']);
			  		$_SESSION['bankAccountNumber'] = $_POST['banknumber']; ?>
			  		<div><span>New bank details successfully updated.</span></div>
			  		<?php
			  	} else {
			  		?>
			  		<div><span>Error: Account number at <?php echo $_SESSION['bankname'] ?> is invalid, as it is in use by another customer!</span></div>
			  		<br>
			  		<?php
			  	}
		}
	}
	  
?>

	<form method="post" action="index2.php?page=editmyprofile"> 
	      
		<br>
	    <table> 
	    	<th colspan="2">Current Info</th>
	    	<th>New Info</th>
	 		<tr>
	      		<td>Username:</td>
	      		<td><?php echo $_SESSION['login_user'] ?></td>
	      		<td><input type="text" name="username"/></td>
	    	</tr>
	    	<tr>
	      		<td>Password:</td>
	      		<td>*********</td>
	      		<td><input type="password" name="password"/></td>
	    	</tr>
	    	<tr>
	      		<td>Bank Name:</td>
	      		<td><?php  
	      			$sql = mysql_query("Select bankAccountNumber from customer where customerID = ".$_SESSION['custID']);
	                $result = mysql_fetch_array($sql);
	                $temp = $result['bankAccountNumber'];
	                $temp = gmp_mod($temp, "100");
	     			$sql2 = mysql_query("Select bankName from banks where bankID = ".$temp);
	                $result2 = mysql_fetch_array($sql2);
	                echo $result2['bankName'];
	                ?>
	            </td>
	      		<td><input type="text" name="bankname"/></td>
	    	</tr>
	    	<tr>
	      		<td>Bank Account Number:</td>
	      		<td><?php 
	                echo gmp_div_q($result['bankAccountNumber'], "100");
	                ?>
	            </td>
	            <td><input type="text" name="banknumber"/></td>
	    	</tr>
		</table>
		<br>
			<button id="tocart" type="submit" name="update">Update</button>
		<br /> 
	</form> 
</div>

<br /> 