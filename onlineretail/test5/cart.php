 <?php 
  
    if(isset($_POST['submit'])){ 
          
        foreach($_POST['quantity'] as $key => $val) { 
            if($val==0) { 
                unset($_SESSION['cart'][$key]); 
            }else{ 
                $_SESSION['cart'][$key]['quantity']=$val; 
            } 
        } 
          
    } 
  
?> 
<h1>View cart</h1> 
<a href="index2.php?page=products">Go back to products page</a> 
<form method="post" action="index2.php?page=cart"> 
      
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
                   
            $query=mysql_query($sql); 
            $totalprice=0; 
            while($row=mysql_fetch_array($query)){ 
                $subtotal=$_SESSION['cart'][$row['productID']]['quantity']*$row['price']; 
                $totalprice+=$subtotal; 
        ?> 
                <tr> 
                    <td><?php echo $row['productID'] ?></td> 
                    <td><?php echo $row['productName']?></td>
                    <td><input type="text" name="quantity[<?php echo $row['productID'] ?>]" size="5" value="<?php echo $_SESSION['cart'][$row['productID']]['quantity'] ?>" /></td> 
                    <td>$<?php echo $row['price'] ?></td> 
                    <td>$<?php echo sprintf("%.2f", $_SESSION['cart'][$row['productID']]['quantity']*$row['price']) ?></td> 
                </tr> 
        <?php           
            } 
        ?> 
            <tr> 
                <td colspan="5">Total Price: $<?php $_SESSION['total'] = $totalprice;echo sprintf("%.2f", $totalprice); ?></td>


            </tr> 
          
    </table> 

    <br /> 
    <span>Enter 0 for quantity to remove a product from the cart.</span>
    <br>
    <button type="submit" name="submit">Update Cart</button> 
    
    <button id="check"><b id="checkout"><a href="index2.php?page=checkout">Checkout</a></b></button>
  
</form> 
<br /> 
