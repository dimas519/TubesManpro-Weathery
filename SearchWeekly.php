<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/global.css">
    <link rel="stylesheet" href="style/index.css">
    <link rel="stylesheet" href="style/weekly.css">
    <link rel="stylesheet" href="lib/w3.css">
    <link rel="stylesheet" href="lib/font-awesome.css">
    
    <title>Document</title>
</head>
<body>
   
    <div class="">
        <div class="">
            <form action="" class="w3-center" >
                <div class="w3-row ">
                    <div class="w3-col s4 empty"></div>
                    <div class=" ">
                        <div class="w3-col s1  w3-rightbar w3-border-black">
                            <select name="kota" id="kota" class="w3-input w3-padding">
                                <!-- AMBIL DARI DB-->

                                <!--example  -->
                                <option value="id0">Adelaide</option>
                                <option value="id1">Sydney</option>
                            </select>
                        </div>
                        
                        <div class="w3-col s1  w3-rightbar w3-border-black">
                            <input type="date" name="from" id="from" class="w3-input">
                        </div>
                        <div class="w3-col s1 w3-rightbar w3-border-black">
                            <input type="date" name="to" id="to" class="w3-input">
                        </div>
                    </div>
                    <div class="w3-col s1 ">
                        <input type="submit" value="SEARCH" class="w3-round-xxlarge w3-padding">

                    </div>


                </div>
            </form>



                <br><br>
               <!-- accordion -->
            <div>

                <!-- buttonnya -->
                <div>
                    <button class="size w3-green w3-round-xlarge w3-left" onclick="javaScript:document.getElementById('day1').classList.toggle('w3-hide')">Day to Day <i class="fa fa-caret-down" ></i></button>
                </div>
                  
                <!-- isi -->
                <div id="day1" class ="w3-hide">
                    <div class="w3-row">
                        <div class="w3-col s2 empty"></div>
                        <?php  
                        $i=0;
                        for ($i=$i;$i<4;$i++){?>
                            <div class="w3-col s2 w3-center back w3-card-4 w3-margin w3-round-xlarge">
                                <p>Monday</p>
                                <p>18</p>
                                <?php  
                                if(true){?>
                                    <img src="assets/Logo.png" alt="" style="width:80px;">
                                <?php  
                                    }else{


                                    
                                        
                                    }?>
                                <h4>15.5 C</h4>
                                <h5>8.8/15.9</h5>

                            </div>

                        <?php  } ?>
                    </div>
                                    
                    <div class="w3-row">
                        <div class="w3-col s3 empty"></div>
                        <?php   
                        for($i=$i;$i<7;$i++){
                        ?>
                        <div class="w3-col s2 w3-center back w3-card-4 w3-margin w3-round-xlarge">
                                <p>Monday</p>
                                <p>18</p>
                                <?php  
                                if(true){?>
                                    <img src="assets/Logo.png" alt="" style="width:80px;">
                                <?php  
                                    }else{


                                    
                                        
                                    }?>
                                <h4>15.5 C</h4>
                                <h5>8.8/15.9</h5>

                            </div>

                            <?php  } ?>
                    </div>
                </div>

            </div>
        </div>

    </div>










    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>