<?php use mvc\routing\routingClass as routing ?>
<?php use mvc\i18n\i18nClass as i18n ?>

<form method="post" action="<?php echo routing::getInstance()->getUrlWeb('montar', ((isset($objMontar)) ? 'update' : 'create' )) ?>">
  <?php if(isset($objMontar) == true): ?>
    <input name="<?php echo montarTableClass::getNameField(montarTableClass::ID, true) ?>" value="<?php echo $objMontar[0]->id ?>" type="hidden">
  <?php endif ?>
  <?php echo i18n::__('date', null, 'montar') ?>: <input placeholder="<?php echo ((isset($objMontar) == true) ? $objMontar[0]-> fecha : '') ?>" type="date" name="<?php echo montarTableClass::getNameField(montarTableClass::FECHA, true) ?>">
  <br>
      <?php echo i18n::__('fecundador', null, 'montar') ?>: <input placeholder="<?php echo ((isset($objMontar) == true) ? $objMontar[0]->id_fecundador : '') ?>" type="text" name="<?php echo montarTableClass::getNameField(montarTableClass::ID_FECUNDADOR, true) ?>">
  <br>
  <?php echo i18n::__('state', null, 'montar') ?>: <input placeholder="<?php echo ((isset($objMontar) == true) ? $objMontar[0]-> estado : '') ?>" type="text" name="<?php echo montarTableClass::getNameField(montarTableClass::ESTADO, true) ?>">
  <br>
      <?php echo i18n::__('fertilization', null, 'montar') ?>: <input placeholder="<?php echo ((isset($objMontar) == true) ? $objMontar[0]->fecha_fertilizacion : '') ?>" type="date" name="<?php echo montarTableClass::getNameField(montarTableClass::FERTILIZACION, true) ?>">
  <br>
  <?php echo i18n::__('porcine', null, 'montar') ?>: <input placeholder="<?php echo ((isset($objMontar) == true) ? $objMontar[0]-> id_porcino : '') ?>" type="text" name="<?php echo montarTableClass::getNameField(montarTableClass::PORCINO, true) ?>">
  <br>
      <?php echo i18n::__('race', null, 'montar') ?>: <input placeholder="<?php echo ((isset($objMontar) == true) ? $objMontar[0]->id_raza : '') ?>" type="text" name="<?php echo montarTableClass::getNameField(montarTableClass::RAZA, true) ?>">
  <br>
  <input type="submit" value="<?php echo i18n::__(((isset($objMontar)) ? 'update' : 'register')) ?>">
</form>

