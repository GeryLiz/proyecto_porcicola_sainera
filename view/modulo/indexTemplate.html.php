<?php use mvc\routing\routingClass as routing ?>

<div class="container container-fluid">
  <form id="frmDeleteAll" action="<?php echo routing::getInstance()->getUrlWeb('modulo', 'deleteSelect') ?>" method="POST">
    <div style="margin-bottom: 10px; margin-top: 30px">
      <a href="<?php echo routing::getInstance()->getUrlWeb('modulo', 'insert') ?>" class="btn btn-success btn-xs">Nuevo</a>
      <a href="#" class="btn btn-danger btn-xs" onclick="borrarSeleccion()">Borrar</a>
    </div>
      
    <table class="table table-bordered table-responsive">
      <thead>
          <tr class="active">
          <th><input type="checkbox" id="chkAll"></th>
          <th>Id</th>
          <th>Descripción</th>
          <th>Ubicacion</th>
          <th>Tamaño</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($objModulo as $key): ?>
          <tr>
            <td><input type="checkbox" name="chk[]" value="<?php echo $key->id ?>"></td>
            <td><?php echo $key->id ?></td>
            <td><?php echo $key-> desc_modulo ?></td>
           <td><?php echo $key->ubic_modulo ?></td>
            <td><?php echo $key-> tamaño_modulo ?></td>
            <td>
                <a href="<?php echo routing::getInstance()->getUrlWeb('modulo', 'edit', array(moduloTableClass::ID => $key->id)) ?>" class="btn btn-primary btn-xs">Editar</a>
              <a href="#" onclick="confirmarEliminar(<?php echo $key->id ?>)" class="btn btn-danger btn-xs">Eliminar</a>
            </td>
          </tr>
        <?php endforeach ?>
      </tbody>
    </table>
      
  </form>
    
  <form id="frmDelete" action="<?php echo routing::getInstance()->getUrlWeb('modulo', 'delete') ?>" method="POST">
      <input type="hidden" id="idDelete" name="<?php echo moduloTableClass::getNameField(moduloTableClass::ID, true) ?>">
  </form>
</div>


