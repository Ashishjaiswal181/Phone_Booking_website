<!DOCTYPE html>
<html>
    <head>
      <meta charset="utf-8">
      <title>Dashboard</title>
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="viewport" content="width=device-width">        
      <link rel="stylesheet" href="css/templatemo_main.css">
      <?php 
  session_start();
  $email=$_SESSION["email"];
  error_reporting(E_ERROR);
    if ($_SERVER["REQUEST_METHOD"]=="POST") {
        
        $conn1 = mysqli_connect("localhost","root","Qwerty@123","phonebooking");
        if (mysqli_connect_errno())
          {  echo "Failed to connect to MySQL: " . mysqli_connect_error();  }
            $sql1 = "SELECT * FROM phone WHERE Name='$name'";
      $result1 = mysqli_query($conn1,$sql1);
      mysqli_close($conn1); 
     }
?>
    </head>
    <body style="background-image: linear-gradient(90deg, yellow,white,aqua);">           
    <div id="main-wrapper">
      <div class="navbar navbar-inverse" role="navigation" style="background-color: #4169E1;min-height: 80px">
        <div class="navbar-header" style='color:#ffffff	;margin: 0;margin-left:10px;position: absolute;top: 50%;-ms-transform: translateY(-50%); transform: translateY(-50%);'>
          <div class="logo" style="font-weight:bold;font-family:'Georgia';"><h1>Welcome <?php echo $email;?></h1> </div>
        </div>   
      </div>
      <div class="template-page-wrapper">
      <form class="form-horizontal templatemo-signin-form" role="form" action="" method="post">
        <div class="form-group">
          <div class="col-md-12">
            <div class="col-sm-offset-1 col-sm-10">
              <input type="text" class="form-control" name="phonename" placeholder="ENTER PHONE NAME" required="">
            </div>
          </div>              
        </div>
       <div class="form-group">
          <div class="col-md-12">
            <div class="col-sm-offset-5  col-sm-12">
              <button type="submit" value="search" style="background-color: #008CBA;color:white;">SEARCH</button>
            </div>
          </div>
       </div>
   </form>
      </div>
    </div>
<!---->
<?php
    $conn2 = mysqli_connect("localhost","root","Qwerty@123","phonebooking");
    if (mysqli_connect_errno())
          {  echo "Failed to connect to MySQL: " . mysqli_connect_error();  }
    echo "";
    if(isset($_POST['phonename'])){
        $PHONENAME = $_POST['phonename'];
        $sql2 = "SELECT * from phone where Name LIKE '%$PHONENAME%' AND status = '0' order by Name";
        $result2 = mysqli_query($conn2, $sql2);
?>
    <div class="template-page-wrapper">
        <div class="form-group">
          <div class="col-md-12">
            <div class="col-sm-offset-2  col-sm-12">
                <div class="col-sm-offset-3  col-sm-12">
                <h1 style="font-size: 20px" style="font-family: Brush Script MT">
                <font color="green"><strong>
                    Phone Available!</strong></font></h1></div>
                <div style="overflow-y: scroll; height: 300px; width: 900px;">
              <table style="border:1px ghostwhite;">                    
            
         <div class="form-group">
           <div class="col-md-12">
             <div class="col-sm-12">
               <tr>
                 <th  style="text-align: center; position: relative;" width="200px" height="50px" bgcolor="#D3D3D3" style="font-family: Brush Script M;T">
                    <font size="4" color="red">NAME</font></th>
                 <th style="text-align: center; position: relative;" width="50px" bgcolor="#D3D3D3" height="50px">
                    <font size="4" color="red">RAM</font></th>
                 <th style="text-align: center; position: relative;" width="50px" bgcolor="#D3D3D3" height="50px">
                    <font size="4" color="red">STORAGE</font></th>
                 <th style="text-align: center; position: relative;" width="50px" bgcolor="#D3D3D3" height="50px">
                    <font size="4" color="red">PRICE</font></th>
               </tr>
             </div>
           </div>
         </div>
           <?php if(($row = mysqli_num_rows($result2))!=0){ 
           while($row = mysqli_fetch_assoc($result2)){ ?>
             <div class="form-group">
               <div class="col-md-12">
                 <div class="col-sm-offset-2  col-sm-12">
                    <div class="">
                    <tr>
                      <td align="left" width="500px" height="40px" style="padding: 15px" style="background-color: red" >
                        <font size="3" color="black">
                         <?php echo $row['Name']; ?></font></td>
                      <td align="left" width="200px" height="40px">
                        <font size="3" color="black">
                        <?php echo $row['RAM']; ?></font></td>
                      <td align="center" width="200px" height="40px">
                        <font size="3" color="black">
                        <?php echo $row['Storage']; ?></font></td>
                         <td align="center" width="200px" height="40px">
                        <font size="3" color="black">
                        <?php echo $row['Price']; ?></font></td>
                    </tr>
                 </div>
               </div>
             </div>     <?php   }  } else { ?> <h1 style="color:red">Phone not available.</h1> <?php } ?>
         </div>
              </table>  <?php   }  mysqli_close($conn2); ?>
          </div>
      </div>
      </div>
          </div>
        </div>
    <div id="main-wrapper">
      <div class="template-page-wrapper">
      <form class="form-horizontal templatemo-signin-form" role="form" action="" method="post">
        <div class="form-group">
          <div class="col-md-12">
            <div class="col-sm-offset-1 col-sm-10">
              <input style="margin-top: 20px" type="text" class="form-control" name="bookphone" placeholder="ENTER PHONE NAME TO BOOK" required="">
            </div>
          </div>              
        </div>
       <div class="form-group">
          <div class="col-md-12">
            <div class="col-sm-offset-5  col-sm-12">
              <button type="submit" value="search" style="background-color: #008CBA;color:white;">BOOK</button>
            </div>
          </div>
       </div>
   </form>
      </div>
    </div>

<?php
    $conn3 = mysqli_connect("localhost","root","Qwerty@123","phonebooking");
    if (mysqli_connect_errno())
          {  echo "Failed to connect to MySQL: " . mysqli_connect_error();  }
    echo "";
    if(isset($_POST['bookphone'])){
        $BOOKPHONE = $_POST['bookphone'];
        $sql3 = "Select * from phone where Name='$BOOKPHONE' AND status='0'";
        $result3 = mysqli_query($conn3, $sql3);
        $count1 = mysqli_num_rows($result3);
      if($count1!=0){
          $sql4="UPDATE phone SET status = '1',Cust_Id='$email' WHERE Name ='$BOOKPHONE'";
        $result4 = mysqli_query($conn3, $sql4);
          $sql5="UPDATE user SET IMEI=(Select IMEI from phone where Name='$BOOKPHONE') where Cust_Id='$email'";
          $result5=mysqli_query($conn3, $sql5);
        echo "<p style='color:green;margin-top:50px;margin-left:565px;font-size:20px;font-weight:bold'>"."BOOKED SUCCESSFULLY!"."</p>";}
      else { echo "<p style='color:red;margin-top:50px;margin-left:600px;font-size:20px;font-weight:bold'>"."INCORRECT NAME"."</p>" ;  } 
        mysqli_close($conn3);}
?>

    </body>
</html>