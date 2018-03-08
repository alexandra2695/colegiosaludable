<?php 

require 'funcs/conexion.php';
require 'funcs/funcs.php';

$sql = "SELECT * FROM distrito ";

$result= $mysqli->query($sql);
$row = $result->fetch_assoc();
$errors = array();

if(!empty($_POST))
{
  $nombre = $mysqli->real_escape_string($_POST['nombre']);
  $apellido = $mysqli->real_escape_string($_POST['apellido']);  
  $edad = $mysqli->real_escape_string($_POST['edad']);    
  $dni = $mysqli->real_escape_string($_POST['dni']);    
  $distri = $mysqli->real_escape_string($_POST['distri']);    
  $grado = $mysqli->real_escape_string($_POST['grado']);  
  $seccion = $mysqli->real_escape_string($_POST['seccion']);  
  $turno=$mysqli->real_escape_string($_POST['turno']); 

  $estado= 1; 
   /*
    
    $activo = 0;
   
    $secret = '6LerFD8UAAAAAPQ2oe3gAm404tnJdnXDsbli9e8i';
    
    if(!$captcha){
      $errors[] = "Por favor verifica el captcha";
    }*/
    
   /* if(isNull($nombre, $apellido, $edad, $dni, $grado))
    {
      $errors[] = "Debe llenar todos los campos";
    }*/
    
   /* if(!isEmail($email))
    {
      $errors[] = "Dirección de correo inválida";
    }
    
    if(!validaPassword($password, $con_password))
    {
      $errors[] = "Las contraseñas no coinciden";
    }
    
    if(usuarioExiste($usuario))
    {
      $errors[] = "El nombre de usuario $usuario ya existe";
    }
    
    if(emailExiste($email))
    {
      $errors[] = "El correo electronico $email ya existe";
    }*/
    
    if(count($errors) == 0)
    {


      //  $pass_hash = hashPassword($password);
       // $token = generateToken();

      $registro = registraAlumno($nombre,$apellido,$edad,$dni,$distri,$grado,$seccion,$turno, $estado);     
        /*if($registro > 0)
        {       
          $url = 'http://'.$_SERVER["SERVER_NAME"].'/confe/activar.php?id='.$registro.'&val='.$token;
          
          $asunto = 'Activar Cuenta - Sistema de Usuarios';
          $cuerpo = "Estimado $nombre: <br /><br />Para continuar con el proceso de registro, es indispensable de click en la siguiente liga <a href='$url'>Activar Cuenta</a>";
          
          if(enviarEmail($email, $nombre, $asunto, $cuerpo)){
            
            echo "Para terminar el proceso de registro siga las instrucciones que le hemos enviado la direccion de correo electronico: $email";
            echo "<br><a href='index.php' >Iniciar Sesion</a>";
            exit;
            } else {
            $erros[] = "Error al enviar Email";
          }
          
          } else {
          $errors[] = "Error al Registrar";
        }
        
        } else {
          $errors[] = 'Error al comprobar Captcha';*/


        }

      }
      ?>
      <form id="signupform" class="form-horizontal" role="form" action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" autocomplete="off" enctype="multipart/form-data">
        <div class="modal fade" id="dataRegister" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel">Agregar Alumno</h4>
              </div>
              <div class="modal-body">
                <div class="form-group">
                  <label for="nombre" class="col-sm-2 control-label">Nombre:</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="nombre" placeholder="Nombre" value="<?php if(isset($nombre)) echo $nombre; ?>" required >
                  </div>
                </div>

                <div class="form-group">
                  <label for="apellido" class="col-sm-2 control-label">Apellido</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="apellido" placeholder="Apellido" value="<?php if(isset($apellido)) echo $apellido; ?>" required>
                  </div>
                </div>

                <div class="form-group">
                  <label for="edad" class="col-sm-2 control-label">Edad</label>
                  <div class="col-sm-10">
                    <input type="num" class="form-control" id="edad" name="edad" placeholder="Edad">
                  </div>
                </div>
                <div class="form-group">
                  <label for="dni" class="col-sm-2 control-label">Dni</label>
                  <div class="col-sm-10">
                    <input type="dni" class="form-control" id="dni" name="dni" placeholder="Dni" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="distri" class="col-sm-2 control-label">Distrito</label>
                  <div class="col-sm-10">
                    <select class="form-control" id="distri" name="distri">
                      <option value="0" selected="selected"><?php echo $row['coddis'];?></option>

                      <?php
                      while ($valores =mysqli_fetch_array($result)) {
                        echo '<option value='.$valores['coddis'].'>'.$valores['distrito'].'</option>';
                      }
                      ?>

                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="grado" class="col-sm-2 control-label">Grado</label>
                  <div class="col-sm-10">
                    <input type="grado" class="form-control" id="grado" name="grado" placeholder="grado" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="seccion" class="col-sm-2 control-label">Seccion</label>
                  <div class="col-sm-2">
                    <select class="form-control" id="seccion" name="seccion">
                      <option value="A">A</option>
                      <option value="B">B</option>
                      <option value="C">C</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="turno" class="col-sm-2 control-label">Turno</label>
                  <div class="col-sm-2">
                    <select class="form-control" id="turno" name="turno">
                      <option value="M">M</option>
                      <option value="T">T</option>
                    </select>
                  </div>
                </div>
              <!--<div class="form-group">
                <label for="captcha" class="col-md-3 control-label"></label>
                <div class="g-recaptcha col-md-9" data-sitekey="6Ld9nBcUAAAAAHCWmXzWLIEznhvGu__mScjaoPbo"></div>
              </div>-->
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
              <button name= "registrar" id="btn-signup" type="submit" class="btn btn-info"><i class="icon-hand-right"></i>Registrar</button> 
            </div>
            
          </div>
        </div>
      </div>
    </form>
    <?php echo resultBlock($errors); ?>
