<?php
include '../includes/connectdb.php';

if($_SESSION['client_sid']==session_id())
{
?>
<!DOCTYPE html>
<html lang="en">
     <head>
        <title>Erovoutika - Exam</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link
          href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css"
          rel="stylesheet"
          integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6"
          crossorigin="anonymous"
        />

        <!-- Bootstrap Script-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>

        <!-- Bootstrap Icons -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" />

        <!-- Custom CSS -->
        <link rel="stylesheet" href="../css/SettingsStyle.css">
    </head>

    <body>

    <?php
    $clUrID = $_SESSION['clUrID'];

    $userQuery = mysqli_query($connectdb, "SELECT * FROM tbusers where clUrID = '$clUrID'");
      while($row = mysqli_fetch_array($userQuery)){
        $clUrID = $row['clUrID'];
        $clUrUsername = $row['clUrUsername'];
        $clUrFirstname = $row['clUrFirstname'];
        $clUrLastname = $row['clUrLastname'];
        $clUrcontact_num = $row['clUrcontact_num'];
        $clUremail = $row['clUremail'];
        $clUraddress = $row['clUraddress'];
    }
    ?>
        <!-------------------------- HEADER ---------------------------->
       <?php include(__DIR__.'/userNav.php')?>


        <!-------------------------- DELETE ACC MODAL ---------------------------->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
             <div class="modal-dialog">
               <div class="modal-content">
                 <div class="modal-header">
                   <h5 class="modal-title text-danger" id="exampleModalLabel">Delete Account</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                 </div>
                 <div class="modal-body">
                    All data saved on this account will be deleted.<br><br>
                    Do you want to proceed?
                 </div>
                 <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger">
                        <?php
                            echo '<a href="../crud/tbusers_delete.php?clUrID='.$clUrID.'">' ?>
                            <div class="text-light">Delete Account</div>
                        <?php echo '</a>' ?>
                     </button>
                 </div>
              </div>
            </div>
        </div>
        
        <!-------------------------- SAVE MODAL ---------------------------->
        <div class="modal fade" id="SaveModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Success</h5>
              </div>
              <center><div class="modal-body">
                <i class="bi bi-check-circle-fill"></i>
                <br>
                <h5>Changes have been successfully saved!</h5>
              </div></center>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>

        <div class="container-fluid bg-light pt-3">
            <div class="main-body">
                <div class="row gutters">
            <!-------------------------- (SIDE) PERSONAL DETAILS ---------------------------->
                    <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="account-settings">
                                    <div class="user-profile">
                                        <div class="user-avatar">
                                            <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Maxwell Admin">
                                        </div>
                                        <h5 class="user-name"><?php echo $clUrUsername ?></h5>
                                        <h6 class="user-email"><?php echo $clUremail ?></h6>
                                    </div>
                                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                        <a class="nav-link active" id="profile-tab" data-toggle="pill" href="#profile" role="tab" aria-controls="account" aria-selected="true">
                                            <i class="fa fa-home text-center"></i>
                                            Edit Profile
                                        </a>

                                        <a class="nav-link" id="account-tab" data-toggle="pill" href="#account" role="tab" aria-controls="password" aria-selected="false">
                                            <i class="fa fa-key text-center"></i>
                                            Account Settings
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

        <!-------------------------- TAB CONTENT ---------------------------->
                     <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12 tab-content" id="v-pills-tabContent">

        <!-------------------------- (EDIT) PERSONAL DETAILS ---------------------------->
                     <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                         <div class="card">
                            <form name="EditPersonalDetails" method="post">
                            <div class="card-body">
                                <div class="row gutters">
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                        <h6 class="mb-2 text-primary mb-4">Personal Details</h6>
                                    </div>
                                    <input name="clUrID" value="<?php echo $clUrID ?>" hidden>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="form-group mb-3">
                                            <label for="fullName">First Name</label>
                                            <input name="clUrFirstname" type="text" class="form-control"
                                            id="fullName" value="<?php echo $clUrFirstname ?>">
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="form-group mb-3">
                                            <label for="eMail">Last Name</label>
                                            <input name="clUrLastname" type="text" class="form-control"
                                            id="eMail" value="<?php echo $clUrLastname ?>">
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="form-group mb-3">
                                            <label for="phone">Username</label>
                                            <input name="clUrUsername" type="text" class="form-control"
                                            id="phone" value="<?php echo $clUrUsername ?>">
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="form-group mb-3">
                                            <label for="website">Phone</label>
                                            <input name="clUrcontact_num" type="number" class="form-control"
                                            id="website" value="<?php echo $clUrcontact_num ?>">
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="form-group mb-3">
                                            <label for="website">Email</label>
                                            <input name="clUremail" type="email" class="form-control"
                                            id="website" value="<?php echo $clUremail ?>">
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="form-group mb-3">
                                            <label for="website">Address</label>
                                            <input name="clUraddress" type="text" class="form-control"
                                            id="website" value="<?php echo $clUraddress ?>">
                                        </div>
                                    </div>
                                </div>

                                <div class="row gutters mt-3">
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                        <div class="text-right">
                                            <button type="submit" formaction="../crud/tbusersUserUpdate.php"
                                            id="submit" name="submit" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#SaveModal">Save</button>
                                        </div>
                                    <!--
                                        None-urgent:
                                        Pa-add po ng cancel button na mag rerefresh ng page if kaya pa XD
                                    -->
                                    </div>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>

        <!-------------------------- (EDIT) CHANGE PASSWORD ---------------------------->
                    <div class="tab-pane fade" id="account" role="tabpanel" aria-labelledby="account-tab">
                        <div class="card">
                        <form name="ChangePassword" method="post">
                            <div class="card-body">
                                <div class="row gutters">
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                        <h6 class="mb-2 text-primary mb-4">Change Password</h6>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="form-group mb-3">
                                                <label for="old_password">Old Password</label>
                                                <input type="password" class="form-control" id="old_password" placeholder="Old Password">
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="form-group mb-3">
                                                <label for="new_password">New Password</label>
                                                <input type="password" name="new_password" class="form-control" id="new_password" placeholder="New Password">
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="form-group mb-3">
                                                <label for="confirm_password">Confirm Password</label>
                                                <input type="password" name="confirm_password" class="form-control" id="confirm_password" placeholder="Re-enter New Password">
                                        </div>
                                    </div>
                                </div>
                                    <div class="row gutters mt-3">
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                            <div class="text-right">
                                                <button type="submit" id="submit" name="submit" formaction="../crud/tbusersUserResetPassword.php"
                                                class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#SaveModal">Save</button>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        </form>
                        </div>
        <!-------------------------- (EDIT) DELETE ACCOUNT ---------------------------->
                            <div class="card">
                                <div class="card-body">
                                    <div class="row gutters">
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                            <h6 class="mb-2 text-danger mb-4">Account Deletion</h6>
                                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                <div class="d-flex text-light">Delete Account<i class="bi bi-arrow-right ms-2"></i></div>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
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