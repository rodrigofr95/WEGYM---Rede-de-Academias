<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            text-align: center;
            padding: 50px;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
        }

        h1 {
            color: #d9534f;
        }

        p {
            font-size: 18px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Oops! Something went wrong.</h1>
        <?php
        // Display error message if available
        if (isset($_GET['error_message'])) {
            $error_message = urldecode($_GET['error_message']);
            echo "<p>Error Details: $error_message</p>";
        } else {
            echo "<p>We apologize for the inconvenience. Please try again later.</p>";
        }
        ?>
    </div>
</body>

</html>
