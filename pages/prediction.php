<?php  
    if(!isset($_GET['city'])||$_GET['city']==-1 ){
        header("location:mainPrediction.php");
    }

    require_once '../Database/database.php';
    $query="SELECT * FROM kota";
    $db=new DB();
    $data=$db->executeSelectQuery($query);

?>


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../lib/w3.css">
    <link rel="stylesheet" href="../lib/font-awesome.css">
    <link rel="stylesheet" href="../style/global.css">
    <link rel="stylesheet" href="../style/prediction.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="../js/forecast.js" defer></script>
    <title>Document</title>
</head>
<body>
    
    <img id="BG" src="../assets/BW.png" alt="">
    <nav class="navbar w3-top w3-container">
        <div style="flex: 1;">
            <img class="navbar-logo" src="../assets/Logo.png" width="100px">
                <span>Weathery</span>
        </div>
        <div style="flex: 1;  margin-top: 20px;">
            <ul>
                <li><a href="../index.html">Home</a></li>
                <li><a href="mainWeather.php">Weather</a></li>
                <li><a href="mainPrediction.php"class="active">Prediction</a></li>
            </ul>
        </div>
    </nav>

    <div>
    <section class="select_param">
        <div class="w3-dropdown-click w3-round-xlarge">
            <button onclick="OnClick()" class="dropbutton">
                
                <span> Select Parameter! </span>
                <i class="fa fa-chevron-down" style="color: white;"></i> 
            
            </button>
            <div class="w3-bar-block w3-border w3-hide" id="drop_content">
                <a href="#" class="drop_fill" id="rainfall">Morning Humidity</a>
                <hr>
                <a href="#" class="drop_fill" id="evaporation">Morning Cloud</a>
                <hr>
                <a href="#" class="drop_fill" id="sunshine">Morning Pressure</a>
                <hr>
                <a href="#" class="drop_fill" id="windspeed">Evaporation</a>
                <hr>
                <a href="#" class="drop_fill" id="humidity">Morning Wind Speed</a>
                <hr>
                <a href="#" class="drop_fill" id="pressure">Morning Temperature</a>
            </div>
        </div>
    </section>

    <section class="selected_param">
        <form action="predictionResult.php" method="GET" id="form-predict">

            <input type="text" hidden value= "<?php echo $_GET['city'] ?>" name="city" >

            <div class="border_box">
                <div class="selected_content w3-hide" id="rainfallRes">
                    <span>Morning Humidity</span>
                    <input type="text" name=0 value=-1  id="rainfallInput" >
                    <a href="#" class="remo" id="remo1">remove</a>
                </div>
                <div class="selected_content w3-hide" id="evaporationRes">
                    <span>Morning Cloud</span>
                    <input type="text" name=1 value=-1 id="evaporationInput">
                    <a href="#" class="remo" id="remo2">remove</a>
                </div>
                <div class="selected_content w3-hide" id="sunshineRes">
                    <span>Morning Pressure</span>
                    <input type="text" name="2" value=-1  id="sunshineInput">
                    <a href="#" class="remo" id="remo3">remove</a>
                </div>
                <div class="selected_content w3-hide" id="windspeedRes" id="windInput">
                    <span>Evaporation</span>
                    <input type="text" name="3" value =-1  id="windInput">
                    <a href="#" class="remo" id="remo4">remove</a>
                </div>
                <div class="selected_content w3-hide" id="humidityRes">
                    <span>Morning Wind Speed</span>
                    <input type="text" name="4" value=-1 id="humidityInput">
                    <a href="#" class="remo" id="remo5">remove</a>
                </div>
                <div class="selected_content w3-hide" id="pressureRes">
                    <span>Morning Temperature</span>
                    <input type="text" name="5" value=-1 id="pressureInput">
                    <a href="#" class="remo" id="remo6">remove</a>
                </div>
            </div>

            
            
        </form>
        
        
    </section>

    <section class="process_button">
        <button id="submit_button"><a href="#"  style="text-decoration: none;">Process</a> </button>
    </section>
    

    </div>

    

    <script>

        function OnClick(){
            var dropdowntable = document.getElementById("drop_content");
            console.log("hai");
            dropdowntable.classList.toggle("w3-hide")
        }

    </script>

</body>
