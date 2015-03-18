<?php

use mvc\routing\routingClass as routing ?>

<div class="container container-fluid">
    <form id="frmDeleteAll" action="<?php echo routing::getInstance()->getUrlWeb('insumo', 'deleteSelect') ?>" method="POST">
        <div style="margin-bottom: 10px; margin-top: 30px">
            <a href="<?php echo routing::getInstance()->getUrlWeb('insumo', 'insert') ?>" class="btn btn-success btn-xs">Nuevo</a>
            <a href="#" class="btn btn-danger btn-xs" onclick="borrarSeleccion()">Borrar</a>
        </div>

        <table class="table table-bordered table-responsive">
            <thead>
                <tr>
                    <th><input type="checkbox" id="chkAll"></th>
                    <th>Id</th>
                    <th>Descripción</th>
                    <th>Valor</th>
                    <th>Linea</th>
                    <th>Presentacion</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
<?php foreach ($objInsumo as $key): ?>
                    <tr>
                        <td><input type="checkbox" name="chk[]" value="<?php echo $key->id ?>"></td>
                        <td><?php echo $key->id ?></td>
                        <td><?php echo $key->desc_insumo ?></td>
                        <td><?php echo $key->valor_insumo ?></td>



                        <td><?php echo $key->id_linea ?></td>
                        <td><?php echo $key->id_presentacion ?></td>
                        <td>
                            <a href="<?php echo routing::getInstance()->getUrlWeb('insumo', 'edit', array(insumoTableClass::ID => $key->id)) ?>" class="btn btn-primary btn-xs">Editar</a>
                            <a href="#" onclick="confirmarEliminar(<?php echo $key->id ?>)" class="btn btn-danger btn-xs">Eliminar</a>
                        </td>
                    </tr>
<?php endforeach ?>
            </tbody>
        </table>

    </form>

    <form id="frmDelete" action="<?php echo routing::getInstance()->getUrlWeb('insumo', 'delete') ?>" method="POST">
        <input type="hidden" id="idDelete" name="<?php echo insumoTableClass::getNameField(insumoTableClass::ID, true) ?>">
    </form>
</div>

