<?php 
function date_formated($date,$formate){
    $date_formatter = date($formate,strtotime($date));
    return $date_formatter;
}

function print_data($data){
    echo '<pre>';
    print_r($data);
    echo '</pre>';
}

?>