<?php
$numErr=$streetErr=$cityErr =$quantityErr=$companyphoneErr=$FnameErr=$phoneNumberErr=$NationalIDErr=$emailErr=$lastNameErr=$firstNameErr="";
$companyphone=$firstName=$lastName=$email=$national=$phoneNumber=$campanyName=$companyphone=$city=$quantity=$street=$num="";
$error_fields=array();
if ($_SERVER["REQUEST_METHOD"] == "POST"){
  
  if (empty($_POST["firstName"])) {
    $firstNameErr = "firstName is required";
    $error_fields[]="fname";
  } else {
    $firstName = test_input($_POST["firstName"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$firstName)) {
      $firstNameErr = "Only letters and white space allowed";
      $error_fields[]="fname";
    }
  }
  if (empty($_POST["lastName"])) {
    $lastNameErr = "lastName is required";
    $error_fields[]="lname";
  } else {
    $lastName = test_input($_POST["lastName"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$lastName)) {
      $lastNameErr = "Only letters and white space allowed";
      $error_fields[]="lname";
    }
  }
  if (empty($_POST["inputEmail4"])) {
    $emailErr = "Email is required";
    $error_fields[]="email";
  } else {
    $email = test_input($_POST["inputEmail4"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
      $error_fields[]="email";
    }
  }
  if (empty($_POST["NationalID"])) {
    $NationalIDErr = "NationalID is required";
    $error_fields[]="NationalID";
  } else {
    $national = test_input($_POST["NationalID"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[0-9]*$/",$national)) {
      $NationalIDErr = "Only Numbers allowed";
      $error_fields[]="NationalID";
    }
  }
  if (empty($_POST["phone"])) {
    $phoneNumberErr = "phoneNumber is required";
    $error_fields[]="phone";
  } else {
    $phoneNumber = test_input($_POST["phone"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[0-9]*$/",$phoneNumber)) {
      $phoneNumberErr = "Only Numbers allowed";
      $error_fields[]="phone";
    }
  }
  if (empty($_POST["Fname"])) {
    $FnameErr = "factoryName is required";
    $error_fields[]="Fname";
  } else {
    $campanyName = test_input($_POST["Fname"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$campanyName)) {
      $FnameErr = "Only letters and white space allowed";
      $error_fields[]="Fname";
    }
  }
 
  if (empty($_POST["companyNumber"])) {
    $companyphoneErr = "companyphone is required";
    $error_fields[]="companyphone";
  } else {
    $companyphone = test_input($_POST["companyNumber"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[1-9]*$/",$companyphone)) {
      $companyphoneErr = "Only Numbers allowed";
      $error_fields[]="companyphone";
    }
  }
  //2
  
  //3
  if (empty($_POST["quantity"])) {
    $quantityErr = "quantity is required";
    $error_fields[]="quantity";
  } else {
    $quantity = test_input($_POST["quantity"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[0-9]*$/",$quantity)) {
      $FnameErr = "Only numbers allowed";
      $error_fields[]="quantity";
    }
  }
  //4
  if (empty($_POST["city"])) {
    $cityErr = "city is required";
    $error_fields[]="city";
  } else {
    $city = test_input($_POST["city"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$city)) {
      $cityErr = "Only letters and white space allowed";
      $error_fields[]="city";
    }
  }
  //5
  if (empty($_POST["street"])) {
    $streetErr = "street is required";
    $error_fields[]="street";
  } else {
    $street = test_input($_POST["street"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$street)) {
      $streetErr = "Only letters and white space allowed";
      $error_fields[]="street";
    }
  }
  //6
  if (empty($_POST["num"])) {
    $numErr = "num is required";
    $error_fields[]="numm";
  } else {
    $num = test_input($_POST["num"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[0-9]*$/",$num)) {
      $numErr = "Only numbers allowed";
      $error_fields[]="num";
    }
  }

if(!$error_fields){
        $conn=mysqli_connect("localhost","root","01157447106Ab#","HMH");
        if(!$conn){
            mysqli_connect_error();
            exit;
        }
      
        $fristName=mysqli_real_escape_string($conn,$_POST['firstName']);
        $lastName=mysqli_real_escape_string($conn,$_POST['lastName']);
        $name=$fristName." ".$lastName;
        $email=mysqli_real_escape_string($conn,$_POST['inputEmail4']);
        $passward=sha1($_POST['inputPassword4']);
        $national=mysqli_real_escape_string($conn,$_POST['NationalID']);
        $phoneNumber=mysqli_real_escape_string($conn,$_POST['phone']);
        $campanyName=mysqli_real_escape_string($conn,$_POST['Fname']);
        $companyphone=mysqli_real_escape_string($conn,$_POST['companyNumber']);
        $materialtype=$_POST['materialtype'];
        $quantity=mysqli_real_escape_string($conn,$_POST['quantity']);
        $city=mysqli_real_escape_string($conn,$_POST['city']);
        $street=mysqli_real_escape_string($conn,$_POST['street']);
        $num=mysqli_real_escape_string($conn,$_POST['num']);
        $query1="insert into adminstrator (admin_name,national_id,phoneNumber) values ('$name','$national','$phoneNumber')";
        $query3="insert into location (street,strNum,city) values ('$street','$num','$city')";
        $query2="insert into material(materialType,quantity) values ('$materialtype','$quantity')";
        $query="insert into `factory`(fName,email,pass,phoneNumber) values ('$campanyName','$email','$passward','$companyphone')";
        mysqli_query($conn,$query);
        mysqli_query($conn,$query1);
        mysqli_query($conn,$query2);
        mysqli_query($conn,$query3);
          
      mysqli_close($conn);
      }
       
}  
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<html>
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Indie+Flower&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/all.min.css">
    <link rel="stylesheet" type="text/css" href="css/fontawesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Anton&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Anton|Cormorant+Garamond&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Amaranth|Anton|Cormorant+Garamond&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Pattaya&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Cormorant+SC|Pattaya&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Cormorant+SC|Pattaya|Playfair+Display+SC&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Cormorant+SC|Pattaya|Playfair+Display+SC|Tulpen+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Cormorant+SC|Pattaya|Playfair+Display+SC|Rozha+One|Tulpen+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=DM+Serif+Display&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=DM+Serif+Display|Delius&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Aguafina+Script|DM+Serif+Display|Delius|Mrs+Saint+Delafield&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Abril+Fatface&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Yanone+Kaffeesatz&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="main.css">
    <link href="https://fonts.googleapis.com/css?family=Rokkitt&display=swap" rel="stylesheet">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
      

    <link rel="stylesheet" href="animate.css">
    <link rel="stylesheet" type="text/css" href="rec.css">
    
    <title>REBEKIA</title>
  </head>
    
  <body style="width: 100% ;background-color: #F7F7F7;">

    <div class="container-fluid" style="padding:0px 0px">
      <!-- nav bar -->
        <ul class="topnav flex-container">
            <div style="flex-grow: 5">   <li><a class="active" href="#home">Home</a></li>
                <li><a href="#news">News</a></li>
                <li><a href="#contact">Contact</a></li></div>
            <div   style="flex-grow: 4">

            </div>
            <div style="flex-grow: 3">
                <li class="right">
                  <button type="button" class="btn btn-primary" data-toggle="modal"  style="background-color:#333 ; font-size: 20px ;border: none " data-target="#exampleModal">
                    SignIn
                  </button>
                </li>
               <!-- <li class="right" style="background-color: #333 ; padding-right: : 10px;"><a  style="padding-top:6px; "href="#Register">Register</a></li>-->
            </div>  
        </ul>
            <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
              <div class="modal-content">
              <div class="modal-header">
          
              <form>
                <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1">
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
                </div>

      
              </div>
            </div>
        </div>
    





        
        

  


        
   

        <div class="regis"><h1>REGISTER FOR NEW ACCOUNT</h1></div>
        <div>
          <div class="a2">
            <button type="button" id="btn1" class="btn btn-primary btn-lg">Company</button>
            <button type="button" id="btn2" class="btn btn-secondary btn-lg">MaterialOwner</button>
          </div>
          <div id="OwnerForm" class="FORM" style="display: table-cell" >
            <form>
              <div class="row name">
                <div class="col">
                  <input type="text" class="form-control" placeholder="First name">
                </div>
                <div class="col">
                  <input type="text" class="form-control" placeholder="Last name">
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="inputEmail4">Email</label>
                  <input type="email" class="form-control" id="inputEmail4">
                </div>
                <div class="form-group col-md-6">
                  <label for="inputPassword4">Password</label>
                  <input type="password" class="form-control" id="inputPassword4">
                </div>
              </div>
              <div class="form-group">
                <label for="inputAddress">PhoneNumber</label>
                <input type="text" class="form-control" id="inputAddress">
              </div>
              <div class="form-group">
                <label for="inputAddress">Address</label>
                <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
              </div>
   
              <div class="form-row">
  
                <div class="form-group col-md-12">
                  <label for="inputState">MaterialType</label>
                  <select id="inputState" class="form-control">
                    <option selected>Choose...</option>
                    <option>...</option>
                  </select>
                </div>
                <div class="form-group col-md-4">
                  <label for="inputState">city</label>
                  <select id="inputState" class="form-control">
                    <option selected>Choose...</option>
                    <option>...</option>
                  </select>
                </div>
                <div class="form-group col-md-4">
                  <label for="inputState">Street</label>
                  <select id="inputState" class="form-control">
                    <option selected>Choose...</option>
                    <option>...</option>
                  </select>
                </div>
                <div class="form-group col-md-2">
                  <label for="inputZip">Number</label>
                  <input type="text" class="form-control" id="inputZip">
                </div>
              </div>
              <div class="form-group">
                <div class="form-check">
  
               </div>
              </div>
              <button type="submit" class="btn btn-primary">Register</button>
            </form>
          </div>
          <div id="CompanyForm"  class="FORM2" style="display: none"  > 
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
              <div class="row name">
                <div class="col">
                  <input type="text" class="form-control" placeholder="First name" name="firstName">
                  <span class="error">* <?php echo $firstNameErr;?></span>
                </div>
                <div class="col">
                  <input type="text" class="form-control" placeholder="Last name" name="lastName">
                  <span class="error">* <?php echo $lastNameErr;?></span>
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="inputEmail4">Email</label>
                  <input type="email" class="form-control" id="inputEmail4" name="inputEmail4">
                  <span class="error">* <?php echo $emailErr;?></span>
                </div>
                <div class="form-group col-md-6">
                  <label for="inputPassword4">Password</label>
                  <input type="password" class="form-control" id="inputPassword4" name="inputPassword4">
                  
                </div>
              </div>
              <div class="form-group">
                <label for="NationalID">NationalID</label>
                <input type="text" class="form-control" id="NationalID" name="NationalID">
                <span class="error">* <?php echo $NationalIDErr;?></span>
              </div>
              <div class="form-group">
                <label for="PhoneNumber">PhoneNumber</label>
                <input type="text" class="form-control" id="PhoneNumber" name="phone">
                <span class="error">* <?php echo $phoneNumberErr;?></span>
              </div>
              <div class="form-group">
                <label for="Fname">CompanyName</label>
                <input type="text" class="form-control" id="Fname" name="Fname">
                <span class="error">* <?php echo $FnameErr;?></span>
              </div>
              <div class="form-group">
                <label for="companyNumber">CompanyNumber</label>
                <input type="text" class="form-control" id="companyNumber" name="companyNumber">
                <span class="error">* <?php echo $companyphoneErr;?></span>
              </div>
              
                         
       
              <div class="form-row">
                <div class="form-group col-md-12">
                  <label for="inputState">MaterialType</label>
                  <select id="inputState" class="form-control" name="materialtype">
                    <option selected>Choose...</option>
                    <option>plastic</option>
                    
                  </select>
                  <div class="form-group" >
                    <label for="quantity">quantity</label>
                    <input type="text" class="form-control" id="quantity" name="quantity">
                    <span class="error">* <?php echo $quantityErr;?></span>
                  </div>
                </div>

                <div class="form-group col-md-4">
                  <label for="inputState">City</label>
                  <input type="text" class="form-control" id="inputState" name="city">
                  <span class="error">* <?php echo $cityErr ;?></span>
                </div>
       
                <div class="form-group col-md-4">
                  <label for="inputState">Street</label>
                  <input type="text" class="form-control" id="inputState" name="street">
                  <span class="error">* <?php echo $streetErr;?></span>
                </div>
                <div class="form-group col-md-2">
                  <label for="inputZip">Number</label>
                  <input type="text" class="form-control" id="inputZip" name="num">
                  <span class="error">* <?php echo $numErr;?></span>
                </div>
              </div>
              <div class="form-group">
                <div class="form-check">
       
                </div>
              </div>
              <input type="submit" class="btn btn-primary" id="submit" name="submit" value="submit">
            </form>
          </div> 
        </div>
        
        
      <!-- boxes -->
      <div class="container mt-5" style="padding-top: 90px;">
        <div class="row" >
          <div class="col-md-4" id="colo" >
            <i class="fas fa-leaf fa-2x circle-icon2" style="color: white;  "  id="icoon"></i>
            
            <h3 style="text-align: center;">Corporate Services</h3>
            <p style="text-align: center;">Guaranteed that all of your universal<br> waste management is performed <br>safely and responsibly</p>
          </div>
          <div class="col-md-4" id="colo">
            <i class="fas fa-inbox fa-2x circle-icon1" style="color: white;  "  id="icoon"></i>
            
            <h3 style="text-align: center;">Convenient Pickup</h3>
            <p style="text-align: center;">We offer business pickup services to<br> safely recycle your electronics in a <br>safe manner.</p>
          </div>
          <div class="col-md-4" id="colo">
            <i class="fas fa-calendar fa-2x circle-icon3" style="color: white;  "  id="icoon" ></i>
            
            <h3 style="text-align: center;">E-waste Events</h3>
            <p style="text-align: center;">We work with non-profits, businesses<br> and other organizations to host <br>community e-waste events.</p>
          </div>
        </div>
      </div>
      <!-- pickup -->
      <section id="pickup" class="ds page_contact parallax section_padding_100" style="background-position: 50% -6px;">
        <div class="container mt-5" style="padding-top: 10%">
          <div class="row" style="background-color: #30432D;">
            <div class="col-sm-12 text-center">
              <h2 class="section_header with_icon" style="color: #FFFFFF ;font-family: 'Abril Fatface', cursive;">
                Schedule Pickup
              </h2>
              

              <form class="contact-form row columns_margin_bottom_20" method="post" action="./">


                <div class="col-md-4">
                  <div class="form-group">
                   
                    <i class="fa fa-user highlight2" aria-hidden="true"></i>
                    <input type="text" aria-required="true" size="30" value="" name="name" id="pickup-name" class="form-control" placeholder="Full Name">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    
                    <i class="fa fa-phone highlight2" aria-hidden="true"></i>
                    <input type="text" aria-required="true" size="30" value="" name="phone" id="pickup-phone" class="form-control" placeholder="Phone Number">
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group select-group">
                    
                    <i class="fa fa-calendar highlight2" aria-hidden="true"></i>
                    <select aria-required="true" id="pickup-date" name="date" class="choice empty form-control">
                      <option  style="color: #FFFFFF" value="" disabled="" selected="" data-default="">Date</option>
                      <option value="1306">13.06</option>
                      <option value="1406">14.06</option>
                      <option value="1506">15.06</option>
                      <option value="1606">16.06</option>
                      <option value="1706">17.06</option>
                      <option value="1806">18.06</option>
                      <option value="1906">19.06</option>
                      <option value="2006">20.06</option>
                    </select>
                    <i class="fa fa-angle-down theme_button" aria-hidden="true"></i>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group select-group">
                    
                    
                    <i class="fa fa-clock-o highlight2" aria-hidden="true"></i>
                    <select aria-required="true" id="pickup-time" name="time" class="choice empty form-control">
                      <option value="" disabled="" selected="" data-default="">Time</option>
                      <option value="08am">8:00 AM</option>
                      <option value="09am">9:00 AM</option>
                      <option value="10am">10:00 AM</option>
                      <option value="11am">11:00 AM</option>
                      <option value="12am">12:00 PM</option>
                      <option value="13pm">13:00 PM</option>
                      <option value="14pm">14:00 PM</option>
                      <option value="15pm">15:00 PM</option>
                      <option value="16pm">16:00 PM</option>
                      <option value="17pm">17:00 PM</option>
                    </select>
                    <i class="fa fa-angle-down theme_button" aria-hidden="true"></i>
                  </div>
                </div>
                <div class="col-sm-12">

                  <div class="form-group">
                    
                    <i class="fa fa-comment-o highlight2" aria-hidden="true"></i>
                    <textarea aria-required="true" rows="3" cols="45" name="message" id="pickup-message" class="form-control" placeholder="Message"></textarea>
                  </div>
                </div>

                <div class="col-sm-12">

                  <div class="contact-form-submit topmargin_20">
                    <button class="button button2">Order Pickup</button>
                  </div>
                </div>


              </form>

            </div>
          </div>
        </div>
      </section>
      <!-- our mission -->
      <div class="row mt-5" style="height: 100%; padding-top: 10%  ">
        <div class="col-md-6" style="background-color: black; ">
          <img src="12.jpg" style="width: 102%; opacity: .6; height: 100%;">
        </div>
        
          
        <div class="col-md-6" style="background-color: #FFFFFF;">
          <div class="m-5 pb-5 " style="padding-top: 8%">
            <i class="fas fa-recycle fa-2x " style="color: #9CC026; padding-bottom: 10px"></i>
            <h1 style="font-family: 'Abril Fatface', cursive; color: #323232">Our Mission</h1>
            <h6 style="color: #8A8A8A">ABOUT US</h6>
            <p class="mt-4" style="color: #909090; font-family: 'Rokkitt', serif; font-size:25px ">Our mission is to keep as much electronic waste from ending up in local landfills as we can</p>
              <div class="panel-group">
      <div class="panel panel-default">
        <div class="panel-heading" style="background-color: #E4DF01; ">
          <p>
            <a style="color: white; font-family: 'Rokkitt', serif" data-toggle="collapse" href="#collapseExample1" role="button" aria-expanded="false" aria-controls="collapseExample1">
              <i class="fas fa-envelope"></i>
              REDUCING WASTE
            </a>
          </p>
          <div class="collapse1" id="collapseExample1">
            <div class="card card-body" style="font-family: 'Rokkitt', serif">
            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
                    </div>
                  </div>
    
  
                </div>
      
              </div>
              <div class="panel panel-default">
                <div class="panel-heading" style="background-color: #018957; ">
                  <p>
                    <a style="color: white; font-family: 'Rokkitt', serif" data-toggle="collapse" href="#collapseExample2" role="button" aria-expanded="false" aria-controls="collapseExample2">
                      <i class="fas fa-envelope"></i>
                      REDUCING WASTE
                    </a>
  
                  </p>
                  <div class="collapse2" id="collapseExample2">
                    <div class="card card-body" style="font-family: Rokkitt, serif ; " >
                      Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
                    </div>
                   </div>
    
  
                </div>
      
              </div>
              <div class="panel panel-default">
                <div class="panel-heading" style="background-color: #03687A; ">
                   <p>
                    <a style="color: white; font-family: 'Rokkitt', serif; " data-toggle="collapse" href="#collapseExample3" role="button" aria-expanded="false" aria-controls="collapseExample3">
                      <i class="fas fa-envelope"></i>
                      REDUCING WASTE
                    </a>
  
                  </p>
                  <div class="collapse3" id="collapseExample3">
                    <div class="card card-body" style="font-family: 'Rokkitt', serif ;">
                      Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
                    </div>
                  </div>
    
  
                </div>
      
              </div>
 

          
        

        

            </div>
          </div>
      
        </div>
      </div>
    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
      <script type="text/javascript" src="script.js"></script>
  </body>
  
</html>