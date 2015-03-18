<?php use mvc\routing\routingClass as routing ?>
<?php use mvc\i18n\i18nClass as i18n ?>
<?php use mvc\view\viewClass as view ?>
<h1>EDITAR DETALLE FACTURA COMPRA INSUMO <?php echo $objDetalle[0]->id_fact ?></h1>
<?php view::includePartial('detalleFacturaCompraInsumo/formDetalleFacturaCompraInsumo', array('objDetalle' => $objDetalle)) ?>

