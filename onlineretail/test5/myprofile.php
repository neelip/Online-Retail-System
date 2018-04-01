<?php
?>

<form method="post" action="index2.php?page=myprofile"> 
    <div id="profiledisplay">
        <style type="text/css">
            div#sidebar {
                display:none;
            }
            #checkout {
                display: none;
            }
        </style>

        <table>  
            <th>My Account</th>
            <th><button id="tocart"><a href="index2.php?page=editmyprofile">Edit</a></button></th>  
            <tr>
                <td>Username:</td>
                <td><?php echo $_SESSION['login_user'] ?></td>
            </tr>
            <tr>
                <td>Password:</td>
                <td>*********</td>
            </tr>
            <tr>
                <td>Bank Name:</td>
                <td>
                  <?php 
                      $sql = mysql_query("Select bankAccountNumber from customer where customerID = ".$_SESSION['custID']);
                      $result = mysql_fetch_array($sql);
                      $temp = $result['bankAccountNumber'];
                      $temp = gmp_mod($temp, "100");
                      $sql2 = mysql_query("Select bankName from banks where bankID = ".$temp);
                      $result2 = mysql_fetch_array($sql2);
                      $_SESSION['bankname'] = $result2['bankName'];
                      echo $result2['bankName'];
                  ?>
                </td>
            </tr>
            <tr>
                <td>Bank Account Number:</td>
                <td><?php 
                        echo gmp_div_q($result['bankAccountNumber'], "100");
                        $_SESSION['bankAccountNumber'] = gmp_div_q($result['bankAccountNumber'], "100");
                    ?>
                </td>
            </tr>
        </table>
        <br>

    </div>
        <br /> 
</form> 
<br /> 