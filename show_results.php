<?php

include_once('db_connection.php');

$conn = OpenConection();

$sql_get_results = "SELECT * FROM fnx_search_results WHERE ABS(qty) > 0 ORDER BY ABS(qty) DESC";
$search_results = $conn->query($sql_get_results);

echo "# | id | s_string | qty \n";
echo "----------------------\n";
$i = 1;
while( $row = $search_results->fetch_assoc() ) {
    echo $i . " | " . $row["id"] . " | " . $row["search_string"] . " | " . $row["qty"] ."\n";
    $i++;
}
echo "----------------------\n";
echo "<a href='index.php'>Home</a>";

CloseConnection($conn);
