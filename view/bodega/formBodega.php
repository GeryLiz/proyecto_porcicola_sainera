<?php use mvc\routing\routingClass as routing ?>
<?php use mvc\i18n\i18nClass as i18n ?>

<form method="post" action="<?php echo routing::getInstance()->getUrlWeb('bodega', ((isset($objBodega)) ? 'update' : 'create' )) ?>">
  <?php if(isset($objBodega) == true): ?>
    <input name="<?php echo bodegaTableClass::getNameField(bodegaTableClass::ID, true) ?>" value="<?php echo $objBodega[0]->id ?>" type="hidden">
  <?php endif ?>
  <?php echo i18n::__('name', null, 'credencial') ?>: <input placeholder="<?php echo ((isset($objBodega) == true) ? $objBodega[0]-> desc_bodega : '') ?>" type="text" name="<?php echo bodegaTableClass::getNameField(bodegaTableClass::DESCRIPCION, true) ?>">
  <br>
      
 
  <input type="submit" value="<?php echo i18n::__(((isset($objBodega)) ? 'update' : 'register')) ?>">
</form>

