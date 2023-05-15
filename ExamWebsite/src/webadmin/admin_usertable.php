<?php
include '../includes/connectdb.php';
	if($_SESSION['admin_sid']==session_id())
	{
		?>
<!DOCTYPE html>
<html>
    <head>
        <title>Erovoutika Exam Website - Admin</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" 
            rel="stylesheet" 
            integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" 
            crossorigin="anonymous"
        />

        <!-- Bootstrap Icons -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css"/>
        <link href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" rel="stylesheet" crossorigin="anonymous">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">

        <!-- Custom CSS -->
        <link rel="stylesheet" href="../css/admin_usertable_style.css">
    </head>

    <body id="body-pd">

        <?php include __DIR__."/AdminNav.php"; ?>

        <!--Container Main start-->
        <div class="height-100" id="i--container--mainContent">
            <div class="container my-3">
                <div class="col display-6">
                    USERLIST
                </div>
                <div class="row mt-5">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered">
                            <caption>List of Registered Users</caption>
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Fullname</th>
                                    <th scope="col">Username</th>                                    
                                    <th scope="col">Password</th>
                                    <th scope="col">Contact Number</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Address</th>
                                    <th scope="col">Number of Exams Taken</th>
                                    <th scope="col">Date Registered</th>
                                    <th scope="col">Date of Last Login</th>
                                    <th scope="col"> Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql = "SELECT * FROM tbusers";
                                $result = $connectdb->query($sql);
                                        
                                if ($result->num_rows > 0) {
                                    // output data of each row
                                    while($row = $result->fetch_assoc()) {

                                        echo'<tr>';
                                            echo'<th scope="row">'.$row["clUrID"].'</th>';
                                            echo'<td>'.$row["clUrFirstname"].' '.$row["clUrLastname"].'</td>';
                                            echo'<td>'.$row["clUrUsername"].'</td>';
                                            echo'<td>'.$row["clUrPassword"].'</td>';
                                            echo'<td>'.$row["clUrcontact_num"].'</td>';
                                            echo'<td>'.$row["clUremail"].'</td>';
                                            echo'<td>'.$row["clUraddress"].'</td>';
                                            echo'<td></td>';
                                            echo'<td>'.$row["clUrdate_added"].'</td>';
                                            echo'<td>'.$row["clUrLastlogin"].'</td>';
                                            echo'<td>';
                                                echo '<a class="btn btn-outline-primary" href="admin_usereditpage_template.php? clUrID='.$row["clUrID"].'">
                                                    <i class="bi bi-pencil-square"></i> </a>';
                                                echo '<a class="btn btn-outline-danger" href="admin_delete_usertable.php? clUrID='.$row["clUrID"].'">
                                                    <i class="bi bi-trash"></a>';
                                            echo'</td>';
                                    }            
                                        echo '</tr>';
                                }    
                                
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        <!--Container Main end-->
        
        <footer>
            <!-- This is where the footer is -->
        </footer>

        <!-- Custom Javascript -->
        <script src="../javascript/admin_home_script.js"></script>
    
        <!-- JavaScript Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" crossorigin="anonymous"></script>
    </body>
</html>
<?php
	}else
	{
		if($_SESSION['staff_sid']==session_id()){
			header("location:../includes/error.php");		
		}
		else{
			if($_SESSION['customer_sid']==session_id()){
				header("location:../includes/error.php");		
			}else{
				header("location:../login.php");
			}
		}
	}
?>