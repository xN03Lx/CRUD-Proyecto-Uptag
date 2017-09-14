<?php

foreach($_SESSION["data"] as $value){
    echo "<div>".$value->nom_est."  ".$value->ced_est."</div>";
}