<?php

use mvc\routing\routingClass as routing ?>

<div class="container container-fluid">
    <form id="frmDeleteAll" action="<?php echo routing::getInstance()->getUrlWeb('montar', 'deleteSelect') ?>" method="POST">
        <div style="margin-bottom: 10px; margin-top: 30px">
            <a href="<?php echo routing::getInstance()->getUrlWeb('montar', 'insert') ?>" class="btn btn-success btn-xs">Nuevo</a>
            <a href="#" class="btn btn-danger btn-xs" onclick="borrarSeleccion()">Borrar</a>
        </div>

        <table class="table table-bordered table-responsive">
            <thead>
                <tr>
                    <th><input type="checkbox" id="chkAll"></th>
                    <th>Id</th>
                    <th>Fecha</th>
                    <th>Id Fecundador</th>
                    <th>Estado</th>
                    <th>Fecha Fertilizacion</th>
                    <th>Id Porcino</th>
                    <th>Id Raza</th>

                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
<?php foreach ($objMontar as $key): ?>
                    <tr>
                        <td><input type="checkbox" name="chk[]" value="<?php echo $key->id ?>"></td>
                        <td><?php echo $key->id ?></td>
                        <td><?php echo $key->fecha ?></td>
 <td><?php echo $key->id_fecundador ?></td>
                        <td><?php echo $key->estado ?></td>
                         <td><?php echo $key->fecha_fertilizacion ?></td>
                        <td><?php echo $key->id_porcino ?></td>
                         <td><?php echo $key->id_raza ?></td>
                       
                        <td>
                            <a href="<?php echo routing::getInstance()->getUrlWeb('montar', 'edit', array(montarTableClass::ID => $key->id)) ?>" class="btn btn-primary btn-xs">Editar</a>
                            <a href="#" onclick="confirmarEliminar(<?php echo $key->id ?>)" class="btn btn-danger btn-xs">Eliminar</a>
                        </td>
                    </tr>
<?php endforeach ?>
            </tbody>
        </table>

    </form>

    <form id="frmDelete" action="<?php echo routing::getInstance()->getUrlWeb('montar', 'delete') ?>" method="POST">
        <input type="hidden" id="idDelete" name="<?php echo montarTableClass::getNameField(montarTableClass::ID, true) ?>">
    </form>
</div>

