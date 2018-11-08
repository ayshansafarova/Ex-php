<?php
$name = $phone = $email = $date = $event = "";
$nameEr = $phoneEr = $dateEr = $emailEr = $eventEr = "";
$count = 0;
//session
session_start();
$_SESSION['name'] = $name;
$_SESSION['email'] = $email;
$_SESSION['phone'] = $phone;
session_destroy();
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    if (empty($_POST["name"])) {
        $nameEr = "Ad daxil edin!";
    }else {
        $name = test_input($_POST["name"]);
        if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
            $nameEr = "Ancaq herf ve bosluq istifade oluna biler!";
        }
        else{
            $count++;
        }
    }
    if (empty($_POST["email"])) {
        $emailEr = "Email daxil edin!";
    }else {
        $email = test_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailEr = "Emailin formati yanlisdir";
        }
        else{
            $count++;
        }
    }
    if (empty($_POST["phone"])) {
        $phoneEr = "Telefon nomresini daxil edin!";
    }else {
        $phone = test_input($_POST["phone"]);
        if (!preg_match("/^[0-9]{10}$/", $phone)) {
            $phoneEr = "Telefon nomresini duzgun formatda yazin!";
        }
        else{
            $count++;
        }
    }
    if (empty($_POST["date"])) {
        $dateEr = "Tarix daxil edin!";
    }else {
        $date = test_input($_POST["date"]);
        if (!preg_match("/^[0-9]{1,2}\/[0-9]{1,2}\/[0-9]{4}$/", $date)) {
            $dateEr = "Tarixi duzgun formatda yazin!";
        }
        else{
            $count++;
        }
    }
    if (empty($_POST["event"])) {
        $eventEr = "Eventi secin!";
    }else {
        $event = test_input($_POST["event"]);
        $count ++;
    }
}
function test_input($data) {
    $data = trim($data); //strips unnecessary characters (extra space, tab, newline)
    $data = stripslashes($data); // removes slash
    $data = htmlspecialchars($data); //converts special characters to HTML entities like <>, &lt; and &gt
    return $data;
}
//$_SERVER["PHP_SELF"] is a super global variable that returns the filename of the currently executing script.
//If PHP_SELF is used in your page then a user can enter a slash (/) and then some Cross Site Scripting (XSS) commands to execute.
//The preg_match() function searches a string for pattern, returning true if the pattern exists, and false otherwise.
//A cookie is often used to identify a user. A cookie is a small file that the server embeds on the user's computer.
//Each time the same computer requests a page with a browser, it will send the cookie too.
//With PHP, you can both create and retrieve cookie values.
?>
<html>
<body>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="vendors/linericon/style.css">
    <link rel="stylesheet" href="vendors/owl-carousel/owl.carousel.min.css">
    <link rel="stylesheet" href="vendors/lightbox/simpleLightbox.css">
    <link rel="stylesheet" href="vendors/nice-select/css/nice-select.css">
    <link rel="stylesheet" href="vendors/animate-css/animate.css">
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-mousewheel/3.1.13/jquery.mousewheel.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<section class="book_table_area section_gap">
    <div class="container">
        <div class="book_table_inner row mt-4">
            <div class="col-lg-5">
                <div class="table_img">
                    <img src="https://cdn.jamieoliver.com/home/wp-content/uploads/2016/06/2.jpg" alt="">
                </div>
            </div>
            <div class="col-lg-7">
                <div class="table_form">
                    <h3>Book a Table</h3>
                    <p>Who are in extremely love with eco friendly system lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                    <form class="book_table_form row" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group col-md-12">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name: ex, Ayshan">
                            <div class="error"><?php echo $nameEr ?></div>
                        </div>
                        <div class="form-group col-md-12">
                            <input type="email" class="form-control" id="email" name="email" placeholder="Enter email address: ex, lorem@mail.ru">
                            <div class="error"><?php echo $emailEr ?></div>
                        </div>
                        <div class="form-group col-md-12">
                            <input type="text" class="form-control" id="subject" name="phone" placeholder="Phone Number: ex, 055 785 83 82">
                            <div class="error"><?php echo $phoneEr ?></div>
                        </div>
                        <div class="form-group col-md-12">
                            <input type="text" class="form-control" id="subject" name="date" placeholder="Select date: ex, 28/03/2018">
                            <div class="error"><?php echo $dateEr ?></div>
                        </div>
                        <div class="form-group col-md-12">
                            <div class="form-select">
                                <select style="display: none;" name="event">
                                    <option value="1">Select event</option>
                                    <option value="1">Select event Dhaka</option>
                                    <option value="1">Select event Dilli</option>
                                    <option value="1">Select event Newyork</option>
                                    <option value="1">Select event Islamabad</option>
                                </select>
                                <div class="nice-select" tabindex="0">
                                    <span class="current">Select event</span>
                                    <ul class="list">
                                        <li data-value="1" class="option">Select event</li>
                                        <li data-value="1" class="option focus">Select event Dhaka</li>
                                        <li data-value="1" class="option selected">Select event Dilli</li>
                                        <li data-value="1" class="option">Select event Newyork</li>
                                        <li data-value="1" class="option">Select event Islamabad</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="error"><?php echo $eventEr ?></div>
                        </div>
                        <div class="form-group col-md-12">
                            <input type="submit" value="Make Reservation" class="btn submit_btn form-control"></input>
                        </div>
                    </form>
                    <div class="form-group col-md-12">
                        <label>
                            <?php
                            if($count == 5){
                                echo "Emailinize rezervasiya melumatlari gonderilib";
                            }
                            ?>
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

</body>
<style>
    .table_form {
        background: #f9f9ff;
        height: 100%;
        padding: 50px 100px;
    }
    .error{
        color: red;
    }
    .submit_btn {
        width: auto;
        display: inline-block;
        background: #f42f2c;
        padding: 0px 30px;
        color: #fff;
        font-family: "Roboto", sans-serif;
        font-size: 13px;
        font-weight: 500;
        height: 50px;
        line-height: 50px;
        border-radius: 5px;
        outline: none !important;
        border: 1px solid #f42f2c;
        text-align: center;
        cursor: pointer;
        transition: all 300ms linear 0s;
        box-shadow: -14px 14px 60px rgba(244, 47, 44, 0.32);
    }
</style>
<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/popper.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/stellar.js"></script>
<script src="vendors/lightbox/simpleLightbox.min.js"></script>
<script src="vendors/nice-select/js/jquery.nice-select.min.js"></script>
<script src="vendors/isotope/imagesloaded.pkgd.min.js"></script>
<script src="vendors/isotope/isotope-min.js"></script>
<script src="vendors/owl-carousel/owl.carousel.min.js"></script>
<script src="js/jquery.ajaxchimp.min.js"></script>
<script src="vendors/counter-up/jquery.waypoints.min.js"></script>
<script src="vendors/counter-up/jquery.counterup.js"></script>
<script src="js/mail-script.js"></script>
<script src="vendors/popup/jquery.magnific-popup.min.js"></script>
<script src="vendors/scroll/jquery.mCustomScrollbar.js"></script>
<script src="vendors/swiper/js/swiper.min.js"></script>
<script src="js/theme.js"></script>
</html>