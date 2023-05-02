<?php
require_once "assets/partials/standart/_connect.php";



switch ($settings->type) {
    case 'signin':
        $mail = htmlspecialchars(trim($_POST['mail']));
        $pwd = htmlspecialchars(trim($_POST['password']));

        // mail filter

        $settings->pwdEncode($pwd);

        $query = $user->read("users", ["email" => $mail, "password" => $pwd, "usersStatus" => 1], "");
        if ($query->rowCount() == 1) {
            $u = $query->fetch(PDO::FETCH_ASSOC);
            $_SESSION["user"] = ["mail" => $mail, "pwd" => $pwd];

            $role = ($u["role"] == "technical") ? "statistics" : "upload";

            echo "Hoşgeldiniz!:::success:::" . $role;
        } else {
            echo "Yalnış e-posta veya şifre!:::danger";
        }
        break;

    case 'upload':
        $image_path = $_FILES['image']['tmp_name'];
        $image_data = base64_encode(file_get_contents($image_path));


        $python_url = 'http://192.168.137.153:8090/api/cargos';
        $request_body = json_encode(array('imageBase64' => $image_data));

        $ch = curl_init($python_url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $request_body);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt(
            $ch,
            CURLOPT_HTTPHEADER,
            array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($request_body)
            )
        );
        $response = curl_exec($ch);
        curl_close($ch);

        $response = json_decode($response, true);


        echo ($response["status"] === 'true') ? "Başarılı:::success" : "Başarısız:::danger";

        break;
}
