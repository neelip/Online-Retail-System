<form method="post" action="index2.php?page=checkout" id = "checkout"> 
    <div>
      	<style type="text/css">
            div#sidebar {
                display:none;
            }
        </style>
        <table> 
          
        <tr> 
            <th>Product ID</th> 
            <th>Product Name</th>
            <th>Quantity</th> 
            <th>Price</th> 
            <th>Items Price</th> 
        </tr> 
          
        <?php 
          
            $sql="SELECT * FROM product WHERE productID IN ("; 
                      
                foreach($_SESSION['cart'] as $id => $value) { 

                    $sql.=$id.","; 
                } 
                  
                $sql=substr($sql, 0, -1).") ORDER BY productID ASC";
                $_SESSION['purchaseid'] = $_SESSION['purchaseid'] + 1;  
             
                $query=mysql_query($sql); 
                $totalprice=0; 

                while($row=mysql_fetch_array($query)){ 

                    $subtotal=$_SESSION['cart'][$row['productID']]['quantity']*$row['price']; 
                    $totalprice+=$subtotal; 
        ?> 
                    <tr> 
                        <td><?php echo $row['productID'] ?></td> 
                        <td><?php echo $row['productName']?></td>
                        <td><?php echo $_SESSION['cart'][$row['productID']]['quantity'] ?></td> 
                        <td>$<?php echo $row['price'] ?></td> 
                        <td>$<?php echo $_SESSION['cart'][$row['productID']]['quantity']*$row['price'] ?></td> 
                    </tr> 
        <?php             
                }   
        ?> 
                <tr> 
                    <td colspan="5">Total Price: $<?php $_SESSION['total'] = $totalprice;echo $totalprice; ?></td>

                </tr> 
                                  
        </table> 
    </div>
    <div class="profile">
        <button id="checkoutbtn"><b><a href="index2.php?page=finalpage">Confirm</a></b></button>
    </div>     
    <br />   
</form> 
<br /> 
