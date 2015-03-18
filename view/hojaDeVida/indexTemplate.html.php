<?php use mvc\routing\routingClass as routing ?>
<?php use mvc\view\viewClass as view ?>

<div class="container container-fluid">
  <form id="frmDeleteAll" action="<?php echo routing::getInstance()->getUrlWeb('hojaDeVida', 'deleteSelect') ?>" method="POST">
    <div style="margin-bottom: 10px; margin-top: 30px">
      <a href="<?php echo routing::getInstance()->getUrlWeb('hojaDeVida', 'insert') ?>" class="btn btn-success btn-xs">Nuevo</a>
      <a href="#" class="btn btn-danger btn-xs" onclick="borrarSeleccion()">Borrar</a>
    </div>
      <?php echo view:: includeHandlerMessage() ?>
    <table class="table table-bordered table-responsive">
      <thead>
          <tr class="active">
          <th><input type="checkbox" id="chkAll"></th>
          <th>Id</th>
          <th>Edad</th>
          <th>Peso</th>
          <th>Genero</th>
          <th>Cantidad de Partos</th>
          <th>Fecha Ingreso</th>
          <th>Estado</th>
          <th>Raza</th>
          <th>Modulo</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($objHojaDeVida as $key): ?>
          <tr>
            <td><input type="checkbox" name="chk[]" value="<?php echo $key->id ?>"></td>
            <td><?php echo $key->id ?></td>
            <td><?php echo $key-> edad_porcino ?></td>
          <td><?php echo $key->peso_porcino ?></td>
            <td><?php echo $key-> genero_porcino ?></td>
            <td><?php echo $key->cant_partos ?></td>
            <td><?php echo $key-> fecha_ingreso ?></td>
               <td><?php echo $key-> id_estado ?></td>
             <td><?php echo $key->id_raza ?></td>
            <td><?php echo $key-> id_modulo ?></td>
            <td>
                <a href="<?php echo routing::getInstance()->getUrlWeb('hojaDeVida', 'edit', array(hojaDeVidaTableClass::ID => $key->id)) ?>" class="btn btn-primary btn-xs">Editar</a>
              <a href="#" onclick="confirmarEliminar(<?php echo $key->id ?>)" class="btn btn-danger btn-xs">Eliminar</a>
            </td>
          </tr>
        <?php endforeach ?>
      </tbody>
    </table>
      
  </form>
    
  <form id="frmDelete" action="<?php echo routing::getInstance()->getUrlWeb('hojaDeVida', 'delete') ?>" method="POST">
      <input type="hidden" id="idDelete" name="<?php echo hojaDeVidaTableClass::getNameField(hojaDeVidaTableClass::ID, true) ?>">
  </form>
</div>




