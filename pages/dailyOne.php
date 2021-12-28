<?php  
    if(!isset($_GET['city'])||$_GET['city']==-1 ){
        header("location:main.php");
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
    <title>Search Daily</title>
    <link rel="stylesheet" href="../lib/w3.css">
    <link rel="stylesheet" href="../lib/font-awesome.css">
    <link rel="stylesheet" href="../style/global.css">
    <link rel="stylesheet" href="../style/dwm.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script defer src="../js/web.js"></script>
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
                <li><a href="main.html" class="active">Weather</a></li>
                <li><a href="prediction.html">Prediction</a></li>
            </ul>
        </div>
    </nav>

    <!-- Searchbar -->
    <section class="main">
        <div class="container">
            <form action="#" class="search" method="get" onchange="changeValue()">
            <select type="text" placeholder="  Search City" name="city" id=dropDownCity>
                <option  disabled selected value="-1">Search City</option>
                <?php  
                foreach($data as $kolom){
                   ?>
                <option value= <?php  $id=$kolom['IdKota']; echo $id; if($id==$_GET['city']){echo" Selected";};    ?> > <?php echo $kolom['NamaKota'];  ?>  </option>
            

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
                        <a href= <?php  echo "../pages/dailyOne.php?city=".$_GET['city'] ?> class="nav-link active second">One Day</a>
                    </li>
                    <li class="nav-item">
                        <a href=<?php  echo "../pages/weeklyOne.php?city=".$_GET['city'] ?> class="nav-link second">Weekly</a>
                    </li>
                    <li class="nav-item">
                        <a href=<?php  echo "../pages/monthlyOne.php?city=".$_GET['city'] ?>class="nav-link second">Monthly</a>
                    </li>
                </ul>
            </div>
        </div>
    </section>
    <!-- Date picker Form -->
    <section class="daily">
        <div class="container">
            <form action="dailyTwo.php" class="date-pick" method="POST">
                <input type="text" hidden name="city" value= <?php echo $_GET['city'];  ?> id="city-hidden">
                <input type="date" name="date">
                <button type="submit">SEARCH</button>
            </form>
        </div>
    </section>

    <div style="margin-left: 0%; opacity: 0.3; margin-top: 7%;">
        <img src="../assets/color _city.png" width="100%">
    </div>
    
    <footer>

    </footer>
</body>
