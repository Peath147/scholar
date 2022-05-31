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
        require_once('connect_PDO.php');
        include('include/Navbar.php');
        include('include/Footer.php');
    ?>

    <div class="container">

        <header>
            <a>บทความ</a>
        </header>

    <section id="article">
        <?php
        $sqlPro = "select * from article";
        $stmt = $conn->prepare($sqlPro);
        $stmt->execute();
        ?>

        <div class="row row-cols-lg-3 r mt-auto g-5">
            <?php
            while ($row = $stmt->fetch()) {
            ?>
            <div class="col">
                <div class="card income">
                    <img src="<?php echo $row['image']; ?>" class="card-img-top">

                    <div class="card-body">
                        <p class="card-text"> <?php echo $row['name']; ?> </p>
                    </div>

                </div>
                <div class="button">
                    <input type="button" name="view" value="อ่านต่อ" id="<?php echo $row["ID"]; ?>" class="btn btn-primary info" />
                </div>
            </div>
            <?php
            }
            ?>
        </div>

    </div>

    <script>
      

        $(document).ready(function() {
            $('.info').click(function() {
                var ID = $(this).attr("id");;
                $.ajax({

                    url: "articledetails.php?ID="+ID,
                    type: 'get',
                    success: function (data) {
                        location.replace("articledetails.php?ID="+ID)
                    }

                });
            });
        });
      
    </script>
</body>