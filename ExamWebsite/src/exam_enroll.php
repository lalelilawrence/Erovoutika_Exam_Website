<?php 
include_once '../src/includes/connectdb.php';
 // if($_SESSION['client_sid'] == null){
 //     echo "<script>";
 //     echo "window.location = '../src/login.php';";
 //     echo "</script>";
 // }
$searchInput;
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/exam_enroll_style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>  <script src="https://kit.fontawesome.com/24d5cf3efd.js" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
  <title>Enroll</title>
</head>
<body>
    <div id="paymentMessage" class="payment__container">
        <?php if (!(empty($_SESSION["admin_sid"]) && empty($_SESSION["client_sid"]))):?>
        <section class="payment_section">
            <div class="bg-dark text-white payment_info__containter" >
                
                <fieldset>
                    

                    <p>You are about to be redirected to the Payment Portal. Are you sure that you want to apply for: </p>

                    <legend id="fieldLegend" class="fw-bold">Test</legend>

                    <p>For an amount of:</p>

                    <span id="fieldAmount" class="fs-4 mt-0">00</span>

                    <!-- <label for="payMethod"> Please Select your payment plans: </label>
                    <select id = "payMethod" class="form-select">
                        <option  value="1">mastercard</option>
                        <option  value="2">gcash</option>
                        <option  value="3">maya</option>
                        <option  value="4">bpi</option>
                    </select> -->

                    </br>

                    <!-- <label for="payPlan">  Please select payment type:  </label>
                    <select id = "payPlan" class="form-select">
                        <option value="1">6 monthly payments</option>
                        <option value="2">One-time payment</option>
                    </select> -->
                    
                    <div class="mt-2">
                        <button id = "payBtn" class="btn btn-secondary">Apply Now</button>
                        <button id = "closePayBtn" class="btn btn-danger">Close</button>
                    </div>
                </fieldset> 
            </div>
        </section>
        <?php else: ?>
        <section class="payment_section">
            <div class="bg-dark text-white payment_info__containter" >
                
                <fieldset>
                    <h4>Login Required!</h4>

                     
                    <a href="login.php" style="text-decoration: none;">
                        <button type="button" class="btn btn-secondary">Login</button>
                    </a>
                    <button type="button" id = "closePayBtn" class="btn btn-danger">Close</button>
                </fieldset> 
            </div>
        </section>
        <?php endif; ?>
    </div>
<!-- Navigation Bar -->
    <?php include_once __DIR__."/includes/header.php"?>

    

    <!-- Multi-Step Table Form -->
        <div id="multi_step_form">
            <div class="container">
                <div id="multistep_nav">
                    <div class="progress_holder">
                    </div>
                    <div class="progress_holder">
                    </div>
                    <div class="progress_holder">
                    </div>
                    <div class="progress_holder">
                    </div>
                    <div class="progress_holder">
                    </div>
                </div>
                <form class="d-flex" method="POST">
                    <div class="search-box" style="height: 25vh; display: flex;">
                        <input type="text" autocomplete="off" placeholder="Search Exam" id = "searchExam" name = "search" style="margin: auto auto;"/>
                            <?php
                                error_reporting(0);
                                $searchInput=$_POST['search'];
                                error_reporting(E_WARNING);
                            ?>
                            <div class="result">
                        </div>
                    </div>
                </form>

        <!-- Exam Card -->

        <?php
        $stepNum = 1;
        $betStart = 0;
        $betEnd = 6;
        $examCount = 0;
        $total = $connectdb->query("SELECT COUNT(*) FROM tbexam");
        $row = $total->fetch_array(MYSQLI_NUM);
        $pages = ceil($row[0]/6);
        for($i=0;$i<$pages;$i++){
            echo '<fieldset class="step" id="step'.$stepNum.'">';
            if($stepNum > 1){
                echo '<div class="prevStep" style="border-color: #0035c6;">Prev</div>';
            }
            echo '<div class="exam_container">';
            echo '<div class="row">';
            if(empty($searchInput) || $searchInput == null || $searchInput == ""){
                // $res = $connectdb->query("SELECT * FROM `tbexam` WHERE clExID BETWEEN ".$betStart." AND ".$betEnd."");
                $res = $connectdb->query("SELECT * FROM `tbexam` WHERE clExPublishedBy IS NOT NULL LIMIT $betStart,  6");

            }
            else{
                if($stepNum == 1){
                    $res = $connectdb->query("SELECT * FROM `tbexam` WHERE clExName LIKE '%".$searchInput."%' LIMIT 6");
                }
                else{
                    $res = $connectdb->query("SELECT * FROM `tbexam` WHERE clExName LIKE '%".$searchInput."%' LIMIT 6,6");
                }
            }
            while($row3 = $res->fetch_array(MYSQLI_NUM)){
                $userFkRes = $connectdb->query("SELECT * FROM tbusers WHERE clUrID = ".$row3[6]."");
                $userData;
                while($userFkRow = $userFkRes->fetch_array(MYSQLI_NUM)){
                    $userData = $userFkRow;
                }
                
                echo '<div class="col-sm-4 py-4">';
                echo '<div class="card h-200">';
                echo '<div class="card-body border border-3 border-primary rounded ">';
                echo '<h2 class="d-flex border-5 border-bottom border-primary mb-4"  id="testTitle'.$row3[0].'">';
                echo  $row3[1];
                echo '</h2>';
                echo '<table>';
                echo '<tr><td colspan = 2>'.$row3[2].'</td></tr>';
                echo '<tr><td colspan = 2><b>Instructions: </b>'.$row3[3].'</td></tr><tr><td><b>Publisher: </b>'.$userData[1].' '.$userData[2].'</td>';
                echo '<td><b>Price:</b><span id="examPrice'.$row3[0].'">'.$row3[9].'</span></td></tr><tr><td colspan=2><b>Publish Date: </b>'.$row3[7].'</td></tr>';
                echo '</table>';
                echo '<div><button type="button" class="btn btn-primary" id="'.$row3[0].'" onclick="enroll(this)">Take Quiz</button></div>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
                
            }
            echo '</div>';
            $res2 = $connectdb->query("SELECT COUNT(`clExID`) FROM `tbexam` WHERE clExName LIKE '%".$searchInput."%'");
            while($row2 = $res2->fetch_array(MYSQLI_NUM)){
                $examCount = $row2[0];
            }
            if($examCount > $betEnd){
                echo '<div class="nextStep" style="border-color: #0035c6;">Next</button></div>';
            }
            echo '</fieldset>';
            $stepNum += 1;
            $betStart += 6;
            $betEnd += 6;
        }
        ?>

        
        </div>

        <!-- Search Bar -->
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

            <script>
            $(document).ready(function(){
                $('.search-box input[type="text"]').on("keyup input", function(){
                    /* Get input value on change */
                    var inputVal = $(this).val();

                    var resultDropdown = $(this).siblings(".result");
                    if(inputVal.length){
                        $.get("backend-search.php", {term: inputVal}).done(function(data){
                            // Display the returned data in browser
                            resultDropdown.html(data);
                        });
                    } else{
                        resultDropdown.empty();
                    }
                });
                
                // Set search input value on click of result item
                $(document).on("click", ".result p", function(){
                    $(this).parents(".search-box").find('input[type="text"]').val($(this).text());
                    $(this).parent(".result").empty();
                });
            });
            </script>
            

            <!-- Multi Table-->
            <script>
                  // start //
                $('.progress_holder:nth-child(1)').addClass('activated_step');

                // Manage next and previous buttons //
                $(".nextStep").click(function(){
                // button is inside fieldset so set current and next vars //
                current_fs = $(this).parents('fieldset');
                next_fs = $(this).parents('fieldset').next();
                // make sure all fields are filled in //
                var empty = current_fs.find("input.required-field").filter(function() {
                    return this.value === "";
                });
                if (empty.length) {
                    alert('Please fill in all fields.');
                } else {
                //show the next fieldset
                next_fs.fadeIn(150,'linear').addClass('current');
                //hide the current fieldset with style
                current_fs.fadeOut(0,'linear').removeClass('current');
                // change nav class //
                if ($('fieldset.current').attr('id') == 'step2') {
                    $('.progress_holder:nth-child(2)').addClass('activated_step');
                }
                if ($('fieldset.current').attr('id') == 'step3') {
                    $('.progress_holder:nth-child(3)').addClass('activated_step');
                }
                if ($('fieldset.current').attr('id') == 'step4') {
                    $('.progress_holder:nth-child(4)').addClass('activated_step');
                }
                if ($('fieldset.current').attr('id') == 'step5') {
                    $('.progress_holder:nth-child(5)').addClass('activated_step');
                }
                }
                });
                $(".prevStep").click(function(e){
                e.preventDefault();
                    current_fs = $(this).parents('fieldset');
                    previous_fs = $(this).parents('fieldset').prev();
                    //show the previous fieldset
                    previous_fs.fadeIn(150,'linear');
                    //hide the current fieldset with style
                    current_fs.fadeOut(0,'linear');

                    if ($(previous_fs).attr('id') == 'step1') {
                    $('.progress_holder:nth-child(2)').removeClass('activated_step');
                    }
                    if ($(previous_fs).attr('id') == 'step2') {
                    $('.progress_holder:nth-child(3)').removeClass('activated_step');
                    }
                    if ($(previous_fs).attr('id') == 'step3') {
                    $('.progress_holder:nth-child(4)').removeClass('activated_step');
                    }
                    if ($(previous_fs).attr('id') == 'step4') {
                    $('.progress_holder:nth-child(5)').removeClass('activated_step');
                    }
                });

            </script>

        
        <script type="text/javascript">
            var paymentMessage = document.getElementById("paymentMessage");
            var closePayBtn = document.getElementById("closePayBtn");
            var payBtn = document.getElementById("payBtn");
            var searchVal = document.getElementById("searchExam");
            var searchTxt = searchVal.value;
            var paymentLegend = document.getElementById("fieldLegend");
            var paymentPopup = document.getElementById("fieldAmount");

            var id;

            
            closePayBtn.addEventListener("click", closePay);
            
                
            function enroll(x){
                id = $(x).attr('id');
                console.log(id)

                <?php if(!(empty($_SESSION["admin_sid"]) && empty($_SESSION["client_sid"]))):?> 

                let testTitle = document.getElementById("testTitle"+id);

                let paymentPrice = document.getElementById("examPrice"+id);

                paymentLegend.innerHTML = testTitle.innerHTML;
                paymentPopup.innerHTML = paymentPrice.innerHTML;
                <?php endif;?>

                paymentMessage.style.visibility="visible";
                
            }
            function closePay(){
                paymentMessage.style.visibility="hidden";
            }
            function paySubmit(){
                var payPlan = document.getElementById("payPlan");
                var payMethod = document.getElementById("payMethod");
                // var payPlanVal = payPlan.value;
                // var payMethodVal = payMethod.value;
                $(document).ready(function(){
                    $.ajax({
                        url: "/src/payment/payment_intent.php" ,
                        type: "POST", 
                        data: {
                            type: "create",
                            exam_id: id,
                            price: paymentPopup.innerHTML
                             <?php if(!(empty($_SESSION["admin_sid"]) && empty($_SESSION["client_sid"]))) echo ',user_id: '.$_SESSION['clUrID'] ?? null.'';?>
                        },
                        dataType: "json",
                        cache: false,
                        success: (data) => {
                            // alert(data.query)
                            console.log(data.query)
                            window.location.href="payment.php?eid="+id+"&pid="+data.pi+"&uid="+data.u+"";
                        },
                        fail: (data) =>{
                            alert("NOT PROCESSED")
                        }
                    })
                })
                
            }

            payBtn.addEventListener("click", paySubmit);
            paymentMessage.style.visibility="hidden";
            
        </script>

        <footer class="bg-light text-center text-white">
        <!-- Grid container -->
        <div class="container p-4 pb-0">
            <!-- Section: Social media -->
            <section class="mb-4">
            <!-- Facebook -->
            <a
                class="btn text-white btn-floating m-1"
                style="background-color: #3b5998;"
                href="#!"
                role="button"
                ><i class="fab fa-facebook-f"></i
            ></a>

            <!-- Twitter -->
            <a
                class="btn text-white btn-floating m-1"
                style="background-color: #55acee;"
                href="#!"
                role="button"
                ><i class="fab fa-twitter"></i
            ></a>

            <!-- Google -->
            <a
                class="btn text-white btn-floating m-1"
                style="background-color: #dd4b39;"
                href="#!"
                role="button"
                ><i class="fab fa-google"></i
            ></a>

            <!-- Instagram -->
            <a
                class="btn text-white btn-floating m-1"
                style="background-color: #ac2bac;"
                href="#!"
                role="button"
                ><i class="fab fa-instagram"></i
            ></a>

            <!-- Linkedin -->
            <a
                class="btn text-white btn-floating m-1"
                style="background-color: #0082ca;"
                href="#!"
                role="button"
                ><i class="fab fa-linkedin-in"></i
            ></a>
            <!-- Github -->
            <a
                class="btn text-white btn-floating m-1"
                style="background-color: #333333;"
                href="#!"
                role="button"
                ><i class="fab fa-github"></i
            ></a>
            </section>
            <!-- Section: Social media -->
        </div>
        <!-- Grid container -->

        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: #0F3695;">
            © 2022 Copyright:
            <a class="text-white" href="#">erovoutika.com.ph</a>
        </div>
        <!-- Copyright -->
        </footer>
</body>
</html>
