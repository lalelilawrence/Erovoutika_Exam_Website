<?php
    include '../includes/connectdb.php';
    if($_SESSION['client_sid']==session_id()) {
        /*
        Legend:
            $examID:
                -1 = Error/Exam Not Found
                n>0 = Edit Exisiting Exam
        */
        $examID = -1;
        $tbExam_data = null;
        $tbQuestion_data = null;
        $tbAnswer_data = null;
        $tbuserexam_clUeID_topID = 0;

        if(isset($_REQUEST["exam_id"])) { // If request has "exam_id"
            // Get Parameter and Decode URL-encoded String
            $examID = urldecode($_REQUEST["exam_id"]);
    
            if(empty($examID)) { // If request "exam_id" has no value (e.g. ?exam_id= or ?exam_id=0)
                // Error 404 here
                $examID = -1;
            }
            else {
                // If request "exam_id" has value, Edit Existing Exam... (e.g. ?exam_id=1)
                // (tbExam)Fetch Exams ID======================================================================(START)
                $sql_query = "SELECT `clExID`,`clExName`,`clExDescription`,`clExInstructions` FROM `tbexam` WHERE `clExID` = '$examID' AND `clExPublish` = 1;";
                $fetch_sql_query = mysqli_query($connectdb, $sql_query);
                if($fetch_sql_query){
                    if(mysqli_num_rows($fetch_sql_query) > 0) { // Exam Exists
                        $tbExam_data = mysqli_fetch_array($fetch_sql_query);
                        
                        // (tbQuestion)Fetch Questions Data======================================================================(START)
                        $sql_query = "SELECT `clQsID`,`clExID`,`clQsBody`,`clQsType` FROM `tbquestion` WHERE `clExID` = '$examID';";
                        $fetch_sql_query = mysqli_query($connectdb, $sql_query);
                        if($fetch_sql_query){
                            while($tbQuestion_row = mysqli_fetch_array($fetch_sql_query)){
                                // $tbQuestion_row['clQsBody'] = nl2br($tbQuestion_row['clQsBody']);// Convert \n to <br>
                                $tbQuestion_data[] = $tbQuestion_row;
                            }
                        }
                        else{
                            echo mysqli_error($connectdb);
                        }
                        // (tbQuestion)Fetch Questions Data======================================================================(END)
                        if($tbQuestion_data != null) { // If $tbQuestion_data is NOT empty
                            // (tbAnswer)Fetch Answers Data======================================================================(START)
                            $sql_query = "";
                            for($question_count = 0; $question_count < count($tbQuestion_data); $question_count++) {
                                $tbQuestion_clQsID = $tbQuestion_data[$question_count]['clQsID'];
                                if($question_count == 0) {
                                    $sql_query .= "SELECT * FROM `tbanswer` WHERE ";
                                }
                                
                                $sql_query .= "`clQsID` = '$tbQuestion_clQsID'";
                                
                                if(($question_count+1) == count($tbQuestion_data)) {
                                    $sql_query .= ";";
                                }
                                else {
                                    $sql_query .= " OR ";
                                }
                            } 
                            $fetch_sql_query = mysqli_query($connectdb, $sql_query);
                            if($fetch_sql_query){
                                while($tbAnswer_row = mysqli_fetch_array($fetch_sql_query)){
                                    // $tbAnswer_row['clAsBody'] = nl2br($tbAnswer_row['clAsBody']);// Convert \n to <br>
                                    $tbAnswer_data[] = $tbAnswer_row;
                                }
                            }
                            else{
                                echo mysqli_error($connectdb);
                            }
                            // (tbAnswer)Fetch Answers Data======================================================================(END)
                            // (tbuserexam)Fetch Questions ID======================================================================(START)
                            $sql_query = "SELECT `clUeID` FROM `tbuserexam` ORDER BY `clUeID` DESC LIMIT 0, 1;";
                            $fetch_sql_query = mysqli_query($connectdb, $sql_query);
                            if($fetch_sql_query){
                                if(mysqli_num_rows($fetch_sql_query) > 0) { // Exam Exists
                                    $tbuserexam_clUeID_topID = mysqli_fetch_array($fetch_sql_query)['clUeID'];
                                }
                            }
                            else{
                                echo mysqli_error($connectdb);
                            }
                            // (tbuserexam)Fetch Questions ID======================================================================(END)
                        }
                        else { // If $tbQuestion_data is empty
                            // Error 404 here
                            $examID = -1;
                        }
                    }
                    else { // Exam does NOT Exist/Published
                        // Error 404 here
                        $examID = -1;
                    }
                }
                else{
                    echo mysqli_error($connectdb);
                }
                // (tbExam)Fetch Exams ID======================================================================(END)
            }
        }
        else if($_REQUEST) { // If request have other than "exam_id", either empty or with value (e.g. ?e= OR ?test)
            // Error 404 here
            $examID = -1;
        }
        else { // If there is no request (e.g. *Nothing* OR ?)
            // Error 404 here
            $examID = -1;
        }
        
        if($examID > 0) {
            //Close Connection
            mysqli_close($connectdb);
        }
        else if($examID == -1) {
            //Close Connection
            mysqli_close($connectdb);
            
            header("location: ../includes/error.php");
        }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Erovoutika - Exam</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap -->
        <link
          href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css"
          rel="stylesheet"
          integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6"
          crossorigin="anonymous"
        />

        <!-- Bootstrap Icons -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" />

        <!-- Custom CSS -->
        <link rel="stylesheet" href="../css/QuestionPageStyle.css">
        <link rel="stylesheet" href="../css/UserProfileStyle.css">

        <!-- Scripts -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script type="text/javascript" src="../javascript/global-scripts.js"></script>
    </head>

    <body>
        <?php include(__DIR__."/../webclient/userNav.php")?>

        <main class="container mt-3 mb-3 bg-light">
            <!-- Upper Panel -->
            <div class="row">
                <div class="col border-5 border-bottom border-primary mt-4">
                    <h1 id="i-h--examtaker-examName"></h1>
                </div>

                <!-- List Icon -->
                <button type="button" class="btn btn-primary col-md-auto mt-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
                  <i class="bi bi-card-checklist"></i>
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                          <div class="row">
                             <div class="card bg-primary" style="width: 1rem; height: 10px;"></div><span>Answered</span>
                          </div>
                          <div class="row">
                              <div class="card bg-danger" style="width: 1rem; height: 10px;"></div>
                              <span>Unanswered</span>
                          </div>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>

                      <div class="modal-body ms-3">
                        <div class="row" id="ans_unans_progress">
                          
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Modal -->
            </div>
            <!-- Upper Panel -->

            <!-- =========================================== Exam Information =========================================== -->
            <div class="c-div--examtaker-display" id="i-div--examtaker-examinfo-display">
                <div class="container-fluid bg-light">
                    <div class="main-body">
                        <div class="row gutters-sm mt-4">
                            <div>
                                <div class="card mb-3" id="upperpanel">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <h3 class="mb-0">Exam ID</h3>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <h5 id="i-h--examtaker-examID"></h5>    
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <h3 class="mb-0">Description</h3>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <h5 id="i-h--examtaker-examDesc"></h5>    
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <h3 class="mb-0">Instructions</h3>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <h5 id="i-h--examtaker-examInst"></h5>    
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row mt-1 mb-1">
                                            <div class="col-sm-12">
                                                <a class="btn btn-info bg-primary" id="i-button--examtaker-takeExam" style="color: white;" target="__blank">Take Exam</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- =========================================== Questions =========================================== -->
            <div id="i-div--examtaker-questions-display"></div>
        <!-- Bottom Panel -->
        </main>

        <footer>
            <div class="text-center p-3" style="background-color: #0F3695"></div>
        </footer>

        <!-- Bootstrap -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

        <!-- Custom Javascript -->
        <script type="text/javascript">
            // Transfer fetched 'items' table from the stored 2D-array on PHP to a 2D-array on JavaScript
            var examID = <?php echo json_encode($examID); ?>;
            var tbExam_data = <?php echo json_encode($tbExam_data); ?>;
            var tbQuestion_data = <?php echo json_encode($tbQuestion_data); ?>;
            var tbAnswer_data = <?php echo json_encode($tbAnswer_data); ?>;
            var curr_clUrID_value = <?php echo $_SESSION['clUrID']; ?>;
            var tbuserexam_clUeID_topID = <?php echo json_encode($tbuserexam_clUeID_topID + 1); ?>;
        </script>
        <script type="text/javascript" src="../javascript/examtaker.js"></script>
    </body>
</html>
<?php
    }else
    {
        if($_SESSION['admin_sid']==session_id()){
            header("location:../includes/error.php");		
        }
        else{
            header("location:../login_template.php");
        }
    }
?>
