<?php
            // Database connection settings for XAMPP
    $host = 'localhost';
    $dbname = 'PHP_Internship';
    $username = 'root'; 
    $password = ''; 

            // Create database and table if they don't exist
    try 
    {
        $pdo = new PDO("mysql:host=$host", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $pdo->exec("CREATE DATABASE IF NOT EXISTS $dbname");
        $pdo->exec("USE $dbname");

        $pdo->exec("CREATE TABLE IF NOT EXISTS `03_Intern_Applications` 
                    (
                        ID INT AUTO_INCREMENT PRIMARY KEY,
                        Name VARCHAR(255) NOT NULL,
                        Email VARCHAR(255) NOT NULL,
                        Phone VARCHAR(20) NOT NULL,
                        College VARCHAR(255) NOT NULL,
                        Year VARCHAR(10) NOT NULL,
                        Languages TEXT NOT NULL,
                        Availability VARCHAR(255) NOT NULL
                    ) 
                ");
    } 
    catch (PDOException $e) 
    {
        die("Database setup error: " . $e->getMessage());
    }

    $message = "";

            // Handle form submission
    if ($_SERVER['REQUEST_METHOD'] == 'POST') 
    {
        try 
        {
            $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $Name = htmlspecialchars($_POST['name']);
            $Email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
            $Phone = htmlspecialchars($_POST['phone']);
            $College = htmlspecialchars($_POST['college']);
            $Year = htmlspecialchars($_POST['year']);
            $Availability = htmlspecialchars($_POST['availability']);

            $languages = $_POST['languages'];
            $languagesList = implode(', ', array_map('htmlspecialchars', $languages));

            $stmt = $pdo->prepare('INSERT INTO `03_Intern_Applications` 
                                    (Name, Email, Phone, College, Year, Languages, Availability) 
                                    VALUES (?, ?, ?, ?, ?, ?, ?)');
            $stmt->execute([$Name, $Email, $Phone, $College, $Year, $languagesList, $Availability]);

            header("Location: 03_Thank_You.php?message=Thank you for your application!");
            exit();
        } 
        catch (PDOException $e) 
        {
            $message = "Database error: " . $e->getMessage();
        } 
        catch (Exception $e) 
        {
            $message = "Error: " . $e->getMessage();
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Internship Application Portal</title>
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
            .form-container 
            {
                max-width: 600px;
                margin: 50px auto;
                padding: 20px;
                background-color: #444;
                border-radius: 8px;
            }
            .form-group 
            {
                margin-bottom: 15px;
            }
            label 
            {
                display: block;
                margin-bottom: 5px;
                color: white;
            }
            input[type="text"], input[type="email"], input[type="tel"], select, textarea 
            {
                width: 100%;
                padding: 10px;
                border: 1px solid #666;
                border-radius: 12px;
                background-color: #222;
                color: whitesmoke;
                margin: 5px 0;
            }
            textarea 
            {
                height: 100px;
            }
            input[type="submit"] 
            {
                background-color: darkgrey;
                color: #ffd700;
                border: 1px solid white;
                padding: 10px 20px;
                cursor: pointer;
                border-radius: 20px;
                align-self: center;
                display: block;
                margin: 0 auto;
            }
            input[type="submit"]:hover 
            {
                background-color: black;
                color: #ff0000;
            }
            .message 
            {
                text-align: center;
                font-size: 1.2em;
                margin-top: 20px;
                color: darkorange;
            }
        </style>
    </head>
    <body>
        <div class="navbar">
            <a href="03_Intern_Application_Portal.php">Home</a>
            <a href="03_About.php">About</a>
        </div>

        <div class="form-container">
            <h1 style="text-align: center; color: darkblue;">Intern Application Form</h1>
            
            <?php if ($message): ?>
                <div class="message"><?php echo $message; ?></div>
            <?php else: ?>
                <form action="" method="post">
                    <div class="form-group">
                        <label for="name">Full Name:</label>
                        <input type="text" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email Address:</label>
                        <input type="email" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone Number:</label>
                        <input type="tel" id="phone" name="phone" required>
                    </div>
                    <div class="form-group">
                        <label for="college">Name of College:</label>
                        <input type="text" id="college" name="college" required>
                    </div>
                    <div class="form-group">
                        <label for="year">Year of Study:</label>
                        <select id="year" name="year" required>
                            <option value="">Select...</option>
                            <option value="1">1st Year</option>
                            <option value="2">2nd Year</option>
                            <option value="3">3rd Year</option>
                            <option value="4">4th Year</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="languages">Programming Languages Known:</label>
                        <select id="languages" name="languages[]" multiple required>
                            <option value="c">C</option>
                            <option value="cpp">C++</option>
                            <option value="java">Java</option>
                            <option value="javascript">JavaScript</option>
                            <option value="python">Python</option>
                            <option value="html">HTML</option>
                            <option value="css">CSS</option>
                            <option value="php">PHP</option>
                            <option value="sql">SQL</option>
                            <option value="ruby">Ruby</option>
                            <option value="swift">Swift</option>
                            <option value="go">Go</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="availability">Preferred Internship Start Date/Duration:</label>
                        <select id="availability" name="availability" required>
                            <option value="">Select...</option>
                            <option value="immediately">Immediately</option>
                            <option value="in_one_week">In One Week</option>
                            <option value="in_one_month">In One Month</option>
                        </select>
                    </div>
                    <input type="submit" value="Submit Application">
                </form>
            <?php endif; ?>
        </div>

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    </body>
</html>