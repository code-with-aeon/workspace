<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Contact Form</title>
        <link href="contact_form.css" rel="stylesheet">
        <link href="bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.4/dist/sweetalert2.all.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.4/dist/sweetalert2.min.css" rel="stylesheet">
        <link rel="stylesheet" href="./src/scripts.js">
        <script src="/src/scripts.js" defer></script>
    </head>
    <body>
        <div class="formms">
            <section class="form-container">
                <header>Contact Form</header>

                <form action="contact_form.php" class="form" method="post" onsubmit="return validateForm()">

                    <div class="input-box">
                        <label>Name <span class="required-field"></span></label>
                        <input type="text" placeholder="Enter Name" name="name">
                    </div>

                    <div class="input-box">
                        <label>Phone Number<span class="required-field"></span></label>
                        <input type="text" placeholder="Enter Mobile Number" name="phoneNumber">
                    </div>

                    <div class="input-box">
                        <label>Email<span class="required-field"></span></label>
                        <input type="email" placeholder="Enter email address" name="email">
                    </div>

                    <button type="submit" name="submit" data-mobilelabel="ok"><span>Submit</span></button>
                </form>
            </section>
        </div>
    <?php
        if (isset($_POST['submit'])) {

            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "contact";
        
            $conn = new mysqli($servername, $username, $password, $dbname);
        
            if ($conn->connect_error) {

                die("Connection failed: " . $conn->connect_error);

            }

            $name = $_POST["name"];
            $phoneNumber = $_POST["phoneNumber"];
            $email = $_POST["email"];

            $sql = "INSERT INTO contact_form(name,phoneNumber,email)
            VALUES ('" . $name . "','" . $phoneNumber . "','" . $email . "')";

            if ($conn->query($sql) === TRUE) {

                echo '<script>
                document.addEventListener("DOMContentLoaded", function() {
                    Swal.fire({
                        title: "Good job!",
                        text: "Form submit successfully!",
                        icon: "success"
                    });
                });
            </script>';
            } else {
                echo
                    "<script type= 'text/javascript'>
                        alert('Error: " . $sql . "<br>" . $conn->error . "');
                    </script>";

            }

            $conn->close();
        }?>
    </body>
</html>