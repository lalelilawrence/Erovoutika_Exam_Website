<?php
    //Open Connection
    include '../includes/connectdb.php';
	if($_SESSION['admin_sid']==session_id()) {
        /*
        Legend:
            $examID:
                -1 = Error/Exam Not Found
                0 = New Exam
                n>0 = Edit Exisiting Exam
        */
        $examID = -1;
        $tbExam_data = null;
        $tbQuestion_data = null;
        $tbAnswer_data = null;
        $tbQuestion_data_topID = 1;
        $tbExam_data_topID = 1;
        $clExLastEditedBy_username = null;
        $clExPublishedBy_username = null;

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
                $sql_query = "SELECT * FROM `tbExam` WHERE `clExID` = '$examID';";
                $fetch_sql_query = mysqli_query($connectdb, $sql_query);
                if($fetch_sql_query){
                    if(mysqli_num_rows($fetch_sql_query) > 0) { // Exam Exists
                        $tbExam_data = mysqli_fetch_array($fetch_sql_query);
                        $clExLastEditedBy_id = $tbExam_data['clExLastEditedBy'];
                        $clExPublishedBy_id = $tbExam_data['clExPublishedBy'];
                        
                        // (tbusers)Fetch Users Data======================================================================(START)
                        $sql_query = "SELECT `clUrUsername` FROM `tbusers` WHERE `clUrID` = '$clExLastEditedBy_id';";
                        $fetch_sql_query = mysqli_query($connectdb, $sql_query);
                        if($fetch_sql_query){
                            $clExLastEditedBy_username = mysqli_fetch_array($fetch_sql_query);
                        }
                        else{
                            echo mysqli_error($connectdb);
                        }
                        // (tbusers)Fetch Users Data======================================================================(END)
                        // (tbusers)Fetch Users Data======================================================================(START)
                        $sql_query = "SELECT `clUrUsername` FROM `tbusers` WHERE `clUrID` = '$clExPublishedBy_id';";
                        $fetch_sql_query = mysqli_query($connectdb, $sql_query);
                        if($fetch_sql_query){
                            $clExPublishedBy_username = mysqli_fetch_array($fetch_sql_query);
                        }
                        else{
                            echo mysqli_error($connectdb);
                        }
                        // (tbusers)Fetch Users Data======================================================================(END)
                        // (tbQuestion)Fetch Questions Data======================================================================(START)
                        $sql_query = "SELECT * FROM `tbQuestion` WHERE `clExID` = '$examID';";
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
                            // (tbQuestion)Fetch Questions ID======================================================================(START)
                            $sql_query = "SELECT `clQsID` FROM `tbQuestion` ORDER BY `clQsID` DESC LIMIT 0, 1;";
                            $fetch_sql_query = mysqli_query($connectdb, $sql_query);
                            if($fetch_sql_query){
                                if(mysqli_num_rows($fetch_sql_query) > 0) { // Exam Exists
                                    $tbQuestion_data_topID = mysqli_fetch_array($fetch_sql_query)['clQsID'];
                                }
                            }
                            else{
                                echo mysqli_error($connectdb);
                            }
                            // (tbQuestion)Fetch Questions ID======================================================================(END)
                            // (tbAnswer)Fetch Answers Data======================================================================(START)
                            $sql_query = "";
                            for($question_count = 0; $question_count < count($tbQuestion_data); $question_count++) {
                                $tbQuestion_clQsID = $tbQuestion_data[$question_count]['clQsID'];
                                if($question_count == 0) {
                                    $sql_query .= "SELECT * FROM `tbAnswer` WHERE ";
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
                        }
                    }
                    else { // Exam does NOT Exist
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
            // If there is no request, Add New Exam here...
            $examID = 0;
            // (tbQuestion)Fetch Exams ID======================================================================(START)
            $sql_query = "SELECT `clExID` FROM `tbExam` ORDER BY `clExID` DESC LIMIT 0, 1;";
            $fetch_sql_query = mysqli_query($connectdb, $sql_query);
            if($fetch_sql_query){
                if(mysqli_num_rows($fetch_sql_query) > 0) { // Exam Exists
                    $tbExam_data_topID = mysqli_fetch_array($fetch_sql_query)['clExID'];
                }
            }
            else{
                echo mysqli_error($connectdb);
            }
            // (tbQuestion)Fetch Exams ID======================================================================(END)
            // (tbQuestion)Fetch Questions ID======================================================================(START)
            $sql_query = "SELECT `clQsID` FROM `tbQuestion` ORDER BY `clQsID` DESC LIMIT 0, 1;";
            $fetch_sql_query = mysqli_query($connectdb, $sql_query);
            if($fetch_sql_query){
                if(mysqli_num_rows($fetch_sql_query) > 0) { // Exam Exists
                    $tbQuestion_data_topID = mysqli_fetch_array($fetch_sql_query)['clQsID'];
                }
            }
            else{
                echo mysqli_error($connectdb);
            }
            // (tbQuestion)Fetch Questions ID======================================================================(END)
        }
        
        if($examID >= 0) {
            //Close Connection
            //mysqli_close($connectdb);
        }
        else if($examID == -1) {
            //Close Connection
            //mysqli_close($connectdb);
            
            header("location: ../includes/error.php");
        }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Erovoutika Exam Website - Admin</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">

 
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
        <link rel="stylesheet" href="../css/admin_exameditor_style.css">
        
        <!-- Scripts -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script type="text/javascript" src="../javascript/global-scripts.js"></script>
    </head>

    <body id="body-pd">
        <header class="header shadow" id="header">
            <div class="header_toggle"> 
                <i class='bx bx-menu' id="header-toggle"></i> 
            </div>
            <div id="i--account--admin">
                <div class="header_img"> 
                    <a href="AdminHome.php">
                        <?php
                            $clUrID = $_SESSION['clUrID'];
                            $result = mysqli_query($connectdb, "SELECT clUrPhoto from tbusers where clUrID = $clUrID;");
                            $row = $result->fetch_assoc(); 
                            
                            if ($row['clUrPhoto'] == ""){
                                echo '<img src="../images/Display Picture Icon.png" alt="display picture">';
                            }
                            else{
                                echo "<img src='../images/user images/". $row['clUrPhoto'] ."' alt='display picture'>";
                            }
                        ?>
                    </a>
                </div>
                <div>
                    <button type="button" class="btn ms-4 mt-2">
                        <a href="../includes/logout.php" class="fw-bold" id="i--button--logout">Logout</a>
                    </button>
                </div>
            </div>
        </header>

        <div class="l-navbar" id="nav-bar">
            <nav class="nav">
                <div> 
                    <!-- Admin Home with Logo -->
                    <a href="AdminHome.php" class="nav_logo"> 
                        <i>
                            <img src="../images/Small Logo.png" alt="Erovoutika Logo" id="i--logo--erovoutika">
                        </i> 
                        <span class="nav_logo-name fs-5 fw-bold">Erouvotika</span> 
                    </a>
                    <div class="nav_list"> 
                        <a href="AdminHome.php" class="nav_link"> 
                            <i class='bx bx-grid-alt nav_icon'></i> 
                            <span class="nav_name">Dashboard</span> 
                        </a> 
                        <a href="AdminProfile.php" class="nav_link">
                            <i class='bx bx-user nav_icon'></i> 
                            <span class="nav_name">Edit Profile</span> 
                        </a>
                        <a href="admin_usertable.php" class="nav_link"> 
                            <i class='bx bx-table nav_icon'></i>
                            <span class="nav_name">User Table</span> 
                        </a> 
                        <a href="AdminExamList.php" class="nav_link active"> 
                            <i class='bx bx-message-square-detail nav_icon'></i> 
                            <span class="nav_name fw-bold">Exam List</span> 
                        </a>
                    </div>
                </div> 
                    <a href="adminsignup_template.php"  class="btn btn-primary ms-3 mb-3">
                        <i class="bi bi-pencil-square"></i> 
                        <span class="nav_name" id="i--label--signout">Sign Up</span>
                    </a>
                </div> 
            </nav>
        </div>

        <!--Container Main start-->
        <div class="height-100" id="i--container--mainContent">
            <!-- Edit Exam -->
            <form id="i-form--exam" class="c-form--exam" name="form_exam" value="Update Exam" method="POST" action="../crud/admin_exameditor_update.php" onsubmit="modifyExam(this.name,null); return false;">
                <div class="row mx-5">
                    <div class="container m-3">
                        <div class="card">
                            <div class="card-body m-3">
                                <!-- Edit Exam -->
                                <div class="row mt-1">
                                    <div class="col display-6">
                                        EDIT EXAM
                                    </div>
                                </div>
                                <!-- Blue Line -->
                                <div class="row">
                                    <div class="col-3" id="i--line--blue"></div>
                                </div>
                                <!-- Exam Container -->
                                <div class="row m-2" id="i-div--examinfo-display">
                                    <div class="container">
                                        <div class="row">
                                            <!-- Exam ID -->
                                            <div class="row">
                                                <div class="card mt-3-examid">
                                                    <div class="card-body m-1">
                                                        <div class="row">
                                                            <div class="col-12 mt-1">
                                                                <label for="i--input--examID" class="card-title text-primary text-uppercase fs-3 fw-bold form-label">
                                                                    Exam ID: 
                                                                </label>
                                                                <label class="card-title text-primary text-uppercase fs-3 form-label" id="i-label--exameditor-examID"></label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Exam Publish Status -->
                                            <div class="row">
                                                <div class="card mt-3-exampubstat">
                                                    <div class="card-body m-1">
                                                        <div class="row">
                                                            <div class="col-12 mt-1">
                                                                <label for="i--input--examPublish" class="card-title text-primary text-uppercase fs-3 fw-bold form-label">
                                                                    Exam Publish Status: 
                                                                </label>
                                                                <label class="card-title text-primary text-uppercase fs-3 form-label" id="i-label--exameditor-examPublish"></label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Last Edited By -->
                                            <div class="row">
                                                <div class="card mt-3-lastedit">
                                                    <div class="card-body m-1">
                                                        <div class="row">
                                                            <div class="col-12 mt-1">
                                                                <label for="i--input--examLastEditedBy" class="card-title text-primary text-uppercase fs-3 fw-bold form-label">
                                                                    Last Edited By: 
                                                                </label>
                                                                <label class="card-title text-primary text-uppercase fs-3 form-label" id="i-label--exameditor-examLastEditedBy"></label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Published By -->
                                            <div class="row">
                                                <div class="card mt-3-pubby">
                                                    <div class="card-body m-1">
                                                        <div class="row">
                                                            <div class="col-12 mt-1">
                                                                <label for="i--input--examPublishedBy" class="card-title text-primary text-uppercase fs-3 fw-bold form-label">
                                                                    Published By: 
                                                                </label>
                                                                <label class="card-title text-primary text-uppercase fs-3 form-label" id="i-label--exameditor-examPublishedBy"></label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Exam Name -->
                                            <div class="row">
                                                <div class="card mt-3-examname">
                                                    <div class="card-body m-1">
                                                        <div class="row">
                                                            <div class="col-12 mt-1">
                                                            <label for="i-input--exameditor-examName" class="card-title text-primary text-uppercase fs-3 fw-bold form-label">
                                                                    Exam Name
                                                                </label>
                                                                <textarea name="clExName_value" class="form-control card-text text-dark fs-6" id="i-input--exameditor-examName" required></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Exam Info -->
                                            <div class="row">
                                                <div class="card mt-3-examdesc">
                                                    <div class="card-body m-1">
                                                        <div class="row">
                                                            <div class="col-12 mt-1">
                                                                <label for="i-input--exameditor-examDesc" class="card-title text-primary text-uppercase fs-3 fw-bold form-label">
                                                                    Exam Description
                                                                </label>
                                                                <textarea name="clExDescription_value" class="form-control card-text text-dark fs-6" id="i-input--exameditor-examDesc"  cols="30" rows="5" required></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Exam Instructions -->
                                            <div class="row">
                                                <div class="card mt-3-examinst">
                                                    <div class="card-body m-1">
                                                        <div class="row">
                                                            <div class="col-12 mt-1">
                                                            <label for="i-input--exameditor-examInst" class="card-title text-primary text-uppercase fs-3 fw-bold form-label">
                                                                    Exam Instructions
                                                                </label>
                                                                <textarea name="clExInstructions_value" class="form-control card-text text-dark fs-6" id="i-input--exameditor-examInst"  cols="30" rows="5"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Edit Question -->
                <div class="row mx-5">
                    <div class="container m-3">
                        <div class="card">
                            <div class="card-body m-3">
                                <!-- Edit Question -->
                                <div class="row mt-1">
                                    <div class="col display-6">
                                        EDIT QUESTION
                                    </div>
                                </div>
                                <!-- Blue Line -->
                                <div class="row">
                                    <div class="col-3" id="i--line--blue"></div>
                                </div>
                                <!-- Exam Container -->
                                <div class="row m-2">
                                    <div class="container">
                                        <div class="row" id="i-div--qa-empty"></div>
                                        <div class="row" id="i-div--qa-display"></div>
                                        <div class="row" id="i-div--exambuttons-display">
                                            <!-- Add Card -->
                                            <div class="card mt-3 invisible">
                                                <div class="card-body m-1">
                                                    <div class="row mt-3">
                                                        <div class="col-5 text-primary fs-2 fw-bold">
                                                            ADD NEW QUESTION
                                                        </div>
                                                        <div class="col-4">
                                                            <button class="btn btn-primary dropdown-toggle-selectques"
                                                                type="button"
                                                                id="dropdownMicroProcessor"
                                                                data-bs-toggle="dropdown" 
                                                                aria-expanded="false">
                                                                Button Dropdown
                                                            </button>
                                                            <ul class="dropdown-menu" aria-labelledby="dropdownMicroProcecsor">
                                                                <li><a class="dropdown-item" href="#">Microcontroller</a></li>
                                                                <li><a class="dropdown-item" href="#">Embedded Processor</a></li>
                                                                <li><a class="dropdown-item" href="#">DSP</a></li>
                                                                <li><a class="dropdown-item" href="#">Media Processor</a></li>
                                                            </ul>
                                                        </div>
                                                        <div class="col-3">
                                                            <button type="button" class="btn btn-primary fs-3">Add</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <!--Container Main end-->
        
        <footer>
            <!-- This is where the footer is -->
        </footer>

        <!-- Custom Javascript -->
        <script type="text/javascript" src="../javascript/admin_home_script.js"></script>
        <script type="text/javascript">
            // Transfer fetched 'items' table from the stored 2D-array on PHP to a 2D-array on JavaScript
            var examID = <?php echo json_encode($examID); ?>;
            if(examID > 0) {
                var tbExam_data = <?php echo json_encode($tbExam_data); ?>;
                var tbQuestion_data = <?php echo json_encode($tbQuestion_data); ?>;
                var tbAnswer_data = <?php echo json_encode($tbAnswer_data); ?>;
                var tbQuestion_data_topID = <?php echo json_encode($tbQuestion_data_topID); ?>;
                var clExLastEditedBy_username = <?php echo json_encode($clExLastEditedBy_username); ?>;
                var clExPublishedBy_username = <?php echo json_encode($clExPublishedBy_username); ?>;
                var curr_clUrID_value = <?php echo $_SESSION['clUrID']; ?>;
                var curr_clUrUsername_value = <?php echo json_encode($_SESSION['clUrUsername']); ?>;
            }
            else {
                var tbQuestion_data_topID = <?php echo json_encode($tbQuestion_data_topID); ?>;
                var tbExam_data_topID = <?php echo json_encode($tbExam_data_topID + 1); ?>;
                var curr_clUrID_value = <?php echo $_SESSION['clUrID']; ?>;
                var curr_clUrUsername_value = <?php echo json_encode($_SESSION['clUrUsername']); ?>;
            }
        </script>
        <script type="text/javascript" src="../javascript/admin-controlpanel-exameditor.js"></script>
        
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