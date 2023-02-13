<?php
require '../db/config.php';
require '../db/session.contr.cls.php';

$dbObj = new Dbh;
$sessObj = new SessionManageCls();
if ($sessObj->isLogged() == true) {
    $user_data = $sessObj->getSessionData();
    if (isset($_GET['status']) && $_GET['status'] == 1) {
?>
        <!-- Page Content -->
        <style>
            .razorpay-payment-button {
                padding: 10px 10px;
                font-weight: 400;
                font-size: larger;
                background-color: greenyellow;
                cursor: pointer;
            }
        </style>
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <form action="verify.php" method="POST">
                            <script src="https://checkout.razorpay.com/v1/checkout.js" data-key="<?= $_GET['key'] ?>" data-amount="<?php echo $_GET['amount'] ?>" data-currency="INR" data-name="<?php echo $_GET['name'] ?>" data-image="<?php echo $_GET['image'] ?>" data-description="<?php echo $_GET['description'] ?>" data-prefill.name="<?php echo $_GET['name'] ?>" data-prefill.email="<?php echo $_GET['email'] ?>" data-prefill.contact="<?php echo $_GET['contact'] ?>" data-notes.shopping_order_id="3456" data-order_id="<?php echo $_GET['order_id'] ?>" <?php if ($displayCurrency !== 'INR') { ?> data-display_amount="<?php echo $_GET['display_amount'] ?>" <?php } ?> <?php if ($displayCurrency !== 'INR') { ?> data-display_currency="<?php echo $_GET['display_currency'] ?>" <?php } ?>>
                            </script>
                            <!-- Any extra fields to be submitted with the form but not sent to Razorpay -->
                            <input type="hidden" name="shopping_order_id" value="3456">
                            <input type="hidden" name="status" value="1">
                        </form>

                        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
                        </script>
                        <script>
                            // $(window).on('load', function() {
                            //     jQuery('.razorpay-payment-button').click();
                            // });
                        </script>
                    </div>
                </div>
            </div>
        </div>
    <?php
    } else if (isset($_GET['status']) && $_GET['status'] == 2) {
    ?>
        <!-- Page Content -->
        <style>
            .razorpay-payment-button {
                padding: 10px 10px;
                font-weight: 400;
                font-size: larger;
                background-color: greenyellow;
                cursor: pointer;
            }
        </style>
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <form action="verify.php" method="POST">
                            <script src="https://checkout.razorpay.com/v1/checkout.js" data-key="<?= $_GET['key'] ?>" data-amount="<?php echo $_GET['amount'] ?>" data-currency="INR" data-name="<?php echo $_GET['name'] ?>" data-image="<?php echo $_GET['image'] ?>" data-description="<?php echo $_GET['description'] ?>" data-prefill.name="<?php echo $_GET['name'] ?>" data-prefill.email="<?php echo $_GET['email'] ?>" data-prefill.contact="<?php echo $_GET['contact'] ?>" data-notes.shopping_order_id="3456" data-order_id="<?php echo $_GET['order_id'] ?>" <?php if ($displayCurrency !== 'INR') { ?> data-display_amount="<?php echo $_GET['display_amount'] ?>" <?php } ?> <?php if ($displayCurrency !== 'INR') { ?> data-display_currency="<?php echo $_GET['display_currency'] ?>" <?php } ?>>
                            </script>
                            <!-- Any extra fields to be submitted with the form but not sent to Razorpay -->
                            <input type="hidden" name="shopping_order_id" value="3456">
                            <input type="hidden" name="status" value="2">
                        </form>

                        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
                        </script>
                        <script>
                            // $(window).on('load', function() {
                            //     jQuery('.razorpay-payment-button').click();
                            // });
                        </script>
                    </div>
                </div>
            </div>
        </div>
    <?php } else if (isset($_GET['status']) && $_GET['status'] == 3) {
    ?>
        <!-- Page Content -->
        <style>
            .razorpay-payment-button {
                padding: 10px 10px;
                font-weight: 400;
                font-size: larger;
                background-color: greenyellow;
                cursor: pointer;
            }
        </style>
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <form action="verify.php" method="POST">
                            <script src="https://checkout.razorpay.com/v1/checkout.js" data-key="<?= $_GET['key'] ?>" data-amount="<?php echo $_GET['amount'] ?>" data-currency="INR" data-name="<?php echo $_GET['name'] ?>" data-image="<?php echo $_GET['image'] ?>" data-description="<?php echo $_GET['description'] ?>" data-prefill.name="<?php echo $_GET['name'] ?>" data-prefill.email="<?php echo $_GET['email'] ?>" data-prefill.contact="<?php echo $_GET['contact'] ?>" data-notes.shopping_order_id="3456" data-order_id="<?php echo $_GET['order_id'] ?>" <?php if ($displayCurrency !== 'INR') { ?> data-display_amount="<?php echo $_GET['display_amount'] ?>" <?php } ?> <?php if ($displayCurrency !== 'INR') { ?> data-display_currency="<?php echo $_GET['display_currency'] ?>" <?php } ?>>
                            </script>
                            <!-- Any extra fields to be submitted with the form but not sent to Razorpay -->
                            <input type="hidden" name="shopping_order_id" value="3456">
                            <input type="hidden" name="status" value="3">
                        </form>

                        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
                        </script>
                        <script>
                            // $(window).on('load', function() {
                            //     jQuery('.razorpay-payment-button').click();
                            // });
                        </script>
                    </div>
                </div>
            </div>
        </div>
    <?php } else if (isset($_GET['status']) && $_GET['status'] == 4) {
    ?>
        <!-- Page Content -->
        <style>
            .razorpay-payment-button {
                padding: 10px 10px;
                font-weight: 400;
                font-size: larger;
                background-color: greenyellow;
                cursor: pointer;
            }
        </style>
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <form action="verify.php" method="POST">
                            <script src="https://checkout.razorpay.com/v1/checkout.js" data-key="<?= $_GET['key'] ?>" data-amount="<?php echo $_GET['amount'] ?>" data-currency="INR" data-name="<?php echo $_GET['name'] ?>" data-image="<?php echo $_GET['image'] ?>" data-description="<?php echo $_GET['description'] ?>" data-prefill.name="<?php echo $_GET['name'] ?>" data-prefill.email="<?php echo $_GET['email'] ?>" data-prefill.contact="<?php echo $_GET['contact'] ?>" data-notes.shopping_order_id="3456" data-order_id="<?php echo $_GET['order_id'] ?>" <?php if ($displayCurrency !== 'INR') { ?> data-display_amount="<?php echo $_GET['display_amount'] ?>" <?php } ?> <?php if ($displayCurrency !== 'INR') { ?> data-display_currency="<?php echo $_GET['display_currency'] ?>" <?php } ?>>
                            </script>
                            <!-- Any extra fields to be submitted with the form but not sent to Razorpay -->
                            <input type="hidden" name="shopping_order_id" value="3456">
                            <input type="hidden" name="status" value="4">
                        </form>

                        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
                        </script>
                        <script>
                            // $(window).on('load', function() {
                            //     jQuery('.razorpay-payment-button').click();
                            // });
                        </script>
                    </div>
                </div>
            </div>
        </div>
<?php }
} else {
    header("Location:../user-login.php");
}
?>