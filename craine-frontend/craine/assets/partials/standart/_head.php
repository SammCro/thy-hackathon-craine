<?php
require_once "assets/partials/standart/_connect.php";
?>
<!doctype html>
<html lang="tr">

<head>
    <base href="<?= $settings::$base ?>">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


    <!-- CSS -->
    <link rel="stylesheet" href="assets/css/style.css">

    <title><?= $settings->get("name") ?></title>

    <!-- icon -->
    <link rel="icon" href="<?= $settings->get("icon") ?>">

    <!-- ion icon -->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

    <!-- alert js -->
    <link rel="stylesheet" href="assets/css/alert-js.css">
</head>