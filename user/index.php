<?php
require '../db/config.php';
require '../db/session.contr.cls.php';
$dbObj = new Dbh;
$sessObj = new SessionManageCls();
if ($sessObj->isLogged() == true) {
    $user_data = $sessObj->getSessionData();
    require 'header.php';

    
   
?>
    <!-- content -->

    <div class="overview">
        <div class="row mt-5">
            <div class="col-md-12">
                <div class="alert alert-primary" role="alert">
                    Welcome User <?= $user_data['email'] ?>
                </div>
            </div>
        </div>
    </div>
    <!-- content end -->
<?php
    require 'footer.php';
} else {
    header("Location:../user-login.php");
}
?>