<!DOCTYPE html>
<?php
include "../funciones/Metodos.php";
$obj = new Metodos();
session_start();
if (isset($_GET['ok'])) {
    $ok = $_GET['ok'];
    if ($ok == 1) {
?>
        <script>
            alert("Usuario creado correctamente")
        </script>
<?php
    }
}
?>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Crear Cuenta</title>
    <link rel="stylesheet" href="../static/estilos/general.css">
    <script src="../static/validaciones/valida.js"></script>
    <script src="../static/validaciones/jquery-2.2.4.min.js"></script>
    <script src="../static/slider/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="contenedor">
        <div class="row justify-content-md-center">
            <?php
            include '../componentes/menuA.php';
            ?>
        </div>
        <section class="padin-section">
            <div class="row justify-content-md-center align-items-center registro">
                <div class="text-center padin-section">
                    <h2>Crear Cuenta </h2>
                </div>
                <form method=POST class="col-sm-12 align-self-center" action="../funciones/registrar.php?id=2" id="cliente" onsubmit="return validar_cedula() && validar_telefono() && validar_combos('ciudad')">
                    <div class="form-group row justify-content-md-center">
                        <label for="cedula" class="col-sm-4 col-form-label">Identificación</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="cedula" id="cedula" title="cedula" required onkeypress="return validar_numeros(event)" placeholder="Escriba la cedula" />
                        </div>
                    </div>
                    <div class="form-group row justify-content-md-center">
                        <label for="pnombre" class="col-sm-4 col-form-label">Primer nombre</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="pnombre" id="pnombre" required title="primer nombre" onblur=" minuscula('pnombre')" onkeypress="return validar_texto(event)" onchange="return validar_longitud_nom('pnombre')" placeholder="Escriba primer nombre" />
                        </div>
                    </div>
                    <div class="form-group row justify-content-md-center">
                        <label for="snombre" class="col-sm-4 col-form-label">Segundo nombre</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="snombre" id="snombre" title="segundo nombre" onblur=" minuscula('snombre')" onchange="return validar_longitud_nom('snombre')" onkeypress="return validar_texto(event)" placeholder="Escriba segundo nombre" />
                        </div>
                    </div>
                    <div class="form-group row justify-content-md-center">
                        <label for="inputPassword" class="col-sm-4 col-form-label">Primer apellido</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="papellido" id="papellido" title="primer apellido" onblur=" minuscula('papellido')" onchange="return validar_longitud_nom('papellido')" onkeypress="return validar_texto(event)" required placeholder="Escriba primer apellido" />
                        </div>
                    </div>
                    <div class="form-group row justify-content-md-center">
                        <label for="inputPassword" class="col-sm-4 col-form-label">Segundo apellido</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="sapellido" id="sapellido" title="segundo apellido" onblur=" minuscula('sapellido')" onchange="return validar_longitud_nom('sapellido')" onkeypress="return validar_texto(event)" placeholder="Escriba segundo apellido" />
                        </div>
                    </div>
                    <div class="form-group row justify-content-md-center">
                        <label for="inputPassword" class="col-sm-4 col-form-label">Email</label>
                        <div class="col-sm-5">
                            <input type="email" class="form-control" name="email" id="email" title="email" required onchange="return validar_longitud40('email') && validar_email()" placeholder="Escriba el correo electrónico" />
                        </div>
                    </div>
                    <div class="form-group row justify-content-md-center">
                        <label for="inputPassword" class="col-sm-4 col-form-label">Dirección</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="direccion" title="dirección" onchange="return validar_longitud40('direccion')" required placeholder="Escriba la dirección" />
                        </div>
                    </div>
                    <div class="form-group row justify-content-md-center">
                        <label for="inputPassword" class="col-sm-4 col-form-label">Teléfono</label>
                        <div class="col-sm-5">
                            <input type="tel" class="form-control" name="telefono" id="telefono" title="telefono" required onkeypress="return validar_numeros(event)" placeholder="Escriba el teléfono" />
                        </div>
                    </div>
                    <div class="form-group row justify-content-md-center">
                        <label for="inputPassword" class="col-sm-4 col-form-label">Fecha de nacimiento</label>
                        <div class="col-sm-5">
                            <input type="date" class="form-control" required name="fecha" id="fecha" title="fecha de nacimiento" onchange="return validar_fecha()" />
                        </div>
                    </div>
                    <div class="form-group row justify-content-md-center">
                        <label for="inputPassword" class="col-sm-4 col-form-label">Sexo</label>
                        <div class="col-sm-5">
                            <input type="radio" name="sexo" value="F" title="sexo" style="height:15px;width:50px;" checked>Femenino<br>
                            <input type="radio" name="sexo" value="M" title="sexo" style="height:15px;width:50px;">Masculino<br>
                            <input type="radio" name="sexo" value="O" title="sexo" style="height:15px;width:50px;">Otro<br>
                        </div>
                    </div>
                    <div class="form-group row justify-content-md-center">
                        <label for="inputPassword" class="col-sm-4 col-form-label">Ciudad</label>
                        <div class="col-sm-5">
                            <select name="ciudad" class="form-control" title="ciudad" id="ciudad">
                                <option value="vacio">...</option>
                                <?PHP
                                $list = $obj->ListaCuidades();
                                foreach ($list as $row) {
                                    $codigo = $row["id_ciudad"];
                                    $nombre = $row["nombre_ciudad"];
                                    echo "<option value=" . $codigo . ">" . $nombre . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row justify-content-md-center">
                        <label for="tipo" class="col-sm-4 col-form-label">Tipo Usuario</label>
                        <div class="col-sm-5">
                            <select name="tipo" class="form-control" title="tipo usuario" id="tipo">
                                <option value="01">Administrador</option>
                                <option value="03">Contador</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row justify-content-md-center">
                        <label for="usuario" class="col-sm-4 col-form-label">Usuario</label>
                        <div class="col-sm-5">
                            <input type="text" required class="form-control" name="usuario" id="usuario" title="usuario" placeholder="Escriba el usuario" />
                        </div>
                    </div>
                    <div class="form-group row justify-content-md-center">
                        <label for="contraseña" class="col-sm-4 col-form-label">Contraseña</label>
                        <div class="col-sm-5">
                            <input required type="password" onchange="enable()" class="form-control" name="contraseña" id="contraseña" title="contraseña" placeholder="Escriba la contraseña" />
                        </div>
                    </div>
                    <div class="form-group row justify-content-md-center">
                        <label for="contraseña" class="col-sm-4 col-form-label">Confirmar Contraseña</label>
                        <div class="col-sm-5">
                            <input required type="password" onchange="validaContraseña()" class="form-control" name="Ccontraseña" id="Ccontraseña" title="contraseña" placeholder="Confirme contraseña" />
                        </div>
                    </div>
                    </br></br></br>
                    <div class="row justify-content-md-center">
                        <div class="col-3 align-self-start">
                            <button type="submit" class="btn boton btn-sm" name="enviar" value="enviar" onclick="return validateForm(this.form)">Enviar</button>
                        </div>
                        <div class="col-3 align-self-end">
                            <button type="reset" class="btn btn-sm boton" name="resetear" value="Resetear">Resetear</button>
                        </div>
                    </div>
                </form>
            </div>
        </section>
        <?php
        include '../componentes/footer.php';
        include '../funciones/modales.php';
        ?>
    </div>
    <script>
        $(document).on("ready", function() {
            enviarDatos();
            var pass = document.getElementById("contraseña").value;
            if (pass == "") {
                document.getElementById("Ccontraseña").disabled = true;
            }
        });

        function enviarDatos() {
            $("#usuario").on("change", function(e) {
                e.preventDefault();
                var usuario = document.getElementById('usuario').value;
                var parametros = {
                    "usuario": usuario
                };
                $.ajax({
                    "method": "POST",
                    "url": "../funciones/compruebaUsuario.php",
                    "data": parametros
                }).done(function(info) {
                    $("#usuario").val(info);
                    if (info == " ") {
                        alert("Usuario existente");
                    }
                });
            });
        }

        function enable() {
            var pass = document.getElementById("contraseña").value;
            if (pass == "") {
                document.getElementById("Ccontraseña").disabled = true;
            } else {
                document.getElementById("Ccontraseña").disabled = false;
            }
        }

        function validaContraseña() {
            var pass0 = document.getElementById("contraseña").value;
            var pass1 = document.getElementById("Ccontraseña").value;
            if (pass0 != pass1) {
                document.getElementById("Ccontraseña").value = "";
                alert("las contraseñas no coinciden");
            }
        }
    </script>
</body>

</html>