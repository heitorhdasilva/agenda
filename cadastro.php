<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="cadastro">
        <form class="form-horizontal" action="verifica_usuario.php?acao=cadastro" method="post">
            <fieldset>

                <!-- Form Name -->
                <legend>Form Name</legend>
                
                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="login">login</label>
                    <div class="col-md-4">
                        <input id="login" name="login" type="text" placeholder="login" class="form-control input-md" required="">
                        <span class="help-block">help</span>
                    </div>
                </div>

                <!-- Password input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="senha">senha</label>
                    <div class="col-md-4">
                        <input id="senha" name="senha" type="password" placeholder="senha" class="form-control input-md" required="">
                        <span class="help-block">help</span>
                    </div>
                </div>
                <!-- Button -->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="enviar">enviar</label>
                    <div class="col-md-4">
                        <button id="enviar" name="enviar" class="btn btn-success">Button</button>
                    </div>
                </div>
            </fieldset>
        </form>

    </div>
</body>
</html>