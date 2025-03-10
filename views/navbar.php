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
                        <!-- <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="eventsDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: white;">
                                Events
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="eventsDropdown">
                                <li><a class="dropdown-item" href="#">Events Register</a></li>
                                <li><a class="dropdown-item" href="#">Event History</a></li>
                            </ul>
                        </li> -->
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
                        <!-- <li class="nav-item d-flex align-items-center">
                            <a class="btn btn-light me-2" href="accountInfo.php" role="button" style="color: rgb(121, 82, 179); border-color: rgb(121, 82, 179);">Profile</a>
                        </li> -->


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

    <!-- <div class="row" id="hero">
        <div id="hero-carousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#hero-carousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#hero-carousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#hero-carousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>

            <div class="carousel-inner">
                <div class="carousel-item active c-item">
                    <img src=".\img\pexels-shvets-production-8007415.jpg" class="d-block w-100 c-img" alt="Slide 1">
                    <div class="carousel-caption top-0 mt-4">
                        <p class="mt-5 fs-3 text-uppercase">Discover the hidden world</p>
                        <h1 class="display-1 fw-bolder text-capitalize">Tennis Club</h1>
                        <?php if (isset($_SESSION['userLogin']) && $_SESSION['userLogin']): ?>
                            <a href="#events" class="btn btn-primary px-4 py-2 fs-5 mt-5">Events</a>
                        <?php else: ?>
                            <a href="./views/login.php" class="btn btn-primary px-4 py-2 fs-5 mt-5">Register</a>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="carousel-item c-item">
                    <img src=".\img\pexels-magda-ehlers-pexels-1308799.jpg" class="d-block w-100 c-img" alt="Slide 2">
                    <div class="carousel-caption top-0 mt-4">
                        <p class="text-uppercase fs-3 mt-5">The season has arrived</p>
                        <p class="display-1 fw-bolder text-capitalize">Football Club</p>
                        <?php if (isset($_SESSION['userLogin']) && $_SESSION['userLogin']): ?>
                            <a href="#events" class="btn btn-primary px-4 py-2 fs-5 mt-5">Events</a>
                        <?php else: ?>
                            <a href="./views/login.php" class="btn btn-primary px-4 py-2 fs-5 mt-5">Register</a>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="carousel-item c-item">
                    <img src=".\img\pexels-joshsorenson-976873.jpg" class="d-block w-100 c-img" alt="Slide 3">
                    <div class="carousel-caption top-0 mt-4">
                        <p class="text-uppercase fs-3 mt-5">Destination activities</p>
                        <p class="display-1 fw-bolder text-capitalize">Basketball Club</p>
                        <?php if (isset($_SESSION['userLogin']) && $_SESSION['userLogin']): ?>
                            <a href="#events" class="btn btn-primary px-4 py-2 fs-5 mt-5">Events</a>
                        <?php else: ?>
                            <a href="./views/login.php" class="btn btn-primary px-4 py-2 fs-5 mt-5">Register</a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#hero-carousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#hero-carousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div> -->

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


<!-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sports Club</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <script src="./assets/js/jquery-3.7.1.min.js"></script>
</head>

<body>
    <nav class="navbar navbar-expand-lg fixed-top navbar-light" style="background-color: rgb(121, 82, 179);">
        <div class="container-fluid">
            <a class="navbar-brand fs-4 text-white fw-bold" href="../index.php">
                <img src="./img/logo1.jpg" width="30" height="30" class="d-inline-block rounded-5 ms-2" alt="Logo">
                Sports Club
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active text-white" href="../index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active text-white" href="eventDetails.php">Events Details</a>
                    </li>
                    <?php if (isset($_SESSION['userLogin']) && $_SESSION['userLogin']): ?>
                        <?php if ($_SESSION['role'] == 0): ?>
                            <li class="nav-item">
                                <a class="nav-link active text-white" href="eventHis.php">Event History</a>
                            </li>
                        <?php endif; ?>
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
                        <li class="nav-item">
                            <a class="nav-link active text-white fw-bold" href="accountInfo.php">Hi, <?php echo htmlspecialchars($_SESSION['username']); ?></a>
                        </li>
                        <?php if ($_SESSION['role'] == 1): ?>
                            <li class="nav-item">
                                <a class="btn btn-light ms-3" href="adminDashboard.php" role="button" style="color: rgb(121, 82, 179);">Dashboard</a>
                            </li>
                        <?php endif; ?>
                        <li class="nav-item">
                            <a class="btn btn-light ms-3" href="logout.php" role="button" style="color: rgb(121, 82, 179);">Log out</a>
                        </li>
                    <?php else: ?>
                        <li class="nav-item">
                            <a class="btn btn-light me-2" href="./views/login.php" role="button" style="color: rgb(121, 82, 179);">Login</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html> -->