<?php
include '../includes/connectdb.php';


if($_SESSION['client_sid']==session_id()){
	if(!isset($_SESSION["client_sid"]) || $_SESSION["client_sid"] !== session_id()){
        header("location: ../login_template.php");
        exit;
    }	
$clUrID = $_SESSION['clUrID'];	
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Erovoutika - Exam</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Bootstrap -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

	<!-- Bootstrap Icons -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" />

    <!-- Bootstrap Script-->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>

	<!-- Custom CSS -->
	<link rel="stylesheet" href="../css/ExamListStyle.css">
</head>

<body>
    <!-------------------------- HEADER ---------------------------->   
    
   <?php include(__DIR__.'/../webclient/userNav.php'); ?>

	<div class="container-fluid bg-light">
        <div class="main-body">
             <div class="row gutters-sm border-5 border-bottom border-primary ms-1 me-1 mt-5">
                <h1>MY EXAMS</h1>
             </div>

            <!-------------------------- EXAM CONTAINER ---------------------------->
            <div class="exam_container">
            <!-------------------------- EXAM CONTENT ---------------------------->
            <?php

              $sql = "SELECT p.*, e.*, u.* FROM tbuserpaidexam AS p INNER JOIN tbexam AS e INNER JOIN tbusers AS u ON p.clUrID = u.clUrID AND p.clExID = e.clExID WHERE e.clExPublish = 1 AND p.clUrID = ".$clUrID."";
              $result = $connectdb->query($sql);

              if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {

                  $replacedSpace = str_replace(" ", "_", $row['clExName']);

                
                  //  <!-- Modal -->
                echo'  <div class="modal fade" id="'. $replacedSpace .'" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">'. $row['clExName'] .'</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      Do you want to take "'. $row['clExName'] .'" examination?
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                      <a href = "UserExamTaker.php?exam_id='. $row['clExID'] .'"><button type="submit" class="btn btn-primary">Take Exam</button></a>
                     
                    </div>
                  </div>
                </div>
              </div>';
          //<!-- Modal -->
          
                  //To count items in each question
                  $sql = "SELECT count(*) as total from tbQuestion where clExID = ". $row['clExID'] .";";
                  $rs = $connectdb->query($sql);
                  $data = $rs->fetch_assoc();

                  //To check the exam's question type
                    // Check if there's IDENTIFICATION question
                      $sql = "SELECT count(*) as total from tbQuestion where clExID = ". $row['clExID'] ." and clQsType = 0;";
                      $rs = $connectdb->query($sql);
                      $Identification_Q = $rs->fetch_assoc();

                    // Check if there's MULTIPLE CHOICE question
                      $sql = "SELECT count(*) as total from tbQuestion where clExID = ". $row['clExID'] ." and clQsType = 1;";
                      $rs = $connectdb->query($sql);
                      $Multiple_Q = $rs->fetch_assoc();

                    //Display question type condition
                      if (($Identification_Q['total']> 0) && ($Multiple_Q['total'] < 1)){
                        $QuestionsType = "Identification";
                      }

                      else if (($Multiple_Q['total'] > 0) && ($Identification_Q['total'] < 1)){
                        $QuestionsType = "Multiple Choice";
                      }

                      else if (($Identification_Q['total'] > 0) && ($Multiple_Q['total'] > 0)){
                        $QuestionsType = "Identification, Multiple Choice";
                      }


                  echo '<div class="card bg-light border border-2 border-primary rounded mt-3 mb-3">';
                    echo  '<div class="card-header bg-light">
                              <button type="submit" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#'. $replacedSpace .'" name = "TakeExam" value = "'. $row['clExID'] .'">
                                Take Exam
                                </button>
                          </div>';
                    echo  '<div class="card-body">';
                      echo  '<h4 class="card-title mb-4-title">'. $row['clExName'].'</h4>
                            <div class="hstack gap-3">';
                        echo  '<div class="bg-light border-bottom border-top border-primary p-1">
                                '. $row['clExPublishedDate'] .'
                              </div>
                              <div class="vr"></div>
                              <div class="bg-light border-bottom border-top border-primary p-2">
                                '. $data['total'] .' Items
                              </div>
                              <div class="vr"></div>
                              <div class="bg-light border-bottom border-top border-primary p-3">
                                '. $QuestionsType .'
                              </div>';
                        echo  '</div>';
                        echo  '<p class="card-text mt-4-desc">'. $row['clExDescription'] .'</p>';
                      echo  '</div>';
                    echo  '</div>';

                }
              }
                ?>

            <!-------------------------- EXAM CONTENT END ---------------------------->
            </div>
        </div>
    </div>

    <footer>
        <!-- This is where the footer is -->
    </footer>
</body>
</html>
<?php
    }else
	{
		if($_SESSION['admin_sid']==session_id()){
			header("location:404.php");		
		}
		else{
				header("location:../login_template.php");
			}
	}
?>