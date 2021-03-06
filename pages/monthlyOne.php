<?php  
    if(!isset($_GET['city'])||$_GET['city']==-1 ){
        header("location:mainWeather.php");
    }else if(isset($_GET['code'])){
        if($_GET['code']==1){

            // kalau mau ganti ganti aja
            echo "
        <Script>
            alert('Silahkan Isi tanggal dan kota dahulu')
        </Script>";
        }else if($_GET['code']==2){
            echo "
            <Script>
                alert('Tanggal yang anda pilih tidak ditemukan')
            </Script>";
        }
    }


    require_once '../Database/database.php';
    $query="SELECT * FROM kota";
    $db=new DB();
    $data=$db->executeSelectQuery($query);




?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Daily</title>
    <link rel="stylesheet" href="../lib/w3.css">
    <link rel="stylesheet" href="../lib/font-awesome.css">
    <link rel="stylesheet" href="../style/global.css">
    <link rel="stylesheet" href="../style/dwm.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script defer src="../js/web.js"></script>
    
    <!-- <link rel="stylesheet" href="../style/dwm.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
</head>
<body>
    <!-- Header -->
    <nav class="navbar w3-top w3-container">
        <div style="flex: 1;">
            <img class="navbar-logo" src="../assets/Logo.png" width="100px">
                <span>Weathery</span>
        </div>
        <div style="flex: 1;  margin-top: 20px;">
            <ul>
                <li><a href="../index.html">Home</a></li>
                <li><a href="mainWeather.php" class="active">Weather</a></li>
                <li><a href="mainPrediction.php">Prediction</a></li>
            </ul>
        </div>
    </nav>

    <!-- Searchbar -->
    <section class="main">
        <div class="container">
            <form action="#" class="monthly-pick" method="get" onchange="changeValue()">
            <select type="text" placeholder="  Search City" name="city" id=dropDownCity class="custom-sel">
                <option  disabled selected value="-1">Search City</option>
                <?php  
                foreach($data as $kolom){
                   ?>
            <option value="<?php echo $kolom['IdKota'];?>"  <?php  if($kolom['IdKota']==$_GET['city']){echo "selected";} ?>  > <?php echo $kolom['NamaKota'];  ?>  </option>
            

                <?php 
                }         
                ?>


                </select>
            </form>
        </div>
        <!-- Searchbar Ends-->
    </section>
    <!-- Second-Nav Bar -->
    <section class="second-nav">
        <div class="container">
            <div class="sec-navbar">
                <ul class="nav-list-second">
                    <li class="nav-item">
                        <a href="<?php  echo "../pages/dailyOne.php?city=".$_GET['city'] ?>" class="nav-link second">One Day</a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php  echo "../pages/weeklyOne.php?city=".$_GET['city'] ?>" class="nav-link second">Weekly</a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php  echo "../pages/monthlyOne.php?city=".$_GET['city'] ?>" class="nav-link active second">Monthly</a>
                    </li>
                </ul>
            </div>
        </div>
    </section>

    <!-- Date picker Form -->
    <section class="daily">
        <div class="container">
            <form action="monthlyTwo.php" class="monthly-pick" method="GET">
                <input type="text" hidden name="city" value="<?php echo $_GET['city'];?>" id="city-hidden">
                <select name="month" id="dd_month" class="custom-sel" >
                    <option disabled selected> Month </option>
                    <option value="1">January</option>
                    <option value="2">February</option>
                    <option value="3">March</option>
                    <option value="4">April</option>
                    <option value="5">May</option>
                    <option value="6">June</option>
                    <option value="7">July</option>
                    <option value="8">August</option>
                    <option value="9">September</option>
                    <option value="10">October</option>
                    <option value="11">November</option>
                    <option value="12">December</option>
                </select>
                <select name="year" id="dd_year" class="custom-sel">
                    <option disabled selected> Year </option>
                    <option value="2008">2008</option>
                    <option value="2009">2009</option>
                    <option value="2010">2010</option>
                    <option value="2011">2011</option>
                    <option value="2012">2012</option>
                    <option value="2013">2013</option>
                    <option value="2014">2014</option>
                    <option value="2015">2015</option>
                    <option value="2016">2016</option>
                    <option value="2017">2017</option>
                </select>
                <button type="submit" class="btn-search">SEARCH</button>
            </form>
        </div>
    </section>

    <div style="margin-left: 0%; opacity: 0.3; margin-top: 7%;">
        <img src="../assets/color _city.png" width="100%">
    </div>
    
    <footer>
        
    </footer>
</body>
