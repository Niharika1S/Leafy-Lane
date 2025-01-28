<?php
session_start();
include('includes/conn.php');
?>





<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Leafy Lane</title>
    <link rel="icon" href="img/favicon.png" />
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/animate.css" />
    <link rel="stylesheet" href="css/owl.carousel.min.css" />
    <link rel="stylesheet" href="css/nice-select.css" />
    <link rel="stylesheet" href="css/lightslider.min.css" />
    <link rel="stylesheet" href="css/all.css" />
    <link rel="stylesheet" href="css/flaticon.css" />
    <link rel="stylesheet" href="css/themify-icons.css" />
    <link rel="stylesheet" href="css/magnific-popup.css" />
    <link rel="stylesheet" href="css/slick.css" />
    <link rel="stylesheet" href="css/price_rangs.css" />
    <link rel="stylesheet" href="css/style.css" />
</head>

<body>

    <header class="main_menu home_menu">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <a class="navbar-brand" href="localhost/plant/">
                            <img src="img/logo.png" alt="logo" />
                        </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="menu_icon"><i class="fas fa-bars"></i></span>
                        </button>
                        <div class="collapse navbar-collapse main-menu-item" id="navbarSupportedContent">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link" href="localhost/plant/">Home</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link" href="category.php">Products</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="contact.php">Contact</a>
                                </li>
                            </ul>
                        </div>
                        <div class="hearer_icon d-flex">
                            <?php
                                $mail = '';
                                if (isset($_SESSION['email'])){
                                    $mail = $_SESSION["email"];
                                }
                                $name= '';

                                $query = 'SELECT * FROM users';
                                $result = mysqli_query($con, $query);
                                while($row = mysqli_fetch_array($result)){
                                    if($row['email'] == $mail){
                                        $name = $row['first_name'] . " " . $row['last_name'];
                                    }
                                }

                            if (isset($_SESSION['email'])) {

                                echo '
                                    <div style="display: flex; align-items: center;">
                                        <div class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle" id="navbarDropdown_3" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                '.$name.'
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="navbarDropdown_3">
                                                <a class="dropdown-item" href="allorders.php">My Orders</a>
                                                <a class="dropdown-item" href="tracking.php">tracking</a>
                                                <a class="dropdown-item" href="scripts/logout_script.php">Logout</a>
                                            </div>
                                        </div>
                                        <div>
                                            <a href="cart.php" id="navbarDropdown3">
                                            <i class="fas fa-cart-plus"></i>
                                            </a>
                                        </div>
                                    </div>
                                    ';
                            } else {
                                echo '<div class="nav-item">
                                        <a href="login.php"><button class="nav-link custom">Login</button></a>
                                    </div>';
                                echo '<div class="nav-item">
                                        <a href="register.php"><button class="nav-link custom">Sign Up</button></a>
                                    </div>';
                            }

                            ?>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
        <
       
    </header>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Response</title>
    <style>
       .content {
            position: absolute;
            top: 70%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="content">
        <?php
        if (isset($_GET['data'])) {
            // Decode the URL-encoded data parameter
            $url_encoded_data = $_GET['data'];
            $decoded_data = urldecode($url_encoded_data);

            // Decode the base64-encoded JSON
            $base64_encoded_json = base64_decode($decoded_data);
            $response_data = json_decode($base64_encoded_json, true);

            // Check if the response indicates successful payment
            if (isset($response_data['status']) && $response_data['status'] === 'COMPLETE') {
                // Payment is successful
                $transaction_id = $response_data['transaction_code'];
                $order_id = $_SESSION['order_id'];

                // Output success message
                echo '<section class="my-5 py-5">
                    <div class="container text-center mt-3 pt-5">
                        <h2>Payment Successful!</h2>';
                echo "<p>Transaction ID: {$transaction_id}</p>";
                echo "<p>Amount: Rs.{$response_data['total_amount']}</p>";
                echo '</div></section>';

                // Clear the stored order ID from session
                unset($_SESSION['order_id']);
            } else {
                // Payment failed or response not as expected
                echo "<h2>Payment Failed!</h2>";
            }
        } else {
            // If data parameter is not set in the URL
            echo "<h2>Error: Invalid Request</h2>";
        }
       ?>
    </div>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <style>
        html, body {
            height: 100%;
            margin: 0;
        }
        .content {
            min-height: 100%;
            padding-bottom: 50px; /* Add padding to make room for the footer */
        }
        .footer_part {
            position: absolute;
            bottom: 0;
            width: 100%;
            background-color: #f0f0f0; /* Add a background color to the footer */
            padding: 20px; /* Add some padding to the footer */
        }
    </style>
</head>
<body>
    
</body>
</html>

<footer class="footer_part">
    <div class="container">
        <div class="row justify-content-around">
            <div class="col-sm-6 col-lg-2">
                <div class="single_footer_part">
                    <h4>Top Products</h4>
                    <ul class="list-unstyled">
                        <li><a href="">Managed Website</a></li>
                        <li><a href="">Manage Reputation</a></li>
                        <li><a href="">Power Tools</a></li>
                        <li><a href="">Marketing Service</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-6 col-lg-2">
                <div class="single_footer_part">
                    <h4>Quick Links</h4>
                    <ul class="list-unstyled">
                        <li><a href="">Jobs</a></li>
                        <li><a href="">Brand Assets</a></li>
                        <li><a href="">Investor Relations</a></li>
                        <li><a href="">Terms of Service</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-6 col-lg-2">
                <div class="single_footer_part">
                    <h4>Features</h4>
                    <ul class="list-unstyled">
                        <li><a href="">Jobs</a></li>
                        <li><a href="">Brand Assets</a></li>
                        <li><a href="">Investor Relations</a></li>
                        <li><a href="">Terms of Service</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-6 col-lg-2">
                <div class="single_footer_part">
                    <h4>Resources</h4>
                    <ul class="list-unstyled">
                        <li><a href="">Guides</a></li>
                        <li><a href="">Research</a></li>
                        <li><a href="">Experts</a></li>
                        <li><a href="">Agencies</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-6 col-lg-4">
                <div class="single_footer_part">
                    <h4>Newsletter</h4>
                    <p>
                        Heaven fruitful doesn't over lesser in days. Appear creeping
                    </p>
                    <div id="mc_embed_signup">
                        <form target="_blank" action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01" method="get" class="subscribe_form relative mail_part">
                            <input type="email" name="email" id="newsletter-form-email" placeholder="Email Address" class="placeholder hide-on-focus" onfocus="this.placeholder = ''" onblur="this.placeholder = ' Email Address '" />
                            <button type="submit" name="submit" id="newsletter-submit" class="email_icon newsletter-submit button-contactForm">
                                subscribe
                            </button>
                            <div class="mt-10 info"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright_part">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="copyright_text">
                        <p>
                            Copyright &copy;
                            <script>
                                document.write(new Date().getFullYear());
                            </script>
                            All rights reserved | This website is made by
                            <a href="" target="_blank">Me</a>
                        </p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="footer_icon social_icon">
                        <ul class="list-unstyled">
                            <li>
                                <a href="#" class="single_social_icon"><i class="fab fa-facebook-f"></i></a>
                            </li>
                            <li>
                                <a href="#" class="single_social_icon"><i class="fab fa-twitter"></i></a>
                            </li>
                            <li>
                                <a href="#" class="single_social_icon"><i class="fas fa-globe"></i></a>
                            </li>
                            <li>
                                <a href="#" class="single_social_icon"><i class="fab fa-behance"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>


