<?php
?>

<form method="post" action="index2.php?page=orderhistory"> 
    <div>
        <style type="text/css">
            div#sidebar {
                display:none;
            }
            #checkout {
                display: none;
            }
        </style>
        <?php 
            if($_SESSION['purchaseid'] != 0){
            for($i = 1; $i <= $_SESSION['purchaseid']; $i++){
        ?>
                <h2>Purchase ID: <?php echo $i; ?></h2>
                <table> 
                    <tr> 
                        <th>Product ID</th> 
                        <th>Product Name</th>
                        <th>Product Type</th>
                        <th>Quantity</th> 
                        <th>Price</th>
                    </tr> 
                <?php 
  
                $sql="SELECT purchasequantity.productID, productName, productType, Quantity, (price*Quantity) as Price ";
                $sql.="FROM purchasequantity join product on (purchasequantity.productID = product.productID) where purchaseid = ".$i;
                $sql.=" AND customerid = ".$_SESSION['custID']." ORDER BY productID ASC"; 

                $query=mysql_query($sql); 
                  
                while ($row=mysql_fetch_array($query)) { 
          
                ?> 
                    <tr> 
                        <td><?php echo $row['productID'] ?></td> 
                        <td><?php echo $row['productName'] ?></td> 
                        <td><?php echo $row['productType'] ?></td> 
                        <td><?php echo $row['Quantity'] ?></td> 
                        <td><?php echo $row['Price'] ?></td> 
                    </tr> 
                <?php 
                          
                    } 
                   $sql2 = "Select totalprice from purchasedate where purchaseid = ".$i;
                    $sql2.=" AND customerid = ".$_SESSION['custID'];
                    $query2 = mysql_query($sql2);
                    $rows = mysql_fetch_array($query2);
                  
                ?>
                    <tr> 
                        <td colspan="5">Total Price: $<?php echo $rows['totalprice']; ?></td>

                    </tr> 
                </table>
                <br>
        <?php 
            }
        } else {
            echo "No purchases were made.";
        }
        ?>
    </div>
    <br />  
</form> 
<br /> 