<?php use mvc\routing\routingClass as routing ?>

<div class="container container-fluid">
  <form id="frmDeleteAll" action="<?php echo routing::getInstance()->getUrlWeb('datoUsuario', 'deleteSelect') ?>" method="POST">
    <div style="margin-bottom: 10px; margin-top: 30px">
      <a href="<?php echo routing::getInstance()->getUrlWeb('datoUsuario', 'insert') ?>" class="btn btn-success btn-xs">Nuevo</a>
      <a href="#" class="btn btn-danger btn-xs" onclick="borrarSeleccion()">Borrar</a>
    </div>
      
    <table class="table table-bordered table-responsive">
      <thead>
        <tr>
          <th><input type="checkbox" id="chkAll"></th>
          <th>Id</th>
          <th>Nombres</th>
          <th>Apellidos</th>
          <th>Telefono</th>
          <th>Direccion</th>
          <th>Cedula</th>
          
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($objDatoUsuario as $key): ?>
          <tr>
            <td><input type="checkbox" name="chk[]" value="<?php echo $key->id ?>"></td>
            <td><?php echo $key->id ?></td>
            <td>
                <?php echo $key->nombre ?>
            </td>
            <td><?php echo $key->apellidos ?></td>
            <td>
                <?php echo $key->telefono ?>
            </td>
            <td><?php echo $key->direccion ?></td>
            <td>
                <?php echo $key->cedula ?>
            </td>
           
            <td>
                <a href="<?php echo routing::getInstance()->getUrlWeb('datoUsuario', 'edit', array(datoUsuarioTableClass::ID => $key->id)) ?>" class="btn btn-primary btn-xs">Editar</a>
              <a href="#" onclick="confirmarEliminar(<?php echo $key->id ?>)" class="btn btn-danger btn-xs">Eliminar</a>
            </td>
          </tr>
        <?php endforeach ?>
      </tbody>
    </table>
      
  </form>
    
  <form id="frmDelete" action="<?php echo routing::getInstance()->getUrlWeb('datoUsuario', 'delete') ?>" method="POST">
      <input type="hidden" id="idDelete" name="<?php echo datoUsuarioTableClass::getNameField(datoUsuarioTableClass::ID, true) ?>">
  </form>
</div>

