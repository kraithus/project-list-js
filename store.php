<?php
session_start();

// Get form data
$region = $_POST['region'];
$council = $_POST['council'];
$category = $_POST['category'];
$project = $_POST['project'];

$_SESSION['selectedRegion'] = $region;
$_SESSION['selectedCouncil'] = $council;

// Use a switch statement to set additional session variable based on category
switch ($category) {
    case "Agriculture":
        $_SESSION['selectedCategory'] = "Banking & Finance";
        break;
    case "Banking & Finance":
        $_SESSION['selectedCategory'] = "Education";
        break;
    case "Education":
        $_SESSION['selectedCategory'] = "Health";
        break;
    case "Health":
        $_SESSION['selectedCategory'] = "ICT and Digital Services";
        break;
    case "ICT and Digital Services":
        // Unset category af this shit done selected
        unset($_SESSION['selectedRegion']);
        unset($_SESSION['selectedCouncil']);
        unset($_SESSION['selectedCategory']);
        break;    
}

// Create an associative array with the form data
$data = array(
    'Region' => $region,
    'Council' => $council,
    'Category' => $category,
    'Project' => $project
);

// Convert the array to a JSON string
$jsonData = json_encode($data);

// Specify the path to the text file
$file = 'projects_list.txt';

// Open the file in append mode
$fileHandle = fopen($file, 'a');

// Write the JSON data to the file
fwrite($fileHandle, $jsonData . PHP_EOL); // Add a newline after each JSON entry

// Close the file handle
fclose($fileHandle);

// Redirect back to the...
header('Location: index.php');
exit();

?>
