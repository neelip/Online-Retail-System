<?php 
    $_SESSION['keyword'] = "";
    if(isset($_GET['action']) && $_GET['action']=="add"){ 
          
        $id=intval($_GET['id']); 
              
        $sql_s="SELECT * FROM product 
                WHERE productID={$id}"; 
        $query_s=mysql_query($sql_s); 
        if(mysql_num_rows($query_s)!=0){ 
            $row_s=mysql_fetch_array($query_s); 
                  
            $_SESSION['cart'][$row_s['productID']]=array( "quantity" => 1, "price" => $row_s['price'] ); 
        }
    } 
  
?>
<h1>Product List</h1> 

<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
<div class="box">
    <form action="" method="post">
      <div class="container-4">
          <input type="search" id="search" placeholder="Search..." name="icon" method="post" />
          <button class="icon" name="search" type="submit" ><a href="index2.php?page=product"><i class="fa fa-search"></i></a></button>
      </div>
    </form>
</div>
<br>
    <table> 
        <tr> 
            <th>Product ID</th>
            <th>Name</th> 
            <th>Type</th>
            <th>Description</th> 
            <th>Price</th> 
            <th>Model Number</th>
            <th>Action</th> 

        </tr> 
       <?php 
            if(isset($_POST['search'])){
                $_SESSION['keyword'] = $_POST['icon'];
                searchcode($_SESSION['keyword']);
            } elseif (isset($_GET['name'])) {
                $_SESSION['keyword'] = strval($_GET['name']);
                searchcode($_SESSION['keyword']);
            } else {
                searchcode("");
            }

            function searchcode($keyword){

                $sql="SELECT * FROM product where productName LIKE '%".$keyword."%' OR productType LIKE '%".$keyword."%' ORDER BY productID ASC"; 
                $query=mysql_query($sql); 
                  
                while ($row=mysql_fetch_array($query)) { 
          
        ?> 
        <tr> 
            <td><?php echo $row['productID'] ?></td> 
            <td><?php echo $row['productName'] ?></td> 
            <td><?php echo $row['productType'] ?></td> 
            <td><?php echo $row['details'] ?></td> 
            <td>$<?php echo $row['price'] ?></td> 
            <td><?php echo $row['modelNumber'] ?></td> 
            <td><button id="tocart"><a href="index2.php?page=products&action=add&id=<?php echo $row['productID'] ?>&name=<?php echo $_SESSION['keyword'] ?>">Add to cart</a></button></td> 
        </tr> 
        <?php 
          
                } 

            }

        ?>
    </table>