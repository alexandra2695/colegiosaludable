<?php 

require 'funcs/conexion.php';
require 'funcs/funcs.php';
$errors = array();
  
  if(!empty($_POST))
  {
  $usuario = $mysqli->real_escape_string($_POST['usuario']);  
  $password = $mysqli->real_escape_string($_POST['password']);  
  $con_password = $mysqli->real_escape_string($_POST['con_password']);
  $nombre = $mysqli->real_escape_string($_POST['nombre']);
  $apellido = $mysqli->real_escape_string($_POST['apellido']);      
  $edad = $mysqli->real_escape_string($_POST['edad']);    
  $dni = $mysqli->real_escape_string($_POST['dni']);   
  $distrito = $mysqli->real_escape_string($_POST['distrito']); 
  $email = $mysqli->real_escape_string($_POST['email']);
  $telefono=$mysqli->real_escape_string($_POST['telefono']);  
  $seccion=$mysqli->real_escape_string($_POST['seccion']);
  $turno=$mysqli->real_escape_string($_POST['turno']);
  $estado_civil=$mysqli->real_escape_string($_POST['estado_civil']);  
  
  $estado= 1;
  $tipo_usuario = 2;
    if(isNull($nombre, $usuario, $password, $con_password, $email))
    {
      $errors[] = "Debe llenar todos los campos";
    }
    
    if(!isEmail($email))
    {
      $errors[] = "Dirección de correo inválida";
    }
    
    if(!validaPassword($password, $con_password))
    {
      $errors[] = "Las contraseñas no coinciden";
    }
    
    if(docenteExiste($usuario))
    {
      $errors[] = "El nombre de usuario $usuario ya existe";
    }
    
    if(emailDocExiste($email))
    {
      $errors[] = "El correo electronico $email ya existe";
    }
    if(count($errors) == 0)
    {
      
        $pass_hash = hashPassword($password);              
        $registro = registraDocente($usuario, $pass_hash,$nombre,$apellido,$edad,$dni,$distrito,$email,$telefono,$seccion,$turno,$estado_civil,$estado,$tipo_usuario);     
              
    }
    
  }
?>
<form id="signupform" class="form-horizontal" role="form" action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" autocomplete="off" enctype="multipart/form-data">
  <div class="modal fade" id="dataRegister" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="exampleModalLabel">Agregar Docente</h4>
        </div>
        <div class="modal-body">
          <div class="form-group">
                <label for="usuario" class="col-md-3 control-label">Usuario</label>
                <div class="col-md-9">
                  <input type="text" class="form-control" name="usuario" placeholder="Usuario" value="<?php if(isset($usuario)) echo $usuario; ?>" required>
                </div>
              </div>
              
              <div class="form-group">
                <label for="password" class="col-md-3 control-label">Password</label>
                <div class="col-md-9">
                  <input type="password" class="form-control" name="password" placeholder="Password" required>
                </div>
              </div>
              
              <div class="form-group">
                <label for="con_password" class="col-md-3 control-label">Confirmar Password</label>
                <div class="col-md-9">
                  <input type="password" class="form-control" name="con_password" placeholder="Confirmar Password" required>
                </div>
              </div>
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
            <label for="distrito" class="col-sm-2 control-label">Distrito</label>
            <div class="col-sm-10">
              <input type="distrito" class="form-control" id="distrito" name="distrito" placeholder="Distrito" required>
            </div>
          </div>
          <div class="form-group">
                <label for="email" class="col-md-3 control-label">Email</label>
                <div class="col-md-9">
                  <input type="email" class="form-control" name="email" placeholder="Email" value="<?php if(isset($email)) echo $email; ?>" required>
                </div>
          </div>
          <div class="form-group">
            <label for="telefono" class="col-sm-3 control-label">Telefono</label>
            <div class="col-sm-9">
              <input type="tel" class="form-control" id="telefono" name="telefono" placeholder="Telefono">
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
                <option value="Mañana">M</option>
                <option value="Tarde">T</option>
              </select>
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
          