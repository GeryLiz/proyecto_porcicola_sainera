<?php use mvc\routing\routingClass as routing ?>
<?php use mvc\i18n\i18nClass as i18n ?>
<?php use mvc\view\viewClass as view ?>
<h1>EDITAR BODEGA <?php echo $objBodega[0]->desc_bodega ?></h1>
<?php view::includePartial('bodega/formBodega', array('objBodega' => $objBodega)) ?>

