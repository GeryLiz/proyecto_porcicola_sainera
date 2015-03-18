<?php use mvc\routing\routingClass as routing ?>
<?php use mvc\i18n\i18nClass as i18n ?>

<form method="post" action="<?php echo routing::getInstance()->getUrlWeb('detalleFacturaCompraInsumo', ((isset($objCiudad)) ? 'update' : 'create' )) ?>">
  <?php if(isset($objDetalle) == true): ?>
    <input name="<?php echo detalleFacturaCompraInsumoTableClass::getNameField(detalleFacturaCompraInsumoTableClass::ITEM, true) ?>" value="<?php echo $objDetalle[0]->item ?>" type="hidden">
  <?php endif ?>
  <?php echo i18n::__('id_bill', null, 'detalleFacturaCompraInsumo') ?>: <input placeholder="<?php echo ((isset($objDetalle) == true) ? $objDetalle[0]-> id_fact : '') ?>" type="text" name="<?php echo detalleFacturaCompraInsumoTableClass::getNameField(detalleFacturaCompraInsumoBaseTableClass::ID_FACT, true) ?>">
  <br>
      <?php echo i18n::__('id', null, 'detalleFacturaCompraInsumo') ?>: <input placeholder="<?php echo ((isset($objDetalle) == true) ? $objDetalle[0]->id : '') ?>" type="text" name="<?php echo detalleFacturaCompraInsumoBaseTableClass::getNameField(detalleFacturaCompraInsumoBaseTableClass::ID, true) ?>">
  <br>
  <?php echo i18n::__('quantity', null, 'detalleFacturaCompraInsumo') ?>: <input placeholder="<?php echo ((isset($objDetalle) == true) ? $objDetalle[0]-> cantidad : '') ?>" type="text" name="<?php echo detalleFacturaCompraInsumoTableClass::getNameField(detalleFacturaCompraInsumoBaseTableClass::CANTIDAD, true) ?>">
  <br>
      <?php echo i18n::__('price', null, 'detalleFacturaCompraInsumo') ?>: <input placeholder="<?php echo ((isset($objDetalle) == true) ? $objDetalle[0]->precio : '') ?>" type="text" name="<?php echo detalleFacturaCompraInsumoBaseTableClass::getNameField(detalleFacturaCompraInsumoBaseTableClass::PRECIO, true) ?>">
  <br>
  <?php echo i18n::__('subtotal', null, 'facturaCompraInsumo') ?>: <input placeholder="<?php echo ((isset($objDetalle) == true) ? $objDetalle[0]->subtotal : '') ?>" type="text" name="<?php echo detalleFacturaCompraInsumoBaseTableClass::getNameField(detalleFacturaCompraInsumoBaseTableClass::SUBTOTAL, true) ?>">
  <br>
  <?php echo i18n::__('manufacturing', null, 'insumo') ?>: <input placeholder="<?php echo ((isset($objDetalle) == true) ? $objDetalle[0]-> fecha_fabricacion : '') ?>" type="date" name="<?php echo detalleFacturaCompraInsumoTableClass::getNameField(detalleFacturaCompraInsumoBaseTableClass::FABRICACION, true) ?>">
  <br>
      <?php echo i18n::__('expiration', null, 'insumo') ?>: <input placeholder="<?php echo ((isset($objDetalle) == true) ? $objDetalle[0]->fecha_vencimiento : '') ?>" type="date" name="<?php echo detalleFacturaCompraInsumoBaseTableClass::getNameField(detalleFacturaCompraInsumoBaseTableClass::VENCIMIENTO, true) ?>">
  <br>
  <input type="submit" value="<?php echo i18n::__(((isset($objDetalle)) ? 'update' : 'register')) ?>">
</form>
