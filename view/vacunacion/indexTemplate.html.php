<?php

use mvc\routing\routingClass as routing ?>
<?php
use mvc\i18n\i18nClass as i18n ?>

<div class="container container-fluid">
    <form id="frmDeleteAll" action="<?php echo routing::getInstance()->getUrlWeb('vacunacion', 'deleteSelectVacunacion') ?>" method="POST">
        <div style="margin-bottom: 10px; margin-top: 30px">
            <a href="#" data-target="#myModalFilter" data-toggle="modal" class="btn btn-xs btn-default active"><?php echo i18n::__('filters') ?></a>
            <a href="<?php echo routing::getInstance()->getUrlWeb('vacunacion', 'deleteFiltersVacunacion') ?>" class="btn btn-info btn-xs" ><?php echo i18n::__('removeFilters') ?></a>
            <a href="<?php echo routing::getInstance()->getUrlWeb('vacunacion', 'insertVacunacion') ?>" class="btn btn-success btn-xs"><?php echo i18n::__('new') ?></a>
            <a href="#" data-target="#myModalEliminarMasivo" data-toggle="modal" class="btn btn-xs btn-default active"><?php echo i18n::__('remove') ?></a>
            <a href="<?php echo routing::getInstance()->getUrlWeb('vacunacion', 'reportVacunacion') ?>" class="btn btn-info btn-xs" ><?php echo i18n::__('report') ?></a>
        </div>

        <table class="table table-bordered table-responsive ">
            <thead>
                <tr>
                    <th><input type="checkbox" id="chkAll"></th>
                    <th><?php echo i18n::__('id_doc', null, 'vacunacion') ?> </th>
                    <th><?php echo i18n::__('date', null, 'vacunacion') ?> </th>
                    <th><?php echo i18n::__('user') ?> </th>
                    <th><?php echo i18n::__('action') ?> </th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($objVacunacion as $key): ?>
                    <tr>
                        <td><input type="checkbox" name="chk[]" value="<?php echo $key->id ?>"></td>

                        <td><?php echo $key->id ?></td>
                        <td><?php echo $key->fecha ?></td>
                        <td><?php echo $key->usuario_id ?></td>
                        <td>          

                            <a href="<?php echo routing::getInstance()->getUrlWeb('vacunacion', 'editVacunacion', array(vacunacionTableClass::ID => $key->id)) ?>" class="btn btn-primary btn-xs">Editar</a>
                            <a href="#" class="btn btn-sm btn-danger fa fa-trash-o" data-toggle="modal" data-target="#myModalDelete<?php echo $key->id ?>">Eliminar</a>
                            <a href="<?php echo routing::getInstance()->getUrlWeb('vacunacion', 'viewVacunacion', array(vacunacionTableClass::ID => $key->id)) ?>" class="btn btn-info btn-xs"> Ver Detalle</a>
                            <a href="#" class="btn btn-sm btn-info fa " data-toggle="modal" data-target="#myModalDetail<?php echo $key->id ?>" class="btn btn-info btn-xs">Insertar Detalle</a>
                        </td>
                    </tr>
                    <!-- WINDOWS MODAL DELETE -->
                <div class="modal fade" id="myModalDelete<?php echo $key->id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">  <?php echo i18n::__('confirmDelete') ?></h4>
                            </div>
                            <div class="modal-body">
                                <?php echo i18n::__('want to delete the record?') ?>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                <button type="button" class="btn btn-danger fa fa-eraser" onclick="eliminar(<?php echo $key->id ?>, '<?php echo vacunacionBaseTableClass::getNameField(vacunacionTableClass::ID, true) ?>', '<?php echo routing::getInstance()->getUrlWeb('vacunacion', 'deleteVacunacion') ?>')">Eliminar</button>
                            </div>
                        </div>
                    </div>
                </div> 


                <!-- WINDOWS MODAL DETAIL VACCINATION -->
                <div class="modal fade" id="myModalDetail<?php echo $key->id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel"><?php echo i18n::__('newDetailVaccination', null, 'detalleVacunacion') ?>:</h4>
                            </div>
                            <div class="modal-body">

                                <form id="detailForm" class="form-horizontal" method="POST" action="<?php echo routing::getInstance()->getUrlWeb('vacunacion', 'createDetalleVacunacion') ?>">

                                    <input type="hidden" value="<?php echo $key->id ?>" name="<?php echo detalleVacunacionTableClass::getNameField(detalleVacunacionTableClass::ID_DOC, true) ?>">
                                    <h3>Porcino</h3>
                                    <select name="<?php echo detalleVacunacionTableClass::getNameField(detalleVacunacionTableClass::ID_PORCINO, true) ?>">

                                        <?php foreach ($objPorcino as $key): ?>
                                            <option value="<?php echo $key->id ?>"><?php echo $key->id ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <h3>Insumo</h3>
                                    <select name="<?php echo detalleVacunacionTableClass::getNameField(detalleVacunacionTableClass::ID_INSUMO, true) ?>">
                                        <?php foreach ($objInsumo as $key): ?>
                                            <option value="<?php echo $key->id ?>"><?php echo $key->desc_insumo ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <h3>Cantidad</h3>
                                    <input type="number" name="<?php echo detalleVacunacionTableClass::getNameField(detalleVacunacionTableClass::CANTIDAD, true) ?>">
                                </form>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                <button type="button" class="btn btn-primary" onclick="$('#detailForm').submit()">Insertar</button>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
            </tbody>
        </table>

    </form>
    <!-- PAGINATOR -->
    <div class="text-right">
        <nav>
            <ul class="pagination" id="slqPaginador">
                <li class='<?php echo (($page == 1 or $page == 0) ? "disabled" : "active" ) ?>' id="anterior"><a href="#" aria-label="Previous"onclick="paginador(1, '<?php echo routing::getInstance()->getUrlWeb('vacunacion', 'indexVacunacion') ?>')"><span aria-hidden="true">&Ll;</span></a></li>
                <?php for ($x = 1; $x <= $cntPages; $x++): ?>
                    <li class='<?php echo (($page == $x) ? "disabled" : "active" ) ?>' onclick="paginador(<?php echo $x ?>, '<?php echo routing::getInstance()->getUrlWeb('vacunacion', 'indexVacunacion') ?>')"><a href="#"><?php echo $x ?> <span class="sr-only">(current)</span></a></li>
                    <?php $count ++ ?>        
                <?php endfor ?>
                <li class='<?php echo (($page == $count) ? "disabled" : "active" ) ?>' onclick="paginador(<?php echo $count ?>, '<?php echo routing::getInstance()->getUrlWeb('vacunacion', 'indexVacunacion') ?>')" id="anterior"><a href="#" aria-label="Previous"><span aria-hidden="true">&Gg;</span></a></li>
            </ul>
        </nav>
    </div> 
    <form id="frmDelete" action="<?php echo routing::getInstance()->getUrlWeb('vacunacion', 'deleteVacunacion') ?>" method="POST">
        <input type="hidden" id="idDelete" name="<?php echo vacunacionTableClass::getNameField(vacunacionTableClass::ID, true) ?>">
    </form>
</div>


<!-- WINDOWS MODAL DELETE MASIVE -->
<div class="modal fade" id="myModalEliminarMasivo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"><?php echo i18n::__('deleteMass') ?></h4>
            </div>
            <div class="modal-body">

                <?php echo i18n::__('confirmDeleteMasive') ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-danger" onclick="$('#frmDeleteAll').submit()">Confirmar</button>
            </div>
        </div>
    </div>
</div>

<!-- WINDOWS MODAL FILTER -->
<div class="modal fade" id="myModalFilter" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"><?php echo i18n::__('filterBy') ?>:</h4>
            </div>
            <div class="modal-body">
                <form id="filterForm" class="form-horizontal" method="POST" action="<?php echo routing::getInstance()->getUrlWeb('vacunacion', 'indexVacunacion') ?>">
                    <table class="table table-bordered">
                        <tr>
                            <th>
                                <?php echo i18n::__('id_doc', null, 'vacunacion') ?>:
                            </th>
                            <th>
                                <input  type="text" name="filter[id]">
                            </th>
                        </tr>
                        <tr>
                            <th>
                                <?php echo i18n::__('date', null, 'vacunacion') ?>:
                            </th>
                            <th>
                                <input  type="date" name="filter[fecha]">
                            </th>
                        </tr>
                        <tr>
                            <th>
                                <?php echo i18n::__('user', null, 'vacunacion') ?>:
                            </th>
                            <th>
                                <select name="filter[empleado]">
                                   <?php foreach ($objEmpleado as $key): ?>
                                    <option value="<?php echo $key->id ?>">
                                        <?php echo $key->nom_empleado ?>
                                    </option>
                                    <?php endforeach; ?>
                                </select>
                            </th>
                        </tr>
                    </table>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" onclick="$('#filterForm').submit()">Buscar</button>
            </div>
        </div>
    </div>
</div>



