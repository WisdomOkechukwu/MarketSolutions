<?php 
session_start();

// echo $_SESSION['name_loggedin']."<br>";
// echo $_SESSION['email_loggedin']."<br>";
// echo $_SESSION['Random_loggedin'];
if(!isset($_SESSION['name_loggedin']))
{
    header("Refresh:0; url=../login.php");
}

require_once "../UserController/UserController.php";
$user = new UserController();


$UserPersonal = $user->showPersonalItems($_SESSION['Random_loggedin']);


?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Modern Business - Start Bootstrap Template</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="../vendor/asset/css/styles.css" rel="stylesheet" />
    </head>
    <body class="d-flex flex-column h-100">
        <main class="flex-shrink-0">
            <!-- Navigation-->
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <div class="container px-5">
                    <a class="navbar-brand" href="Dashboard.php">Market Solutions</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <li class="nav-item"><a class="nav-link" href="ItemPost.php">Products</a></li>
                            <li class="nav-item"><a class="nav-link" href="resetpassword.php">Reset Password</a></li>
                            <li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
           
            <!-- Blog preview section-->
            <section class="py-5">
                <div class="container px-5 my-5">
                    <div class="row gx-5 justify-content-center">
                        <div class="col-lg-8 col-xl-6">
                                
                            <div class="text-center">
                                <h2 class="fw-bolder">Your Products <br> 
                                <a href="PersonalItems.php" class="btn btn-success"><i class="bi bi-plus-square"></i> Add Product</a></h2>
                                <p class="lead fw-normal text-muted mb-5"></p>
                                <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                                    <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                                    </symbol>
                                    <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
                                        <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
                                    </symbol>
                                    <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                                        <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                                    </symbol>
                                </svg>
                                <?php if(isset($_SESSION['DeletedTasked']) && $_SESSION['DeletedTasked'] == "true"){
                                    $_SESSION['DeletedTasked'] = "";
                                    ?>
                                    <div class="d-flex align-items-center" style="padding-bottom: 10px;">
                                        <strong>Product Has Been Beleted</strong>
                                        <div class="spinner-grow text-danger ms-auto" role="status" aria-hidden="true"></div>
                                    </div>
                                <?php } ?>
                                
                            </div>
                        </div>
                    </div>
                    <div class="row gx-5">
                <?php foreach ($UserPersonal as $key => $value) {?>
                    <div class="col-lg-4 mb-5">
                            <div class="card h-100 shadow border-0">
                                <img class="card-img-top" src="../vendor/delta/Item and Products.png" alt="..." />
                                <div class="card-body p-4">
                                    <div class="badge bg-primary bg-gradient rounded-pill mb-2">Information</div>
                                    <h5 class="card-title mb-3"><?php echo $value['name']?></h5>
                                    <p class="card-text mb-0"><?php echo "$$value[price]"?></p>
                                </div>
                                <div class="card-footer p-4 pt-0 bg-transparent border-top-0">
                                    <div class="d-flex align-items-end justify-content-between">
                                        <div class="d-flex align-items-center">
                                            <img class="rounded-circle me-3" src="../vendor/delta/Market.png" alt="..." />
                                            <div class="small">
                                                <div class="fw-bold"><?php 
                                                $KeyName = $user->getUserByRandomID($value['foriegnid']);
                                                echo $KeyName[0]['name'];
                                                ?></div>
                                                <div class="text-muted"><?php echo $value['created_at']?></div>
                                            </div>
                                        </div>
                                        <div style="text-align: right; " class="text-muted">
                                            <a href="../helper/helpers/ItemRequest.php?edit=<?php echo $value['random']?>" class="btn btn-secondary btn-sm">
                                            <i class="bi bi-pencil-square"></i></a>


                                            <a href="../helper/helpers/ItemRequest.php?delete=<?php echo $value['random']?>" class="btn btn-danger btn-sm">
                                            <i class="bi bi-x-circle"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                <?php } ?>
                    </div>
                </div>
            </section>
        </main>
        <!-- Footer-->
        <footer class="bg-dark py-4 mt-auto">
            <div class="container px-5">
                 <div class="row align-items-center justify-content-between flex-column flex-sm-row">
                    <div style="text-align: center;"><div class="small m-0 text-white">Copyright &copy; Market Solutions 2021</div></div>
                </div>
            </div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="../vendor/asset/js/scripts.js"></script>
    </body>
</html>
