<?php 
?>


<header class="bg-white border-5 border-bottom border-primary">
        <nav class="navbar navbar-expand-lg navbar-light ms-4 me-4">
            <a class="navbar-brand mr-07" href="#"><img src="../images/Logo2.png" style="height: 60px;"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse ml-7" id="navbarTogglerDemo03">
                <div class="navbar-nav float-end text-end pr-3">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-item nav-link text-dark mt-3" href="/src/webexam/UserExamList.php">Exam List</a></li>
                        <li class="nav-item">
                    <div class="btn-group">
                      <button type="button" class="btn dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-person-fill"></i>
                      </button>
                      <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="/src/webclient/UserProfile.php"><i class="bi bi-person-circle me-2"></i>Profile</a></li>
                        <li><a class="dropdown-item" href="/src/webclient/Settings.php"><i class="bi bi-gear-fill me-2"></i>Settings</a></li>
                        <li><a class="dropdown-item" href="/src/webclient/UserTransaction.php"><i class="bi-credit-card me-2"></i>Transactions</a></li>
                        <li><a class="dropdown-item" href="/src/includes/logout.php"><i class="glyphicon me-2">&#xe017;</i>Logout</a></li>
                    </ul>
                    </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
</header>