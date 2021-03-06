<?php session_start();?>
   
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content />
        <meta name="author" content />
        <title>Modern Business - Start Bootstrap Template</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" /
        
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="asset/asset/css/styles.css" rel="stylesheet" />
    </head>
    <body class="d-flex flex-column">
        <main class="flex-shrink-0">  
   <!-- Page content-->
            <section class="py-5">
                <div class="container px-5">
                    <div class="bg-light rounded-3 py-5 px-4 px-md-5 mb-5">
                        <div class="text-center mb-5">
                            <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-people"></i></div>
                            <h1 class="fw-bolder">Sign Up Here</h1>
                            <p class="lead fw-normal text-muted mb-0">Please Input your Details Below</p>
                        </div>
                        <div class="row gx-5 justify-content-center">
                            <div class="col-lg-8 col-xl-6">
                                <form action="helper/helpers/AuthRequest.php" method="POST">
                                    <!-- Name input-->
                                    <div class="form-floating mb-3">
                                        <input <?php if(isset($_SESSION['nameVerification']) && $_SESSION['nameVerification'] == "false"){
                                             echo "style='border-color: red';";
                                             
                                             } ?>  
                                        class="form-control" name="fullname" type="text" value="<?php if(isset($_SESSION['old_name'])){echo $_SESSION['old_name'];}
                                        $_SESSION['old_name'] = "";?>" placeholder="Enter your name..." required />
                                        <label for="name">Full name</label>

                                        <?php if(isset($_SESSION['nameVerification']) && $_SESSION['nameVerification'] == "false"){?>

                                        <div style="font-size:small;">Invalid Name</div>
                                        <?php }
                                        $_SESSION['nameVerification'] = "";?>
                                    </div>
                                    <!-- Email address input-->
                                    <div class="form-floating mb-3">
                                        <input <?php if(isset($_SESSION['emailVerification']) && $_SESSION['emailVerification'] == "false"){
                                             echo "style='border-color: red';";
                                             
                                             } ?>  
                                             <?php if(isset($_SESSION['UniqueEmail']) && $_SESSION['UniqueEmail'] == "false"){
                                             echo "style='border-color: red';";
                                             
                                             } ?>  
                                        class="form-control" name="email" type="text" value="<?php if(isset($_SESSION['old_email'])){echo $_SESSION['old_email'];}
                                        $_SESSION['old_email'] = "";?>" placeholder="name@example.com" required/>
                                        <label for="email">Email address</label>


                                        <?php if(isset($_SESSION['emailVerification']) && $_SESSION['emailVerification'] == "false"){?>

                                                <div style="font-size:small;">Invalid Email</div>
                                                <?php }
                                                $_SESSION['emailVerification'] = "";?>
                                        <?php if(isset($_SESSION['UniqueEmail']) && $_SESSION['UniqueEmail'] == "false"){?>

                                            <div style="font-size:small;">This Email is used by someone else please Use another email</div>
                                            <?php }
                                            $_SESSION['UniqueEmail'] = "";?>
                                    </div>
                                    <!-- Phone number input-->
                                    <div class="form-floating mb-3">
                                        <input <?php if(isset($_SESSION['phoneVerification']) && $_SESSION['phoneVerification'] == "false"){
                                             echo "style='border-color: red';";
                                             
                                             } ?>
                                        
                                        class="form-control" name="phone" type="text"
                                        value="<?php if(isset($_SESSION['old_phone'])){echo $_SESSION['old_phone'];}
                                        $_SESSION['old_phone'] = "";?>"
                                         placeholder="(123) 456-7890" />
                                        <label for="phone">Phone number</label>
                                        <?php if(isset($_SESSION['phoneVerification']) && $_SESSION['phoneVerification'] == "false"){?>

                                            <div style="font-size:small;">Invalid Phone Number</div>
                                            <?php }
                                            $_SESSION['phoneVerification'] = "";?>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <input <?php if(isset($_SESSION['passwordVerification']) && $_SESSION['passwordVerification'] == "false"){
                                             echo "style='border-color: red';";
                                             
                                             } ?>
                                        class="form-control" name="password" type="password" placeholder="(123) 456-7890" required />
                                        <label for="phone">Password</label>

                                        
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input 
                                        <?php if(isset($_SESSION['passwordVerification']) && $_SESSION['passwordVerification'] == "false"){
                                             echo "style='border-color: red';";
                                             
                                             } ?>
                                             class="form-control" name="confirm_password" type="password" placeholder="(123) 456-7890" required />
                                        <label for="phone">Confirm Password</label>
                                        <?php if(isset($_SESSION['passwordVerification']) && $_SESSION['passwordVerification'] == "false"){?>

                                            <div style="font-size:small;">Password Doesnt Match</div>
                                            <?php }
                                            $_SESSION['passwordVerification'] = "";?>
                                    </div>

                                    <div class="d-grid"><button class="btn btn-primary btn-lg" id="submitButton" name="button_register" type="submit">Submit</button></div>
                                </form>
                                <div style="text-align: right;">Alredy Registered <a style="text-decoration: none;" href="login.php">Login Here</a> </div>
                            </div>
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
        <script src="asset/asset/js/scripts.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    </body>
</html>
       
