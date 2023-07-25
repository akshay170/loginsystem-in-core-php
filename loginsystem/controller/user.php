<?php

session_start();


class user
{

    public function home_view()
    {
        try {
            require './index.view.php';
        } catch (Exception $e) {
            echo "There is some problem in view: " . $e->getMessage();
        }
    }

    // sigup page 
    function signup()
    {

        require './signup.view.php';
        require '../loginsystem/core/Database.php';
        require '../loginsystem/core/query.php';

        // echo $_SERVER["REQUEST_URI"]; 


        //Code for Registration 
        if (isset($_POST['submit'])) {
            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $contact = $_POST['contact'];

            $database = new Database();
            $db = $database->__construct();
            //  print_r($db);
            // die;
            $stmt = $db->prepare("select id from users where email= ?");
            $stmt->bindParam(1, $email);
            $stmt->execute();




            // print_r($db);
            //  die();

            $stmt = $db->prepare($signup_data_query);
            // print_r($signup_data_query); die;
            $stmt->bindParam(1, $fname);
            $stmt->bindparam(2, $lname);
            $stmt->bindParam(3, $email);
            $stmt->bindparam(4, $password);
            $stmt->bindparam(5, $contact);
            $stmt->execute();




            if ($stmt > 0) {
                echo "<script>alert('Email id already exist with another account. Please try with other email id');</script>";
            } else {

                // //check data correctly insert into databse 

                // $a="insert into users(fname,lname,email,password,contactno) values('$fname','$lname','$email','$password','$contact')";
                // $sql=mysqli_query($con,"select id from users where email='$email'");
                // print_r($a); die;


                if ($stmt) {
                    echo "<script>alert('Registered successfully');</script>";
                    echo "<script type='text/javascript'> document.location = '/loginsystem/login'; </script>";
                }
            }
        }
    }



    // login 

    function login()
    {
        // die('1');

        require('./core/Database.php');
        require './core/query.php';


        // echo $_SERVER["REQUEST_URI"]; 

        if (isset($_POST['login'])) {

            $useremail = $_POST['uemail'];
            $password = $_POST['password'];

            // $dec_password=$password;


            $database = new Database();
            $db = $database->__construct();

            $query = $db->prepare($login_data_query);
            $query->execute(array($useremail, $password));
            $userid = $query->fetch(PDO::FETCH_ASSOC);


            if ($userid > 0) {

                $_SESSION['id'] = $userid['id'];
                $_SESSION['name'] = $userid['fname'];

                // echo "<pre>";
                // echo "hello";
                // print_r($_SESSION);
                // die;

                header("Location: /loginsystem/welcome ");

                // die(12);

                //  require './controller/welcome.php';  
                //   require './welcome.view.php';

            } else {
                echo "<script>alert('Invalid username or password');</script>";
            }
        }
        require './login.view.php';
    }

    // welcome page

    function welcome()
    {

        // die(11);


        require('./core/Database.php');
        require('./core/query.php');

        // echo $_SERVER["REQUEST_URI"]; 
        // die('1');

        $userid = $_SESSION['id'];

        $database = new Database();
        $db = $database->__construct();

        // echo "<pre>";
        // echo "hello";
        // print_r($_SESSION);
        // die;

        $query = $db->prepare($welcome_data_query);
        $query->execute(array($userid));
        $result = $query->fetch(PDO::FETCH_ASSOC);

        require './welcome.view.php';
    }

    // profile page

    function profile()
    {
        // $userid = $_SESSION['id'];
        // die("1");
        require './core/Database.php';
        require './core/query.php';

        $database = new Database();
        $db = $database->__construct();

        $userid = $_SESSION['id'];
        // $query= $db -> prepare("select id,fname ,lname ,email,contactno,posting_date from users ");
        $query = $db->prepare($profile_data_query);

        $query->execute(array($userid));
        $result = $query->fetch(PDO::FETCH_ASSOC);
        // print_r ($result);
        // die();   


        require './profile.view.php';
    }

    // edit profile

    function edit_profile()
    {

        require  '../loginsystem/core/Database.php';
        require '../loginsystem/core/query.php';
        // Code for Update profile 
        if (isset($_POST['update'])) {
            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            $contact = $_POST['contact'];


            $database = new Database();
            $db = $database->__construct();
            $userid = $_SESSION['id'];
            $query = $db->prepare($edit_data_query);
            $query->execute(array($fname, $lname, $contact, $userid));
            // print_r($query); die;
            $result = $query->fetch(PDO::FETCH_ASSOC);
            // print_r($msg);  die;
            // if($result)
            {
                echo "<script>alert('Profile updated successfully');</script>";
                echo "<script type='text/javascript'> document.location ='/loginsystem/profile'; </script>";
            }
        }

        require './edit-profile.view.php';
    }


    // change password

    function Change_Password()
    {
        // echo $_SERVER["REQUEST_URI"]; 
        require '../loginsystem/core/query.php';
        include_once('../loginsystem/core/Database.php');
        // die('1');

        if (isset($_POST['update'])) {
            $oldpassword = $_POST['currentpassword'];
            $newpassword = $_POST['newpassword'];

            $database = new Database();
            $db = $database->__construct();

            // $query = $db -> prepare( "SELECT password FROM users where password='$oldpassword'");
            $query = $db->prepare($changePassword_data_query);
            //  print_r($query);
            //     die;
            // // $query -> execute();
            $query->execute(array($oldpassword));
            $result = $query->fetch(PDO::FETCH_ASSOC);
            // $num = mysqli_fetch_array($sql);
            if ($result > 0) {
                $userid = $_SESSION['id'];
                $ret = $db->prepare("update users set password='$newpassword' where id='$userid'");
                $ret->execute();
                // print_r($ret);
                // die;
                echo "<script>alert('Password Changed Successfully !!');</script>";
                echo "<script type='text/javascript'> document.location = '/loginsystem/change-password'; </script>";
            } else {
                echo "<script>alert('Old Password not match !!');</script>";
                echo "<script type='text/javascript'> document.location = '/loginsystem/change-password'; </script>";
            }
        }
        require './change-password.view.php';
    }
}
