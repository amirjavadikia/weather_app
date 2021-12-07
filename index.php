<?php
error_reporting(E_ERROR | E_PARSE);




$errorField = [];
$weatherDesc = null;
$weatherTemp = null;
$weatherCity = null;
$weatherId = null;

    if (isset($_GET['submit'])) {

        $search = $_GET['search'];

        if (!$search) {
            $errorField = 'This field should not be empty';
        }
        if ($search){
                $api = file_get_contents("https://api.openweathermap.org/data/2.5/weather?q=".$search."&appid=c61cddb6f9b86f3f2a8483f710ec9d15");
                $api_decode = json_decode($api,true);

            if ($api_decode['cod'] == 200){
                $weatherDesc = $api_decode['weather'][0]['description'];
                $weatherTemp = $api_decode['main']['temp'] - 273;
                $weatherCity = $api_decode['name'];
                $weatherId = $api_decode['weather'][0]['id']; 
            }else{
                $errorField = 'Please provide a valid city.';
            }
        }
    }

?>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="./style.css">

    <title>WEATHER APP</title>
  </head>
  <body>
    



            <div class="container mt-5">
                <form action="" method="GET">
                    <input type="text" name="search" placeholder="City Name">
                    <button type="submit" name="submit" class="btn btn-success mt-3">search</button>
                </form>

                <?php if($errorField) {?>
               <div class="alert alert-danger" role="alert">
                <?=
                $errorField
                ?>
               </div>
                <?php }else{?>



                    <div class="all_weather">
                    <div class="weather_desc">

                <?php 
                if ($weatherId >= 200 && $weatherId<300) {
                    echo '<img src="http://openweathermap.org/img/wn/11d@2x.png" alt="">';
                }
                if ($weatherId >= 300 && $weatherId<400) {
                    echo '<img src="http://openweathermap.org/img/wn/09d@2x.png" alt="">';
                }
                if ($weatherId >= 500 && $weatherId<600) {
                    echo '<img src="http://openweathermap.org/img/wn/10d@2x.png" alt="">';
                }
                if ($weatherId >= 600 && $weatherId<700) {
                    echo '<img src="http://openweathermap.org/img/wn/13d@2x.png" alt="">';
                }
                if ($weatherId >= 700 && $weatherId<800) {
                    echo '<img src="http://openweathermap.org/img/wn/50d@2x.png" alt="">';
                }
                if ($weatherId == 800) {
                    echo '<img src="http://openweathermap.org/img/wn/01d@2x.png" alt="">';
                }
                if ($weatherId == 801) {
                    echo '<img src="http://openweathermap.org/img/wn/02d@2x.png" alt="">';
                }
                if ($weatherId == 802) {
                    echo '<img src="http://openweathermap.org/img/wn/03d@2x.png" alt="">';
                }
                if ($weatherId == 803) {
                    echo '<img src="http://openweathermap.org/img/wn/04d@2x.png" alt="">';
                }
                if ($weatherId == 804) {
                    echo '<img src="http://openweathermap.org/img/wn/04d@2x.png" alt="">';
                }
               
                
                ?><br>

                <?= $weatherDesc ?>
                </div> <!-- weather_desc -->


                <div class="weather_temp">


                   <h4><?= $weatherTemp ?><span> °C </span></h4> 
                    <h4> <?= $weatherCity ?></h4>



                </div> <!-- weather_temp -->
            </div><!-- ALL weather -->


                <?php } ?>



            </div>




    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
  </body>
</html>