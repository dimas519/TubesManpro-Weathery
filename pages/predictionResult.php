<?php  
    if( !isset($_GET['city']) || !isset($_GET['0']) || !isset($_GET['1']) || !isset($_GET['2']) ||
    !isset($_GET['3']) || !isset($_GET['4'])    || !isset($_GET['5'])){
    header("prediction:php");
    }

    $kota=strval($_GET['city']);
    $lenidKota=strlen($kota);
    $kode=strval($lenidKota).$kota;

    $arrayData="{";
    $arrayData.='"kota":'.$_GET['city'];

    if(!($_GET['0']==-1)){ //humidity9am 
        $kode=$kode."0";
        $arrayData.=',"0":'.$_GET['0'];
    }
    if(!($_GET['1']==-1)){  //cloud9am
        $kode=$kode."1";
        $arrayData.=',"1":'.$_GET['1'];
    }
    if(!($_GET['2']==-1)){
        $kode=$kode."2";
        $arrayData.=',"2":'.$_GET['2'];
    }
    if(!($_GET['3']==-1)){
        $kode=$kode."3";
        $arrayData.=',"3":'.$_GET['3'];
    }
    if(!($_GET['4']==-1)){
        $kode=$kode."4";
        $arrayData.=',"4":'.$_GET['4'];
    }
    if(!($_GET['5']==-1)){
        $kode=$kode."5";
        $arrayData.=',"5":'.$_GET['5'];
    }

    $arrayData.="}";
    $encoded=base64_encode($arrayData);
    $prediksiALL=shell_exec("cd ../PredictionLogic && python prediction.py $encoded");

    $isTodayRain=-1;
    $isTomorrowRain=-1;
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
                }else  if($isTodayRain==1){
                    echo "RAINING";
                }
            
            
            ?> </div>
        </div>
        <div style="width: 30%;">
        <?php    if($isTodayRain==0){ ?>
            <img src="../assets/Logo.png" alt="" style="width: 100%;">
        <?php  }else if($isTodayRain==1){ ?>
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
                }else if($isTomorrowRain==1){
                    echo "RAINING";
                }
            
            
            ?></div>
        </div>
        <div style="width: 30%;">
        <?php    if($isTomorrowRain==0){ ?>
            <img src="../assets/Logo.png" alt="" style="width: 100%;">
        <?php  }else if($isTomorrowRain==1){ ?>
            <img src="../assets/Rain.png" alt="" style="width: 100%;">
        <?php  } ?>
        </div>
    </div>


</body>

