<?php use mvc\routing\routingClass as routing ?>
<?php use mvc\i18n\i18nClass as i18n ?>
<?php use mvc\view\viewClass as view ?>
<h1>EDITAR DEPARTAMENTO <?php echo $objDepartamento[0]->desc_departamento ?></h1>
<?php view::includePartial('departamento/formDepartamento', array('objDepartamento' => $objDepartamento)) ?>
