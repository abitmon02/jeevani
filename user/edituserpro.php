<?php
require '../config.php';
require '../db/session.contr.cls.php';

$sessObj = new SessionManageCls();
if ($sessObj->isLogged() == true) {
    $user_data = $sessObj->getSessionData();

    $var = $user_data['email'];
    require 'header.php';
    if (isset($_POST["submit"])) {
        $fname = $_POST['fname'];
        $address = $_POST['address'];
        $city = $_POST['city'];
        $dob = $_POST['dob'];
        $gender = $_POST['gender'];
        $bloodgrp = $_POST['bloodgrp'];
        $lid = "";
        $sql = "SELECT * FROM `tbl_login` WHERE `email`= '$var'";
        $data = mysqli_query($con, $sql);
        if ($row = mysqli_fetch_array($data)) {
            $lid = $row['l_id'];
        }
        $sql1 = mysqli_query($con, "Update tbl_patient set u_name='$fname',
        address='$address',city='$city',dob='$dob',gender='$gender',
        bloodgrp='$bloodgrp' where l_id='$lid'");
        if ($sql1) {
            echo "<script> alert('Your Profile updated Successfully'); </script>";
        }
    }
?>
    <!-- content -->

    <div class="overview">
        <div class="row mt-5">
            <div class="col-md-12">

                <?php
                $lid = "";
                $sql = "SELECT * FROM `tbl_login` WHERE `email`= '$var'";
                $data = mysqli_query($con, $sql);
                if ($row = mysqli_fetch_array($data)) {
                    $lid = $row['l_id'];
                }
                $sql1 = "SELECT * FROM `tbl_patient` WHERE `l_id`= '$lid'";
                $data1 = mysqli_query($con, $sql1);
                $row1 = mysqli_fetch_array($data1);
                $name = $row1['u_name'];
                $add = $row1['address'];
                $city = $row1['city'];
                $gender = $row1['gender'];
                $dob = $row1['dob'];
                $blood = $row1['bloodgrp'];
                ?>
                <div class="form-group">
                    <h2 style="color: #9f8e64;margin-top: 10px;margin-bottom:25px"><?php echo $name; ?> | Edit Profile</h2>
                    <label for="fname">
                        USER NAME
                    </label>
                    <input type="text" name="fname" id="fname" class="form-control" value="<?php echo $name; ?> ">
                </div>


                <div class="form-group">
                    <label for="address">
                        ADDRESS
                    </label>
                    <textarea name="address" id="address" class="form-control"><?php echo $add; ?> </textarea>
                </div>
                <div class="form-group">
                    <label for="city">
                        CITY
                    </label>
                    <input type="text" name="city" id="city" class="form-control" required="required" value=" <?php echo $city; ?>">
                </div>
                <div class="form-group">
                    <label for="dob">
                        DATE OF BIRTH
                    </label>
                    <br>
                    <input type="date" id="dob_inp" max="<?php echo date('Y-m-d'); ?>" name="dob" class="form-control" value="<?php echo $dob; ?>">
                </div>
                <br>
                <div class="form-group">
                    <label for="gender">
                        GENDER
                    </label>
                    <select name="gender" id="gender" class="form-control" required="required">
                        <option value="<?php echo $gender; ?>"><?php echo $gender; ?></option>
                        <option value="male">MALE</option>
                        <option value="female">FEMALE</option>
                        <option value="other">OTHERS</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="bloodgrp">
                        BLOOD GROUP
                    </label>
                    <input type="text" name="bloodgrp" id="bloodgrp" class="form-control" value="<?php echo $blood; ?>">
                </div>

                <div class="form-group">
                    <label for="fess">
                        USER EMAIL
                    </label>
                    <input type="email" name="uemail" id="uemail" class="form-control" readonly="readonly" value=<?php echo $var; ?>>
                </div>
                <!-- <button type="submit" name="submit" class="btn btn-o btn-primary">
                        UPDATE
                    </button> -->
                <div class="col-md-12">
                    <input type="submit" onclick="invokeValidation()" name="submit" value="Submit">
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
<style>
    input[type=submit] {
        background-color: #9f8e64;
        color: white;
        padding: 6px 8px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }
</style>
<script>
    invokeValidation = () => {
        user_id = <?= isset($user_data['log_id']) ? $user_data['log_id'] : 0 ?>;
        userName = $("#fname").val();
        address = $("#address").val();
        city = $("#city").val();
        dob_inp = $("#dob_inp").val();
        bloodgrp = $("#bloodgrp").val();
        gender = document.getElementById('gender').options[document.getElementById('gender').selectedIndex].value;;


        if (userName.length <= 3 || userName.length > 25 || !/^[a-zA-Z\s]+$/.test(userName)) {
            swal("error", "Please enter a valid Name", 'error');
        } else if (address.length <= 3 || address.length > 25 || !/^[a-zA-Z\s]+$/.test(address)) {
            swal("error", "Please enter a valid address.", 'error');
        } else if (city.length <= 3 || city.length > 25 || !/^[a-zA-Z\s]+$/.test(city)) {
            swal("error", "Please enter a valid city.", 'error');
        } else if (!/^(A|B|AB|O)[-+]$/g.test(bloodgrp)) {
            swal("error", "Please enter a valid blood group", 'error');
        } else if (gender == '' || gender == null) {
            swal("error", "Please select a gender", 'error');
        } else if (dob_inp == " " || dob_inp == null) {
            swal("error", "Please enter a valid date of birth", 'error');
        } else {
            $.ajax({
                type: "POST",
                url: "../api/user_api.php",
                data: {
                    'user_id': user_id,
                    'userName': userName,
                    'address': address,
                    'city': city,
                    "dob_inp": dob_inp,
                    'bloodgrp': bloodgrp,
                    'gender': gender,
                    'action': 16,
                },
                dataType: 'JSON',
                cache: false,
                success: function(response) {
                    if (response.status == 1) {
                        swal("Success", response.msg, 'success');
                        setTimeout(() => {
                            location.reload();
                        }, 1000);
                    } else {
                        swal("error", response.msg, 'error');
                    }
                }
            });
        }
    }


    const validateEmail = (email) => {
        return String(email)
            .toLowerCase()
            .match(
                /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|.(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
            );
    };

    function swal(tittle, msg2, action) {
        Swal.fire({
            title: tittle,
            text: msg2,
            icon: action,
            confirmButtonText: 'ok'
        })
    }
</script>