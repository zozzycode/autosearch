<?php

include_once('db_connection.php');

$conn = OpenConection();

create_table_search_results($conn);

CloseConnection($conn);

function create_table_search_results($conn) {
    $sql_create_table = "CREATE TABLE IF NOT EXISTS fnx_search_results (
        id INT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
        search_string VARCHAR(30) NOT NULL DEFAULT '',
        qty INT(6) UNSIGNED NOT NULL DEFAULT 0,
        PRIMARY KEY (id),
        UNIQUE KEY search_string (search_string)
        )
        DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
    ";

    if ($conn->query($sql_create_table) === TRUE) {
        echo "Table 'fnx_search_results' created\n";
    } else {
        echo "Error: " . $sql_create_table . " " . $conn->error;
    }

}
