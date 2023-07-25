<!DOCTYPE html>
<html lang="en">


<?php require '../loginsystem/views/partials/head.php' ?>

<?php require '../loginsystem/views/partials/nav.php' ?>



<body>
    <div id="layoutSidenav">

        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4"> User Registration & Login and User Management System With admin panel</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="/loginsystem/">Home</a></li>

                    </ol>
                    <div class="row">
                        <div class="col-xl-4 col-md-6">
                            <div class="card bg-primary text-white mb-4">
                                <div class="card-body">Not Registers Yet</div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="/loginsystem/signup">Signup Here</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-6">
                            <div class="card bg-warning text-white mb-4">
                                <div class="card-body">Already Registered</div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="/loginsystem/login">Login Here</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-4 col-md-6">
                            <div class="card bg-danger text-white mb-4">
                                <div class="card-body">Admin Panel</div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="/loginsystem/admin_view">Login Here</a>

                                </div>
                            </div>
                        </div>

                    </div>
                    <div style="height: 100vh"></div>

                </div>
            </main>
            <?php include_once('../loginsystem/views/partials/footer.php'); ?>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="../loginsystem/js/scripts.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
   
</body>

</html>