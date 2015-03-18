<?php use mvc\routing\routingClass as routing ?>
<?php use mvc\i18n\i18nClass as i18n ?>
<?php use mvc\view\viewClass as view ?>
<h1>EDITAR CREDENCIAL <?php echo $objDatoUsuario[0]->nombre ?></h1>
<?php view::includePartial('datoUsuario/formDatoUsuario', array('objDatoUsuario' => $objDatoUsuario)) ?>
