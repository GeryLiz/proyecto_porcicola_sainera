<?php use mvc\routing\routingClass as routing ?>

<div class="container container-fluid">
  <form id="frmDeleteAll" action="<?php echo routing::getInstance()->getUrlWeb('detalleFacturaCompraInsumo', 'deleteSelect') ?>" method="POST">
    <div style="margin-bottom: 10px; margin-top: 30px">
      <a href="<?php echo routing::getInstance()->getUrlWeb('detalleFacturaCompraInsumo', 'insert') ?>" class="btn btn-success btn-xs">Nuevo</a>
      <a href="#" class="btn btn-danger btn-xs" onclick="borrarSeleccion()">Borrar</a>
    </div>
      
    <table class="table table-bordered table-responsive">
      <thead>
        <tr>
          <th><input type="checkbox" id="chkAll"></th>
          <th>Item</th>
          <th>Id Factura</th>
           <th>Id Insumo</th>
          <th>Cantidad</th>
          <th>Precio</th>
           <th>Subtotal</th>
          <th>Fecha Fabricación</th>
          <th>Fecha Vencimiento</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($objDetalle as $key): ?>
          <tr>
            <td><input type="checkbox" name="chk[]" value="<?php echo $key->item ?>"></td>
             <td><?php echo $key->item ?></td>
              <td><?php echo $key->id_fact ?></td>
            <td><?php echo $key->id ?></td>
            <td><?php echo $key-> cantidad ?></td>
            <td><?php echo $key->precio?></td>
              <td><?php echo $key->subtotal ?></td>
            <td><?php echo $key->fecha_fabricacion ?></td>
            <td><?php echo $key-> fecha_vencimiento ?></td>
            <td>
                <a href="<?php echo routing::getInstance()->getUrlWeb('detalleFacturaCompraInsumo', 'edit', array(detalleFacturaCompraInsumoTableClass::ITEM => $key->item)) ?>" class="btn btn-primary btn-xs">Editar</a>
              <a href="#" onclick="confirmarEliminar(<?php echo $key->item ?>)" class="btn btn-danger btn-xs">Eliminar</a>
            </td>
          </tr>
        <?php endforeach ?>
      </tbody>
    </table>
      
  </form>
    
  <form id="frmDelete" action="<?php echo routing::getInstance()->getUrlWeb('detalleFacturaCompraInsumo', 'delete') ?>" method="POST">
      <input type="hidden" id="idDelete" name="<?php echo detalleFacturaCompraInsumoTableClass::getNameField(detalleFacturaCompraInsumoTableClass::ITEM, true) ?>">
  </form>
</div>

