<?php 
  $clUrID = $_SESSION['clUrID'];
  $clUrUsername = $_SESSION['clUrUsername'];

  // User profile photo
  $result = mysqli_query($connectdb, "SELECT clUrPhoto from tbusers where clUrID = $clUrID;");
  $nav = $result->fetch_assoc();
?>
<head>
    <link rel="stylesheet" href="/src/css/admin_navbar.css">
</head>

<header class="header shadow" id="header">
            <div class="header_toggle"> 
                <i class='bx bx-menu' id="header-toggle"></i> 
            </div>
            <div class="profile__container" id="i--account--admin">
                <div class="header_img"> 
                    <a href="AdminHome.php">
                        <?php 
                            

                            if (!$nav['clUrPhoto']){
                                echo '<img src="/src/images/Display Picture Icon.png" alt="display picture">';
                            }
                            else{
                                echo '<img src="/src/images/user images/'. $nav['clUrPhoto'] .'" alt="display picture">';
                            }
                        ?>
                    </a>
                </div>
                <div>
                    <button type="button" class="btn ms-4">
                        <a href="../includes/logout.php" class="fw-bold" id="i--button--logout">Logout</a>
                    </button>
                </div>
            </div>
        </header>
        <div class="l-navbar" id="nav-bar">
            <nav class="nav">
                <div> 
                    <!-- Admin Home with Logo -->
                    <a href="/" class="nav_logo"> 
                        <i>
                            <img src="/src/images/Small Logo.png" alt="Erovoutika Logo" id="i--logo--erovoutika">
                        </i> 
                        <span class="nav_logo-name fs-5 fw-bold">Erouvotika</span> 
                    </a>
                    <div class="nav_list"> 
                        <a href="AdminHome.php" class="nav_link <?php if(strpos($_SERVER["REQUEST_URI"], "AdminHome"))  echo "active" ?>"> 
                            <i class='bx bx-grid-alt nav_icon'></i> 
                            <span class="nav_name">Dashboard</span> 
                        </a> 
                        <a href="AdminProfile.php" class="nav_link <?php if(strpos($_SERVER["REQUEST_URI"], "AdminProfile"))  echo "active" ?> ">
                            <i class='bx bx-user nav_icon'></i> 
                            <span class="nav_name fw-bold">Edit Profile</span> 
                        </a>
                        <a href="admin_usertable.php" class="nav_link <?php if(strpos($_SERVER["REQUEST_URI"], "admin_usertable"))  echo "active" ?>"> 
                            <i class='bx bx-table nav_icon'></i>
                            <span class="nav_name">User Table</span> 
                        </a> 
                        <a href="AdminExamList.php" class="nav_link <?php if(strpos($_SERVER["REQUEST_URI"], "AdminExamList"))  echo "active" ?>"> 
                            <i class='bx bx-message-square-detail nav_icon'></i> 
                            <span class="nav_name">Exam List</span> 
                        </a>
                        <a href="AdminTransaction.php" class="nav_link <?php if(strpos($_SERVER["REQUEST_URI"], "AdminExamList"))  echo "active" ?>"> 
                            <i class='bx bx-bar-chart-alt-2 nav_icon'></i> 
                            <span class="nav_name">Transaction List</span> 
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