<!-- header -->
<?php

require('inc/essentials.php');
require('inc/db_connect.php');
require('inc/db_config.php');
session_start();
?>
<nav class="navbar navbar-expand-lg navbar-light bg-white px-lg-3 py-lg-2 shadow-sm sticky-top">
    <div class="container-fluid">
        <a class="navbar-brand me-5 fw-bold fs-3 h-font" href="index.php">Hidalgo Hotel</a>
        <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active me-2" aria-current="page" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link me-2" href="rooms.php">Rooms</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link me-2" href="facilities.php">Facilities</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link me-2" href="fine_dining.php">Fine Dining</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link me-2" href="local_travel.php">Local Travel</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link me-2" href="search.php">Reservation Search</a>
                </li>
            </ul>
            <div class="d-flex">
                <?php
                if (!isset($_SESSION['guest_user']['guest_user_id'])) {
                    ?>
                    <a href="login.php" class="btn btn-outline-dark shadow-none me-lg-3 me-2">Login</a>
                    <a href="register.php" class="btn btn-outline-dark shadow-none me-lg-3 me-2">Register</a>
                    <?php
                } else {

                   
                    // require('inc/db_connect.php');
                    // require('inc/db_config.php');
                
                    try {
                        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                        $user_id = $_SESSION['guest_user']['guest_user_id'];
                        $sql = "SELECT * FROM guest_user WHERE guest_user_id = ?";
                        $stmt = $pdo->prepare($sql);
                        $stmt->execute([$user_id]);
                        $user = $stmt->fetch(PDO::FETCH_ASSOC);
                    } catch (PDOException $e) {
                        echo "Error: " . $e->getMessage();
                    }

                    if ($user) {
                        ?>
                        <img src="<?php echo $user['user_picture']; ?>" alt="User Picture" class="rounded-circle me-lg-3 me-2"
                            width="50" height="50">
                        <div class="align-self-center me-lg-3 me-2">
                            <?php echo $user['username']; ?>
                        </div>
                        <form method="post" action="logout.php">
                            <button type="submit" class="btn btn-outline-dark shadow-none me-lg-3 me-2">Logout</button>
                        </form>
                        <?php
                    }
                }
                ?>
            </div>
        </div>
    </div>
</nav>