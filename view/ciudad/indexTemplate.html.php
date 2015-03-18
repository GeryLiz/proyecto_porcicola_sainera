<?php use mvc\routing\routingClass as routing ?>
<?php use mvc\view\viewClass as view ?>

<div class="container container-fluid">
  <form id="frmDeleteAll" action="<?php echo routing::getInstance()->getUrlWeb('ciudad', 'deleteSelect') ?>" method="POST">
    <div style="margin-bottom: 10px; margin-top: 30px">
      <a href="<?php echo routing::getInstance()->getUrlWeb('ciudad', 'insert') ?>" class="btn btn-success btn-xs">Nuevo</a>
      <a href="#" class="btn btn-danger btn-xs" onclick="borrarSeleccion()">Borrar</a>
    </div>
      <?php view::includeHandlerMessage() ?>
    <table class="table table-bordered table-responsive">
      <thead>
          <tr class="active">
          <th><input type="checkbox" id="chkAll"></th>
          <th>Id</th>
          <th>Descripción</th>
          
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($objCiudad as $key): ?>
          <tr>
            <td><input type="checkbox" name="chk[]" value="<?php echo $key->id ?>"></td>
            <td><?php echo $key->id ?></td>
            <td><?php echo $key-> desc_ciudad ?></td>
          
            <td>
                <a href="<?php echo routing::getInstance()->getUrlWeb('ciudad', 'edit', array(ciudadTableClass::ID => $key->id)) ?>" class="btn btn-primary btn-xs">Editar</a>
              <a href="#" onclick="confirmarEliminar(<?php echo $key->id ?>)" class="btn btn-danger btn-xs">Eliminar</a>
            </td>
          </tr>
        <?php endforeach ?>
      </tbody>
    </table>
      
  </form>
    
  <form id="frmDelete" action="<?php echo routing::getInstance()->getUrlWeb('ciudad', 'delete') ?>" method="POST">
      <input type="hidden" id="idDelete" name="<?php echo ciudadTableClass::getNameField(ciudadTableClass::ID, true) ?>">
  </form>
</div>

