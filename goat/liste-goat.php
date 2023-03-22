<?php
$title = "Liste GOAT";
$bg = " bg-rose-500";

include('partials/_header.php');
require_once('models/model.php');
$goatLists = getALL('goat');
include('partials/_table-goat.php');
include('partials/_footer.php');