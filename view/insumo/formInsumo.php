<?php use mvc\routing\routingClass as routing ?>
<?php use mvc\i18n\i18nClass as i18n ?>

<form method="post" action="<?php echo routing::getInstance()->getUrlWeb('insumo', ((isset($objInsumo)) ? 'update' : 'create' )) ?>">
  <?php if(isset($objInsumo) == true): ?>
    <input name="<?php echo insumoTableClass::getNameField(insumoTableClass::ID, true) ?>" value="<?php echo $objInsumo[0]->id ?>" type="hidden">
  <?php endif ?>
  <?php echo i18n::__('name', null, 'credencial') ?>: <input placeholder="<?php echo ((isset($objInsumo) == true) ? $objInsumo[0]-> desc_insumo : '') ?>" type="text" name="<?php echo insumoTableClass::getNameField(insumoTableClass::DESCRIPCION, true) ?>">
  <br>
      <?php echo i18n::__('value', null, 'insumo') ?>: <input placeholder="<?php echo ((isset($objInsumo) == true) ? $objInsumo[0]->valor_insumo : '') ?>" type="text" name="<?php echo insumoTableClass::getNameField(insumoTableClass::VALOR, true) ?>">
  <br>
  
  
  <?php echo i18n::__('line', null, 'insumo') ?>: <input placeholder="<?php echo ((isset($objInsumo) == true) ? $objInsumo[0]->id_linea : '') ?>" type="text" name="<?php echo insumoTableClass::getNameField(insumoTableClass::LINEA, true) ?>">
  <br>
  <?php echo i18n::__('presentation', null, 'insumo') ?>: <input placeholder="<?php echo ((isset($objInsumo) == true) ? $objInsumo[0]->id_presentacion : '') ?>" type="text" name="<?php echo insumoTableClass::getNameField(insumoTableClass::PRESENTACION, true) ?>">
  <br>
  <input type="submit" value="<?php echo i18n::__(((isset($objInsumo)) ? 'update' : 'register')) ?>">
</form>
