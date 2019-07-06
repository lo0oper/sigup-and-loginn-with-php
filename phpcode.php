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

            $_SESSION['username']= $uname;
            header("location:loggedin.php");
		
        }
        else{
            echo '<script type ="text/javascript"> alert("USERNAME OR PASSWORD  INCORRECT"); </script>';

        }
    }
?>
