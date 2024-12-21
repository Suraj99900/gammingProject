<?php
// include header section of template
require_once "../config.php";
include_once ABS_PATH_TO_PROJECT . "view/CDN_Header.php";
include_once ABS_PATH_TO_PROJECT . "view/NavBar.php";
include_once ABS_PATH_TO_PROJECT . "classes/sessionCheck.php";
include_once '../classes/class.Input.php';
?>

<body>

    <!-- main container start -->

    <div class="main-container">

        <!-- home section start -->
        <section class="about section " id="home">
            <div class="container-fluid padd-15">

                <!-- book search form  start-->
                <div class="row px-5">
                    <div class="section-title padd-15 mt-5">
                        <h2 class="c-text">Search Note</h2>
                    </div>
                </div>
                <form class="padd-15 px-5">
                    <div class="row align-items-center p-3">
                        <div class="col-md-2">
                                <!-- Search Input -->
                                <label for="searchBookByNameId" class="c-text form-label">Search By Book Name</label>
                        </div>
                        <div class="col-md-8 col-sm-8 d-flex align-items-center">
                        
                            <input type="search" class="c-text form-control custom-control " id="searchBookByNameId"
                                name="searchbook" placeholder="Enter Book Name">
                            <!-- Search Button -->
                            
                        </div>

                        <div class="col-2"><a class="btnWAN search" id="idSearch">Search</a></div>
                    </div>
                </form>




                <!-- book search form  end-->

                <!-- Book table By search start -->

                <div class="row mt-5" id="showBookId" style="margin-left: 10px">

                </div>
                

            </div>
        </section>

        <!-- main Content end-->

    </div>

    <!-- main container end  -->

    <!-- style switcher start -->
    <div class="style-switcher hide">
        <div class="style-switcher hide-toggler s-icon">
            <i class="fas fa-cog fa-spin"></i>
        </div>
        <div class="day-night s-icon">
            <i class="fas "></i>
        </div>
        <h4>Theme Color</h4>
        <div class="colors">
            <span class="color-1" onclick="setActivityStyle('color-1')"></span>
            <span class="color-2" onclick="setActivityStyle('color-2')"></span>
            <span class="color-3" onclick="setActivityStyle('color-3')"></span>
            <span class="color-4" onclick="setActivityStyle('color-4')"></span>
            <span class="color-5" onclick="setActivityStyle('color-5')"></span>
        </div>
    </div>

    <!-- style switcher end -->

    <!-- manu toggler start -->

    <div class="toggler-box">
        <div class="toggler-open icon">
            <i class="uil uil-angle-right-b"></i>
        </div>
        <div class="toggler-close icon">
            <i class="uil uil-angle-left-b"></i>
        </div>
    </div>

    <!-- manu toggler end -->

    <!-- include footer section -->
    <?php include_once "./CDN_Footer.php" ?>
    <script src="../controller/SearchController.js"></script>