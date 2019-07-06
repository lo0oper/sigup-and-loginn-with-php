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
                            <li id="loginform" onclick="changeclass_login()">LOGIN</li>
                            <li id="signinform" onclick="changeclass_signin()">SIGNUP</li>
                        </ul>
                    </div>

                </div>
            </nav>

            <div class="mid">
                <h1>LETS GET GOING...</h1>

                <div class="modalbox" id="loginmodal">
                    <fieldset>
                        <form  action="home.php" method="post">
                            <div class="imgcontainer">


                                <span onclick="document.getElementById('loginmodal').style.display='none'" class="close"> &times;</span>
                            </div></br>
                            <div class="data">
                                <label><b>USERNAME</b></label></br>
                                <input type="text" placeholder="ENTER  USERNAME" name="uname" required></br>
                                <label><b>PASSWORD</b></label></br>
                                <input type="password" placeholder="ENTER PASSWORD" name="password" required></br>
                                <button type="submit" name="login_btn">LOGIN</button></br></br>
                                <label>

                                    <input type="checkbox" checked="unchecked" name="remember" style="margin-left:5px;">REMEMBER ME</input>
                                </label></br>
                                <span class="forgot" >forgot<a href="forgotpassword">PASSWORD?</a></span>
                            </div>
                        </form>
                    </fieldset>
                </div>

                <div class="modalbox" id="signinmodal">
                    <fieldset>
                        <form  action="home.php" method="post">
                            <div class="imgcontainer">


                                <span onclick="document.getElementById('signinmodal').style.display='none'" class="close"> &times;</span>
                            </div></br>
                            <div class="data">
                                    <label><b>FULL NAME</b></label></br>
                                    <input type="text" placeholder="ENTER  NAME" name="name" required></br>
                                    <label><b>EMAIL</b></label></br>
                                    <input type="text" placeholder="ENTER  EMAIL" name="email" required></br>
                                    <label><b>USERNAME</b></label></br>
                                <input type="text" placeholder="ENTER  USERNAME" name="uname" required></br>
                                <label><b>PASSWORD</b></label></br>
                                <input type="password" placeholder="ENTER PASSWORD" name="password" required></br>
                                <label><b>CONFIRM PASSWORD</b></label></br>
                                <input type="password" placeholder="ENTER PASSWORD" name="cpassword" required></br>

                                <button name="signup_btn" type="submit">SIGNUP</button></br></br>
                                <label>

                                    <input type="checkbox" checked="unchecked" name="remember" style="margin-left:5px;">REMEMBER ME</input>
                                </label></br>
                                <span class="forgot" >forgot<a href="forgotpassword">PASSWORD?</a></span>
                            </div>
                        </form>
                    </fieldset>
                </div>
                </div>
<?php
    if(isset($_POST['signup_btn'])){
         // echo '<script type ="text/javascript"> alert("SIGNNED IN"); </script>';
        $uname=$_POST['uname'];
        $name=$_POST['name'];
        $email=$_POST['email'];
        $password=$_POST['password'];
        $cpassword=$_POST['cpassword'];

        if($password==$cpassword){
            $query ="select * from userinfo WHERE username='$uname'";//fetches the data from the table with uname as username
            $query_run=mysqli_query($con,$query);//this function number of record same as that of query

            if(mysqli_num_rows($query_run) > 0)// numbber of rows returned <?php
            {
                echo '<script type ="text/javascript"> alert("USERNAME ALREADY EXISTS"); </script>';
            }
            else{
                $query="insert into userinfo values ('$uname','$password')";
                $query_run=mysqli_query($con,$query);
                if($query_run){
                    echo '<script type ="text/javascript"> alert("REGISTERED !"); </script>';

                }
                else{
                    echo '<script type ="text/javascript"> alert("ERROR!"); </script>';

                }

            }
        }
        else{
            echo '<script type ="text/javascript"> alert("password and confirm password does not match"); </script>';
        }
    }

	 if(isset($_POST['login_btn'])){
        $uname=$_POST['uname'];
        $password=$_POST['password'];

        $query="select * from userinfo WHERE username='$uname' AND password='$password'";
        $query_run=mysqli_query($con,$query);
        if(mysqli_num_rows($query_run)>0){

            //$_SESSION['username']= $uname;
            //header("location:loggedin.php");
		
        }
        else{
            echo '<script type ="text/javascript"> alert("USERNAME OR PASSWORD  INCORRECT"); </script>';

        }
    }
?>
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


</body>
</html>
