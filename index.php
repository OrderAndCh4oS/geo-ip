<?php
require( 'Location.php' );
?>
<!doctype html>
<html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Get Location</title>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
<?php
$json = new Location('8.8.8.8');
$location = $json->getJson();
echo "<ul>";
echo "<li>Country Code: ".$location->country_code . "</li>";
echo "<li>Country Name: ".$location->country_name . "</li>";
echo "<li>Region Code: " . $location->region_code . "</li>";
echo "<li>Region Name: " . $location->region_name . "</li>";
echo "<li>City: " . $location->city . "</li>";
echo "<li>Zip Code: " . $location->zip_code . "</li>";
echo "<li>Time Zone: " . $location->time_zone . "</li>";
echo "<li>Latitude: " . $location->latitude . "</li>";
echo "<li>Longitude: " . $location->longitude . "</li>";
echo "<li>Metro Code: " . $location->metro_code . "</li>";
echo "</ul>";
?>
</body>
</html>