<?php 
include_once __DIR__."/connectdb.php";
$to_home = "#home";

$index = array("/", "/index.php");

if (!in_array($_SERVER['REQUEST_URI'], $index)) { 
  $to_home = "/../index.php";
}

// echo "<pre>";
// var_dump($_SESSION);
// echo "</pre>";

?>


  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/src/css/header_style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
  </head>
 

    <header>

      <a href="<?php echo $to_home?>" class="brand"><img src="/src/images/Logo2.png" id="logo"></a>
      <div class="menu" id="menu-icon">
          <div class="btn">
            <i class="fas fa-times close-btn"></i>
          </div>
          <div class="basicNav">
            <a href="<?php echo $to_home?>">Home</a>
            <a href="<?php if (!in_array($_SERVER['REQUEST_URI'], $index)) echo $to_home;?>#about-section">About</a>
            <a href="/src/blog.php">Blog</a>
            <a href="/src/exam_enroll.php">Exam&nbsp;List</a>
            <a href="/src/learn.php">Tutorial</a>
          </div>
          <div class="userNav">
          <?php if (empty($_SESSION["admin_sid"]) && empty($_SESSION["client_sid"])):?>
            <a href="/src/login.php">Login</a>
            <a href="/src/signup.php">
              <button id="signupbtn">
                Signup
              </button>
            </a>
          <?php else: ?>
            <!-- <a href="#">Users</a> -->
            
            
            <button id="signupbtn" type="button" onclick="showOptions()"><?php echo $_SESSION['clUrUsername'];?></button>

            <div class="userOptions" style="" id="userOptions">
              <ul>
                <?php if(!empty($_SESSION["client_sid"])): ?>
                <li><a href="/src/webclient/UserProfile.php">My Profile</a></li>
                <li><a href="/src/webexam/UserExamList.php">My Exams</a></li>
                <li><a href="/src/webexam/UserTransaction.php">Tranactions</a></li>
                <li><a href="/src/includes/logout.php">Logout</a></li>
                <?php else: ?>
                <li><a href="/src/webadmin/AdminHome.php">Dashboard</a></li>
                <li><a href="/src/webadmin/admin_usertable.php">User List</a></li>
                <li><a href="/src/webadmin/AdminExamList.php">Exam List</a></li>
                <li><a href="/src/webadmin/AdminTransaction.php">Transactions</a></li>
                <li><a href="/src/includes/logout.php">Logout</a></li>
                <?php endif; ?>
              </ul>

            </div>
          <?php endif; ?>
          
          </div>
        </div>
        
          
      <div class="btn">
        <i class="fas fa-bars menu-btn"></i>
      </div>
    </header>  
    

    <script>
      //Javascript for Navigation effect on scroll
      window.addEventListener("scroll", function(){
        var header = document.querySelector("header");
        header.classList.toggle('sticky', window.scrollY > 0);
      });
      window.onscroll = function() {scrollFunction()};

      function scrollFunction() {
        if (document.body.scrollTop > 85 || document.documentElement.scrollTop > 85) {
          document.getElementById("logo").style.height = "40px";
          document.getElementById("logo").src="/src/images/Logo2light.png";
        } else {
          document.getElementById("logo").style.height = "80px";
          document.getElementById("logo").src="/src/images/Logo2.png";
        }
      }

      const userOptions = document.getElementById('userOptions');
      // const usersButton = document.getElementById('signupbtn')

      function showOptions() {
        userOptions.classList.toggle("show-option")
      }

      //Javascript for responsive navigation sidebar Nav
      var menu = document.querySelector('.menu');
      var login = document.querySelector('.userNav')
      var menuBtn = document.querySelector('.menu-btn');
      var closeBtn = document.querySelector('.close-btn');
      


      menuBtn.addEventListener("click", () => {
        menu.classList.add('active');
        loginNav.classList.add('active');
      });

      closeBtn.addEventListener("click", () => {
        menu.classList.remove('active');
        loginBav.classList.remove('active');
      });
    </script>
  