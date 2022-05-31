<!DOCTYPE html>
<html lang="en">

<?php
    include('include/Head.php'); 
?>
<?php
    session_start();
?>

<body>

    <?php
        include('include/Navbar.php');
        include('include/Footer.php');
    ?>

    <div class="container">

        <header>
            <a>การสร้างรายได้เสริม</a>
        </header>

        <div class="row">
            <div class="col-lg-1">
            </div>
            <div class="col-lg-5">
                <div class="card income">
                    <img src="_image\img.png" class="card-img-top">
                    <div class="card-body">
                        <p class="card-text">หางาน <br> Past-Time <br> Full-time</p>
                    </div>
                </div>
                <div class="button">
                    <a class="btn btn-primary" href="https://www.jobthai.com/%E0%B8%AB%E0%B8%B2%E0%B8%87%E0%B8%B2%E0%B8%99" role="button">หางาน</a>
                </div>
            </div>

            <div class="col-lg-5">
                <div class="card income">
                    <img src="_image\img.png" class="card-img-top">
                    <div class="card-body">
                        <p class="card-text">ตลาดนักศึกษา</p>
                    </div>
                </div>
                <div class="button">
                    <a class="btn btn-primary" href="#" role="button">เข้าตลาด</a>
                </div>
            </div>
            <div class="col-lg-1">
            </div>
            

        </div>

    </div>
    
</body>