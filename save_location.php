<?php
if(isset($_POST['location']) && isset($_POST['ip'])) {
    $location = $_POST['location'];
    $ip = $_POST['ip'];
    
    // Path to the text file
    $file_path = 'location.txt';
    
    // Get the current time in the 'Y-m-d H:i:s' format
    $current_time = date('Y-m-d H:i:s');
    
    // Open the file in append mode
    $file = fopen($file_path, 'a');
    
    if($file) {
        
// Write the location, IP, and time data to the file
fwrite($file, '[' . $location . '] (' . $ip . ') @@ ' . $current_time . PHP_EOL);
// Write a line of dashes to separate each record
fwrite($file, '--------------------------------------------------' . PHP_EOL);
        
        // Close the file
        fclose($file);
        
        // Echo a success message
        echo 'Location saved successfully';
    } else {
        // Echo an error message if the file couldn't be opened
        echo 'Unable to open the file';
    }
} else {
    // Echo an error message if the location or IP data wasn't received
    echo 'Location data not received';
}
?>