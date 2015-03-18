<?php

use mvc\routing\routingClass as routing ?>
    <?php
    use mvc\i18n\i18nClass as i18n ?>

<form method="post" action="<?php echo routing::getInstance()->getUrlWeb('datoUsuario', ((isset($objDatoUsuario)) ? 'update' : 'create')) ?>">
    <?php if (isset($objDatoUsuario) == true): ?>
        <input name="<?php echo datoUsuarioTableClass::getNameField(datoUsuarioTableClass::ID, true) ?>" value="<?php echo $objDatoUsuario[0]->id ?>" type="hidden">
    <?php endif ?>
    <?php echo i18n::__('name', null, 'datoUsuario') ?>: <input placeholder="<?php echo ((isset($objDatoUsuario) == true) ? $objDatoUsuario[0]->nombre : '') ?>" type="text" name="<?php echo datoUsuarioTableClass::getNameField(datoUsuarioTableClass::NOMBRE, true) ?>">
    <br>
    <br>
    <?php echo i18n::__('last_name', null, 'datoUsuario') ?>: <input placeholder="<?php echo ((isset($objDatoUsuario) == true) ? $objDatoUsuario[0]->apellidos : '') ?>" type="text" name="<?php echo datoUsuarioTableClass::getNameField(datoUsuarioTableClass::APELLIDOS, true) ?>">
    <br>
    <br>
    <?php echo i18n::__('phone', null, 'datoUsuario') ?>: <input placeholder="<?php echo ((isset($objDatoUsuario) == true) ? $objDatoUsuario[0]->telefono : '') ?>" type="text" name="<?php echo datoUsuarioTableClass::getNameField(datoUsuarioTableClass::TELEFONO, true) ?>">
    <br>
    <br>
    <?php echo i18n::__('address', null, 'datoUsuario') ?>: <input placeholder="<?php echo ((isset($objDatoUsuario) == true) ? $objDatoUsuario[0]->direccion : '') ?>" type="text" name="<?php echo datoUsuarioTableClass::getNameField(datoUsuarioTableClass::DIRECCION, true) ?>">
    <br>
    <br>
    <?php echo i18n::__('writ', null, 'datoUsuario') ?>: <input placeholder="<?php echo ((isset($objDatoUsuario) == true) ? $objDatoUsuario[0]->cedula : '') ?>" type="text" name="<?php echo datoUsuarioTableClass::getNameField(datoUsuarioTableClass::CEDULA, true) ?>">
    <br>
    <br>
    <input type="submit" value="<?php echo i18n::__(((isset($objDatoUsuario)) ? 'update' : 'register')) ?>">
</form>

