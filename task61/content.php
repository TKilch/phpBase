<?php
$current_time = date("d.m.Y");
$current_time = explode('.',$current_time);
$birthday = $_REQUEST["date"];
$arr = explode('-',$birthday);

if($current_time[1] > $arr[1]) {
    $result = date("Y") - $arr[0];
    echo "Тебе " . $result . " лет!";
}
else if($current_time[1]=$arr[1]){
    if($current_time[0]>$arr[2]) {
        $result = date("Y") - $arr[0];
        echo "Тебе " . $result . " лет!";
    }
    else{
        $result = (date("Y") - $arr[0]) - 1;
        echo "Тебе " . $result . " лет!";
    }
}
else{
    $result = (date("Y") - $arr[0]) - 1;
    echo "Тебе " . $result . " лет!";
}