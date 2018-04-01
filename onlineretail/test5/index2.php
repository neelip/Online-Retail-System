<?php 
    session_start();    
    require("includes/connection.php"); 
    if(isset($_GET['page'])){ 
          
        $pages=array("products", "cart", "checkout", "finalpage", "orderhistory", "myprofile", "editmyprofile"); 
          
        if(in_array($_GET['page'], $pages)) { 
              
            $_page=$_GET['page']; 
              
        }else{ 
              
            $_page="products"; 
              
        } 
          
    }else{ 
          
        $_page="products"; 
          
    } 

    $_SESSION['date'] = date("Y-m-d");

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"> 
  
    <html xmlns="http://www.w3.org/1999/xhtml"> 
    <head> 
          
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
        <link rel="stylesheet" href="css/reset.css" /> 
        <link rel="stylesheet" href="css/style.css" /> 
        <title>Shopping cart</title> 
      
    </head> 
  
    <body> 
          
        <div id="mainTitle">
            <h1><center>ONLINE RETAIL CATALOG</center></h1>
        </div>
        <div class="profile">
            <b id="orders"><a href="index2.php?page=orderhistory">Order History</a></b>
        </div>
        <div class="profile">
            <b id="logout"><a href="logout.php">Log Out</a></b>
        </div>
        <div class="profile">
            <b id="myprofile"><a href="index2.php?page=myprofile">My Profile</a></b>
        </div>
        <div class="profile">
            <b id="products"><a href="index2.php?page=products">Products</a></b>
        </div>
          
        <div id="container"> 

            <div id="main"> 
                <?php require($_page.".php"); ?>
            </div><!--end main-->
              
            <div id="sidebar"> 
                <h1>Cart</h1> 
                <table id="carttable">
                
                <?php 
                    if(isset($_SESSION['cart'])){ ?>
                    <tr id="titletable">
                        <td>Product ID</td>
                        <td>Product Name</td>
                    </tr>
                <?php
          
                    $sql="SELECT * FROM product WHERE productID IN ("; 
                  
                    foreach($_SESSION['cart'] as $id => $value) { 
                        $sql.=$id.","; 
                    } 
                  
                    $sql=substr($sql, 0, -1).") ORDER BY productID ASC"; 
                    $query=mysql_query($sql); 
                    while($row=mysql_fetch_array($query)){ 
                      
                 ?> 
                    <tr>
                        <td><?php echo $row['productID']?></td> 
                        <td><?php echo $row['productName']?></td>
                    </tr>
                <?php 
                    } 
                ?>     
                </table>
                <hr /> 
                <a href="index2.php?page=cart">Go to cart</a> 
                <?php 
          
                    } else{ 
          
                    echo "<p>Your Cart is empty. Please add some products.</p>"; 

                    } 
  
                ?>
            </div><!--end sidebar-->
  
        </div><!--end container-->
    
    </body> 
</html>

