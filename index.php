<?php
    $msg = null;
    if (isset($_POST['directorio'])) {
        $carpeta = htmlspecialchars($_POST['carpeta']);
        $ruta = htmlspecialchars($_POST['ruta']);
        $directorio = $ruta."/".$carpeta;

        if(!is_dir($directorio)) {
            $crear = mkdir($directorio, 0777, true);
            
            if($crear) {
                $msg = "Directorio $directorio creado correctamente.";
            } else {
                $msg = "Ha ocurrido un error al crear el directorio.";
            }
        } else {
            $msg = "El directorio que intentas crear ya existe.";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplicación de bloc de notas</title>
    <link rel="icon" href="./img/icon.png">
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <form action="creararchivo.php" method="post">
        <h1>Aplicación de bloc de notas</h1>
        <h3 class="title">Este programa le permite crear archivos de texto y directorios.</h3>
        <div>
           <h2>1. Crear archivos de texto con PHP:</h2>
            <p class="description">Nombre del archivo de texto a crear:</p><br>
            <input type="text" name="nombre" class="input" placeholder="Inserte nombre del archivo"><br>
            <p class="description">Descripción del archivo de texto:</p><br>
            <textarea name="descripcion" id="texto" cols="30" rows="10" placeholder="Inserte la descripción del archivo"></textarea><br>
            <br><input type="submit" name="boton" class="boton" value="Crear archivo">
            <div class="mensaje">
                <?php
                    echo $_GET['msg'];
                ?>
            </div>
        </div>
    </form>
    <form method="post" action="<?php echo $_SERVER["PHP_SELF"] ?>">
        <div>
            <h2>2. Crear directorios con PHP:</h2>
                <p class="description">Nombre de los directorios a crear:</p><br>
                <input type="text" name="carpeta" class="input" placeholder="Inserte nombres de la carpetas"><br>

                <p class="description">Guardar en la ruta:</p><br>
                <input type="text" name="ruta" class="input" placeholder="Inserte ruta en donde se guardarán los directorios"><br>

                <input type="hidden" name="directorio">
                <input type="submit" value="Crear carpeta" class="boton">
            <div class="mensaje">
                <?php
                    echo $msg
                ?>
            </div>
            <div class="mensaje">
                <?php
                    if ($dir = opendir($directorio)) {
                        while ($archivo = readdir($dir)) {
                            if ($archivo != '.' && $archivo != '..') {
                                echo "Archivo: $archivo";
                            }
                            
                        }
                    }
                ?>
            </div>
        </div>
    </form>
</body>
</html>