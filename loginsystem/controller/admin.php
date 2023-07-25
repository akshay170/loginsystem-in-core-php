<?php
// session_start();
class admin
{

    //admin view 
    function admin_view()
    {
        // die('1');
        require('./core/Database.php');
        require("./core/query.php");
        // Code for login 
        if (isset($_POST['login'])) {
            //   echo $_SERVER["REQUEST_URI"]; 
            //   die('2');
            $adminusername = $_POST['username'];
            $pass = $_POST['password'];

            $database = new Database();
            $db = $database->__construct();

            $query  = $db->prepare($adminlogin_data_query);
            // $query -> execute();
            $query->execute(array($adminusername, $pass));
            $userid = $query->fetch(PDO::FETCH_ASSOC);
            // echo "<pre>";
            // print_r($userid); die;

            // $a="SELECT * FROM admin WHERE username='$adminusername' and password='$pass'";
            // // $num=mysqli_fetch_array($ret);
            // print_r($a); die;


            if ($userid > 0) {
                // die('11');
                $extra = "/loginsystem/admin_dashbord";
                $_SESSION['login'] = $_POST['username'];
                $_SESSION['adminid'] = $userid['id'];
                // echo "<script>window.location.href='/loginsystem/admin_dashbord'" . $extra . "'</script>";
                header("Location: /loginsystem/admin_dashbord ");
            } else {
                echo "<script>alert('Invalid username or password');</script>";

                echo "<script>window.location.href='/loginsystem/admin_view' '</script>";
            }
        }
        require './views/index.view.php';
    }

    // admin dashbord
    public function admin_dash()
    {
        try {
            // die('1'); 
            require './views/dashboard.view.php';
        } catch (Exception $e) {
            echo "There is some problem in view: " . $e->getMessage();
        }
    }

    // admin manage user 
    public function admin_manage()
    {
        require('./core/Database.php');
        require("./core/query.php");
        // die('1');

        // for deleting user

        if (isset($_POST['id'])) {

            echo "<pre>";
            print_r($_POST['id']);
            die;
            $database = new Database();
            $db = $database->__construct();

            // $query  =$db -> prepare("select id from users");
            // $query -> execute();
            // $totalusers = $query->fetchAll(PDO::FETCH_ASSOC);

            $adminid = $_POST['id'];


            $query = $db->prepare($admin_manage_data_query);
            $query->execute(array($adminid));
            // echo "<pre>";
            // print_r($query);
            // die;
            if ($query) {
                echo "<script>alert('Data deleted');</script>";
            }
        }

        require './views/manage-users.view.php';
    }
    public function admin_user()
    {
        // die('1');
        try {
            // die('1'); 
            require './views/user-profile.view.php';
        } catch (Exception $e) {
            // die('1');
            echo "There is some problem in view: " . $e->getMessage();
        }
    }
    public function  admin_serach()
    {
        try {
            // die('1'); 
            require './views/search-result.view.php';
        } catch (Exception $e) {
            echo "There is some problem in view: " . $e->getMessage();
        }
    }


    public function admin_edit()
    {
        // echo "hi";
        // die;
        include_once('./core/Database.php');
        require("./core/query.php");
        

        $database = new Database();
        $db = $database->__construct();

        $userid = $_POST['update'];


       
        $query = $db->prepare($editpage_data_query);
        $query->execute(array($userid));

        $row1 = $query->fetchAll(PDO::FETCH_ASSOC);
        // print_r($row1);
        // die;
        if ($query) {
            // echo "<script>alert('Profile updated successfully');</script>";
            // echo "<script type='text/javascript'> document.location = '/loginsystem/admin_edit-profile'; </script>";
        }
        require './views/edit-profile.view.php';
    }
    // require './views/edit-profile.view.php';


    function after_edit()
  {
    include_once('./core/Database.php');
    require("./core/query.php");
// code for update
    if (isset($_POST['submit'])) {
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $contact = $_POST['contact'];

        $userid = $_POST['userid'];
// print_r($userid);
// die;
        $database = new Database();
        $db = $database->__construct();
// print_r($db);
// die;
        $query = $db->prepare($admin_edit_data_query);
        // $query->execute(array($fname, $lname, $contact, $userid));
        $query->bindParam(1,$fname,PDO::PARAM_STR);
        $query->bindParam(2, $lname,PDO::PARAM_STR);
        $query->bindParam(3,$contact,PDO::PARAM_INT);
        $query->bindParam(4,$userid,PDO::PARAM_INT);
        $query->execute();
        // print_r($query);
        // die;
        header("Location:  /loginsystem/admin_manage-users ");
    
    }
}
    function  admin_delete()
    {
        $UserId = $_POST['delete_userID'];
        // echo ($UserId);

        include_once('./core/Database.php');
        require("./core/query.php");
        //   echo "$rid";
        $database = new Database();
        $db = $database->__construct();
        //print_r($db);

        $stmt = $db->prepare($admin_manage_data_query);
        //print_r($stmt);
        $stmt->bindParam(1, $UserId, PDO::PARAM_INT);
        $stmt->execute();
        // header("Location: /loginsystem/admin/admin_manage-user");
        echo "<script>alert('Data deleted');</script>";
        
    }
}
