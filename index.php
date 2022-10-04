<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://www.markuptag.com/bootstrap/5/css/bootstrap.min.css">
</head>
<body>
    <div class="container recolor">
        <section>
            
            <div class="col-5 text-center position-absolute top-50 start-50 translate-middle">
                <form action="app/AuthController.php" method="post">
                    <label for="" class="fs-2 fst-italic">Correo</label>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">@</span>
                        <input type="text" class="form-control" placeholder="correo electronico" aria-label="Username" aria-describedby="basic-addon1" name="email" required>
                      </div>
                    <label for="" class="fs-2 fst-italic">Contraseña</label>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">**</span>
                        <input type="password" class="form-control" placeholder="contraseña" aria-label="Username" aria-describedby="basic-addon1" name="password" required>
                      </div>
                      <button type="submit" class="btn btn-dark">aceptar</button>
                      <input type="hidden" name="action" value="access">
                    
                </form>
              
              </div>

        </section>
        
      </div>
</body>
</html>