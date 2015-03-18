<?php use mvc\routing\routingClass as routing ?>

<div class="container container-fluid">
  <form id="frmDeleteAll" action="<?php echo routing::getInstance()->getUrlWeb('gestacion', 'deleteSelect') ?>" method="POST">
    <div style="margin-bottom: 10px; margin-top: 30px">
      <a href="<?php echo routing::getInstance()->getUrlWeb('gestacion', 'insert') ?>" class="btn btn-success btn-xs">Nuevo</a>
      <a href="#" class="btn btn-danger btn-xs" onclick="borrarSeleccion()">Borrar</a>
    </div>
      
    <table class="table table-bordered table-responsive">
      <thead>
        <tr>
          <th><input type="checkbox" id="chkAll"></th>
          <th>Id</th>
          <th>Fecha</th>
           <th>Fecha Fecundacion</th>
          <th>Id Porcino</th>
          <th>N° Machos</th>
          <th>N° Hembras</th>
           <th>N° Vivos</th>
          <th>N° Muertos</th>
          <th>Responsable</th>
           <th>Fecha Parto</th>
          <th>Usuario Id</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($objGestacion as $key): ?>
          <tr>
            <td><input type="checkbox" name="chk[]" value="<?php echo $key->id ?>"></td>
            <td><?php echo $key->id ?></td>
            <td><?php echo $key-> fecha ?></td>
          <td><?php echo $key->fecha_fecundacion ?></td>
            <td><?php echo $key-> id_porcino?></td>
                <td><?php echo $key->num_machos ?></td>
                 <td><?php echo $key->num_hembras ?></td>
            <td><?php echo $key-> num_vivos ?></td>
          <td><?php echo $key->num_muertos ?></td>
            <td><?php echo $key-> desc_responsable ?></td>
            <td><?php echo $key-> fecha_parto ?></td>
          <td><?php echo $key->usuario_id ?></td>
            
            <td>
                <a href="<?php echo routing::getInstance()->getUrlWeb('gestacion', 'edit', array(gestacionTableClass::ID => $key->id)) ?>" class="btn btn-primary btn-xs">Editar</a>
              <a href="#" onclick="confirmarEliminar(<?php echo $key->id ?>)" class="btn btn-danger btn-xs">Eliminar</a>
            </td>
          </tr>
        <?php endforeach ?>
      </tbody>
    </table>
      
  </form>
    
  <form id="frmDelete" action="<?php echo routing::getInstance()->getUrlWeb('gestacion', 'delete') ?>" method="POST">
      <input type="hidden" id="idDelete" name="<?php echo gestacionTableClass::getNameField(gestacionTableClass::ID, true) ?>">
  </form>
</div>

