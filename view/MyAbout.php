<?php
// Include header section of the template
require_once "../config.php";
include_once ABS_PATH_TO_PROJECT . "view/CDN_Header.php";
include_once ABS_PATH_TO_PROJECT . "view/NavBar.php";
include_once ABS_PATH_TO_PROJECT . "classes/sessionCheck.php";
?>

<!-- main Content start -->
<div class="main-content">
    <!-- About section start -->
    <section class="about section" id="about">
        <div class="container-fluid">
            <div class="row px-5 p-lg-5 p-md-5 p-sm-3">
                <div class="section-title padd-15 mt-5">
                    <h2>About Us</h2>
                </div>
            </div>
            <div class="about-content padd-15 px-5" data-bs-theme="dark">
                <div class="row">
                    <div class="about-text">
                        <h3>Welcome to <span>Sexplace</span> - Your ultimate destination for adult entertainment</h3>
                        <p>At Sexplace, we provide a platform for those seeking to explore and indulge in adult content. With a vast library of videos, images, and other media tailored to your desires, we are here to offer a seamless, enjoyable experience. Our goal is to bring you the most exciting and diverse content available on the web.</p>
                        <p>Whether you're looking for high-quality videos, photos, or engaging with our exclusive stars, Sexplace is the place to satisfy your cravings. Our website offers a user-friendly interface with advanced features for discovering new content, ensuring your browsing experience is nothing short of spectacular.</p>
                    </div>
                </div>

                <div class="row">
                    <div class="personal-info padd-15">
                        <div class="row">
                            <div class="info-item padd-15">
                                <p>Founded: <span>2024</span></p>
                            </div>
                            <div class="info-item padd-15">
                                <p>Location: <span>Global</span></p>
                            </div>
                            <div class="info-item padd-15">
                                <p>Email: <span>support@sexplace.com</span></p>
                            </div>
                            <div class="info-item padd-15">
                                <p>Phone: <span>+1 (800) 123-4567</span></p>
                            </div>
                            <div class="info-item padd-15">
                                <p>Website: <span>www.sexplace.com</span></p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="buttons padd-15">
                                <a href="https://sexplace.com/signup" class="btn">Join Us</a>
                                <a href="sexplace.php#contact" class="btn">Contact Us</a>
                            </div>
                        </div>
                    </div>

                    <div class="skills padd-15">
                        <div class="row">
                            <div class="skill-item padd-15">
                                <h5>Video Streaming</h5>
                                <div class="progress">
                                    <div class="progress-in" style="width: 90%;"></div>
                                    <div class="skill-percent">90%</div>
                                </div>
                            </div>
                            <div class="skill-item padd-15">
                                <h5>Mobile App Experience</h5>
                                <div class="progress">
                                    <div class="progress-in" style="width: 75%;"></div>
                                    <div class="skill-percent">75%</div>
                                </div>
                            </div>
                            <div class="skill-item padd-15">
                                <h5>Content Curation</h5>
                                <div class="progress">
                                    <div class="progress-in" style="width: 85%;"></div>
                                    <div class="skill-percent">85%</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="education padd-15">
                        <h3 class="title">Our Content</h3>
                        <div class="row">
                            <div class="timline-box padd-15">
                                <div class="timeline shadow-dark">
                                    <!-- Timeline item -->
                                    <div class="timeline-item">
                                        <div class="circle-dot"></div>
                                        <h3 class="timeline-date"><i class="fa fa-calendar"></i> 2024 - Present</h3>
                                        <h4 class="timeline-title">Exclusive Content Creation</h4>
                                        <p class="timeline-text">We are constantly expanding our library with the latest and hottest adult content. Our content creators ensure top-notch quality with every release.</p>
                                    </div>
                                    <div class="timeline-item">
                                        <div class="circle-dot"></div>
                                        <h3 class="timeline-date"><i class="fa fa-calendar"></i> 2024 - Present</h3>
                                        <h4 class="timeline-title">User-Generated Content</h4>
                                        <p class="timeline-text">Empowering our community to share their creations. We value the contributions of our users, offering a platform for amateur content creators to showcase their work.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="experience padd-15">
                        <h3 class="title">Our Growth</h3>
                        <div class="row">
                            <div class="timline-box padd-15">
                                <div class="timeline shadow-dark">
                                    <!-- Timeline item -->
                                    <div class="timeline-item">
                                        <div class="circle-dot"></div>
                                        <h3 class="timeline-date"><i class="fa fa-calendar"></i> 2024 - Present</h3>
                                        <h4 class="timeline-title">Global User Base Expansion</h4>
                                        <p class="timeline-text">Our reach is growing every day. With millions of users from around the world, Sexplace is becoming the leading platform for adult entertainment.</p>
                                    </div>
                                    <div class="timeline-item">
                                        <div class="circle-dot"></div>
                                        <h3 class="timeline-date"><i class="fa fa-calendar"></i> 2024 - Present</h3>
                                        <h4 class="timeline-title">Innovative Features</h4>
                                        <p class="timeline-text">We are continuously adding new features to improve the user experience. Our mobile apps and interactive tools are constantly evolving.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About section end -->
</div>

<!-- style switcher start -->
<div class="style-switcher hide">
    <div class="style-switcher-toggler s-icon">
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

<!-- include footer section -->
<?php include_once "./CDN_Footer.php" ?>
