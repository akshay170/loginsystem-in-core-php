
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Manage Users | Registration and Login System</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="./css/styles.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    <!-- <script src="./js/scripts.js"></script> -->
</head>

<body class="sb-nav-fixed">
    <?php include_once('./partials/navbar.php'); ?>
    <div id="layoutSidenav">
        <?php include_once('./partials/sidebar.php'); ?>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Manage users</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="/loginsystem/admin_dashbord">Dashboard</a></li>
                        <li class="breadcrumb-item active">Manage users</li>
                    </ol>

                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Registered User Details
                        </div>
                        <div class="card-body">
                            <table id="datatablesSimple">
                                <thead>
                                    <tr>
                                        <th>Sno.</th>
                                        <th>First Name</th>
                                        <th> Last Name</th>
                                        <th> Email Id</th>
                                        <th>Contact no.</th>
                                        <th>Reg. Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Sno.</th>
                                        <th>First Name</th>
                                        <th> Last Name</th>
                                        <th> Email Id</th>
                                        <th>Contact no.</th>
                                        <th>Reg. Date</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                                <tbody>

                                    <?php
                                    $database = new Database();
                                    $db = $database->__construct();

                                    $query  = $db->prepare("select * from users");
                                    $query->execute();
                                    $row = $query->fetchAll(PDO::FETCH_ASSOC);

                                    $cnt = 1;

                                    // echo "<pre>";
                                    // print_r($row);
                                    // die;

                                    // while ($row = mysqli_fetch_array($ret))
                                    // while ($query)
                                    foreach ($row as  $row1) { ?>
                                        <tr>
                                            <td><?php echo $cnt; ?></td>    
                                            <td><?php echo $row1['fname'];
                                              
                                                ?></td>

                                            <td><?php echo $row1['lname']; ?></td>
                                            <td><?php echo $row1['email']; ?></td>
                                            <td><?php echo $row1['contactno']; ?></td>
                                            <td><?php echo $row1['posting_date']; ?></td>
                                            <td>
                                           <?php
                                                //  echo "<pre>";
                                                // var_dump($row1['id']);
                                                // die('hii');
                                                 ?>

                                            <button type="submit" id="btn_update_user"  class="updatebtn"   onclick="admin_edit(<?php  echo $row1['id'] ?>);">Update</button> ||

                                            <button id="delete" name="btn_delete_user" onclick="admin_delete(<?php echo $row1['id'] ?>);">Delete</button>
                        

                                            </td>
                                        </tr>


                                    <?php $cnt = $cnt + 1;
                                    } ?>''

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </main>
            <?php require('./partials/footer.php'); ?>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="./js/scripts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

</body>

</html>