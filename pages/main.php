<?php  
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
    <link rel="stylesheet" href="../style/dwm2.css">
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
                <li><a href="#" class="active">Weather</a></li>
                <li><a href="prediction.html">Prediction</a></li>
            </ul>
        </div>
    </nav>

    <div style="text-align: center;">
        <h1 style="margin-top: 10%; font-family: rokkitt; font-size: 50px;">Where do you want to look up the weather for ?</h1>
    </div>

    <section class="main">
        <div class="container">
            <form action="dailyOne.php" class="search" method="POST">
                <select type="text" placeholder="  Search City" name="city">
                <option  disabled selected value="-1">Search City</option>
                <?php  
                foreach($data as $kolom){
                   ?>
                <option value= <?php  echo$kolom['IdKota'] ?> > <?php echo $kolom['NamaKota'];  ?>  </option>
            

                <?php 
                }         
                ?>


                </select>
                <button type="submit"><i class="fa fa-search"></i></button>
            </form>
        </div>
    </section>

    <div style="margin-left: 0%; opacity: 0.3; margin-top: 3%;">
        <img src="../assets/color _city.png" width="100%">
    </div>

</body>
