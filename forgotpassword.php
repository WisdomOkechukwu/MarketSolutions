
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
                            <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-unlock"></i></div>
                            <h1 class="fw-bolder">Forgot password</h1>
                            <p class="lead fw-normal text-muted mb-0">Please Input your Details Below</p>
                        </div>
                        <div class="row gx-5 justify-content-center">
                            <div class="col-lg-8 col-xl-6">
                                <!-- to get an API token!-->
                                <form action="helper/helpers/AuthRequest.php" method="POST">

                                <div class="form-floating mb-3">
                                        <input 
                                        <?php if(isset($_SESSION['emailVerification']) && $_SESSION['emailVerification'] == "false"){
                                             echo "style='border-color: red';";
                                             
                                             } ?> 

                                            <?php if(isset($_SESSION['emailErrorVerification'])  && $_SESSION['emailErrorVerification'] == "true"){
                                                echo "style='border-color: red';";
                                             
                                             } ?> 
                                        class="form-control" 
                                        value="<?php if(isset($_SESSION['old_email'])){echo $_SESSION['old_email'];}
                                        $_SESSION['old_email'] = "";?>"
                                        name="email" type="text" placeholder="Enter your name..." required />
                                        <label for="name">Email</label>
                                        <?php if(isset($_SESSION['emailVerification']) && $_SESSION['emailVerification'] == "false"){?>

                                                <div style="font-size:small;">Invalid Email</div>
                                                <?php }
                                                $_SESSION['emailVerification'] = "";?>

                                        <?php if(isset($_SESSION['emailErrorVerification']) && $_SESSION['emailErrorVerification'] == "true"){?>

                                        <div style="font-size:small;">Email Address does exsists</div>
                                        <?php }
                                        $_SESSION['emailErrorVerification'] = "";?>
                                    </div>

                                    
                                    <div class="form-floating mb-3">
                                        <input 
                                        <?php if(isset($_SESSION['passwordVerification'])  && $_SESSION['passwordVerification'] == "false"){
                                                echo "style='border-color: red';";
                                             
                                             } ?> class="form-control" name="password" type="password" placeholder="Enter your name..." required />
                                        <label for="name">New Password</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input 
                                        <?php if(isset($_SESSION['passwordVerification'])  && $_SESSION['passwordVerification'] == "false"){
                                                echo "style='border-color: red';";
                                             
                                             } ?> class="form-control" name="Confirm_password" type="password" placeholder="Enter your name..." required />
                                        <label for="name">New Confirm Password</label>
                                        <?php if(isset($_SESSION['passwordVerification']) && $_SESSION['passwordVerification'] == "false"){?>

                                                <div style="font-size:small;">Password does not match</div>
                                                <?php }
                                                $_SESSION['passwordVerification'] = "";?>
                                    </div>


                                    <div class="d-grid"><button class="btn btn-primary btn-lg" name="forgot" type="submit">Submit</button></div>
                                </form>
                               
                                <div style="text-align: right;">Login Here <a style="text-decoration: none;" href="login.php">Click Here</a> </div>   
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
        <!-- Footer-->


<?php include 'helper/LoadingElements/footer.php';?> 
       
