<?php use mvc\routing\routingClass as routing ?>
<?php use mvc\i18n\i18nClass as i18n ?>

<form method="post" action="<?php echo routing::getInstance()->getUrlWeb('gestacion', ((isset($objGestacion)) ? 'update' : 'create' )) ?>">
  <?php if(isset($objGestacion) == true): ?>
    <input name="<?php echo gestacionTableClass::getNameField(gestacionTableClass::ID, true) ?>" value="<?php echo $objGestacion[0]->id ?>" type="hidden">
  <?php endif ?>
  <?php echo i18n::__('date', null, 'montar') ?>: <input placeholder="<?php echo ((isset($objGestacion) == true) ? $objGestacion[0]-> fecha : '') ?>" type="date" name="<?php echo gestacionTableClass::getNameField(gestacionTableClass::FECHA, true) ?>">
  <br>
      <?php echo i18n::__('fertilization', null, 'montar') ?>: <input placeholder="<?php echo ((isset($objGestacion) == true) ? $objGestacion[0]->fecha_fecundacion : '') ?>" type="date" name="<?php echo gestacionTableClass::getNameField(gestacionTableClass::FECUNDACION, true) ?>">
  <br>
  <?php echo i18n::__('porcine', null, 'montar') ?>: <input placeholder="<?php echo ((isset($objGestacion) == true) ? $objGestacion[0]-> id_porcino : '') ?>" type="text" name="<?php echo gestacionTableClass::getNameField(gestacionTableClass::ID_PORCINO, true) ?>">
  <br>
      <?php echo i18n::__('number_males', null, 'gestacion') ?>: <input placeholder="<?php echo ((isset($objGestacion) == true) ? $objGestacion[0]->num_machos : '') ?>" type="text" name="<?php echo gestacionTableClass::getNameField(gestacionTableClass::NUM_MACHOS, true) ?>">
  <br>
  <?php echo i18n::__('number_females', null, 'gestacion') ?>: <input placeholder="<?php echo ((isset($objGestacion) == true) ? $objGestacion[0]-> num_hembras : '') ?>" type="text" name="<?php echo gestacionTableClass::getNameField(gestacionTableClass::NUM_HEMBRAS, true) ?>">
  <br>
      <?php echo i18n::__('number_living', null, 'gestacion') ?>: <input placeholder="<?php echo ((isset($objGestacion) == true) ? $objGestacion[0]->num_vivos : '') ?>" type="text" name="<?php echo gestacionTableClass::getNameField(gestacionTableClass::NUM_VIVOS, true) ?>">
  <br>
  <?php echo i18n::__('number_dead', null, 'gestacion') ?>: <input placeholder="<?php echo ((isset($objGestacion) == true) ? $objGestacion[0]-> num_muertos : '') ?>" type="text" name="<?php echo gestacionTableClass::getNameField(gestacionTableClass::NUM_MUERTOS, true) ?>">
  <br>
      <?php echo i18n::__('responsible', null, 'gestacion') ?>: <input placeholder="<?php echo ((isset($objGestacion) == true) ? $objGestacion[0]->desc_responsable : '') ?>" type="text" name="<?php echo gestacionTableClass::getNameField(gestacionTableClass::RESPONSABLE, true) ?>">
  <br>
  <?php echo i18n::__('date_delivery', null, 'gestacion') ?>: <input placeholder="<?php echo ((isset($objGestacion) == true) ? $objGestacion[0]-> fecha_parto : '') ?>" type="date" name="<?php echo gestacionTableClass::getNameField(gestacionTableClass::FECHA_PARTO, true) ?>">
  <br>
      <?php echo i18n::__('user_id', null, 'hojaDeVida') ?>: <input placeholder="<?php echo ((isset($objGestacion) == true) ? $objGestacion[0]->usuario_id : '') ?>" type="text" name="<?php echo gestacionTableClass::getNameField(gestacionTableClass::USUARIO_ID, true) ?>">
  <br>
  <input type="submit" value="<?php echo i18n::__(((isset($objGestacion)) ? 'update' : 'register')) ?>">
</form>

