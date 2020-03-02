<?php
    $num1=10;

    //Dieu kien
    /*
    ==, !=, >, <, >=, <=
    */
    if($num1>20){
        echo $num1.' lon hon 20';
    }elseif($num1==20){
        echo $num1.' bang 20';
    }else{
        echo $num1.' be hon 20';
    }

    //Vong lap
    for($i=1;$i<=20;$i++){
        /* echo $i;
        echo '<br>'; */
    }


    echo '<hr>';
    //Ham
    function tinh_tong($num_a,$num_b){
        echo $num_a+$num_b;
    }
    
    function tinh_tong_v2($num_a,$num_b){
        return $num_a+$num_b;
    }

    echo tinh_tong_v2(4,6)-5;

?>