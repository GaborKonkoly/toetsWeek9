<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

const lamptype = array("Selecteer type","Head Lamp","Rear Lamp","Winker");

class LampType extends Model {
    
    static function lampen (){
        return lamptype;
    }

    static function lamp ($product){
        if (!is_int($product)) return "";
        if ($product < 1) return "";
        if ($product > 3) return "";
        return lamptype[$product];
    }
}