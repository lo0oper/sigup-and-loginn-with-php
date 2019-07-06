<?php
    require '/opt/lampp/htdocs/website/dbconfig/config.php';

    session_start();


?>


<!doctypehtml>
<html>
    <link href="style.css"  rel="stylesheet" type="text/css">
    <script src="java.js"></script>
    <meta name="viewport" content="width=device-width, intial-scale=1">
    <body>
        <div class="container">
            <nav class="navbar">
                <div class="navbar-menu">
                    <div class=right>
                        <ul>
                            <li><a href="./tech.html">TECH</a></li>
                            <li><a href="./places.html">PLACES</a></li>
                            <li><a href="./home.html">HOME</a></li>
                        </ul>
                    </div>
                    <div class="left">
                        <ul>
                           <li ><?php echo$_SESSION['username'];?></li></br>
                            <li><input type="submit" name="logout_btn" id="logout_btn"  value="Log Out"></li>
                        </ul>
                    </div>

                </div>
            </nav>
<?php
    if(isset($_POST['logout_btn'])){

        session_destroy();
       header('location:home.php');
    }
?>

            <div class="mid">
                <h1>LETS GET GOING...</h1>



            </div>

            <div class="footer">
                <footer>
                    <div>
                       <h2>NAME IS THE ANKUSH_PANDEY</h2>
                       <h2>TOTAL VISITORS</h2>
                       <p class="counter"></p>
                    </div>
                    <div class="footer-menu">
                        <ul>
                            <li><a>MY FACEBOK</a></li>
                            <li><a>MY GIT</a></li>
                            <li><a>MY MEDIUM</a></li>
                        </ul>
                    </div>
                </footer>
            </div>
        </div>


    </body>


</html
