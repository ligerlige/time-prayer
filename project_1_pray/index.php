<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="index1.css?v=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Faculty+Glyphic&display=swap" rel="stylesheet">
    <title>Document</title>
</head>

<body>


    <div id="maintime">
        <p id="time"></p>
    </div>


    <?php
$url = "https://habous-prayer-times-api.onrender.com/api/v1/available-cities";



$response = file_get_contents($url);


if ($response === FALSE) {
    echo "Error occurred while fetching data";
} else {

    $data = json_decode($response, true);
 
}
?>



<div id="serch_city">
    <form action="prayer_time.php" method="get">
        <select name="cityId" id="citySelect" >
            <?php
                     for ($x = 0; $x < count($data['cities']); $x++) {
                         $cityId = $data['cities'][$x]['id'];
                         $cityName = $data['cities'][$x]['frenshCityName'];
                         echo "<option value='{$cityId}'>{$cityName}</option>";
                         }
            ?>
        </select>
                 <button type="submit">Click</button>
    </form>
</div>

<script src="index1.js">

</script>
</body>
</html>
