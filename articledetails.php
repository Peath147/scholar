<?php
if(isset($_GET["ID"]))
{
    $ID = $_GET["ID"];
?>

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
        require_once('connect_PDO.php');
        $sql = "SELECT * FROM article WHERE ID = $ID ";  
        $stmt = $conn->prepare($sql);
        $stmt->execute();
    ?>

    <div class="container">

        <div class="button2">
            <a class="btn btn-outline-dark bi bi-arrow-left yolo" href="article.php" role="button"> </a>
        </div>

        <header>
            <a>บทความของเรา</a>
        </header>

        <div class="cle">
            <?php
                while($row = $stmt->fetch()) {
            ?>

            

            <div class="arti">
                <h1>
                    <?php echo $row["name"]; ?>
                </h1>
            </div>

            <div class="detail">

                    <?php echo $row["Details"]; ?>

            </div>
            <?php
                }
            ?>
            

        </div>

        

        

    </div>
</body>

<?php 
}
?>