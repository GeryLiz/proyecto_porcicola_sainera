<?php use mvc\routing\routingClass as routing ?>
<?php use mvc\i18n\i18nClass as i18n ?>
<?php use mvc\view\viewClass as view ?>
<h1>EDITAR VACUNACION <?php echo $objVacunacion[0]-> fecha ?></h1>
<?php view::includePartial('vacunacion/formVacunacion', array('objVacunacion' => $objVacunacion)) ?>

