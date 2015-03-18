<?php use mvc\routing\routingClass as routing ?>
<?php use mvc\i18n\i18nClass as i18n ?>

<form method="post" action="<?php echo routing::getInstance()->getUrlWeb('detalleVacunacion', ((isset($objDetalleVacunacion)) ? 'update' : 'create' )) ?>">
  <?php if(isset($objDetalleVacunacion) == true): ?>
    <input name="<?php echo detalleVacunacionTableClass::getNameField(detalleVacunacionTableClass::ID, true) ?>" value="<?php echo $objDetalleVacunacion[0]->id ?>" type="hidden">
  <?php endif ?>
  <?php echo i18n::__('id_document', null, 'detalleVacunacion') ?>: <input placeholder="<?php echo ((isset($objDetalleVacunacion) == true) ? $objDetalleVacunacion[0]-> id_doc : '') ?>" type="text" name="<?php echo detalleVacunacionTableClass::getNameField(detalleVacunacionTableClass::ID_DOC, true) ?>">
  <br>
      <?php echo i18n::__('porcine', null, 'montar') ?>: <input placeholder="<?php echo ((isset($objDetalleVacunacion) == true) ? $objDetalleVacunacion[0]->id_porcino : '') ?>" type="text" name="<?php echo detalleVacunacionTableClass::getNameField(detalleVacunacionTableClass::ID_PORCINO, true) ?>">
  <br>
   <?php echo i18n::__('insumo', null, 'detalleVacunacion') ?>: <input placeholder="<?php echo ((isset($objDetalleVacunacion) == true) ? $objDetalleVacunacion[0]-> id_insumo : '') ?>" type="text" name="<?php echo detalleVacunacionTableClass::getNameField(detalleVacunacionTableClass::ID_INSUMO, true) ?>">
  <br>
      <?php echo i18n::__('quantity', null, 'detalleFacturaCompraInsumo') ?>: <input placeholder="<?php echo ((isset($objDetalleVacunacion) == true) ? $objDetalleVacunacion[0]->cantidad : '') ?>" type="text" name="<?php echo detalleVacunacionTableClass::getNameField(detalleVacunacionTableClass::CANTIDAD, true) ?>">
  <br>
  <input type="submit" value="<?php echo i18n::__(((isset($objDetalleVacunacion)) ? 'update' : 'register')) ?>">
</form>
