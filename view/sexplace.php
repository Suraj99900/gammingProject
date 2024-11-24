<?php
// include header section of template
require_once "../config.php";
include_once ABS_PATH_TO_PROJECT . "view/CDN_Header.php";
include_once ABS_PATH_TO_PROJECT . "view/NavBar.php";
include_once ABS_PATH_TO_PROJECT . "classes/sessionCheck.php";

?>
<style>
    .blog-section .card-body img {
        width: 100%;
        height: 30vh;
    }

    /* Target select2 container */
    .select2-selection .select2-selection--multiple,
    .select2-selection__choice {
        color: #343a40 !important;
        /* Light text color */
    }

    /* Target dropdown options */
    .select2-results__option {
        color: #343a40 !important;
        /* Light text color */
    }


    /* Hover effect for the card */

    .preview-video {
        display: none;
        width: 100%;
        height: 100%;
    }

   /* Hide video controls */
    .preview-video::-webkit-media-controls-panel {
        display: none !important;
    }

    .preview-video::-webkit-media-controls-play-button,
    .preview-video::-webkit-media-controls-volume-slider {
        display: none !important;
    }

    /* Optional: Ensuring the video stays muted on hover */
    .card:hover .preview-video {
        display: block;
        opacity: 1;
    }

    .card .preview-video {
        display: none;
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .card-image-container {
        position: relative;
        height: 200px;
        /* Adjust based on your design */
    }

    .dynamic-img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    /* Mobile responsiveness: 4 cards per row on large screens, adjust for small screens */
    @media (max-width: 768px) {
        .col-lg-3 {
            width: 100%;
        }
    }
</style>




<!-- main Content start -->
<div class="main-content">
    <!-- home section start -->

    <!-- home section end -->



    <!-- Blog section start -->
    <section class="section blog-section" id="BlogSectionId">
        <div class="container-fluid padd-15 px-5">
            <div class="row">
            </div>
            <div class="blog-box-animation" data-bs-theme="dark">
                <div class="row" id="blogBoxId">
                </div>
            </div>
        </div>
    </section>
    <!-- Blog section end -->


</div>
<!-- Bootstrap Spinner -->
<div id="loadingSpinner" style="display: none; position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); z-index: 9999;">
    <div class="spinner-border text-primary" role="status">
        <span class="visually-hidden" style="font-size: 50px;">Loading...</span>
    </div>
</div>

<!-- main Content end-->


<!-- style switcher start -->
<div class="style-switcher hide">
    <div class="style-switcher-toggler s-icon">
        <i class="fas fa-cog fa-spin"></i>
    </div>
    <div class="day-night s-icon">
        <i class="fas "></i>
    </div>
    <div class="chat-Bot s-icon " data-bs-toggle="offcanvas" data-bs-target="#ChatbotoffCanvas"
        aria-controls="ChatbotoffCanvas">
        <i class="fa-solid fa-robot"></i>
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


<!-- include footer section -->
<?php include_once "./CDN_Footer.php" ?>
<script src="../controller/ChatBot.js"></script>

<script>
    var sSearchQuery = "sexy";
    var currentPage = 1; // Track the page number for batch rendering

    $(document).ready(() => {
        fetchAllVideo();
    });

    $("#idSearchSubmit").on('click', () => {
        sSearchQuery = $("#idSearchBar").val();
        currentPage = 1; // Reset to the first page when a new search is initiated
        fetchAllVideo();
    });

    function fetchAllVideo() {
        $("#blogBoxId").html("");
        // Show loading spinner when the AJAX request starts
        $("#loadingSpinner").show();

        $.ajax({
            url: "https://quality-porn.p.rapidapi.com/search?query=" + sSearchQuery + "&page=1&timeout=5000",  // API endpoint
            method: "GET",  // Request type
            headers: {
                "x-rapidapi-host": "quality-porn.p.rapidapi.com",  // RapidAPI host
                "x-rapidapi-key": "90080d4df7msh58bf1ac6106eca8p110620jsn497252e92875"  // API key
            },
            dataType: "json",  // Expected response data type
            success: function (response) {
                console.log(response);  // Log the response for debugging

                // Check if the response has valid data
                if (response.data && response.data.length > 0) {
                    renderDataInChunks(response.data);
                } else {
                    responsePop('Error', 'No data found', 'error', 'ok');
                }
            },
            error: function (error) {
                // Handle AJAX error
                responsePop('Error', 'Error on server', 'error', 'ok');
            },
            complete: function () {
                // Hide loading spinner once the request is completed
                $("#loadingSpinner").hide();
            }
        });
    }

    function renderDataInChunks(data) {
        let chunkSize = 100;  // Render 100 items at a time
        let totalItems = data.length;
        let currentIndex = 0;

        function renderNextChunk() {
            let chunk = data.slice(currentIndex, currentIndex + chunkSize);  // Slice the next chunk
            let sTemplate = "";

            chunk.forEach(ele => {
                ele.links.forEach(iEle => {
                    sTemplate += `
                        <div class="col-lg-4 col-md-4 col-sm-12 p-2" style="margin-top:70px">
                            <a href="${iEle.url}" target="_blank">
                                <div class="card p-3 shadow-lg position-relative">
                                    <div class="card-image-container">
                                        <!-- Display the image thumbnail -->
                                        <img src="${iEle.image}" class="card-img-top dynamic-img" alt="${iEle.title}">
                                        <!-- Show preview video if available -->
                                        ${iEle.previewVideo ? `
                                            <video class="preview-video" autoplay muted loop controls>
                                                <source src="${iEle.previewVideo}" type="video/mp4">
                                                Your browser does not support the video tag.
                                            </video>` : ''}
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title">${iEle.title}</h5>
                                        <p><strong>Views:</strong> ${iEle.views}</p>
                                        <p><strong>Duration:</strong> ${iEle.duration}</p>
                                        <p><strong>Quality:</strong> ${iEle.quality}</p>
                                        <p><strong>Likes:</strong> ${iEle.like}</p>
                                    </div>
                                </div>
                            </a>
                        </div>`;
                });
            });

            // Insert the generated HTML into the target element
            $("#blogBoxId").append(sTemplate);

            // Update the current index
            currentIndex += chunkSize;

            // If there are more items, wait for 10 seconds and render the next chunk
            if (currentIndex < totalItems) {
                setTimeout(renderNextChunk, 10000); // Delay 10 seconds before rendering the next chunk
            }
        }

        // Start rendering the first chunk
        renderNextChunk();
    }

    // Handling hover and touch events to preview video
    document.querySelectorAll('.card').forEach(card => {
        // Desktop: mouse hover (mouseenter/leave)
        card.addEventListener('mouseenter', function () {
            let video = this.querySelector('.preview-video');
            if (video) {
                video.muted = true;
                video.play();
            }
        });
        card.addEventListener('mouseleave', function () {
            let video = this.querySelector('.preview-video');
            if (video) {
                video.pause();
            }
        });
        // Mobile: touch events (tap on the card)
        card.addEventListener('touchstart', function () {
            let video = this.querySelector('.preview-video');
            if (video) {
                video.muted = true;
                video.play();
            }
        });
        card.addEventListener('touchend', function () {
            let video = this.querySelector('.preview-video');
            if (video) {
                video.pause();
            }
        });
    });
</script>
