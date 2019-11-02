<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
       <meta charset="utf-8">
  <title>Welcome to All Kind Of Phones</title>
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="viewport" content="width=device-width">  
  <link rel="stylesheet" href="css/templatemo_main.css">
<style type="text/css">
  .name {
    margin: 50px 40px 0px 400px; 
    font-family: comic sans ms;  color:#00008B;
    font-size: 20px; }
    .custid {
    margin: 20px 40px 0px 314px; 
    font-family: comic sans ms;  color:#00008B;
    font-size: 20px; }
  .pNumber {
    margin: 20px 40px 0px 295px; 
    font-family: comic sans ms;  color:#00008B;
    font-size: 20px; }
  .address {
    margin: 20px 40px 0px 365px; 
    font-family: comic sans ms;  color:#00008B;
    font-size: 20px;
  }
  .pwd {
    margin: 20px 40px 0px 345px; 
    font-family: comic sans ms;  color:#00008B;
    font-size: 20px; }
</style>
        <?php
  error_reporting(E_ERROR);
        if($_SERVER["REQUEST_METHOD"]=="POST"){
            $customerName = $_POST['Name'];
            $email = $_POST['Email'];
            $phoneNumber = $_POST['Phone_no'];
            $shippingAddress = $_POST['Address'];
            $password = $_POST['Password'];
            $custid = $_POST['Cust_Id'];
            $con = mysqli_connect("localhost","root","Qwerty@123","phonebooking");               
        }
$query = "INSERT INTO `user` (Name, Address, Phone_no, Password,Cust_Id) VALUES"
        . " ('$customerName', '$shippingAddress', '$phoneNumber', '$password', '$custid')";
                        $result  = mysqli_query($con,$query);
                        if($result){ echo ("<SCRIPT LANGUAGE='JavaScript'>
                      window.alert('You Registered successfully');
                      window.location.href='login.php'; 
                    </SCRIPT>");}
                        else { echo ("<SCRIPT LANGUAGE='JavaScript'>
                      window.alert('Registeration Unsuccessfully');
                      //window.location.href='index.php'; 
                    </SCRIPT>"); }
         ?>
    </head>
    <body style="background-image: linear-gradient(90deg, yellow,white,aqua);">
       
  <div id="main-wrapper">
      <div class="navbar navbar-inverse" role="navigation" style="background-color: #4169E1	;min-height: 80px">
          <div class="navbar-header" style='color:white	;margin: 0;margin-left:10px;position: absolute;top: 50%;-ms-transform: translateY(-50%); transform: translateY(-50%);'>
            <div class="logo" style="font-weight:bold;font-family:'Georgia'"><h1>Sign -  Up</h1>
            </div>
          </div>   
      </div>
      <div class="template-page-wrapper">
      <form role="form" action="" method="post">
    <label for="Name" class="name">NAME</label>
          <input type="text" name="Name" style="width: 400px; height: 35px" placeholder="NAME" required="">
          
    <label for="Cust_Id" class="custid">CUSTOMER ID</label>
          <input type="text" name="Cust_Id" style="width: 400px; height: 35px" placeholder="CUSTOMER ID" required="">
    
    
    <label for="Phone_no" class="pNumber">PHONE NUMBER</label>
          <input type="text" name="Phone_no" style="width: 400px; height: 35px" placeholder="PHONE NUMBER" required="">
    
    <label for="Address" class="address">ADDRESS</label>
      <input type="text" name="Address" style="width: 400px; height: 35px" placeholder="ADDRESS" required="">
    
    <label for="Password" class="pwd">PASSWORD</label>
          <input type="password" name="Password" style="width: 400px; height: 35px" placeholder="PASSWORD" required="">
        
        <div class="form-group">
          <div class="col-md-12">
              <div class="col-sm-12" style="margin-top: 20px; margin-left: 475px;">
                  <button type="submit" name="submit" value="signup"  style="background-color: #008CBA;color:white;">Sign Up</button>
              </div>
            </div>
        </div>
    </form>
  </div>
</div>
    </body>
</html>
