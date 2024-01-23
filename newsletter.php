<?php
include("content_fetch.php");
include "inc/top.inc.php";
include "inc/config.inc.php";

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}
?>
<style>
    .form-container {
        max-width: 400px;
        margin: 0 auto;
    }

    .form-label {
        display: block;
        margin-bottom: 8px;
    }

    .form-input {
        width: 100%;
        padding: 8px;
        margin-bottom: 16px;
        box-sizing: border-box;
    }

    .form-button {
        background-color: #4caf50;
        color: white;
        padding: 10px 15px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    .form-h1 {
        font-size: 2rem;
        text-align: center;
    }
</style>

<main>
    <br>
    <h1 class="form-h1">Email Collection Form</h1>
    <br>
    <div class="form-container">
        <form action="newsletter.php" method="post">
            <label class="form-label" for="firstName">First Name:</label>
            <input class="form-input" type="text" id="firstName" name="firstName" required>

            <label class="form-label" for="lastName">Last Name:</label>
            <input class="form-input" type="text" id="lastName" name="lastName" required>

            <label class="form-label" for="email">Email:</label>
            <input class="form-input" type="email" id="email" name="email" required>

            <label class="form-label" for="phone">Phone Number:</label>
            <input class="form-input" type="tel" id="phone" name="phone" required>

            <button class="form-button" type="submit">Submit</button>
        </form>
        <br>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $email = $_POST["email"];
            $first = $_POST["firstName"];
            $last = $_POST["lastName"];
            $phone = $_POST["phone"];

            $sql = "INSERT INTO mails (first, last, mail, phone) VALUES (?, ?, ?, ?)";
            $stmt = $db->prepare($sql);

            // Bind parameters
            $stmt->bind_param("ssss", $first, $last, $email, $phone);

            // Execute the statement
            if ($stmt->execute()) {
                echo "Thank you! Your information has been collected.";
            } else {
                echo "Error: " . $stmt->error;
            }

            // Close the statement and database connection
        } else {
            echo "Invalid request method.";
        }
        ?>

</main>


<?php
include "inc/bot.inc.php";
?>