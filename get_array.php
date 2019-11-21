<?php

/* include_once('db_connection.php');

$conn = OpenConection();

$sql_get_arr = "SELECT search_string FROM fnx_search_results ORDER BY ABS(qty) DESC";
$search_arr = $conn->query($sql_get_arr);

$search_arr_to_html = "var array_from_php = [";

while( $row = $search_arr->fetch_assoc() ) {
    $search_arr_to_html .= "\"" . $row["search_string"]."\",";
}

$search_arr_to_html = substr($search_arr_to_html, 0, -1);

$search_arr_to_html .= "];";

CloseConnection($conn);

echo $search_arr_to_html; */


include_once('db_connection.php');

$conn = OpenConection();

$sql_get_arr = "SELECT qty, search_string FROM fnx_search_results ORDER BY ABS(qty) DESC";
$search_obj = $conn->query($sql_get_arr);

CloseConnection($conn);

$search_obj_to_html = new stdClass();

while( $row = $search_obj->fetch_assoc() ) {
    $key = $row["search_string"];
    $search_obj_to_html->$key = new stdClass();
    $search_obj_to_html->$key->qty = $row["qty"];
    $search_obj_to_html->$key->url = "go_to_url.php";
    $search_obj_to_html->$key->name = $row["search_string"];
    $search_obj_to_html->$key->image = "ph.png";
}

/// CloseConnection($conn);

/* echo '<pre>';
print_r($search_obj_to_html);
echo '</pre>'; */

$search_obj_to_html_JSON = json_encode($search_obj_to_html);

echo $search_obj_to_html_JSON;
