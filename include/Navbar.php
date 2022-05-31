<!-- navbar --> 
<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container-fluid">


        <a class="navbar-brand" href="Home.php">
            <img src="_image/LOGO.png" height="50" />
        </a>

        <button class= "navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarDropdown">
            <span class= "navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarDropdown">

            <ul class="navbar-nav ms-auto ">
                <li class="nav-item">
                <a class="nav-link" href="behavior.php">พฤติกรรมและการวางแผน</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="income.php">การสร้างรายได้เสริม</a>
                </li>
                <li class="nav-item">
                <a class="nav-link " href="article.php">บทความ</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="investment.php">การลงทุน</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="#">ติดต่อเรา</a>
                </li>

                    <?php if($_SESSION['login']) { ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle bi bi-person-fill" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <?php echo $_SESSION['name']; ?>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="Profile.php">Profile</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="_logout.php">Logout</a></li>
                            </ul>
                        </li>
                    <?php } else { ?>

                    <li class="nav-item">
                    <a class="nav-link" href="_login.php">Login</a>
                    </li>

                <?php }?>
            </ul>  
            

        </div>  
    </div>
</nav>
