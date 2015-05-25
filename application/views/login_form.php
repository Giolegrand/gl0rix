<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Gl0rix - Admin</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="/assets/css/bootstrap.css" type="text/css" rel="stylesheet"/>
        <link href="/assets/css/gl0rix.css" type="text/css" rel="stylesheet"/>
        <?php include_once 'favicon/favicon.php'; ?>
    </head>
    <body>
        <div class="container">
            <main class="row">
                <div class="col-lg-4 col-lg-offset-4 col-md-4 col-md-offset-4 col-sm-10 col-xs-12">
                    <h2 class="text-center text-gl0rix">Login. </h2>
                    <?php
                    echo form_open('auth/login', Array('class' => "form-horizontal"));
                    echo form_input(Array('name' => 'username', 'class' => "form-control text-gl0rix", 'placeholder' => "Voer uw gebruikersnaam in"));
                    echo form_input(Array('type' => 'password', 'name' => 'password', 'class' => "form-control text-gl0rix", 'placeholder' => "Voer uw Wachtwoord in"));
                    ?>
                    <div class="well-sm">
                        <?php
                        echo form_checkbox(Array('name' => 'login_perm', 'checked' => false, 'class' => "text-gl0rix"));
                        echo form_label('Ingelogged blijven.', 'login_perm', Array('class' => "text-gl0rix"));
                        ?>
                    </div>
                    <?php
                    echo form_button(Array('type' => 'submit', 'class' => 'btn btn-lg btn-gl0rix btn-block'), 'Login');
                    echo form_close();
                    echo '<br />';
                    echo anchor('.','Website',Array('class' => 'btn btn-lg btn-gl0rix btn-block'));
                    ?>
                </div>
            </main>
            <?php
            if (isset($melding)):
                ?>
            <div class="row">
                <div class="text-center text-danger"><h3><?= $melding ?></h3></div>
            </div>
                <?php
            endif;
            ?>
        </div>
    </body>
</html>
