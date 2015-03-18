<?php use mvc\routing\routingClass as routing ?>
<?php use mvc\i18n\i18nClass as i18n ?>

<form method="post" action="<?php echo routing::getInstance()->getUrlWeb('departamento', ((isset($objDepartamento)) ? 'update' : 'create' )) ?>">
  <?php if(isset($objDepartamento) == true): ?>
    <input name="<?php echo departamentoTableClass::getNameField(departamentoTableClass::ID, true) ?>" value="<?php echo $objDepartamento[0]->id ?>" type="hidden">
  <?php endif ?>
  <?php echo i18n::__('name', null, 'credencial') ?>: <input placeholder="<?php echo ((isset($objDepartamento) == true) ? $objDepartamento[0]->desc_departamento : '') ?>" type="text" name="<?php echo departamentoTableClass::getNameField(departamentoTableClass::DESCRIPCION, true) ?>">
  <br>
  <input type="submit" value="<?php echo i18n::__(((isset($objDepartamento)) ? 'update' : 'register')) ?>">
</form>

