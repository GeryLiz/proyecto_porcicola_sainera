<?php use mvc\routing\routingClass as routing ?>
<?php use mvc\i18n\i18nClass as i18n ?>
<?php use mvc\view\viewClass as view ?>
<h1>EDITAR FACTURA COMPRA DE INSUMO <?php echo $objFacturaCompraInsumo[0]->fecha ?></h1>
<?php view::includePartial('facturaCompraInsumo/formFacturaCompraInsumo', array('objUsuario' => $objUsuario , 'objFacturaCompraInsumo' => $objFacturaCompraInsumo)) ?>
