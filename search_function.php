<?php

    $search_string = isset($_GET['search_field']) && !empty($_GET['search_field']) ? $_GET['search_field'] : null;

    if (!is_null($search_string)) {
        include_once('save_to_db.php');
    } else {
        // echo "Null\n";
    }

    include_once('show_results.php');
