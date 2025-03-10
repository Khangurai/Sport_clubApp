<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Bootstrap demo</title>
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
    crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.3/font/bootstrap-icons.min.css" />
  <link rel="stylesheet" href="../assets/css/style.css" />
  <script src="../assets/js/jquery-3.7.1.min.js"></script>
</head>

<body>
  <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
  <!-- main container -->
  <div
    class="container d-flex justify-content-center align-items-center min-vh-100">
    <!-- login container -->
    <div class="row border rounded-5 p-3 bg-white shadow box-area">
      <!-- left box -->
      <div
        class="col-md-6 rounded-4 d-flex justify-content-center align-items-center flex-column left-box"
        style="background: rgb(150, 150, 245)">
        <div class="featured-image mb-3">
          <img src="../assets/img/1.png" class="img-fluid" style="width: 250px" />
        </div>
        <p
          class="text-white fs-2"
          style="
              font-family: 'Courier New', Courier, monospace;
              font-weight: 700;
            ">
          Be Verified
        </p>
        <small
          class="text-white text-wrap text-center"
          style="font-family: 'Courier New', Courier, monospace">This is the test</small>
      </div>

      <!-- right box -->
      <div class="col-md-6 right-box">
        <div class="row align-items-center">
          <div class="navbar-brand">
            <a class="navbar-brand" href="../index.php" style="font-family:'Montserrat SemiBold' ">
              <h1><img src="../assets/img/logo1.jpg" style="width: 50px;" class="img-fluid rounded-circle">Sports Club</h1>
            </a>
          </div>
          <div class="header-text mb-4">
            <h3>Hello,Please Login!</h3>
            <!-- <p>အချက်အလက်များကိုမှန်မှန်ကန်ကန်ဖြည့်ပေးပါ</p> -->
          </div>
          <form>
            <div class="input-group mb-3">
              <input
                type="text"
                class="form-control form-control-lg bg-light fs-6"
                placeholder="Username"
                name="uname"
                id="uname"
                required />
              <input
                type="text"
                class="form-control form-control-lg bg-light fs-6"
                name="userID"
                id="userID"
                hidden />
            </div>
            <div class="input-group mb-1">
              <input
                type="password"
                class="form-control form-control-lg bg-light fs-6"
                placeholder="Password"
                name="password"
                id="password"
                required />

              <button class="input-group-text bi bi-eye-slash" id="togglePassword"></button>
            </div>
            <div id="result"></div>

            <div class="input-group mb-3 d-flex justify-content-between">
              <div class="form-check">
                <input
                  type="checkbox"
                  class="form-check-input"
                  id="formcheck" />
                <label for="formcheck" class="form-check-label text-secondary"><small>Remember Me</small></label>
              </div>
              <div class="forgot">
                <small><a href="#">Forgot Password?</a></small>
              </div>
            </div>
            <div class="input-group mt-3">

              <button type="submit" class="btn btn-outline-primary w-100 fs-6" id="login">Login</button>
              <!-- <a href="../index.php" class="btn btn-outline-primary w-100 fs-6" id="login">Login</a> -->
            </div>
            <div class="input-group mt-3">
              <button
                type="button"
                class="btn btn-light w-100 fs-6 border-success border-opacity-10">
                <img src="../assets/img/google.png" style="width: 20px" /><small>Sign In with Google</small>
              </button>
            </div>
            <div class="row mt-3">
              <small>Don't have account? <a href="signup.php">Sign Up</a></small>
            </div>
          </form>

        </div>
      </div>
    </div>
  </div>
  <script>
    const togglePassword = document
      .querySelector('#togglePassword');
    const password = document.querySelector('#password');
    $(document).ready(function() {
      togglePassword.addEventListener('click', (e) => {
        e.preventDefault();
        const type = password
          .getAttribute('type') === 'password' ?
          'text' : 'password';
        password.setAttribute('type', type);
        togglePassword.classList.toggle("bi-eye");
      });



      $('#login').click(function(e) {
        e.preventDefault();
        var username = $('#uname').val();
        var inPwd = $('#password').val();
        // var userID = $('#userID').val();
        console.log(username, inPwd);
        if (username === "" || inPwd === "") {
          $('#result').html('<small class="text-danger">All fields are required!</small>');
          return;
        }

        // $.post('./API/loginAPI.php', {
        //   Username: username,
        //   Password: inPwd
        // }, function(response) {
        //   console.log("Response from server:", response); // Debug the response content
        //   if (response.trim() === 'Successfully login!') {
        //     // If login is successful, redirect
        //     console.log("Redirecting to ../index.php...".response);
        //     window.location.assign('../index.php');

        //   } else {
        //     // Display error message if login fails
        //     $('#result').html(`<small class="text-danger">${response}</small>`);
        //   }
        // });

        $.post('./API/loginAPI.php', {
          Username: username,
          Password: inPwd,
        }, function(response) {
          try {
            // Parse the JSON response
            var jsonResponse = JSON.parse(response);

            if (jsonResponse.status === 1) {
              if (jsonResponse.role == 1) { // Admin role
                alert("Redirecting to admin dashboard page...");
                window.location.assign('adminDashboard.php');
              } else if (jsonResponse.role == 0) { // Regular user role
                alert("Redirecting to user profile page...");
                window.location.assign('../index.php');
              }
            } else {
              $('#result').html(jsonResponse.message || "An unknown error occurred.");
            }
          } catch (error) {
            console.error("Error parsing JSON response: ", error);
            $('#result').html("Failed to parse response from server.");
          }
        }).fail(function(xhr, status, error) {
          alert("An error occurred: " + error);
        });





      });
    })
  </script>
  <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous">
  </script>
</body>

</html>