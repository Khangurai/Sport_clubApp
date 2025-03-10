<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
        crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.3/font/bootstrap-icons.min.css" />
    <link rel="stylesheet" href="./assets/style/style.css">
    <script src="assets\js\jquery-3.7.1.min.js"></script>
</head>

<body>
    <!-- main container -->
    <div class="container d-flex justify-content-center align-items-center min-vh-100">

        <!-- Signup container -->
        <div class="row border rounded-5 p-3 bg-white shadow box-area">

            <!-- left box -->
            <div class="col-md-6 rounded-4 d-flex justify-content-center align-items-center flex-column left-box" style="background: rgb(194, 249, 220);">
                <div class="featured-image mb-3">
                    <img src="../assets/img/2.png" class="img-fluid" style="width: 250px;">
                </div>
                <p class="text-white fs-2 text-info" style="font-family: 'Courier New', Courier, monospace; font-weight: 700;">Be Verified</p>
                <small class="text-white text-wrap text-center" style="font-family: 'Courier New', Courier, monospace;">This is the test</small>
            </div>

            <!-- right box -->
            <div class="col-md-6 right-box">
                <div class="row align-items-center">
                    <div class="header-text mb-4">
                        <h2><a class="navbar-brand" href="../index.php" style="font-family:'Montserrat SemiBold' ">
                                <h1><img src="../assets/img/logo1.jpg" style="width: 50px;" class="img-fluid rounded-circle">Sports Club</h1>
                            </a>Sign Up!</h2>
                        <p>အချက်အလက်များကိုမှန်မှန်ကန်ကန်ဖြည့်ပေးပါ</p>

                    </div>
                    <form id="signupForm">
                        <div class="container-">
                            <div class="row mb-3">
                                <!-- <div class="col-6">
                                    <input type="text" class="form-control form-control-lg bg-light fs-6" placeholder="First Name" required name="fname" id="fname">
                                </div> -->
                                <div>
                                    <input type="text" class="form-control form-control-lg bg-light fs-6" placeholder="Username" required name="uname" id="uname">
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input
                                type="email"
                                class="form-control form-control-lg bg-light fs-6"
                                placeholder="Email"
                                required name="email"
                                id="email" />
                        </div>
                        <div id="emailError" class="error"></div>
                        <div class="input-group mb-3">
                            <input type="password" class="form-control form-control-lg bg-light fs-6" placeholder="Password" id="pwd" required name="pwd">
                            <button type="button" class="input-group-text bi bi-eye-slash" id="togglePassword"></button>
                        </div>
                        <div id="pwdError" class="error"></div>
                        <div class="input-group mb-3">
                            <input type="password" class="form-control form-control-lg bg-light fs-6" placeholder="Confirm Password" id="c_pwd" required name="c_pwd">
                            <button type="button" class="input-group-text bi bi-eye-slash" id="togglePassword1"></button>
                        </div>
                        <div id="c_pwdError" class="error"></div>

                        <div class="container-">
                            <div class="row mb-3">
                                <div class="col-6">
                                    <input type="number" class="form-control form-control-lg bg-light fs-6" placeholder="Phone" required name="phone" id="phone">
                                </div>
                                <div class="col-6">
                                    <input type="text" class="form-control form-control-lg bg-light fs-6" placeholder="City" required name="city" id="city">
                                </div>
                            </div>
                        </div>

                        <label class="form-label mt-3">Preferred Sports</label>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-check">
                                    <input class="form-check-input" name="sport" type="checkbox" value="Badminton" id="badminton">
                                    <label class="form-check-label" for="badminton">Badminton</label>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-check">
                                    <input class="form-check-input" name="sport" type="checkbox" value="Tennis" id="tennis">
                                    <label class="form-check-label" for="tennis">Table Tennis</label>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-check">
                                    <input class="form-check-input" name="sport" type="checkbox" value="Swimming" id="swimming">
                                    <label class="form-check-label" for="swimming">Swimming</label>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-check">
                                    <input class="form-check-input" name="sport" type="checkbox" value="Football" id="football">
                                    <label class="form-check-label" for="football">Football</label>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <label for="skillLevel" class="form-label">Skill Level</label>
                            <input type="range" class="form-range" min="1" max="10" step="1" id="skillLevel" name="skillLevel">
                            <div class="text-center">
                                <span>Selected Skill Level: <span id="skillLevelValue">5</span></span>
                            </div>
                        </div>


                        <div class="input-group mt-3">
                            <button type="submit" class="btn btn-outline-primary w-100 fs-6" id="submit">Sign Up</button>
                        </div>

                    </form>
                    <div class="result"></div>
                    <div class="input-group mt-3">
                        <button type="button" class="btn btn-light w-100 fs-6 border-success border-opacity-10"><img src="../assets/img/google.png" style="width: 20px;"><small>Sign Up with Google</small></button>
                    </div>
                    <div class="row mt-3">
                        <small>Have account? <a href="login.php">Log In</a></small>
                    </div>

                </div>
            </div>

        </div>
    </div>
    <script>
        $(document).ready(function() {
            //password toggle
            const togglePasswordVisibility = (toggleBtn, inputField) => {
                toggleBtn.addEventListener('click', (e) => {
                    e.preventDefault();
                    const type = inputField.getAttribute('type') === 'password' ? 'text' : 'password';
                    inputField.setAttribute('type', type);
                    toggleBtn.classList.toggle('bi-eye');
                });
            };

            const togglePassword = document.querySelector('#togglePassword');
            const password = document.querySelector('#pwd');
            togglePasswordVisibility(togglePassword, password);

            const togglePassword1 = document.querySelector('#togglePassword1');
            const confirmPassword = document.querySelector('#c_pwd');
            togglePasswordVisibility(togglePassword1, confirmPassword);


            //validation form
            $('#submit').click(function(e) {
                e.preventDefault();
                var username = $('#uname').val();
                var inEmail = $('#email').val();
                var inPwd = $('#pwd').val();
                var cPwd = $('#c_pwd').val();
                var inPhone = $('#phone').val();
                var inCity = $('#city').val();

                var error = false;

                // Validation Patterns
                var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                var atLeastOneDigit = /^(?=.*\d).+$/;
                var atLeastOneLetter = /^(?=.*[a-zA-Z]).+$/;
                var specialChar = /[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]+/;
                var selectedSports = [];
                $('input[name="sport"]:checked').each(function() {
                    selectedSports.push(this.value);
                });

                // Email Validation
                if (inEmail === "") {
                    $('#emailError').html('Require to Fill');
                    error = true;
                } else if (!emailPattern.test(inEmail)) {
                    $('#emailError').html('Invalid Email');
                    error = true;
                } else {
                    $('#emailError').html('');
                }

                // Password Validation
                if (inPwd === "") {
                    $('#pwdError').html('Require to Fill');
                    error = true;
                } else if (inPwd.length < 8) {
                    $('#pwdError').html('Password length must be at least 8 characters');
                    error = true;
                } else if (!atLeastOneDigit.test(inPwd)) {
                    $('#pwdError').html('Password must contain at least 1 digit');
                    error = true;
                } else if (!atLeastOneLetter.test(inPwd)) {
                    $('#pwdError').html('Password must contain at least 1 letter');
                    error = true;
                } else if (!specialChar.test(inPwd)) {
                    $('#pwdError').html('Password must contain at least 1 special character like ("@, #, *")');
                    error = true;
                } else {
                    $('#pwdError').html('');
                }

                // Confirm Password Validation
                if (inPwd !== cPwd) {
                    $('#c_pwdError').html("Passwords do not match");
                    error = true;
                } else {
                    $('#c_pwdError').html('');
                }

                // Sports Validation
                if (selectedSports.length === 0) {
                    $('#sportError').html('Please select at least one sport');
                    error = true;
                } else {
                    $('#sportError').html('');
                }

                if (!error) {
                    $.post('../API/signupAPI.php', {
                        Username: username,
                        Email: inEmail,
                        Password: inPwd,
                        Phone: inPhone,
                        City: inCity,
                        Sports: selectedSports
                    }, function(response) {
                        console.log(response); // Debugging response
                        if (response.trim() === 'Successfully login!') {
                            window.location.assign('login.php');
                        } else {
                            $('#result').html(response);
                        }
                    }).fail(function(xhr, status, error) {
                        console.error("Error: ", error);
                    });
                }
            });

        });
    </script>
    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous">
    </script>
</body>

</html>