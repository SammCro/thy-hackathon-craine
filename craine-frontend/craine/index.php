<?php
require_once "assets/partials/standart/_head.php";
?>

<body>

    <header class="main">
        <div class="main-nav">
            <ul>
                <?php
                $query = $settings->read("menu", ["menuStatus" => 1, "menuType" => $user->get("role")], "");
                while ($m = $query->fetch(PDO::FETCH_ASSOC)) {
                ?>
                    <li <?= ($m["menuLink"] == $settings->page) ? 'class="active"' : '' ?> onclick="go('<?= $m['menuLink'] ?>')"><ion-icon name="<?= $m["menuIcon"] ?>"></ion-icon></li>
                <?php } ?>
            </ul>
            <div class="main-desc">
                <?php
                $dir = "assets/partials/page/head/_" . $settings->page . '.php';
                if (file_exists($dir)) {
                    require $dir;
                }
                ?>
            </div>
            <div class="main-logo">
                <img src="assets/img/icon.png" alt="">
                <strong>CR<span class="c-red">AI</span>NE</strong>
            </div>
        </div>
    </header>

    <div class="main-body">
        <?php
        $dir = "assets/partials/page/body/_" . $settings->page . ".php";
        if (file_exists($dir)) {
            require $dir;
        } else {
            header("Location: " . $settings::$base . "error/404");
        }
        ?>

        <!-- <div class="cargo-table">
            <div class="cargo-table-head">
                <h3><strong>CARGO</strong></h3>
                <small><ion-icon name="airplane-outline"></ion-icon> VIEW ON AIRPLANE</small>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>User</th>
                        <th>Status</th>
                        <th>Location</th>
                        <th>Phone</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Emre Akdoğan</td>
                        <td>On the way</td>
                        <td>İstanbul</td>
                        <td>0532 123 45 67</td>
                    </tr>
                </tbody>
            </table>
        </div> -->
    </div>


    <?php
    require "assets/partials/standart/_script.php";
    ?>

</body>

</html>