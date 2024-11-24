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

<style>
    .navbar {
        position: fixed;
        z-index: 01111;
        width: 100%;
        box-shadow: 5px 5px 2px rgba(255, 255, 255, 0.1);
    }
</style>

<div class="main-container">
    <nav class="navbar bg-card-high navbar-expand-lg navbar-light">
        <div class="container-fluid bg-card-high" style="display: block;">
            <div class="row" style="padding: 0px;margin: 0;">
                <div class="col-md-6">
                    <div class="logo">
                        <a href="#" style="font-size: 14px;" class="navbar-brand">
                            <span>
                                <?php echo FIRST_NAME ?>
                            </span>
                            <span style="color: var(--text-black-900);">
                                <?php echo OTHER_NAME ?></span></a>

                    </div>
                </div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation"
                    style="position: relative;width: 10%;top: -42px;left: 88%;">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="col-md-3">
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item mx-3">
                                <a href="sexplace.php" target="_blank"
                                    class="<?php echo ($iActive == "" ? "active" : "") ?> nav-link">Home</a>
                            </li>
                            <li class="nav-item mx-3">
                                <a href="actorByName.php?iActive=4" target="_blank"
                                    class="<?php echo ($iActive == 4 ? "active" : "") ?> nav-link">Actor</a>
                            </li>
                            <li class="nav-item mx-3">
                                <a href="MyAbout.php?iActive=2" target="_blank"
                                    class="<?php echo ($iActive == 2 ? "active" : "") ?> nav-link">About</a>
                            </li>

                            <?php
                            if ($bIsLogin) {
                                ?>
                                <li class="nav-item mx-3 hide">
                                    <a href="logOut.php" class="btnWAN btn-sm nav-link mx-3">Log Out</a>
                                <?php } else { ?>
                                <li class="nav-item mx-3 hide">
                                    <a href="loginScreen.php" class="btnWAN btn-sm nav-link login">Log in
                                    </a>
                                </li>
                                <li class="col hide">
                                    <a href="registrationForm.php" class="btnWAN nav-link register mx-3">Register</a>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
                <div class="col-3 search-box">
                    <form class="d-flex">
                        <input class="form-control" type="search" id="idSearchBar" placeholder="Search"
                            aria-label="Search">
                        <a class="btnWAN btn-outline-success mx-2" id="idSearchSubmit" style="cursor: pointer;"
                            >Search</a>
                    </form>
                </div>
            </div>
        </div>
    </nav>