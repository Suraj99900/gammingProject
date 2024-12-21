<?php
require_once "../config.php";
include_once ABS_PATH_TO_PROJECT . "classes/sessionCheck.php";
if (session_status() == PHP_SESSION_NONE) {
    $bIsLogin = $oSessionManager->isLoggedIn ? $oSessionManager->isLoggedIn : false;
} else {
    $bIsLogin = false;
}
$iActive = isset($_GET['iActive']) ? $_GET['iActive'] : '';
?>

<!-- main container start -->

<div class="main-container">
    <nav class="navbar bg-card-high navbar-expand-lg navbar-light px-lg-5">
        <div class="container-fluid bg-card-high" style="display: block;">
            <div class="row" style="padding: 0px;margin: 0;">
                <div class="col-md-6">
                    <div class="logo">
                        <a href="#" style="font-size: 14px;" class="navbar-brand">
                            <span>
                                <?php echo FIRST_NAME ?>
                            </span>
                            <span style="color: #c5c6c7;">
                                <?php echo OTHER_NAME ?></span></a>

                    </div>
                </div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation"
                    style="position: relative;width: 10%;top: -42px;left: 88%;">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="col-md-6">
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item mx-3">
                                <a href="MyPortfolio.php"
                                    class="<?php echo ($iActive == "" ? "active" : "") ?> nav-link bar-link"><i
                                        class="fa fa-home mx-2 "></i>Home</a>
                            </li>
                            <li class="nav-item mx-3">
                                <a href="searchBook.php?iActive=6"
                                    class="<?php echo ($iActive == 6 ? "active" : "") ?> nav-link bar-link"><i
                                        class="fa fa-book mx-2"></i>Download Books</a>
                            </li>
                            <li class="nav-item mx-3">
                                <a href="renderBlog.php?iActive=4"
                                    class="<?php echo ($iActive == 4 ? "active" : "") ?> nav-link bar-link"><i
                                        class="fa fa-blog mx-2"></i>Blog</a>
                            </li>
                            <li class="nav-item mx-3">
                                <a href="MyAbout.php?iActive=2"
                                    class="<?php echo ($iActive == 2 ? "active" : "") ?> nav-link bar-link"><i
                                        class="fa fa-user mx-2"></i>About</a>
                            </li>
                            <li class="nav-item mx-3">
                                <?php
                                if ($bIsLogin) {
                                    ?>
                                <li><a href="userDashboard.php?iActive=3"
                                        class="<?php echo ($iActive == 3 ? "active" : "") ?> nav-link bar-link"><i
                                            class="fa-solid fa-grip-vertical mx-2"></i>Dashboard</a></li>
                            <?php } ?>
                            </li>

                            <?php
                            if ($bIsLogin) {
                                ?>
                                <li class="nav-item mx-3">
                                    <a href="logOut.php" class="btnWAN btn-sm nav-link mx-3">Log Out</a>
                                </li>
                            <?php } else { ?>
                                <li class="nav-item mx-3">
                                    <a href="loginScreen.php" class="btnWAN btn-sm nav-link login">Log in
                                    </a>
                                </li>
                                <li class="col">
                                    <a href="registrationForm.php" class="btnWAN nav-link register mx-3 mt-1">Register</a>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>