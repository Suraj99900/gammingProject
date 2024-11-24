<?php
// Include necessary files
require_once "../config.php";
include_once ABS_PATH_TO_PROJECT . "view/CDN_Header.php";
include_once ABS_PATH_TO_PROJECT . "view/NavBar.php";
include_once ABS_PATH_TO_PROJECT . "classes/sessionCheck.php";

// Get actor ID from URL
$actorId = isset($_GET['actorId']) ? $_GET['actorId'] : '';

// Fetch actor details from API
$actorData = getActorDetailsFromAPI($actorId); // You should implement this function to fetch actor data
?>

<style>
    .navbar {
        position: relative;
        background-color: #333;
    }

    .actor-detail-page {
        padding-top: 100px;
    }

    .actor-card {
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        padding: 20px;
        margin-bottom: 30px;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .actor-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
    }

    .actor-image {
        width: 100%;
        border-radius: 8px;
        margin-bottom: 20px;
    }

    .actor-name {
        font-size: 2rem;
        font-weight: bold;
        color: #333;
    }

    .actor-bio {
        font-size: 1rem;
        color: #555;
    }

    .gallery-row {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
    }

    .gallery-item {
        flex: 1 1 calc(33.33% - 20px);
        max-width: calc(33.33% - 20px);
    }

    .gallery-item img {
        width: 100%;
        height: auto;
        border-radius: 8px;
        transition: transform 0.3s ease;
    }

    .gallery-item img:hover {
        transform: scale(1.05);
    }

    .rating {
        color: #f39c12;
    }

    /* Custom theme switcher styles */
    .style-switcher {
        position: fixed;
        right: 20px;
        bottom: 20px;
        background: #fff;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        padding: 15px;
        display: none;
    }

    .style-switcher.show {
        display: block;
    }

    .style-switcher-toggler {
        font-size: 20px;
        cursor: pointer;
    }

    .colors span {
        display: inline-block;
        width: 20px;
        height: 20px;
        margin: 5px;
        border-radius: 50%;
        cursor: pointer;
    }

    .color-1 {
        background-color: #3498db;
    }

    .color-2 {
        background-color: #e74c3c;
    }

    .color-3 {
        background-color: #2ecc71;
    }

    .color-4 {
        background-color: #f39c12;
    }

    .color-5 {
        background-color: #9b59b6;
    }
</style>

<!-- Actor Detail Page -->
<div class="main-content">
    <section class="section blog-section" id="BlogSectionId">
        <div class="container-fluid padd-15 px-5">
            <div class="actor-detail-page">
                <div class="container">
                    <div class="row">
                        <!-- Actor Info -->
                        <div class="col-md-6">
                            <div class="actor-card">
                                <img src="<?php echo $actorData['profileImgLink']; ?>" alt="Actor Image"
                                    class="actor-image">
                                <h2 class="actor-name"><?php echo $actorData['name']; ?></h2>
                                <p><strong>AKA:</strong> <?php echo $actorData['aka']; ?></p>
                                <p class="rating">
                                    <strong>Rating:</strong> <?php echo $actorData['rating']['value']; ?>
                                    (<?php echo $actorData['rating']['votes']; ?> votes)
                                </p>

                                <h3 class="actor-bio c-text-vl">Bio:</h3>
                                <ul class="actor-bio c-text-vl">
                                    <?php foreach ($actorData['bio'] as $bioItem): ?>
                                        <li style="color: black;"><strong style="color: black;"><?php echo $bioItem['name']; ?>:</strong>
                                            <?php echo $bioItem['value']; ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>

                        <!-- Gallery -->
                        <div class="col-md-6">
                            <h3 class="c-text-vl">Gallery</h3>
                            <div class="gallery-row">
                                <?php foreach ($actorData['galleryImagesLinks'] as $image): ?>
                                    <div class="gallery-item">
                                        <img src="<?php echo $image; ?>" alt="Gallery Image" class="img-fluid">
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<div class="style-switcher">
    <div class="style-switcher-toggler s-icon">
        <i class="fas fa-cog fa-spin"></i>
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

<?php
// Include footer
include_once "./CDN_Footer.php";

// Fetch function (you need to implement this function)
function getActorDetailsFromAPI($actorId)
{
    // Set up the API endpoint and headers
    $url = "https://quality-porn.p.rapidapi.com/pornstar/detail?name=" . $actorId . "&responseProfileImageBase64=1&responseProfileImage=1&responseImages=1";

    // Initialize cURL session
    $ch = curl_init();

    // Set cURL options
    curl_setopt($ch, CURLOPT_URL, $url); // Set the API URL
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Return the response as a string
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        "x-rapidapi-host: quality-porn.p.rapidapi.com",  // RapidAPI host
        "x-rapidapi-key: 90080d4df7msh58bf1ac6106eca8p110620jsn497252e92875"  // RapidAPI key
    ]); // Set the required headers

    // Execute the cURL request and store the response
    $response = curl_exec($ch);

    // Check for cURL errors
    if ($response === false) {
        echo 'cURL Error: ' . curl_error($ch);
        return null;
    }

    // Close the cURL session
    curl_close($ch);

    // Decode the JSON response into an associative array
    return json_decode($response, true)['data']; // Return the 'data' field from the JSON response
}
?>