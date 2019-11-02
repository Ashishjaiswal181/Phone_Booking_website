<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
      <title>Log In</title>
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="viewport" content="width=device-width">        
      <link rel="stylesheet" href="css/templatemo_main.css">
<style type="text/css">
      .mail {
    margin: 20px 40px 0px 395px; 
          color:#00008B;
    font-family: comic sans ms;
    font-size: 20px; }
.pwd {
    margin: 20px 40px 0px 345px; 
    color:#00008B;
    font-family: comic sans ms;
    font-size: 20px; }
    </style>
</head>
<body style="background-image: linear-gradient(90deg, yellow,white,aqua);">
	<?php
  error_reporting(E_ERROR);
  session_start();
    if (isset($_POST['email'])) {
        $cust_id = $_POST['email'];	
        $Password = $_POST['password'];
        $con = mysqli_connect("localhost","root","Qwerty@123","phonebooking");
        if (mysqli_connect_errno())
          {  echo "Failed to connect to MySQL: " . mysqli_connect_error();  }
			$query = "SELECT * FROM user WHERE Cust_Id='$cust_id' and Password='$Password'";
      $result = mysqli_query($con,$query);
      $count = mysqli_num_rows($result);
      if($count==1) {  echo ("<SCRIPT LANGUAGE='JavaScript'>
  		  		          window.alert('You are logged in successfully');
				              window.location.href='dashboard.php';
  				                  </SCRIPT>");
                            $_SESSION["email"]=$cust_id;  } 
      else { echo("<SCRIPT LANGUAGE='JavaScript'>
  		  		          window.alert('Invalid Email or Password');
				              window.location.href='login.php';
  				                  </SCRIPT>");}
	 mysqli_close($con); }
   else  {  ?>    
   <div id="main-wrapper">
    <div class="navbar navbar-expand-sm bg-light" role="navigation" style="background-color: #4169E1	;min-height: 80px">
      <div class="navbar-header" style='color:white	;margin: 0;margin-left:10px;position: absolute;top: 50%;-ms-transform: translateY(-50%); transform: translateY(-50%);'>
        <div class="logo" style="font-weight:bold;font-family:'Georgia'"><h1>Log In </h1></div>
      </div>   
    </div>
    <div class="template-page-wrapper">
      <form role="form" action="" method="post">
    <label for="email" class="mail" style="margin: 20px 40px 0px 314px;">CUSTOMER ID</label>
          <input type="text" name="email" style="width: 400px; height: 35px" placeholder="Customer Id" required="">
    
    <label for="password" class="pwd">PASSWORD</label>
          <input type="password" name="password" style="width: 400px; height: 35px" placeholder="PASSWORD" required="">
        
        <div class="form-group">
          <div class="col-md-12">
              <div class="col-sm-12" style="margin-top: 20px; margin-left: 475px;">
                  <button type="submit" name="submit" value="signup" style="background-color: #008CBA;color:white;">Log In</button>
              </div>
            </div>
        </div>
    </form>
  </div>
</div>
      <?php } ?>
</body>
</html>    