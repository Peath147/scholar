<!DOCTYPE html>
<html lang="en">


<?php   

    session_start();

require_once('connect_PDO.php');
    if (isset($_POST['submit'])){
        if(isset($_POST['UserName'], $_POST['password']) &&
            !empty($_POST['UserName']) && !empty($_POST['password']))
        {
            $userName = trim($_POST['UserName']);
            $password = trim($_POST['password']);

            $stmt = 'select * from user_tbl where username = :name';
            $userDB = $conn->prepare($stmt);
            $N = ['name' => $userName];
            $userDB->execute($N);
            if($userDB->rowCount() > 0){

                $getRow = $userDB->fetch(PDO::FETCH_ASSOC);

                if(password_verify($password, $getRow['password'])) {

                    $_SESSION['u_id'] = $getRow['U_ID'];
                    $_SESSION['name'] = $userName;
                    $_SESSION['gmail'] = $getRow['gmail'];
                    $_SESSION['user_lvl'] = $getRow['u_lvl'];
                    $_SESSION['login'] = True;
                    header("Location: Home.php");

                } else {

					$errors[] = "Wrong Username or Password";
				}
            } else {

				$errors[] = "Wrong Username or Password";
			}


        } else {
            if (empty($_POST['UserName'])) {
                $errors[] = "Username is required";
            }
            if (empty($_POST['password'])) {
                $errors[] = " password is required";
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
                        <input type="text" name="UserName" class="form-control" id="usename" placeholder="ชื่อผู้ใช้">
                    </div>

                    <div class="mb-3">
                        <input type="password" class="form-control" name="password" id="Password" placeholder="รหัสผ่าน">
                    </div>
                        
                    <div>
                        <button type="submit" class="btn btn-primary loginbutton" name="submit"> เข้าสู่ระบบ </button>
                    </div>                
                    
                    <div class="bar">
                        ลืมรหัสผ่าน
                    </div>

                    <div class="row a-litle-bit">
                        <div class="col textwait">
                            ยังไม่ได้สมัครสมาชิก?
                        </div>

                        <div class="col">
                            <a class="btn btn-primary registerinlogin" href="_register.php" role="button"> สมัครสมาชิก </a>
                        </div>
                    </div>
            
                </form>

            </div>

        </div>
        
    </div>
    
</body>

