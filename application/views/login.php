<html>
    <head>
        <title>Autentificação</title>
        <link href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/estilos.css" rel="stylesheet">
    </head>
    <body>
        <div class="container">
            <div class="content">
                <h1 class="text-center">Login</h1>
                <?php echo '<div class="alert alert-error">'.validation_errors().'</div>'; ?>

                <?php echo form_open('VerificaLogin'); ?>

                <div class="modal-body">
                    <div class="form-group">
                        <input class="form-control input-lg" placeholder="Usuário" type="text" name="username" id="username" required="true">
                    </div>
                    <div class="form-group">
                        <input class="form-control input-lg" placeholder="Senha" type="password" name="password" id="password" required="true">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary btn-lg btn-block" type="submit">Logar</button>
                    </div>
                </div>

            </div>
        </div>
    </body>
</html>
