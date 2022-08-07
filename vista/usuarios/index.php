
<?php
require_once('vista/includes/head.php');
require_once('vista/includes/header.php');


?>
<Script>

  function exportarPDF(){

    window.location.href = "usuario/exportar"     

  }
</Script>

<body>
  <div class="container">
        <div class="row m-2">
                <div class="col">  
                        <button type="button" class="btn btn-light m-2" onclick="registrarNuevaCuenta()">Agregar Nuevo Usuario</button>   
                        <button type="button" class="btn btn-light m-2" onclick="exportarPDF()">Exportar a PDF</button>         
                </div>
                <div class="col">
                </div>
              
                <div class="col m-2">
                
                        <form action="usuario/index" method="post">
                            
                          <input type="hidden" name="filtros" value="si">
                            <div class="row">
                              <div   class="col">
                                  <select name="datoPerfil" id="datoPerfil" class="form-select">
                                      <option value="0">Todos</option>
                                      <option value="1">Administrador</option>
                                      <option value="2">Operador</option>
                                  </select>
                              </div>
                              <div class="col">
                              <button type="submit" class="btn btn-light">Aplicar filtros</button>
                              </div>
                            </div>
                          
                        </form>
               </div>
          
        </div>
        <div class="col-md-10">

                  </div>
                      <table class="table">
                        <thead>
                          <tr>
                            <th>cuenta</th>
                            <th>Apellido</th>
                            <th>Nombre</th>
                            <th>Correo</th>
                            <th>Fecha de Alta</th>
                            <th>Estado</th>
                            <th>Perfil</th>
                            <th></th>


                          </tr>
                        </thead>
                        <tbody>
                        <?php
                        $estado="";
                        $perfil="";
                        foreach ($listado as $id){

                            if ( $id['estado']==1) {
                              $estado= "ACTIVO";
                            }
                            else {$estado="INACTIVO";}

                          

                            echo '<tr>';
                            echo '<td>' . $id['cuenta'] . '</td>';
                            echo '<td>' . $id['apellido'] . '</td>';
                            echo '<td>' . $id['nombres'] . '</td>';
                            echo '<td>' . $id['correo'] . '</td>';
                            echo '<td>' . $id['fechaAlta'] . '</td>';
                            echo '<td>' . $estado . '</td>';
                            echo '<td>' .$id['perfil'] . '</td>';
                            echo '<td><a href="usuario/cargar/'.$id["id"].'">Consultar</a></td>';
                            echo '</tr>' ;
                                

                        }
                        
                        ?>
                        
                        </tbody>
                      </table>
                      
                  </div>  
            
              </div>
      
      </div>
</body>
<?php

require_once 'vista/includes/footer.php';


?>
</html>