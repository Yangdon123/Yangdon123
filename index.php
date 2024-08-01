<?php
function checkDayType($day) {
    // Convert the input to lowercase to make the function case-insensitive
    $day = strtolower($day);

    switch ($day) {
        case 'monday':
        case 'tuesday':
        case 'wednesday':
        case 'thursday':
        case 'friday':
            return "It's a weekday.";
        
        case 'saturday':
        case 'sunday':
            return "It's a weekend.";
        
        default:
            return "Invalid day provided.";
    }
}

// Example usage:
$day = "Monday";
echo checkDayType($day);
?>






