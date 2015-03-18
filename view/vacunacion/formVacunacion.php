<?php use mvc\routing\routingClass as routing ?>
<?php use mvc\i18n\i18nClass as i18n ?>

<form method="post" action="<?php echo routing::getInstance()->getUrlWeb('vacunacion', ((isset($objVacunacion)) ? 'update' : 'create' )) ?>">
  <?php if(isset($objVacunacion) == true): ?>
    <input name="<?php echo vacunacionTableClass::getNameField(vacunacionTableClass::ID, true) ?>" value="<?php echo $objVacunacion[0]->id?>" type="hidden">
  <?php endif ?>
  <?php echo i18n::__('date', null, 'montar') ?>: <input placeholder="<?php echo ((isset($objVacunacion) == true) ? $objVacunacion[0]-> fecha : '') ?>" type="date" name="<?php echo vacunacionTableClass::getNameField(vacunacionTableClass::FECHA, true) ?>">
  <br>
      <?php echo i18n::__('user_id', null, 'hojaDeVida') ?>: <input placeholder="<?php echo ((isset($objVacunacion) == true) ? $objVacunacion[0]->usuario_id : '') ?>" type="text" name="<?php echo vacunacionTableClass::getNameField(vacunacionTableClass::USUARIO_ID, true) ?>">
  <br>
 
  <input type="submit" value="<?php echo i18n::__(((isset($objVacunacion)) ? 'update' : 'register')) ?>">
</form>



