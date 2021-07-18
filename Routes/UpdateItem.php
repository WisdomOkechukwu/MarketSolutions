<?php 
session_start();
if(!isset($_SESSION['name_loggedin']))
{
    header("Refresh:0; url=../login.php");
}

?><!DOCTYPE html>
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
    <body class="d-flex flex-column">
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
            <!-- Page Content-->
            <section class="py-5">
                <div class="container px-5">
                    <h1 class="fw-bolder fs-5 mb-4">Update Product</h1>
                    <div class="card border-0 shadow rounded-3 overflow-hidden">
                        <div class="card-body p-0">
                            <div class="row gx-0">
                                <div class="col-lg-6 col-xl-5 py-lg-5">
                                    <div class="p-4 p-md-5">
                                        <div class="badge bg-primary bg-gradient rounded-pill mb-2">Information</div>
                                        <div class="h2 fw-bolder">Hello<br><?php echo $_SESSION['name_loggedin'];?></div>
                                        <p>Here You can update your products and we will change it on the global page for buyers to purchase</p>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-xl-7"><div class="bg-featured-blog" style="background-image: url('../asset/delta/Products.png')"></div></div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="py-5 bg-light">
                <div class="container px-5">
                    <div class="row gx-5 justify-content-center">
                            <div class="col-lg-8 col-xl-6">
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
                                <?php if(isset($_SESSION['UpdatedStatus']) && $_SESSION['UpdatedStatus'] == "true"){
                                    $_SESSION['UpdatedStatus'] = "";
                                    ?>
                                    <div class="d-flex align-items-center" style="padding-bottom: 10px;">
                                        <strong>Updated Product(You can go back to your product page)</strong>
                                        <div class="spinner-grow text-warning ms-auto" role="status" aria-hidden="true"></div>
                                    </div>
                                <?php } ?>


                                <form action="../helper/helpers/ItemRequest.php" method="POST">
                                    <!-- Name input-->
                                    <?php if (isset($_SESSION['nameVerification']) &&$_SESSION ['nameVerification'] == "false") {?>
                                        <style>
                                            #TextedName{
                                                border-color: red;
                                            }
                                        </style>
                                    <?php } ?>

                                    <div class="form-floating mb-3">
                                        <input id="TextedName" class="form-control"
                                        value="<?php if(isset($_SESSION['old_itemName']) && $_SESSION['old_itemName']!="")
                                        {echo "$_SESSION[old_itemName]"; $_SESSION['old_itemName']="";}
                                        if(isset($_SESSION['getNameValue']) && $_SESSION['getNameValue']!=""){echo "$_SESSION[getNameValue]";}?>"
                                        name="name" type="text" placeholder="Enter your name..."/>
                                        <label for="name">Item Name</label>



                                        <?php if(isset($_SESSION['nameVerification']) && $_SESSION['nameVerification'] == "false"){?>

                                        <div style="font-size:small;">Invalid Item Name</div>
                                        <?php }
                                            $_SESSION['nameVerification'] = "";?>



                                        <input id="texteArea" class="form-control" name="message" type="hidden" value="Lke" placeholder="Enter your message here..." ></input>
                                    </div>




                                   




                                    <?php if (isset($_SESSION['priceVerification']) && $_SESSION['priceVerification'] == "false") {?>
                                        <style>
                                            #priceid{
                                                border-color: red;

                                            }
                                        </style>
                                    <?php } ?>

                                    <div class="form-floating mb-3">
                                        <input id="priceid" class="form-control" 
                                        value="<?php if(isset($_SESSION['old_itemPrice'])&& $_SESSION['old_itemPrice']!="")
                                        {echo "$_SESSION[old_itemPrice]";$_SESSION['old_itemPrice'] ="";}
                                        if(isset($_SESSION['getRandomValue']) && $_SESSION['getRandomValue']!=""){echo "$_SESSION[getRandomValue]";}?>"

                                        name="price" type="text" placeholder="Enter your name..."/>
                                        <label for="name">Item Price</label>



                                        <?php if(isset($_SESSION['priceVerification']) && $_SESSION['priceVerification'] == "false"){?>

                                        <div style="font-size:small;">Invalid Price please Use the format e.g 9.99</div>
                                        <?php }
                                            $_SESSION['priceVerification'] = "";?>

                                    </div>
                                    


                                    <input class="form-control" 
                                    value="<?php if(isset($_SESSION['getRandomString'])){echo "$_SESSION[getRandomString]";}?>"name="Random"
                                    type="hidden" placeholder="Enter your name..."/>
                                    <div class="d-grid"><button class="btn btn-warning btn-lg" name="update_task" type="submit">Update Task</button></div>
                                </form>
                            </div>
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
