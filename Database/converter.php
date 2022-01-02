<?php
class Converter{  
    public function __construct(){           
    }
    public static function converter($code){
        switch($code){
            case 0.0:
                return "West";
            case 1:
                return "West-Northwest";
            case 2:
                return "West-Southwest";
            case 3:
                return "Northeast";
            case 4:
                return "North-Northwest";
            case 5:
                return "North";
            case 6:
                return "North-Northeast";
            case 7:
                return "Southwest";
            case 8:
                return "East-Northeast";
            case 9:
                return "South-Southeast";
            case 10:
                return "South";
            case 11:
                return "Northwest";
            case 12:
                return "Southeast";
            case 13:
                return "East-Southeast";
            case 14:
                return "East";
            case 15:
                return "South-Southwest";
        }
    }
}


?>