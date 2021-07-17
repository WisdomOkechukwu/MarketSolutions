
<?php 
session_start();
include 'helper/LoadingElements/header.php';?>
    <body class="d-flex flex-column">
        <main class="flex-shrink-0"> 
   <!-- Page content-->
            <section class="py-5">
                <div class="container px-5">
                    <!-- Contact form-->
                    <div class="bg-light rounded-3 py-5 px-4 px-md-5 mb-5">
                        <div class="text-center mb-5">
                            <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-person"></i></div>
                            <h1 class="fw-bolder">Log In Here</h1>
                            <p class="lead fw-normal text-muted mb-0">Please Input your Details Below</p>
                        </div>
                        <div class="row gx-5 justify-content-center">
                            <div class="col-lg-8 col-xl-6">
                                <!-- to get an API token!-->
                                <form action="helper/helpers/AuthRequest.php" method="POST">
                                <?php if(isset($_SESSION['VerificationStatus']) && $_SESSION['VerificationStatus'] == "false"){?>

                                <div style="font-size:small;">Wrong Email or Password</div>
                                <?php }?>
                                    <div class="form-floating mb-3">
                                    


                                        <input
                                        <?php if(isset($_SESSION['emailVerification']) && $_SESSION['emailVerification'] == "false"){
                                             echo "style='border-color: red';";
                                             
                                             } ?>   

                                        <?php if(isset($_SESSION['VerificationStatus']) && $_SESSION['VerificationStatus'] == "false"){
                                             echo "style='border-color: red';";
                                             
                                             }?> 
                                        class="form-control" name="email" type="text" value="<?php if(isset($_SESSION['old_email'])){echo $_SESSION['old_email'];}
                                        $_SESSION['old_email'] = "";?>"
                                         placeholder="Enter your name..." required/>
                                        <label for="name">Email</label>
                                        <?php if(isset($_SESSION['emailVerification']) && $_SESSION['emailVerification'] == "false"){?>

                                            <div style="font-size:small;">Invalid Email</div>
                                            <?php }
                                            $_SESSION['emailVerification'] = "";?>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <input
                                        <?php if(isset($_SESSION['VerificationStatus']) && $_SESSION['VerificationStatus'] == "false"){
                                             echo "style='border-color: red';";
                                             
                                             }$_SESSION['VerificationStatus'] = "";?> 
                                        class="form-control" name="password" type="password" placeholder="Enter your name..." required />
                                        <label for="name">Password</label>
                                    </div>
                                   
                                    <div class="d-grid"><button class="btn btn-primary btn-lg" name="login_button" type="submit">Submit</button></div>
                                </form>
                                <div style="text-align: right;">Forgot Password <a style="text-decoration: none;" href="forgotpassword.php">Click Here</a> </div>   
                           
                                <div style="text-align: right;">Not Registered <a style="text-decoration: none;" href="index.php">Click Here</a> </div>   
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
        <!-- Footer-->


<?php include 'helper/LoadingElements/footer.php';?> 
       
