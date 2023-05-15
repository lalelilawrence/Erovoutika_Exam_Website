<?php
include '../includes/connectdb.php';

if($_SESSION['admin_sid']==session_id())
{
    $clUrID = $_SESSION['clUrID'];
    $clUrUsername = $_SESSION['clUrUsername'];
  
    // User profile photo
    $result = mysqli_query($connectdb, "SELECT clUrPhoto from tbusers where clUrID = $clUrID;");
    $row = $result->fetch_assoc();
     
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
        <link rel="stylesheet" href="../css/admin_home_style.css">
    </head>

    <body id="body-pd">

        <?php include __DIR__."/AdminNav.php"; ?>

        <!--Container Main start-->
        <div class="height-100" id="i--container--mainContent">
            <div class="container my-3">
                <!-- Profile Banner -->
                <div class="row" id="i--row--banner">
                    <div class="col-2">
                        <?php
                            if ($row['clUrPhoto'] == ""){
                                echo '<img src="/src/images/Display Picture Icon.png" alt="Photo/Icon" class="img-fluid m-3" id="i--banner--dp">';
                            }
                            else{
                                echo '<img src="/src/images/user images/'. $row['clUrPhoto'] .'" alt="Photo/Icon" class="img-fluid m-3" id="i--banner--dp">';
                            }
                        ?>
                    </div>
                    <div class="col-8">
                        <h1 class="text-light mt-2-title" id="i--banner--title">Welcome, <?php echo $clUrUsername ?></h1>
                        <p class="text-light mt-2-desc" id="i--banner--subtitle">You can manage the exam website here</p>
                    </div>
                    <div class="col-2">
                        <a href = "AdminProfile.php" role="button" class="btn btn-light my-3-edit" id="i--button--editProfile">Edit Profile</a>
                    </div>
                </div>
                <!-- Edit History -->
                <div class="row mt-5">
                    <div class="col display-6-recent">
                        RECENT EDITED EXAM
                    </div>
                </div>
                <!-- Blue Line -->
                <div class="row">
                    <div class="col-4" id="i--line--blue"></div>
                </div>
                <!-- Edit Banners -->
                <div class="row my-2 gy-3">
                <!-- 
                    Things to change:
                        Since this is recent edited exam
                        we need to explicitly change the content by sorting it via
                        date, status
                -->
                <?php

                    $sql = "SELECT * FROM `tbexam` order by clExLastEditDate desc";
                    $result = $connectdb->query($sql);
                    

                    if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        // To fetch the last editor of the exam
                        $UrLastEditor = $row["clExLastEditedBy"];
                        $query = "SELECT clUrUsername FROM tbusers WHERE clUrID = $UrLastEditor";
                        $rs = $connectdb->query($query);
                        $rw = $rs->fetch_assoc();

                        echo '<div class="col-12">';
                        echo '<div class="card" id="i--card--edit">
                                <div class="card-body">
                                    <div class="container">';
                                echo ' <div class="row fs-5-title">
                                        '.$row["clExName"].'
                                        </div>
                                        <div class="row" id="i--line--card"></div>
                                        <div class="row mt-4 fs-5-desc">
                                            '.$row["clExDescription"].'
                                        </div>
                                        <div class="row my-2 fs-5-lastedit">
                                        EDIT DATE: '.$row["clExLastEditDate"].'
                                        </div>
                                        <div class="row my-2 fs-5-edited">
                                        EDITED BY: '.$rw["clUrUsername"].'
                                        </div>';
                        echo '      </div>
                                </div>
                              </div>';
                        echo '</div>';
                    }
                }

                ?>
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
		if($_SESSION['client_sid']==session_id()){
			header("location:../includes/error.php");		
		}
		else{
				header("location:../login_template.php");
			}
	}
?>