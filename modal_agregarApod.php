<?php 

require 'funcs/conexion.php';
require 'funcs/funcs.php';
$errors = array();
  
  if(!empty($_POST))
  {
    $apellido = $mysqli->real_escape_string($_POST['apellido']);      
  $usuario = $mysqli->real_escape_string($_POST['usuario']);  
  $password = $mysqli->real_escape_string($_POST['password']);  
  $con_password = $mysqli->real_escape_string($_POST['con_password']);
  $edad = $mysqli->real_escape_string($_POST['edad']);    
  $dni = $mysqli->real_escape_string($_POST['dni']);   
  $distrito = $mysqli->real_escape_string($_POST['distrito']); 
  $telefono=$mysqli->real_escape_string($_POST['telefono']);  
  $estado_civil=$mysqli->real_escape_string($_POST['estado_civil']);  
  $email = $mysqli->real_escape_string($_POST['email']);
  $nomhijo = $mysqli->real_escape_string($_POST['nomhijo']);
   
    if(count($errors) == 0)
    {
      
                      
        $registro = registraApoderado($nombre,$apellido,$edad,$dni,$distrito,$grado,$seccion,$turno);     
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
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="exampleModalLabel">Agregar Padre de familia</h4>
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
            <label for="usuario" class="col-md-3 control-label">Usuario</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="usuario" placeholder="Usuario" value="<?php if(isset($usuario)) echo $usuario; ?>" required>
            </div>
          </div>

          <div class="form-group">
            <label for="password" class="col-md-3 control-label">Password</label>
            <div class="col-sm-10">
              <input type="password" class="form-control" name="password" placeholder="Password" required>
            </div>
          </div>

          <div class="form-group">
            <label for="con_password" class="col-md-3 control-label">Confirmar</label>
            <div class="col-sm-10">
              <input type="password" class="form-control" name="con_password" placeholder="Confirmar Password" required>
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
            <label for="distrito" class="col-sm-2 control-label">Distrito</label>
            <div class="col-sm-10">
              <input type="distrito" class="form-control" id="distrito" name="distrito" placeholder="Distrito" required>
            </div>
          </div>
          <div class="form-group">
            <label for="telefono" class="col-sm-3 control-label">Telefono</label>
            <div class="col-sm-9">
              <input type="tel" class="form-control" id="telefono" name="telefono" placeholder="Telefono">
            </div>
          </div>
          <div class="form-group">
            <label for="estado_civil" class="col-sm-3 control-label">Estado Civil</label>
            <div class="col-sm-9">
              <select class="form-control" id="estado_civil" name="estado_civil">
                <option value="SOLTERO">SOLTERO</option>
                <option value="CASADO">CASADO</option>
                <option value="OTRO">OTRO</option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label for="email" class="col-md-3 control-label">Email</label>
            <div class="col-md-9">
              <input type="email" class="form-control" name="email" placeholder="Email" value="<?php if(isset($email)) echo $email; ?>" required>
            </div>
          </div> 
              
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
          