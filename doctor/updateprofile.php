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
    <style>
        input[type=submit] {
            background-color: #9f8e64;
            color: white;
            padding: 8px 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>
    <div class="overview">
        <div class="row mt-5">
            <div class="col-md-12">
                <?php
                $data = $dbObj->connFnc()->query("SELECT * FROM `tbl_doctor` WHERE `l_id`='" . $user_data['log_id'] . "'")->fetch_assoc();
                ?>
                <h2 style="color: #9f8e64;">UPDATE PROFILE</h2><br>

                <div class="form-group col-12 mt-2">
                    <label class="form-label text-dark">Name:</label><br>
                    <input type="text" id="d_name" class="form-control" name="d_name" value="<?= $data['d_name'] ?> ">
                </div>
                <div class="form-group col-12">
                    <label class="form-label text-dark">Address:</label><br>
                    <input type="text" class="form-control" id="address" name="address" value="<?= $data['d_address'] ?> ">
                </div>

                <div class="form-group col-12">
                    <label class="form-label text-dark">Email:</label><br>
                    <input type="email" class="form-control" id="email" name="email" readonly="readonly" value='<?= $user_data['email'] ?>'>
                </div>
                <div class="form-group col-12">
                    <label class="form-label text-dark">Specialization:</label><br>
                    <select name="spec" class="form-control" id="spec" required>
                        <option value="<?= $data['spec'] ?> "><?= $data['spec'] ?> </option>
                        <option value="Baala Chikitsa" name="spec">Baala Chikitsa (pediatrician)</option>
                        <option value="Urdhvanga Chikitsa" name="spec">Urdhvanga Chikitsa (head & Neck)</option>
                        <option value="Kayachikits" name="spec">Kayachikits (Internal Medicine)</option>
                        <option value="Shalakya Tantra" name="spec">Shalakya Tantra (ENT & Opthalamology)</option>
                    </select>
                </div>
                <div class="form-group col-12">
                    <label class="form-label text-dark">Consultancy Fees</label><br>
                    <input type="number" class="form-control" id="cfee" min="0" name="fees" value=<?= $data['d_fees'] ?>>
                </div>
                <div class="form-group col-12">
                    <span style="color: red; margin-left:50px; font-size:12px"></span><br>
                    <input type="submit" name="submit" id="mysubmit" value="submit">
                    <span style="color: red; margin-left:250px; font-size:12px"></span><br>
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
<script>
    $("#mysubmit").click(() => {
        //Doctor Profile updation and js validation
        doctor_id = <?= isset($user_data['log_id']) ? $user_data['log_id'] : 0 ?>;
        d_name = $("#d_name").val();
        email = $("#email").val();
        address = $("#address").val();
        specialized = document.getElementById('spec').options[document.getElementById('spec').selectedIndex].value;;
        cfee = parseInt($("#cfee").val());
        console.log(cfee);
        console.log(typeof(cfee))
        if (d_name.length <= 3 || d_name.length > 25 || !/^[a-zA-Z\s]+$/.test(d_name)) {
            swal("error", "Please enter a valid Name", 'error');
        } else if (address.length <= 3 || address.length > 25 || !/^[a-zA-Z\s]+$/.test(address)) {
            swal("error", "Please enter a valid address.", 'error');
        } else if (specialized == '' || specialized == null) {
            swal("error", "Please select a specialization", 'error');
        } else if (cfee == "" || cfee <= 0) {
            swal("error", "Please enter a valid consultaion fee", 'error');
        } else if (!validateEmail(email)) {
            swal("error", "Please enter a valid email", 'error');
        } else {
            $.ajax({
                type: "POST",
                url: "../api/doctor_api.php",
                data: {
                    'doctor_id': doctor_id,
                    'd_name': d_name,
                    'email': email,
                    'address': address,
                    'specialized': specialized,
                    "cfee": cfee,
                    'action': 10,
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
    })

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