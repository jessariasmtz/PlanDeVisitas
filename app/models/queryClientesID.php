<?php
function queryClientesID(Array $checkedID) {
    $whereConcat = "";

    $i = 0;
    foreach($checkedID as $selected) {
        $i++;

        $whereConcat .= "ID = '$selected'";
        if($i < count($checkedID))
            $whereConcat .= " or ";
    }

    return $whereConcat;
}