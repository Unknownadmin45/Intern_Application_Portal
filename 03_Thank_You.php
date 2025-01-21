<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Thank You for your Application!</title>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
        <style>
            body 
            {
                font-family: Georgia, 'Times New Roman', Times, serif;
                background-color: #333;
                color: white;
                margin: 0;
                padding: 0;
            }
            .navbar 
            {
                background-color: #000;
                padding: 10px;
                text-align: center;
            }
            .navbar a 
            {
                color: #ffd700;
                text-decoration: none;
                padding: 0 15px;
            }
            .navbar a:hover 
            {
                color: #ff0000;
            }
            .content-container 
            {
                max-width: 800px;
                margin: 50px auto;
                padding: 20px;
                background-color: #444;
                border-radius: 8px;
                text-align: center;
            }
            .content-container h1 
            {
                color: darkorange;
            }
            .content-container p 
            {
                text-align: center;
                line-height: 1.6;
            }
            .button-container 
            {
                margin-top: 20px;
            }
            .button-container a 
            {
                background-color: #ffd700; 
                color: #000; 
                padding: 10px 20px;
                border-radius: 20px;
                text-decoration: none;
                border: 1px solid #000;
            }
            .button-container a:hover 
            {
                color: #ffd700; 
                background-color: #000; 
                border: 1px solid #ffd700;
            }
        </style>
    </head>
    <body>
        <div class="navbar">
            <a href="03_Intern_Application_Portal.php">Home</a>
            <a href="03_About.php">About</a>
        </div>

        <div class="content-container">
            <h1>Thank You!</h1>
            <p>
                Thank you for submitting your application. We have received your information and will be reviewing it shortly. If your profile matches our requirements, we will contact you for further steps.
            </p>
            <p>
                We appreciate your interest in our internship program and wish you the best of luck.
            </p>
            <div class="button-container">
                <a href="03_Intern_Application_Portal.php">Return to Home</a>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    </body>
</html>