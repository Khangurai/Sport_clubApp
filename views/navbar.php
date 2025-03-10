<?php
// Start the session if it's not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome (Optional) -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <script src="../assets/js/jquery-3.7.1.min.js"></script>

</head>

<body>
    <nav class="navbar navbar-expand-lg fixed-top navbar-light" style="background-color: rgb(121, 82, 179);">
        <div class="container-fluid">

            <a class="navbar-brand fs-4" href="../index.php" style="color: white; font-weight: bold;">
                <img src="../assets/img/logo1.jpg" width="30" height="30" class="d-inline-block rounded-5 ms-2" alt="Logo">
                Sports Club
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="../index.php" style="color: white;">Home</a>
                    </li>

                    <?php if (isset($_SESSION['userLogin']) && $_SESSION['userLogin']): ?>

                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="eventDetails.php" style="color: white;">Events Details</a>
                        </li>
                        <?php if ($_SESSION['role'] == 0): ?>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="eventHis.php" style="color: white;">Event History</a>
                            </li>
                        <?php endif; ?>


                    <?php else: ?>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#events" style="color: white;">Events</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="eventDetails.php" style="color: white;">Events Details</a>
                        </li>
                    <?php endif; ?>
                    <?php if (!isset($_SESSION['userLogin']) || $_SESSION['role'] != 1): ?>
                        <li class="nav-item">
                            <a class="nav-link active text-white" href="#about">About Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active text-white" href="#contact">Contact</a>
                        </li>
                    <?php endif; ?>

                </ul>

                <ul class="navbar-nav ms-auto d-flex">
                    <?php if (isset($_SESSION['userLogin']) && $_SESSION['userLogin']): ?>
                        <a class="nav-link active" href="accountInfo.php" style="font-weight: bold; color: rgb(255, 255, 255);" id="username1">
                            <h2>Hi,<?php echo $_SESSION['username']; ?></h2>
                        </a>
                        <?php if ($_SESSION['role'] == 1): ?>
                            <li class="nav-item">
                                <a class="ms-3 btn btn-light" href="adminDashboard.php" role="button" style="color: rgb(121, 82, 179); border-color: rgb(121, 82, 179);">Dashboard</a>
                            </li>
                        <?php endif; ?>



                        <li class="nav-item">
                            <a class="ms-3 btn btn-light" href=".../logout.php" role="button" style="color: rgb(121, 82, 179); border-color: rgb(121, 82, 179);">Log out</a>
                        </li>
                    <?php else: ?>
                        <li class="nav-item">
                            <a class="btn btn-light me-2" href="./views/login.php" role="button" style="color: rgb(121, 82, 179); border-color: rgb(121, 82, 179);">Login</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
<script>
    $(document).ready(function(e) {
        e.de
        $.ajax({
            url: './API/accountAPI2.php',
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                console.log(response); // Log the response for debugging
                if (response.status === 'success') {
                    $('#username1').text(response.userProfile.username);
                } else {
                    alert('Failed to fetch user data: ' + response.message);
                }
            },
            error: function(xhr, status, error) {
                console.error('AJAX Error:', error);
                console.log('Response:', xhr.responseText);
                alert('Error fetching data.');
            }
        });
    });
</script>

</html>