<?php
  include '../includes/connectdb.php';

  $clUrUsername = $connectdb -> real_escape_string($_POST['clUrUsername']);
  $clUrPassword = $connectdb -> real_escape_string($_POST['clUrPassword']);
  $hash = password_hash($clUrPassword, PASSWORD_DEFAULT);
  $clUrFirstname = $connectdb -> real_escape_string($_POST['clUrFirstname']);
  $clUrLastname = $connectdb -> real_escape_string($_POST['clUrLastname']);
  $clUrcontact_num = $connectdb -> real_escape_string($_POST['clUrcontact_num']);
  $clUremail = $connectdb -> real_escape_string($_POST['clUremail']);
  $clUraddress = $connectdb -> real_escape_string($_POST['clUraddress']);

  // put error catching cases 

  $usersquery = "INSERT INTO tbusers ( clUrFirstname, clUrLastname, clUrUsername, clUrPassword, 
                                  clUrcontact_num, clUremail, clUraddress)
                  VALUES ('$clUrFirstname','$clUrLastname','$clUrUsername', '$hash', 
                          '$clUrcontact_num','$clUremail','$clUraddress');";
                          
  //Check if username already exist
  $sql = "SELECT * FROM tbusers where clUrUsername = '$clUrUsername'";
  $result = $connectdb->query($sql);
  $checkUser = $result->num_rows;

  if ($checkUser == 0) {
    mysqli_query($connectdb, $usersquery);
    echo "<script> 
    alert('Successfully Signed Up!'); 
    window.location = '../login.php';
    </script>"; 
  }    
  else{
    echo "<script>
    alert('Failed to Sign Up.');  
    window.location = '../signup.php';
    </script>"; 
  }
  
 ?>
