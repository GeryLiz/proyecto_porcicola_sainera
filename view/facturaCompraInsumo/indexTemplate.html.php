<?php use mvc\routing\routingClass as routing ?>

<div class="container container-fluid">
  <form id="frmDeleteAll" action="<?php echo routing::getInstance()->getUrlWeb('facturaCompraInsumo', 'deleteSelect') ?>" method="POST">
    <div style="margin-bottom: 10px; margin-top: 30px">
      <a href="<?php echo routing::getInstance()->getUrlWeb('facturaCompraInsumo', 'insert') ?>" class="btn btn-success btn-xs">Nuevo</a>
      <a href="#" class="btn btn-danger btn-xs" onclick="borrarSeleccion()">Borrar</a>
    </div>
      
    <table class="table table-bordered table-responsive">
      <thead>
        <tr>
          <th><input type="checkbox" id="chkAll"></th>
          <th>Id</th>
          <th>Fecha</th>
          <th>Iva</th>
          <th>SubTotal</th>
          <th>Total</th>
          <th>Usuario Id</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($objFacturaCompraInsumo as $key): ?>
          <tr>
            <td><input type="checkbox" name="chk[]" value="<?php echo $key->id ?>"></td>
            <td><?php echo $key->id?></td>
            <td><?php echo $key-> fecha ?></td>
          <td><?php echo $key->iva ?></td>
            <td><?php echo $key-> subtotal ?></td>
             <td><?php echo $key->total ?></td>
            <td><?php echo $key-> usuario_id ?></td>
            <td>
                <a href="<?php echo routing::getInstance()->getUrlWeb('facturaCompraInsumo', 'edit', array(facturaCompraInsumoTableClass::ID => $key->id)) ?>" class="btn btn-primary btn-xs">Editar</a>
              <a href="#" onclick="confirmarEliminar(<?php echo $key->id ?>)" class="btn btn-danger btn-xs">Eliminar</a>
            </td>
          </tr>
        <?php endforeach ?>
      </tbody>
    </table>
      
  </form>
    
  <form id="frmDelete" action="<?php echo routing::getInstance()->getUrlWeb('facturaCompraInsumo', 'delete') ?>" method="POST">
      <input type="hidden" id="idDelete" name="<?php echo facturaCompraInsumoTableClass::getNameField(facturaCompraInsumoTableClass::ID, true) ?>">
  </form>
</div>



