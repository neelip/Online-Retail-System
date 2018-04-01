<?php 
    
    $sqldate = "Insert INTO purchasedate Values (".$_SESSION['purchaseid'].", ".$_SESSION['custID'].", ";
    $sqldate.="'".$_SESSION['date']."', ".$_SESSION['total'].")";
    $query4 = mysql_query($sqldate);
    $sqlcheck = "Update customer Set numberofpurchases=".$_SESSION['purchaseid']." WHERE customerID=".$_SESSION['custID'];

    $query3 = mysql_query($sqlcheck);
    ?>
     <?php 

    $sqlout="SELECT * FROM product WHERE productID IN ("; 
      
    foreach($_SESSION['cart'] as $id => $value) { 

        $sqlout.=$id.","; 
    } 
      
    $sqlout=substr($sqlout, 0, -1).") ORDER BY productID ASC";

    $query5=mysql_query($sqlout); 

    while($row=mysql_fetch_array($query5)){ 
        
        $sqlinsert = "Insert INTO purchasequantity Values (".$_SESSION['purchaseid'].", ";
        $sqlinsert.=$_SESSION['custID'].", ".$row['productID'].", ".$_SESSION['cart'][$row['productID']]['quantity'].")";
        
        $query2 = mysql_query($sqlinsert);
         
      }
    unset($_SESSION['cart']);
    ?>

<form method="post" action="index2.php?page=finalpage"> 
    <div>
      	<style type="text/css">
            div#sidebar {
                display:none;
            }
            #checkout {
                display: none;
            }
        </style>
      	<span>Thank you for your purchase.</span>
      	<br>
      	<br>
      	<span>NOTE: Log in again to make a new purchase.</span>
    </div>
        <br />   
</form> 
        <br /> 
