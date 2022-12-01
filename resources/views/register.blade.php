<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>24/7 MD - Register</title>

    
  <!-- Favicons -->
  <link href="assets/img/stethlogo.png" rel="icon">
  <link href="assets/img/stethlogo.png" rel="apple-touch-icon">
  
    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">

    
</head>

<body style="background-color:#1b2f45">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                            </div>
                            <form action="/register" method="POST" class="regform" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <select id="account" name="account" class="form-control-role">
                                        <option value="None" selected disabled>Select Type of Account</option>
                                        <option value="User">User</option>
                                        <option value="Doctor">Doctor</option>
                                    </select>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" name="first_name" class="form-control form-control-regform" id="exampleFirstName"
                                            placeholder="First Name">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" name="last_name" class="form-control form-control-regform" id="exampleLastName"
                                            placeholder="Last Name">
                                    </div>
                                    
                                </div>
                                <div class="form-group">
                                <select id="gender" name="gender" class="form-control-role">
                                        <option value="None" selected disabled>Gender</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control form-control-regform" id="exampleInputEmail"
                                        placeholder="Email Address">
                                </div>
                                <div class="form-group">
                                    <input type="date" name="birthdate" class="form-control form-control-regform" id="exampleDateofBirth"
                                        placeholder="Date of Birth - ">
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" name="password" class="form-control form-control-regform"
                                            id="exampleInputPassword" placeholder="Password">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" name="confirm_password" class="form-control form-control-regform"
                                            id="exampleRepeatPassword" placeholder="Repeat Password">
                                    </div>
                                </div>
                                <div>

                                <div class="Doctor user">
                                 <div class="form-group">
                                    <label style="font-size: 0.8rem;">Upload PRC ID: </label>
                                    <input type="file" name="prc_identification" class="form-control-regform"/>
                                </div>
                                
                                <div class="form-group">
                                    <select name="department" class="form-control-role">
                                        <option value="None" selected disabled>Select Specialization</option>
                                        <option value="Family Doctor">Family Doctor</option>
                                        <option value="Internal Medicine">Internal Medicine</option>
                                        <option value="Occupational Health Medicine">Occupational Health Medicine</option>
                                        <option value="ENT">ENT</option>
                                        <option value="Obstetrics and Gynecology">Obstetrics and Gynecology</option>
                                    </select>
                                </div>
                                <hr>
                                
                                </div>
                                </div>
                            
                                <hr>
                            
                                <button type="submit" class="btn btn-primary btn-regform btn-block">
                                Register Account
                                </button>
                               
                            <hr>
                            <div class="text-center">
                                <a class="small" href="forgot-password">Forgot Password?</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="login">Already have an account? Login!</a>
                            </div>
                                </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
    <script type="text/javascript">
        $('#account').ready(function() {
            $("#account").on('change', function() {
                $(this).find("option:selected").each(function() {
                    var geeks = $(this).attr("value");
                    if (geeks) {
                        $(".user").not("." + geeks).hide();
                        $("." + geeks).show();
                    } else {
                        $(".user").hide();
                    }

                });
            }).change();
        });
    </script>

</body>

</html>