<?php
//header('Content-Type: application/json');
 include "../config.php";
 //header('Content-Type: application/json;charset=utf-8');

function randomToken($car) {
$string = "";
$chaine = 
"ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqr
stuvwxyz";
srand ( ( double ) microtime () * 1000000 );
for($i = 0; $i < $car; $i ++) {
$string .= $chaine [rand () % strlen ( $chaine )];
}
 return $string;
 }

$message ="";
//var_dump($_POST);
//var_dump(!in_array("",$_POST));
if (!in_array("",$_POST)&&(!empty($_POST))) {
$inputFirstName =htmlspecialchars($_POST['inputFirstName']);
$inputLastName  = htmlspecialchars($_POST['inputLastName']);
$inputEmail  = htmlspecialchars($_POST['inputEmail']);
$inputPassword  = htmlspecialchars($_POST['inputPassword']);
$inputPasswordConfirm  = htmlspecialchars($_POST['inputPasswordConfirm']);
    if ($inputPassword !==$inputPasswordConfirm) {
        $message = "Nom conforme";
    }else{
        //hash('sha256', $password)
        $token =randomToken("r");
        $sth = $BdD2 ->prepare("INSERT INTO `users`( `nom`, `prenom`, `token`, `email`, `password`)
                        VALUES (:nom, :prenom, :token, :email, :password)");
    $sth -> execute(
        array(':nom'     => $inputFirstName,
              ':prenom'  => $inputLastName,
              ':token'   => $token,
              ':email'   => $inputEmail,
              ':password' => hash('sha256', $inputPassword)));
    }
}




//var_dump($_POST);

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Register - SB Admin</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header">
                                        <h3 class="text-center font-weight-light my-4">
                                            Create Account
                                        </h3>
                                    </div>
                                    <div class="card-body">
                                        <form action="" method="post" id="form">

                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" name="inputFirstName" id="inputFirstName" type="text"
                                                        value="<?php
                                                        if (isset($_POST['inputFirstName'])) {
                                                            echo $_POST['inputFirstName'];}?>"
                                                         placeholder="Enter your first name" />
                                                        <label for="inputFirstName">First name</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating">
                                                        <input class="form-control" name="inputLastName" id="inputLastName"
                                                        value="<?php
                                                        if (isset($_POST['inputLastName'])) {
                                                            echo $_POST['inputLastName'];}?>"
                                                         type="text" placeholder="Enter your last name" />
                                                        <label for="inputLastName">Last name</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control"
                                                value="<?php
                                                        if (isset($_POST['inputEmail'])) {
                                                            echo $_POST['inputEmail'];}?>"
                                                 name="inputEmail" id="inputEmail" type="email" placeholder="name@example.com" />
                                                <label for="inputEmail">Email address</label>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control"
                                                        value="<?php
                                                        if (isset($_POST['inputPassword'])) {
                                                            echo $_POST['inputPassword'];}?>"
                                                        name="inputPassword" id="inputPassword" type="password" placeholder="Create a password" />
                                                        <label for="inputPassword">Password</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control"
                                                        value="<?php
                                                        if (isset($_POST['inputPasswordConfirm'])) {
                                                            echo $_POST['inputPasswordConfirm'];}?>"
                                                             name="inputPasswordConfirm" id="inputPasswordConfirm" type="password" placeholder="Confirm password" />
                                                        <label for="inputPasswordConfirm">Confirm Password</label>
                                                    </div>
                                                </div>
                                            </div>
    <?php if(isset($message)){ echo $message;}
    ?>
                                            <div class="mt-4 mb-0">
                                                <div class="d-grid"><a class="btn btn-primary btn-block"  onclick="document.forms['form'].submit()">Create Account</a></div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="login.php">Have an account? Go to login</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2022</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
