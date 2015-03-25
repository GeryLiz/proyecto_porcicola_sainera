<?php

use mvc\routing\routingClass as routing ?>
<?php use mvc\i18n\i18nClass as i18n ?>
<?php use mvc\view\viewClass as view ?>
<div class="container">
    <div class="row">
        <div class="col-xs-4offset-3 text-center">
            <h2><?php echo i18n::__('editUserData', null, 'datoUsuario') ?> <?php echo $objDatoUsuario[0]->nombre ?></h1
            </h2>
        </div>
    </div>
</div>
<?php view::includePartial('datoUsuario/formDatoUsuario', array('objDatoUsuario' => $objDatoUsuario)) ?>
