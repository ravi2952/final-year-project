<?php
include './db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Loan</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>    
    <!-- Navbar Start -->
    <div class="container-fluid sticky-top bg-white shadow-sm">
        <div class="container">
            <nav class="navbar navbar-expand-lg bg-white navbar-light py-3 py-lg-0">
                <a href="index.php" class="navbar-brand">
                    <h1 class="m-0 text-uppercase text-primary"><i class="fa fa-clinic-medical me-2"></i>Loan</h1>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto py-0">
                        <a href="index.php" class="nav-item nav-link active">Home</a>
                        <a href="alogin.php" class="nav-item nav-link">Admin</a>
                        <a href="ulogin.php" class="nav-item nav-link">Student</a>
                        <a href="blogin.php" class="nav-item nav-link">Bank</a>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <!-- Navbar End -->


    <!-- Hero Start -->
    <div class="container-fluid bg-primary py-3 mb-5 hero-header">
        <div class="container py-1">
            <div class="row justify-content-start">
                <div class="col-lg-8 text-center text-lg-start">
                    <h5 class="d-inline-block text-primary text-uppercase border-bottom border-5" style="border-color: rgba(256, 256, 256, .3) !important;">Welcome To Loan Platform</h5>
                    <h1 class="display-2 text-primary mb-md-4">BlockChain Crowd Sourcing Loan Platform
</h1>
                    <div class="pt-2">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Hero End -->


    <!-- About Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="row gx-5">
                
                <div class="col-lg-12">
                    <div class="mb-7">
                        <h5 class="d-inline-block text-primary text-uppercase border-bottom border-5">Register</h5>
                    </div>                    
<?php
if(!isset($_POST['submit1'])) {
    $result = mysqli_query($link, "select cname from city");
?>
<br>
<form name="f" action="regn.php" method="post" enctype="multipart/form-data" onsubmit="return check_regn()">
    <table class="login" style="width:50%;">
        <thead>
            <tr>
                <th colspan="2">STUDENT REGISTRATION</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th width="40%">Name</th>
                <td><input type="text" name="uname" autofocus required></td>
            </tr>
            <tr>
                <th>Address</th>
                <td><textarea name="addr" required cols="30"></textarea></td>
            </tr>
            <tr>
                <th>City</th>
                <td>
                    <select name="cname" onchange="call(this.value)">
                        <option value="">--Select City--</option>
                        <?php
                        while($row = mysqli_fetch_row($result)) {
                            echo "<option value='$row[0]'>$row[0]</option>";
                        }
                        mysqli_free_result($result);
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <th>Area Name</th>
                <td>
                    <div id="d"><select name="aname" required><option>--Area Name--</option></select></div>
                </td>
            </tr>
            <tr>
                <th>Gender</th>
                <td><input type="radio" name="gender" value="Male" checked>Male&nbsp;<input type="radio" name="gender" value="Female">Female</td>
            </tr>
            <tr>
                <th>DOB</th>
                <td><input type="date" name="dob" required></td>
            </tr>
            <tr>
                <th>Mobile</th>
                <td><input type="text" name="mobile" maxlength="10" required></td>
            </tr>
            <tr>
                <th>Degree</th>
                <td><input type="text" name="degree" required></td>
            </tr>
            <tr>
                <th>College Name</th>
                <td><input type="text" name="college" required></td>
            </tr>
            <tr>
                <th>E-Mail (Userid)</th>
                <td><input type="text" name="email" required></td>
            </tr>
            <tr>
                <th>Password</th>
                <td><input type="password" name="pwd" required></td>
            </tr>
            <tr>
                <th>Confirm Pwd</th>
                <td><input type="password" name="cpwd" required></td>
            </tr>
            <tr>
                <th>Photo</th>
                <td><input type="file" name="photo" accept="image/*" required></td>
            </tr>
            <tr>
                <th>Aadhar</th>
                <td><input type="file" name="aadhar" accept="image/*" required></td>
            </tr>
            <tr>
                <th>College Proof</th>
                <td><input type="file" name="cproof" accept="image/*" required></td>
            </tr>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="2" class="center">
                    <input type="submit" name="submit1" value="Register">                  
                </td>
            </tr>
        </tfoot>
    </table>
    <Br><br>
</form>
<?php
} else {
    extract($_POST);
    $rtime = date('Y-m-d h a',time()+19800);
    if(is_uploaded_file($_FILES['photo']['tmp_name'])) {
        $photo = "uploads/".time().$_FILES['photo']['name'];
        
        if(is_uploaded_file($_FILES['aadhar']['tmp_name'])) {
            $aadhar = "uploads/".time().$_FILES['aadhar']['name'];
            
            if(is_uploaded_file($_FILES['cproof']['tmp_name'])) {
                $cproof = "uploads/".time().$_FILES['cproof']['name'];
                move_uploaded_file($_FILES['photo']['tmp_name'], $photo);
                move_uploaded_file($_FILES['aadhar']['tmp_name'], $aadhar);
                move_uploaded_file($_FILES['cproof']['tmp_name'], $cproof);
                mysqli_query($link, "insert into newuser(uname,addr,cname,aname,gender,dob,mobile,degree,college,userid,pwd,photo,aadhar,cproof) values('$uname','$addr','$cname','$aname','$gender','$dob','$mobile','$degree','$college','$email','$pwd','$photo','$aadhar','$cproof')") or die(mysqli_error($link));
                echo "<div class='center'>UserId Generated Successfully...!<br><a href='ulogin.php'>Login</a></div>";
            } else {
                echo "<div class='center'>College Proof Not Uploaded...!<br><a href='regn.php'>Back</a></div>";
            }
        } else {
            echo "<div class='center'>Aadhar Not Uploaded...!<br><a href='regn.php'>Back</a></div>";
        }
    } else {
        echo "<div class='center'>Photo Not Uploaded...!<br><a href='regn.php'>Back</a></div>";
    }    
}
include './footer.php';
?>
<script>
    function check_regn() {
        var mobile = f.mobile.value
        var email = f.email.value
        var pwd = f.pwd.value
        var cpwd = f.cpwd.value
        
        if(!check_mobile(mobile)) {
            alert("Invlid Mobile Number")
            f.mobile.focus()
            return false
        }
        if(!check_email(email)) {
            alert("Invalid Email Id")
            f.email.focus()
            return false
        }
        if(pwd!=cpwd) {
            alert("Confirm Password not Match")
            f.cpwd.focus()
            return false
        }
        return true
    }
    function check_email(e) {
	var ep = /^\w+\.{0,1}\w+\@[a-z]+\.([a-z]{3}|[a-z]{2}\.[a-z]{2}){1}$/
	return e.match(ep)
    }
    function check_mobile(m) {
	var mp = /^[987]\d{9}$/
	return m.match(mp)
    }
    function getObj() {
        if (window.ActiveXObject)
            return new ActiveXObject("Microsoft.XMLHTTP")
        else
            return new XMLHttpRequest()
    }
    function call(v) {
        ob = getObj()
        ob.onreadystatechange = show
        ob.open("GET", "getareas.php?k=" + v, true)
        ob.send()
    }
    function show() {
        if (ob.readyState == 4 && ob.status == 200) {
            document.getElementById("d").innerHTML = ob.responseText
        }
    }
</script>

                </div>
            </div>
        </div>
    </div>
    <!-- About End -->    

    <!-- Blog Start -->
    <div class="container-fluid py-5"></div>
    <!-- Blog End -->
    

    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-light mt-5 py-5"></div>
    <div class="container-fluid bg-dark text-light border-top border-secondary py-4">
        <div class="container">
            <div class="row g-5">
                <div class="col-md-6 text-center text-md-start">
                    <p class="mb-md-0">&copy; <a class="text-primary" href="#">Loan</a>. All Rights Reserved.</p>
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <p class="mb-0"><a class="text-primary" href="https://htmlcodex.com">HTML5</a></p>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>

    <!-- JavaScript Libraries -->
    <script src="js/jquery-1.10.2.js"></script>
    <!--script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script-->
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>
</html>