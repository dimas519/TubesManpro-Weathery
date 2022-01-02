<?php  
    if( !isset($_GET['city']) || !isset($_GET['Humidity9am']) || !isset($_GET['Cloud9am']) || !isset($_GET['Pressure9am']) ||
    !isset($_GET['Evaporation']) || !isset($_GET['WindSpeed9am'])    || !isset($_GET['Temp9am'])){
    header("prediction:php");
    }

    $kode=strval($_GET['city']);

    $jsonData=new stdClass();
    $jsonData->kota=$_GET['city'];

    if(!($_GET['Humidity9am']==-1)){
        $kode=$kode."-Humidity9am";
        $jsonData->Humidity9am=$_GET['Humidity9am'];
    }
    if(!($_GET['Cloud9am']==-1)){
        $kode=$kode."-Cloud9am";
        $jsonData->Cloud9am=$_GET['Cloud9am'];
    }
    if(!($_GET['Pressure9am']==-1)){
        $kode=$kode."-Pressure9am";
        $jsonData->Pressure9am=$_GET['Pressure9am'];
    }
    if(!($_GET['Evaporation']==-1)){
        $kode=$kode."-Evaporation";
        $jsonData->Evaporation=$_GET['Evaporation'];
    }
    if(!($_GET['WindSpeed9am']==-1)){
        $kode=$kode."-WindSpeed9am";
        $jsonData->WindSpeed9am=$_GET['WindSpeed9am'];
    }
    if(!($_GET['Temp9am']==-1)){
        $kode=$kode."-Temp9am";
        $jsonData->Temp9am=$_GET['Temp9am'];
    }

    $myJSON =base64_encode(json_encode($jsonData));
    
    $prediksiALL=shell_exec("cd ../PredictionLogic && python prediction.py $myJSON");
    $isTodayRain=substr($prediksiALL,0);
    $isTomorrowRain=substr($prediksiALL,2);
 

    require_once '../Database/database.php';
    $queryToday="SELECT * FROM akurasiToday WHERE format_nama='$kode'";
    $queryTomorrow="SELECT * FROM akurasiTomorrow WHERE format_nama='$kode'";
    $db=new DB();
    $dataToday=$db->executeSelectQuery($queryToday)[0];
    $dataTomorow=$db->executeSelectQuery($queryTomorrow)[0];


    date_default_timezone_set("Asia/Jakarta");
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
    <title>Document</title>
</head>
<body class="result">
    
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

    <div class="accuracy">
        <div id="percent"><?php echo round(($dataToday['akurasi']*100),2);  ?>%</div>
        <div style="font-size: 22pt; margin-top: -4rem;"> Today ACCURACY</div>
    </div>

    <div class="accuracy" style="margin-top:10cm">
        <div id="percent"><?php echo round(($dataTomorow['akurasi']*100),2);  ?>%</div>
        <div style="font-size: 22pt; margin-top: -4rem;">Tomorrow ACCURACY</div>
    </div>


    <div class="today" style="display: flex; flex-direction: row;">
        <div style="width: 65%;">
            <span class="title">Today's Prediction</span><br>
            <span class="date"><?php  echo date("d-m-Y"); ?></span><br>
            <div class="pred"> <?php  
                if($isTodayRain==0){
                    echo "NOT RAINING";
                }else{
                    echo "RAINING";
                }
            
            
            ?> </div>
        </div>
        <div style="width: 30%;">
        <?php    if($isTodayRain==0){ ?>
            <img src="../assets/Logo.png" alt="" style="width: 100%;">
        <?php  }else{ ?>
            <img src="../assets/Rain.png" alt="" style="width: 100%;">
        <?php  } ?>
        </div>
        
    </div>

    <div class="tommorow" style="display: flex; flex-direction: row;">
        <div style="width: 65%;">
            <span class="title">Tommorow's Prediction</span><br>
            <span class="date"><?php  
            $date=strval(date("d-m-Y"));
            echo date('d-m-y',strtotime($date.'+1 days'));
            
            
            ; ?></span><br>
            <div class="pred"><?php  
                if($isTomorrowRain==0){
                    echo "NOT RAINING";
                }else{
                    echo "RAINING";
                }
            
            
            ?></div>
        </div>
        <div style="width: 30%;">
        <?php    if($isTomorrowRain==0){ ?>
            <img src="../assets/Logo.png" alt="" style="width: 100%;">
        <?php  }else{ ?>
            <img src="../assets/Rain.png" alt="" style="width: 100%;">
        <?php  } ?>
        </div>
    </div>


</body>
