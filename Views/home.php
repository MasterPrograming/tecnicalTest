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
    <?= getModal("ModalPlay", $data); ?> 
    <video src="<?= media(); ?>/media/mainCar.mp4" id="bgVideo" muted autoplay loop>Test</video>
    <h1 class="text-center py-4 my-4" id="main-title">Tira Y Arranca</h1>
    <div id="mainDiv" class="container">
    <div id="menu" class="justify-content-center">
        <form id="fmMenu">
            <fieldset>
                <legend>Menu</legend>
                <div id="playersDiv">
                    <div class="form-group my-3">
                        <label for="namePlayer1" class="form-label">Jugador #1</label>
                        <input type="text" class="form-control" name="namePlayer1">
                    </div>                    
                </div>
                <a href="#" id="addPlayer">* Añadir nuevo jugador</a>
                <div class="form-group my-3">
                    <label for="pist" class="form-label">Selecciona la Pista de carreras</label>
                    <select name="pist"  class="form-control">
                        <option value="1">Islas Malvinas 6.000 KM</option>
                        <option value="2">Ciudad de Mexico 8.000 KM</option>
                    </select>
                </div>
                <div class="form-group my-4 text-center">
                    <button type="submit" class="btn btn-primary" id="btnPlayGame">!Jugar!</button>
                </div>
            </fieldset>
        </form>    
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