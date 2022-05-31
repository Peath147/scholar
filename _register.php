<?php
require_once('connect_PDO.php');
    session_start();

if (isset($_POST['Register'])) {
    if (isset($_POST['UserName'], $_POST['Email'], $_POST['password'], $_POST['password2'], $_POST['FLname'], $_POST['No']) &&
        !empty($_POST['UserName']) && !empty($_POST['Email']) && !empty($_POST['password']) && !empty($_POST['password2']) && !empty($_POST['FLname']) && !empty($_POST['No'])) {

        $userName = $_POST['UserName'];
        $Gmail = $_POST['Email'];
        $password = $_POST['password'];
        $password2 = $_POST['password2'];
        $FLname = $_POST['FLname'];
        $No = $_POST['No'];
        
        if($password == $password2){

            $options = array("cost"=>4);
            $hashPassword = password_hash($password,PASSWORD_BCRYPT,$options);

            $sql = 'select * from user_tbl where username = :Name';
            $Name = $conn->prepare($sql);
            $N = ['Name' => $userName];
            $Name->execute($N);

            $sql = 'select * from user_tbl where gmail = :gmail';
            $gm = $conn->prepare($sql);
            $g = ['gmail' => $Gmail];
            $gm->execute($g);

            if($Name->rowCount() > 0 && $gm->rowCount() > 0){
                $errors[] = "Username and Gmail already registered";
            } elseif ($Name->rowCount() > 0) {
                $errors[] = "Username already registered";
            } elseif ($gm->rowCount() > 0) {
                $errors[] = "Gmail already registered";
            } else {
                try {
                    $sql = "insert into user_tbl (username, gmail, phone, F_L_name, u_lvl, password) 
                    values(:userName, :gmail, :phone, :F_L_name, :u_lvl, :password)";

                    $params = [
                        ':userName'=>$userName,
                        ':password'=>$hashPassword,
                        ':gmail'=>$Gmail,
                        ':phone'=>$No,
                        ':F_L_name'=>$FLname,
                        ':u_lvl'=>'User'
                    ];
                    $stmt = $conn->prepare($sql);
                    $stmt->execute($params);

                    $success = 'User has been created successfully';
                } catch (PDOException $e) {
                    $errors[] = $e->getMessage();
                }
            }

        } else {
            $errors[] = "Passwords do not match";
        }

        
        
 
    } else {
        if (empty($_POST['UserName'])) {
            $errors[] = "Username is required";
        }elseif (empty($_POST['Email'])) {
            $errors[] = "Gmail is required";
        }elseif (empty($_POST['password'])) {
            $errors[] = " password is required";
        }elseif (empty($_POST['password2'])) {
            $errors[] = " password is required";
        }elseif (empty($_POST['FLname'])) {
            $errors[] = " first name surname are required";
        }elseif (empty($_POST['No'])) {
            $errors[] = " phone number is required";
        }
    }
}
    
?>



<?php
    include('include/Head.php') 
?>

<body>

    <?php
        include('include/Navbar.php');
        include('include/Footer.php');
    ?>

    <div class="loginpage">
        <?php
            if (isset($errors) && count($errors) > 0) {
                foreach ($errors as $error_msg) {
                    echo '<div class="alert alert-danger">' . $error_msg . '</div>';
                }
            }

            if (isset($success)) {

                echo '<div class="alert alert-success">' . $success . '</div>';
            }
        ?>
        <div class="row">
            <div class="col-lg-6 col-sm-12 imagelogin">
                <img src="_image\download.jpg">
            </div>
            <div class="col-lg-6 col-sm-0 textlogin">
                <h1>ลงชื่อเข้าใช้</h1>

                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

                    <div class="mb-3">
                        <input type="text" class="form-control" name="UserName" id="UserName" placeholder="ชื่อผู้ใช้">
                    </div>

                    <div class="mb-3">
                        <input type="text" class="form-control" name="Email" id="Email" placeholder="อีเมล์">
                    </div>

                    <div class="mb-3">
                        <input type="password" class="form-control" name="password" id="Password" placeholder="รหัสผ่าน">
                    </div>

                    <div class="mb-3">
                        <input type="password" class="form-control" name="password2" id="Password2" placeholder="ยืนยันรหัสผ่าน">
                    </div>

                    <div class="mb-3">
                        <input type="text" class="form-control" name="FLname" id="FLname" placeholder="ชื่อ - นามสกุล">
                    </div>

                    <div class="mb-3">
                        <input type="text" class="form-control" name="No" id="No" placeholder="เบอร์โทร">
                    </div>
                    <div>
                        <input type="checkbox" id="check" name="check" value="checkTrue" required>
                        <label for="check"> ยืนยันการสมัคร </label> 
                    </div>
                    
                    <div class="depeding">
                        <div class="row">
                            <div class="col">
                                <a class="btn btn-primary back" href="_login.php" role="button"> กลับไปหน้าล็อคอิน </a>
                            </div>

                            <div class="col">
                            <button type="submit" class="btn btn-primary loginbutton" name="Register"> สมัครสมาชิก </button>
                            </div>
                        </div>
                    </div>
                    
            
                </form>

            </div>
        </div>
        

    </div>
    
</body>
