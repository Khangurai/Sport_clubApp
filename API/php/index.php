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
    <?php include('../php/API/index.php');?>
</body>
</html>