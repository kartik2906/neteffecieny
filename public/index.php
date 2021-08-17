<?php
include('versionb/All_classes/Main_finance.php');

$title_data = 'Hello!';
$output_data = 'Wrong request. Please double-check!';
if ($_SERVER['REQUEST_URI'] === '/time') {
    $data = new Main_finance();
    $title_data = 'Time';
    $output_data = $data->today();
} elseif ($_SERVER['REQUEST_URI'] === '/price') {
    include('Main_host.php');
    $title_data = 'Today\'s price';
    $price = 0;
    $host = new Main_host();
    $query = 'SELECT * FROM option WHERE name = \'display_price\'';
    $result = mysqli_query($host->link, $query);
    if ($result) {
        $row = mysqli_fetch_assoc($result);
        if ($row['value'] === 'yes') {
            $query = 'SELECT * FROM option WHERE name = \'price\'';
            $result = mysqli_query($host->link, $query);
            if ($result) {
                $row = mysqli_fetch_assoc($result);
                $price = $row['value'];
            }
        }
    }
    if ($price) {
        $data = new Main_finance();
        $title_data = 'Today\'s price';
        $output_data = 'Final price: '.$data->VAT($price, $tax);
        $output_data .= ' Tax: '.$tax;
    } else {
        $output_data = 'We don\'t have price for today';
    }
} elseif ($_SERVER['REQUEST_URI'] === '/') {
    $title_data = 'Welcome!';
    $output_data = 'Please use "/time" or "/price" as URL.';
}
require('versionb/theme.php');

?>
