<?php
header('Content-Type: application/json');

require_once "../classes/DB-Connection.php";
require_once "../classes/UserManage.php";
include_once "../classes/clientCode.php";
include_once "../classes/sessionManager.php";
include_once "../classes/class.Input.php";
include_once "../classes/function.php";

// Get the request flag
$sFlag = Input::request('sFlag');

if ($sFlag == 'searchBook') {
    // Fetch the keyword or use a default value
    $sName = Input::request('keyword') ? Input::request('keyword') : 'genral';

    // Initialize cURL
    $curl = curl_init();

    try {
        // Set cURL options
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://booksearch.arcom.uz/api/book/search?keyword=' . urlencode($sName),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 10, // Set a reasonable timeout
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'Accept: application/json', // Specify the expected response type
                'User-Agent: PHP-cURL-Request', // Set a user-agent for clarity
            ),
        ));

        // Execute the cURL request
        $response = curl_exec($curl);

        // Check for cURL errors
        if (curl_errno($curl)) {
            throw new Exception('cURL Error: ' . curl_error($curl));
        }

        // Check HTTP response code
        $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        if ($httpCode !== 200) {
            throw new Exception('HTTP Error: ' . $httpCode);
        }

        // Decode the JSON response
        $decodedResponse = json_decode($response, true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new Exception('JSON Decode Error: ' . json_last_error_msg());
        }

        // Return the response as JSON
        echo json_encode(array(
            'success' => true,
            'data' => $decodedResponse
        ));

    } catch (Exception $e) {
        // Handle any exceptions
        echo json_encode(array(
            'success' => false,
            'error' => $e->getMessage()
        ));
    } finally {
        // Close the cURL session
        curl_close($curl);
    }
}
