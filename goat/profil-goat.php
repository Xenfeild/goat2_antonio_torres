<?php 
$title = "Liste GOAT";
$bg = " bg-rose-500";

include('partials/_header.php');
// include('helpers/function.php');
require_once('models/model.php');
$goatList = get('goat');
include_once('partials/_show-goat.php');
include('partials/_footer.php');