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
if(isset($_GET["cityId"])){
    if(!empty($_GET["cityId"])){
            $cityId = $_GET["cityId"];
    
    }   
}
else{
    echo "no value";
};


?>
<?php
$url = "https://habous-prayer-times-api.onrender.com/api/v1/available-cities";
$urlprayer= "https://habous-prayer-times-api.onrender.com/api/v1/prayer-times?cityId={$cityId}";


$respondprayer= file_get_contents($urlprayer);
$response = file_get_contents($url);
if ($respondprayer === FALSE && $response === FALSE) {
    echo "Error occurred while fetching data";
} else {
    $data = json_decode($response, true);
    $dataprayer = json_decode($respondprayer, true);   
}

?>
<div id="serch_city">
    <form action="prayer_time.php" method="get">
        <div class="centered-form">
            <select name="cityId" id="citySelect">
                <option>Select city</option>
                <?php
                    for ($x = 0; $x < count($data['cities']); $x++) {
                        $cityId = $data['cities'][$x]['id'];
                        $cityName = $data['cities'][$x]['frenshCityName'];
                        echo "<option value='{$cityId}'>{$cityName}</option>";
                    }
                ?>
            </select>
            <button type="submit" class='bn62'>Search</button>
        </div>
    </form>
</div>


<?php

$datecond = date("d-F-Y") ;
for ($x = 0; $x < count($dataprayer['data']['timings']); $x++) {
    $day = $dataprayer['data']['timings'][$x]["date"]["gregorian"]["day"];
    $month =$dataprayer['data']['timings'][$x]["date"]["gregorian"]["month"];
    $year = $dataprayer['data']['timings'][$x]["date"]["gregorian"]["year"] ;


    $hijriday = $dataprayer['data']['timings'][$x]["date"]["hijri"]["day"];
    $hijrimonth =$dataprayer['data']['timings'][$x]["date"]["hijri"]["month"];
    $hijriyear = $dataprayer['data']['timings'][$x]["date"]["hijri"]["year"] ;

    $formattedDate = $day . "-" . $month . "-" . $year;
    $hijriformattedDate = $hijriday ."-". $hijrimonth ."-". $hijriyear  ;
    if ($datecond == $formattedDate) {
          
        echo "<div id='box_of_all'> 

        <div id='time_date'>

            <div>
                <p>Prayer Times in ". $dataprayer['data']["city"]['fr']."</p>
            </div>

             <div >
                <p>". $formattedDate."</p>
                <p>". $hijriformattedDate  . "</p>
             </div>

        </div>";
 
        echo "<div id='main_pary'>";
        echo "<div id='ecand_main'>
            <p id='text_prayer'>Fajr</p>
            <p id='time_prayer'>" . $dataprayer['data']['timings'][$x]["prayers"]["fajr"] . "</p>
        </div>";
        
        echo "<div id='ecand_main'>
            <p id='text_prayer'>Sunrise</p>
            <p id='time_prayer'>" . $dataprayer['data']['timings'][$x]["prayers"]["sunrise"] . "</p>
         </div>";
            
        echo "<div id='ecand_main'>
            <p id='text_prayer'>Dhuhr</p>
            <p id='time_prayer'>" . $dataprayer['data']['timings'][$x]["prayers"]["dhuhr"] . "</p>
        </div>";  

        echo "<div id='ecand_main'>
            <p id='text_prayer'>Asr</p>
            <p id='time_prayer'>" . $dataprayer['data']['timings'][$x]["prayers"]["asr"] . "</p>
        </div>";
        echo "<div id='ecand_main'>
            <p id='text_prayer'>Maghrib</p>
            <p id='time_prayer'>" . $dataprayer['data']['timings'][$x]["prayers"]["maghrib"] . "</p>
        </div>";

        echo "<div id='ecand_main'>
            <p id='text_prayer'>Ishaa</p>
            <p id='time_prayer'>" . $dataprayer['data']['timings'][$x]["prayers"]["ishaa"] . "</p>
        </div>";
        echo "</div>

        </div>";

    }
    
}

?>


</body>

    <script src="index1.js">
    </script>

</html>
