<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Candal|Lora" rel="stylesheet">

    <!-- Custom Styling -->
    <link rel="stylesheet" href="css/style.css">

    <title>Finder</title>
</head>

<body style="background-image: url('cric2.jpg'); background-repeat: no-repeat; background-size: cover;">

    <header>
        <div class="logo">
            <h1 class="logo-text"><span>Tournament </span>Finder</h1>
        </div>
        <i class="fa fa-bars menu-toggle"></i>
        <ul class="nav">
            <li><a href="#footer">About</a></li>
            <li>
                <a href="{{ route('login') }}">
                    <i class="fa fa-user"></i>
                    Login
                </a>
            </li>
        </ul>
    </header>

    <!-- Page Wrapper -->
    <div class="page-wrapper">

        <div class="content clearfix">

            <!-- Main Content -->
            <div class="main-content">
                <h1 class="recent-post-title"></h1>

                <div class="post clearfix">
                    <img src="images/image_8.png" alt="" class="post-image">
                    <div class="post-preview">
                        <h2><a href="user_regis.php">You don't play for the crowd, you play for the country.</a></h2>
                        <i class="far fa-user"> Dhayalan</i>
                        &nbsp;
                        <i class="far fa-calendar"><?= date('d-m-Y H:i:s') ?></i>
                        <p class="preview-text">
                            First of all, convince yourself that you are the best because
                            the rest of your life is going to go proving this to others.
                        </p>
                        <a href="{{ route('register') }}" class="btn read-more">Match</a>
                    </div>
                </div>

                <div class="post clearfix">
                    <img src="images/image_10.png" alt="" class="post-image">
                    <div class="post-preview">
                        <h2><a href="user_regis1.php">When you see a good move,look for a better one</a></h2>
                        <i class="far fa-user"> Deepakraj</i>
                        &nbsp;
                        <i class="far fa-calendar"><?= date('d-m-Y H:i:s') ?></i>
                        <p class="preview-text">
                            Right now Indian Air Force mission be like:We enter the territory once and
                            finish you,for life...... kabaddi, kabbadi
                        </p>
                        <a href="{{ route('register') }}" class="btn read-more">Match</a>
                    </div>
                </div>

            </div>


        </div>
        <!-- // Page Wrapper -->

        <!-- footer -->
        <div class="footer" id="footer">
            <div class="footer-content">

                <div class="footer-section about">
                    <h1 class="logo-text"><span>Tournament</span> Finder</h1>
                    <p>
                        TournamentFinder is a fictional blog conceived for the purpose of a tournaments on YouTube.
                        However, Awa has a blog called pieceofadvice.org where he writes truly inspiring stuff.
                    </p>
                    <div class="contact">
                        <span><i class="fas fa-phone"></i> &nbsp; 9976755166 ,6382953372</span>
                        <span><i class="fas fa-envelope"></i> &nbsp; turtfinder@gmail.com</span>
                    </div>
                    <div class="socials">
                        <a href="#"><i class="fab fa-facebook"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>

                <div class="footer-section links">
                    <h2>Quick Links</h2>
                    <br>
                    <ul>
                        <a href="#">
                            <li>Events</li>
                        </a>
                        <!-- <a href="#">
            <li>Team</li>
          </a>
          <a href="#"> -->
                        <!-- <li>Mentores</li>
          </a> -->
                        <a href="#">
                            <li>Gallery</li>
                        </a>
                        <a href="#">
                            <li>Terms and Conditions</li>
                        </a>
                    </ul>
                </div>

                <div class="footer-section contact-form">
                    <h2>Contact us</h2>
                    <br>
                    <form action="index.html" method="post">
                        <input type="email" name="email" class="text-input contact-input"
                            placeholder="Your email address...">
                        <textarea rows="4" name="message" class="text-input contact-input"
                            placeholder="Your message..."></textarea>
                        <button type="submit" class="btn btn-big contact-btn">
                            <i class="fas fa-envelope"></i>
                            Send
                        </button>
                    </form>
                </div>

            </div>

            <div class="footer-bottom">
                &copy; turtfinder@gmail.com | Designed by Deepakraj
            </div>
        </div>
        <!-- // footer -->


        <!-- JQuery -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

        <!-- Slick Carousel -->
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js">
        </script>

        <!-- Custom Script -->
        <script src="js/scripts.js"></script>

</body>

</html>