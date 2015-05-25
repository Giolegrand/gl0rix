<?php
if (!empty($_GET)) {
    $url = "https://api.twitch.tv/kraken/oauth2/token";
    $data = Array(
        "client_id" => "e2ohp9afqam5sesqcz3vvn65rqi9qh8",
        "client_secret" => "ss204ww8vxz4z009du38bzc58ie93pt",
        "grant_type" => "authorization_code",
        "redirect_uri" => "http://skillscape.nu/gl0rix",
        "code" => $_GET['code'],
        "state" => ""
    );

    $data_string = "";
    foreach ($data as $key => $value) {
        $data_string .= $key . '=' . $value . '&';
    }
    $data_string = substr_replace($data_string, '', -1);

    try {
        $ch = curl_init();
        if ($ch === false) {
            throw new Exception("Failed to initialize");
        }
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, count($data));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $result = curl_exec($ch);
        if ($result == false) {
            throw new Exception(curl_error($ch), curl_errno($ch));
        }
        curl_close($ch);

        $gebruiker = json_decode($result);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://api.twitch.tv/kraken?oauth_token=" . $gebruiker->access_token);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $user = curl_exec($ch);

        curl_close($ch);
        $user = json_decode($user);
        var_dump($user);
    } catch (Exception $e) {
        trigger_error(sprintf("Curl failed with error #%d: %s", $e->getCode(), $e->getMessage()), E_USER_ERROR);
    }
}
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Gl0rix Test Authenticatie</title>
        <link href="css/bootstrap.css" rel="stylesheet"/>
        <link href="css/bootstrap-theme.css" rel="stylesheet"/>
        <link href="css/style.css" rel="stylesheet"/>
        <script src="js/jquery.js" language="javascript"></script>
        <script src="js/bootstrap.js" language="javascript"></script>
    </head>
    <body>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <span>Stap 1</span>
                    <a class="btn btn-block btn-purple" href="https://api.twitch.tv/kraken/oauth2/authorize?response_type=code&client_id=e2ohp9afqam5sesqcz3vvn65rqi9qh8&redirect_uri=http://skillscape.nu/gl0rix&scope=user_read&state=">Authenticate</a>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                    <?php
                    if (isset($user)):
                        ?>
                        <h3>Twitch Gebruikersnaam: <i><?= $user->token->user_name ?></i></h3><br />
                        <h3>Email: <i><?= $user->token->email_adress ?></i></h3>
                        <?php
                    endif;
                    ?>
                </div>
            </div>
        </div>
    </body>
</html>
