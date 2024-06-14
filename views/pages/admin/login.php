<?php

global $status, $messages;

require("../../../actions/login.php");
require("../../../functions/functions.php");

if (isUserLogin()) {
    header("Location: index.php");
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <link rel="shortcut icon" href="../../../favicon.png"/>

    <!-- Bootstrap CSS -->
    <link href="../../../assets/user/css/bootstrap.min.css" rel="stylesheet"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet"/>
    <link href="../../../assets/user/css/tiny-slider.css" rel="stylesheet"/>
    <link href="../../../assets/user/scss/style.css" rel="stylesheet"/>
    <title>BRODO | Login</title>
</head>
<body>

<div class="container">
    <div class="vh-100 d-flex align-items-center justify-content-center">
        <div class="card shadow border-0">
            <div class="card-body p-0">
                <div class="row m-auto mt-2">
                    <div class="col-md-12">
                        <?php
                        if (!$status) {
                            echo "
                           <div class='alert alert-danger alert-dismissible fade show' role='alert'>
                                <strong>Peringatan!</strong> $messages
                                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                            </div>
                            ";
                        }
                        ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 d-flex align-items-center justify-content-center">
                        <img src="../../../assets/user/images/brodo-4.png"
                             class="img-fluid mx-auto animate__animated animate__fadeInLeft" id="img">
                    </div>
                    <div class="col-md-6">
                        <div class="px-4">
                            <h2 class="text-muted fw-bold text-center my-4 animate__animated animate__fadeInDown">
                                Login Admin</h2>

                            <form method="POST" action="">
                                <div class="form-group mb-3">
                                    <label for="email"
                                           class="form-label animate__animated animate__fadeInRightBig">Email</label>
                                    <input type="text" class="form-control animate__animated animate__fadeInRight"
                                           id="email" name="email" placeholder="Enter Email" required>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="password" class="form-label animate__animated animate__fadeInRightBig">Password</label>
                                    <input type="password" class="form-control animate__animated animate__fadeInRight"
                                           id="password" name="password" placeholder="Enter Password" required>
                                </div>

                                <div class="d-grid gap-2 mx-auto mb-4">
                                    <button class="btn btn-primary animate__animated animate__fadeInUp"
                                            type="submit" name="submit">Submit
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="../../../assets/user/js/bootstrap.bundle.min.js"></script>
<script src="../../../assets/user/js/tiny-slider.js"></script>
<script src="../../../assets/user/js/custom.js"></script>
</body>

</html>
