<?php use mvc\routing\routingClass as routing ?>
<?php use mvc\i18n\i18nClass as i18n ?>

<form method="post" action="<?php echo routing::getInstance()->getUrlWeb('credencial', ((isset($objCredencial)) ? 'update' : 'create' )) ?>">
  <?php if(isset($objCredencial) == true): ?>
    <input name="<?php echo credencialTableClass::getNameField(credencialTableClass::ID, true) ?>" value="<?php echo $objCredencial[0]->id ?>" type="hidden">
  <?php endif ?>
  <?php echo i18n::__('name', null, 'credencial') ?>: <input placeholder="<?php echo ((isset($objCredencial) == true) ? $objCredencial[0]->nombre : '') ?>" type="text" name="<?php echo credencialTableClass::getNameField(credencialTableClass::NOMBRE, true) ?>">
  <br>
  <input type="submit" value="<?php echo i18n::__(((isset($objCredencial)) ? 'update' : 'register')) ?>">
</form>