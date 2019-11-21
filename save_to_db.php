<?php

    include_once('db_connection.php');

    $conn = OpenConection();

    $sql_get_qty = "SELECT qty FROM fnx_search_results WHERE search_string = '$search_string' ORDER BY qty DESC";
    $search_qty = $conn->query($sql_get_qty);

    if ($search_qty->num_rows > 0) {
        while( $row = $search_qty->fetch_assoc() ) {
            $new_qty = (int)$row['qty'];
            $sql_update = "UPDATE fnx_search_results SET qty = ($new_qty+1) WHERE search_string = '$search_string'";
            if ($conn->query($sql_update) === TRUE) {
                echo "Record updated successfully\n";
            } else {
                echo "Error: " . $sql_insert . "<br>" . $conn->error."<br>";
            }
        }
    } else {
        $values = "0,'$search_string',1";
        $sql_insert = "INSERT INTO fnx_search_results (id,search_string,qty) VALUES ($values)";
        if ($conn->query($sql_insert) === TRUE) {
            echo "New record created successfully\n";
        } else {
            echo "Error: " . $sql_insert . "<br>" . $conn->error."<br>";
        }
    }

    CloseConnection($conn);
