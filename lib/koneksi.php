<?php
//untuk mengkoneksikan ke databases
$koneksi = mysqli_connect("localhost", "root", "", "db_portal");

//menampilkan data user
function query($query)
{
    global $koneksi;
    $result = mysqli_query($koneksi, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}
