<!DOCTYPE html>
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
            <form action="dailyOneTwo.php" class="search" method="get">
                <input type="text" placeholder="  Search City" name="search-city">
                <button type="submit"><i class="fa fa-search"></i></button>
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
                        <a href="../pages/dailyOne.html" class="nav-link active second">One Day</a>
                    </li>
                    <li class="nav-item">
                        <a href="../pages/weeklyOne.html" class="nav-link second">Weekly</a>
                    </li>
                    <li class="nav-item">
                        <a href="../pages/monthlyOne.html" class="nav-link second">Monthly</a>
                    </li>
                </ul>
            </div>
        </div>
    </section>
    <!-- Date picker Form -->
    <section class="daily">
        <div class="container">
            <form action="dailyOneTwo.php" class="date-pick" method="get">
                <input type="date" name="date-picker-daily">
                <button type="submit"><a href="dailyTwo.html" style="text-decoration: none;">SEARCH</a></button>
            </form>
        </div>
    </section>
    
    <footer>

    </footer>
</body>
</html>

<?php 

    if(isset($_GET['search-city']) && isset($_GET['date-picker-daily'])){
        $city = $_GET['search-city'];
        $day = $_GET['date-picker-daily'];
    }

?>