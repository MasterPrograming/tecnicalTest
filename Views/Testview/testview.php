<!DOCTYPE html>
<html lang="es">
<head>
    <title><?= $data['page_title'] ?></title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />    
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="Un video video Juego desarrollado por Johan Castro"/>    
    <meta name="author" content="Johan Castro" />
    <meta name="copyright" content="Johan Castro" />    
    <!-- restringir el guardado de cache -->
    <meta http-equiv="cache-control" content="no-cache"/>
    <!-- icono -->
    <link rel="shortcut icon" href="" type="image/x-icon">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- font awesome 5  -->    
    <!-- Estilos CSS personalizados -->
    <link rel="stylesheet" href="<?= media(); ?>/css/style.css" />
</head>

<body>    
    <h1 class="text-center py-4 my-4" id="main-title">Tira Y Arranca</h1>
    <div class="container" id="main">
        <div class="form-group my-4">
            <label for="customRange2" class="form-label">Carril 1 , Juan Manuel</label>
            <input type="range" class="form-range" value="0" min="0" max="6000" id="customRange1" readonly>
        </div>  
        <div class="form-group my-4">
            <label for="customRange2" class="form-label">Carril 2 , Mauricio Arango</label>
            <input type="range" class="form-range" value="0" min="0" max="6000" id="customRange2">
        </div>
        <div class="form-group my-4">
            <label for="customRange2" class="form-label">Carril 3 , Giselle Ortiz</label>
            <input type="range" class="form-range" value="3000" min="0" max="6000" id="customRange3">
        </div>
        <div class="form-group my-4">
            <label for="customRange2" class="form-label">Carril 4 , Maria Medina</label>
            <input type="range" class="form-range" value="0" min="0" max="6000" id="customRange4">
        </div>
    </div>
    <div id="ranking">

    </div>
 
       


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script>
        const base_url = "<?= base_url(); ?>"
    </script>
    <script src="<?=media() . "/js" . "/" . $data['page_function']?>.js"></script>    
</body>
</html>