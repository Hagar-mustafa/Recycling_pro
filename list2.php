
<?php
   $conn=mysqli_connect("localhost","root","01157447106Ab#","HMH");
if(!$conn){
   echo mysqli_connect_error();
   exit;
}
$query="select * from factory";


    
$result=mysqli_query($conn,$query);
?>
<html>
  <head>
      <title>
          Admin::list users
      </title>
      <body>
        
          <table>
              <thead>
                  <tr>
                      
                      <th>campanyName</th>
                      <th>Email</th>
                      
                      
                  </tr>
              </thead>
              <?php
              while($row = mysqli_fetch_assoc($result)){
               ?>
              <tr>
                  
                  <td><?=$row['fName']?></td>
                  <td><?=$row['email']?></td>
                  
              </tr>
              <?php
              }
              ?>
               
              
              
          </table>
      </body>
  </head>  
</html>