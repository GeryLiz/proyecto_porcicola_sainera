<?php use mvc\routing\routingClass as routing ?>
<?php use mvc\i18n\i18nClass as i18n ?>
<?php use mvc\view\viewClass as view ?>
<h1>EDITAR GESTACION <?php echo $objGestacion[0]->id_porcino ?></h1>
<?php view::includePartial('gestacion/formGestacion', array('objGestacion' => $objGestacion)) ?>


