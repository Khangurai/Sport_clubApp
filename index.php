<?php
session_start();
$userLoggedIn = isset($_SESSION['userLogin']) && $_SESSION['userLogin'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sports Club Home</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome (Optional) -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <script src="./assets/js/jquery-3.7.1.min.js"></script>
    <style>
        .c-item {
            height: 480px;
        }

        .c-img {
            height: 100%;
            object-fit: cover;
            filter: brightness(0.6);
        }

        .carousel slide {
            position: relative;
            z-index: 5;
        }

        .form-label {
            color: rgb(121, 82, 179);
        }

        .form-select {
            background-color: rgb(121, 82, 179);
            color: white;
        }

        /* Change the background color of the dropdown */
        .custom-select {
            background-color: rgb(121, 82, 179);
            /* Purple */
            color: white;
            /* Text color for the dropdown */
            border: none;
            /* Optional: remove border */
        }

        /* Change the background color of dropdown options */
        .custom-select option {
            background-color: white;
            /* White background for dropdown items */
            color: black;
            /* Black text for options */
        }

        /* Add hover effect for dropdown items */
        .custom-select option:hover {
            background-color: rgb(230, 230, 230);
            /* Light gray on hover */
        }
    </style>
</head>

<body>
    <?php include('./views/navbar.php'); ?>

    <!-- Hero Section -->
    <div class="row" id="hero">
        <div id="hero-carousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#hero-carousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#hero-carousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#hero-carousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>

            <div class="carousel-inner">
                <div class="carousel-item active c-item">
                    <img src="./assets/img/hero/pexels-shvets-production-8007415.jpg" class="d-block w-100 c-img" alt="Slide 1">
                    <div class="carousel-caption top-0 mt-4">
                        <p class="mt-5 fs-3 text-uppercase">Discover the hidden world</p>
                        <h1 class="display-1 fw-bolder text-capitalize">Badminton Club</h1>
                        <?php if (isset($_SESSION['userLogin']) && $_SESSION['userLogin']): ?>
                            <a href="#events" class="btn btn-primary px-4 py-2 fs-5 mt-5">Events</a>
                        <?php else: ?>
                            <a href="./views/login.php" class="btn btn-primary px-4 py-2 fs-5 mt-5">Register</a>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="carousel-item c-item">
                    <img src="./assets/img/hero/pexels-magda-ehlers-pexels-1308799.jpg" class="d-block w-100 c-img" alt="Slide 2">
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
                    <img src="./assets/img/hero/pexels-joshsorenson-976873.jpg" class="d-block w-100 c-img" alt="Slide 3">
                    <div class="carousel-caption top-0 mt-4">
                        <p class="text-uppercase fs-3 mt-5">Destination activities</p>
                        <p class="display-1 fw-bolder text-capitalize">Table-tennis Club</p>
                        <?php if (isset($_SESSION['userLogin']) && $_SESSION['userLogin'] === true): ?>
                            <a href="#events" class="btn btn-primary px-4 py-2 fs-5 mt-5">Register</a>
                        <?php else: ?>
                            <a href="./views/login.php" class="btn btn-primary px-4 py-2 fs-5 mt-5">Login First</a>
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
    </div>

    <section id="events" class="py-5">
        <div class='container mt-1'>
            <h2 class="text-center mb-5">Upcoming Events(Next 6 Months)</h2>
            <div class="row align-items-end">

                <!-- Select Date -->
                <div class="mb-4 col-12 col-md-2">
                    <label for="dateInput" class="form-label">Select Date</label>
                    <input type="date" class="form-control" id="dateInput" aria-label="Select Date">
                </div>

                <!-- Sport Type Dropdown -->
                <div class="mb-4 col-12 col-md-2">
                    <label for="sportDropdown" class="form-label">Sport Type</label>
                    <select class="form-select custom-select" id="sportDropdown" aria-label="Select Sport Type">
                        <option selected value="sport">Select Sport Type</option>
                        <option value="Football">Football</option>
                        <option value="Basketball">Basketball</option>
                        <option value="Badminton">Badminton</option>
                        <option value="Swimming">Swimming</option>
                    </select>
                </div>

                <!-- Location Dropdown -->
                <div class="mb-4 col-12 col-md-2">
                    <label for="locationDropdown" class="form-label">Location</label>
                    <select class="form-select custom-select" id="locationDropdown" aria-label="Select Location">
                        <option selected value="location">Select Location</option>
                        <option value="Mandalay">Mandalay</option>
                        <option value="Yangon">Yangon</option>
                    </select>
                </div>

                <!-- Age Group Dropdown -->
                <div class="mb-4 col-12 col-md-2">
                    <label for="agegroupDropdown" class="form-label">Age Group</label>
                    <select class="form-select custom-select" id="agegroupDropdown" aria-label="Select Age">
                        <option selected value="age">Select Age</option>
                        <option value="18-35">18-35</option>
                        <option value="35-60">35-60</option>
                    </select>
                </div>

                <!-- Filter and Clear Buttons -->
                <div class="mb-4 col-12 col-md-2 ms-4 d-flex justify-content-between align-items-center">
                    <button class='btn' style='background-color: rgb(121, 82, 179); color: white; border: 2px solid rgb(121, 82, 179); width: 100px;' id='filterBtn'>Filter</button>
                    <a href="#events" class="btn btn-warning" id="clearBtn">Clear</a>
                </div>

            </div>

            <!-- Event Results -->
            <div class='row' id='devents'>
            </div>
        </div>
    </section>


    <!-- About Us Section -->
    <section id="about" class="bg-light py-5">
        <div class="container">
            <h2 class="text-center mb-4">About Us</h2>
            <p class="text-center">
                We are a passionate community dedicated to promoting sports and
                healthy living. Join us in making every event memorable!
            </p>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="py-5">
        <div class="container">
            <h2 class="text-center mb-4">Contact Us</h2>
            <form>
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input
                        type="text"
                        class="form-control"
                        id="name"
                        placeholder="Your Name" />
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input
                        type="email"
                        class="form-control"
                        id="email"
                        placeholder="Your Email" />
                </div>
                <div class="mb-3">
                    <label for="message" class="form-label">Message</label>
                    <textarea
                        class="form-control"
                        id="message"
                        rows="3"
                        placeholder="Your Message"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Send Message</button>
            </form>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-dark text-white text-center py-3">
        <p>&copy; 2024 Sports Club. All Rights Reserved.</p>
    </footer>

    <!-- Content Section -->
    <!-- <div class="container" style="margin-top: 80px; min-height: calc(100vh - 120px);">
        <h1>Welcome to the Fixed-Top Navbar Example</h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse vitae nisl ut lorem convallis fermentum. Proin hendrerit orci ut metus gravida, non dignissim enim fermentum. Curabitur sodales libero sed consequat aliquet.</p>
        <p>Scroll down to see how the navbar remains fixed at the top of the page.</p>
    </div> -->

    <!-- Footer Section -->
    <!-- <footer class="bg-dark text-white text-center py-3">
        <div class="container">
            <p class="mb-0">© 2024 Brand Name. All rights reserved.</p>
            <small>Follow us on 
                <a href="#" class="text-white">Facebook</a>, 
                <a href="#" class="text-white">Twitter</a>, and 
                <a href="#" class="text-white">Instagram</a>.
            </small>
        </div>
    </footer> -->

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
<?php
$userId = $_SESSION['userID'];
$dBRole = $_SESSION['role'];
?>
<script>
    console.log(<?php echo $userId; ?>)
    $(document).ready(function() {
        let userLoggedIn = <?php echo json_encode($userLoggedIn); ?>;
        $.ajax({
                url: './API/readEventAPI.php',
                method: 'POST',
            })
            .done(function(data) {
                try {
                    const allevents = JSON.parse(data); // Parse the event data
                    let eventCard = "";

                    $.each(allevents, function(key, value) {
                        let actionButton = userLoggedIn ?
                            `<button class='btn eventregisterBtn' 
                                style='background-color: rgb(121, 82, 179); 
                                       color: white; 
                                       border: 2px solid rgb(121, 82, 179);'>
                            Register
                        </button>` :
                            `<a href="./views/login.php" class='btn eventregisterBtn' 
                                style='background-color: rgb(121, 82, 179); 
                                       color: white; 
                                       border: 2px solid rgb(121, 82, 179);'>
                            Login First
                        </a>`;

                        eventCard += `
                        <div class='col-12 col-sm-6 col-md-4 mb-3'>
                            <div class='card' data-key="${value.eventID}">
                                <img src='${value.photo}' class='card-img-top' alt='Event Image'>
                                <div class='card-body'>
                                    <h5 class='card-title'>${value.eventName}</h5>
                                    <p class='card-text'>${value.description}</p>
                                    <ul class='list-unstyled'>
                                        <li><i class='fas fa-map-marker-alt'></i> Location: ${value.location}</li>
                                        <li><i class='fas fa-calendar-alt'></i> Date: ${value.date}</li>
                                        <li><i class='fas fa-clock'></i> Time: ${value.time}</li>
                                        <li><i class='fas fa-users'></i> Age Group: ${value.age}</li>
                                        <li><i class='fas fa-futbol'></i> Sport Type: ${value.sport}</li>
                                        <li><i class='fas fa-phone-alt'></i> Contact: ${value.contactinfo}</li>
                                    </ul>
                                    ${actionButton}
                                </div>
                            </div>
                        </div>`;

                    });

                    // Append to the container
                    $('#devents').html(eventCard);

                } catch (error) {
                    console.error("Error parsing event data: ", error);
                    $("#result").html("Unable to load events.");
                }
            })
            .fail(function(jqXHR, textStatus, errorThrown) {
                console.error("AJAX error: ", textStatus, errorThrown);
                $("#result").html("Failed to fetch events.");
            });


        // Use event delegation for dynamically added elements
        $(document).on('click', '.eventregisterBtn', function() {
            let card = $(this).closest('.card');
            let eventID = card.data('key'); // Access data-key

            $.post('registerEventApi.php', {
                    eventID: eventID
                }, function(data) {
                    let status = data.trim();
                    if (status === 'success') {
                        alert("Register Successfully...");
                        window.location.assign('index.php');
                    } else {
                        $("#result").html('Cannot register.');
                    }
                })
                .fail(function() {
                    $("#result").html('Error while registering for the event.');
                });
        });

        

        $('#filterBtn').on('click', function() {
            var date = $('#dateInput').val();
            var sport = $('#sportDropdown').val();
            var location = $('#locationDropdown').val();
            var ageGroup = $('#agegroupDropdown').val();

            // Prepare data object for AJAX
            let requestData = {};

            if (date && date !== '') {
                requestData.date = date;
            }
            if (sport && sport !== 'sport') {
                requestData.sport = sport;
            }
            if (location && location !== 'location') {
                requestData.location = location;
            }
            if (ageGroup && ageGroup !== 'age') {
                requestData.ageGroup = ageGroup;
            }
            console.log(requestData)
            // Perform AJAX call
            $.ajax({
                url: 'fetch_events.php',
                type: 'POST',
                data: requestData,
                success: function(data) {
                    try {
                        const allevents = JSON.parse(data); // Parse JSON response
                        $('#devents').empty(); // Clear existing events
                        let eventCard = "";

                        if (allevents.length === 0) {
                            eventCard = "<p class='text-center'>No events found for the selected filters.</p>";
                        } else {
                            $.each(allevents, function(key, value) {
                                let actionButton = userLoggedIn ?
                                    `<button class='btn eventregisterBtn' 
                                style='background-color: rgb(121, 82, 179); 
                                       color: white; 
                                       border: 2px solid rgb(121, 82, 179);'>
                            Register
                        </button>` :
                                    `<a href="./views/login.php" class='btn eventregisterBtn' 
                                style='background-color: rgb(121, 82, 179); 
                                       color: white; 
                                       border: 2px solid rgb(121, 82, 179);'>
                            Login First
                        </a>`;
                                eventCard += `
                        <div class='col-12 col-sm-6 col-md-4 mb-3'>
                            <div class='card' data-key="${value.eventID}">
                                <img src='${value.photo}' class='card-img-top' alt='Event Image'>
                                <div class='card-body'>
                                    <h5 class='card-title'>${value.eventName}</h5>
                                    <p class='card-text'>${value.description}</p>
                                    <ul class='list-unstyled'>
                                        <li><i class='fas fa-map-marker-alt'></i> Location: ${value.location}</li>
                                        <li><i class='fas fa-calendar-alt'></i> Date: ${value.date}</li>
                                        <li><i class='fas fa-clock'></i> Time: ${value.time}</li>
                                        <li><i class='fas fa-users'></i> Age Group: ${value.age}</li>
                                        <li><i class='fas fa-futbol'></i> Sport Type: ${value.sport}</li>
                                        <li><i class='fas fa-phone-alt'></i> Contact: ${value.contactinfo}</li>
                                    </ul>
                                    ${actionButton}
                                </div>
                            </div>
                        </div>`;
                            });
                        }
                        $('#devents').append(eventCard); // Append events to the container
                    } catch (error) {
                        console.error('Invalid JSON response:', error);
                    }
                },
                error: function(xhr, status, error) {
                    console.error('AJAX request failed:', status, error);
                }
            });
        });




        // Clear button click event
        $('#clearBtn').on('click', function() {
            $('#dateInput').val('');
            $('#sportDropdown').val('Select Sport Type');
            $('#locationDropdown').val('Select Location');
            $('#agegroupDropdown').val('Select Age');
            $('#devents').html('');

            $.ajax({
                    url: 'readEventAPI.php',
                    method: 'POST'
                })
                .done(function(data) {
                    var allevents = JSON.parse(data);
                    var eventCard = "";
                    $.each(allevents, function(key, value) {
                        eventCard += "<div class='col-sm-4 mb-3'>";
                        eventCard += "<div class='card' key='" + value.idevent + "' >";
                        eventCard += "<img src='" + value.photo + "' class='card-img-top'>";
                        eventCard += "<div class='card-body'>";
                        eventCard += "<h5 class='card-title'>" + value.eventName + "</h5>";
                        eventCard += "<p class='card-text'>" + value.description + "</p>";
                        eventCard += "<ul class = 'list-unstyled' >";
                        eventCard += "<li><i class = 'fas fa-map-marker-alt'></i> Location:" + value.location + "</li>";
                        eventCard += "<li><i class = 'fas fa-calendar-alt'> </i> Date:" + value.date + "</li >";
                        eventCard += "<li> <i class = 'fas fa-clock'> </i> Time:" + value.time + "</li >";
                        eventCard += "<li> <i class = 'fas fa-users'> </i> Age Group:" + value.age + "</li >";
                        eventCard += "<li> <i class = 'fas fa-futbol'> </i> Sport Type:" + value.sport + "</li >";
                        eventCard += "<li> <i class = 'fas fa-phone-alt'> </i> Contact" + value.contactinfo + "</li >";
                        eventCard += "</ul><button class='btn' style='background-color: rgb(121, 82, 179); color: white; border: 2px solid rgb(121, 82, 179);' id='event_register'>Register</button>";
                        eventCard += "</div></div></div>";
                    })
                    $('#devents').append(eventCard);
                })
        });
    });
</script>

</html>