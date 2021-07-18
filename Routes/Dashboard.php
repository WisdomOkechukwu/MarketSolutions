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

$ProductData = $user->showItemOnDashboard();
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
        <link href="../asset/asset/css/styles.css" rel="stylesheet" />
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
            <!-- Header-->
            <header class="bg-dark py-5">
                <div class="container px-5">
                    <div class="row gx-5 align-items-center justify-content-center">
                        <div class="col-lg-8 col-xl-7 col-xxl-6">
                            <div class="my-5 text-center text-xl-start">
                                <h1 class="display-5 fw-bolder text-white mb-2">Welcome <br><?php if(isset($_SESSION['name_loggedin'])){echo $_SESSION['name_loggedin'];}?></h1>
                                <p class="lead fw-normal text-white-50 mb-4">We bring your products to the world where buyers pay for your products care to join just click the button below to add a new product</p>
                                <div class="d-grid gap-3 d-sm-flex justify-content-sm-center justify-content-xl-start">
                                    <a class="btn btn-outline-light btn-lg px-4" href="PersonalItems.php">Add Product</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-5 col-xxl-6 d-none d-xl-block text-center"><img class="img-fluid rounded-3 my-5" src="../asset/delta/Market Solutions.png" alt="..." /></div>
                    </div>
                </div>
            </header>
           
            <!-- Blog preview section-->
            <section class="py-5">
                <div class="container px-5 my-5">
                    <div class="row gx-5 justify-content-center">
                        <div class="col-lg-8 col-xl-6">
                            <div class="text-center">
                                <h2 class="fw-bolder">Latest Products</h2>
                                <p class="lead fw-normal text-muted mb-5"></p>
                            </div>
                        </div>
                    </div>
                    <div class="row gx-5">
                        <?php foreach ($ProductData as $key => $value) {?>
                            <div class="col-lg-4 mb-5">
                                <div class="card h-100 shadow border-0">
                                    <img class="card-img-top" src="../asset/delta/Item and Products.png" alt="..." />
                                    <div class="card-body p-4">
                                        <div class="badge bg-primary bg-gradient rounded-pill mb-2">Information</div>
                                        <h5 class="card-title mb-3"><?php echo $value['name']?></h5>
                                        <p class="card-text mb-0"><?php echo "$".$value['price']?></p>
                                    </div>
                                    <div class="card-footer p-4 pt-0 bg-transparent border-top-0">
                                        <div class="d-flex align-items-end justify-content-between">
                                            <div class="d-flex align-items-center">
                                                <img class="rounded-circle me-3" src="..asset/delta/Market.png" alt="..." />
                                                <div class="small">
                                                    <div class="fw-bold"><?php 
                                                $KeyName = $user->getUserByRandomID($value['foriegnid']);
                                                echo $KeyName[0]['name'];
                                                ?></div>
                                                    <div class="text-muted"><?php echo $value['created_at'];?></div>
                                                </div>
                                            </div>
                                            <?php if($value['foriegnid'] == $_SESSION['Random_loggedin']){?>
                                                <div style="text-align: right; " class="text-muted"><a href="../helper/helpers/ItemRequest.php?edit=<?php echo $value['random']?>" class="btn btn-secondary btn-sm"><i class="bi bi-pencil-square"></i> Edit</a></div>

                                            <?php }else {?>
                                                <div style="text-align: right; " class="text-muted"><button class="btn btn-secondary btn-sm"><i class="bi bi-credit-card"></i> Pay</button></div>
                                            <?php }?>
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
        <script src="../asset/asset/js/scripts.js"></script>
    </body>
</html>
