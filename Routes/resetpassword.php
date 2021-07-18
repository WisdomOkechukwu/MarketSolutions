
<?php 
session_start();
if(!isset($_SESSION['name_loggedin']))
{
    header("Refresh:0; url=../login.php");
}?>
   
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
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" /
        
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="../asset/asset/css/styles.css" rel="stylesheet" />
    </head>
    <body class="d-flex flex-column">
        <main class="flex-shrink-0"> 
   <!-- Page content-->
            <section class="py-5">
                <div class="container px-5">
                    <!-- Contact form-->
                    <div class="bg-light rounded-3 py-5 px-4 px-md-5 mb-5">
                        <div class="text-center mb-5">
                            <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-unlock"></i></div>
                            <h1 class="fw-bolder">Reset password</h1>
                            <p class="lead fw-normal text-muted mb-0">Please Input your Details Below</p>
                        </div>

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
                            <?php if(isset($_SESSION['resteStatus']) && $_SESSION['resteStatus'] == "true"){?>
                            <div class="d-flex align-items-center" style="padding-bottom: 10px;">
								<strong>Reset Successufull</strong>
								<div class="spinner-grow text-success ms-auto" role="status" aria-hidden="true"></div>
							</div>
                            <?php 
                            header("Refresh:2; url=Dashboard.php");}?>

                                <!-- to get an API token!-->
                                <form action="../helper/helpers/DashboardHelper.php" method="POST">

                               
                                <div class="form-floating mb-3">
                                        <input class="form-control" name="email" value="<?php echo $_SESSION['email_loggedin'];?>" type="hidden" placeholder="Enter your name..." required 
                                        <?php if(isset($_SESSION['resteStatus']) && $_SESSION['resteStatus'] == "true"){echo "disabled";} 
                                        $_SESSION['resteStatus'] = "";?>  />
                                        <label for="name">Email</label>
                                    </div>
                                    
                                    <div class="form-floating mb-3">
                                        <input class="form-control" name="password" type="password" placeholder="Enter your name..." required />
                                        <label for="name">New Password</label>
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
        <footer class="bg-dark py-4 mt-auto">
            <div class="container px-5">
                <div class="row align-items-center justify-content-between flex-column flex-sm-row">
                    <div class="col-auto" style="padding-left: 41%;"><div class="small m-0 text-white">Copyright &copy; Market Solutions 2021</div></div>
                </div>
            </div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="../asset/asset/js/scripts.js"></script>
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    </body>
</html>
       
