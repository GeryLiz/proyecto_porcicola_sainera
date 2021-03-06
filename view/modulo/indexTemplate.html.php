<?php use mvc\routing\routingClass as routing ?>
<?php use mvc\view\viewClass as view ?>
<?php use mvc\i18n\i18nClass as i18n ?>

<div class="container container-fluid">
    <form id="frmDeleteAll" action="<?php echo routing::getInstance()->getUrlWeb('porcino', 'deleteSelectModulo') ?>" method="POST">
        <div style="margin-bottom: 10px; margin-top: 30px">
            <a href="#" data-target="#myModalFilter" data-toggle="modal" class="btn btn-xs btn-default active">Filtro</a>
            <a href="<?php echo routing::getInstance()->getUrlWeb('porcino', 'insertModulo') ?>" class="btn btn-success btn-xs">Nuevo</a>
           <a href="#" data-target="#myModalEliminarMasivo" data-toggle="modal" class="btn btn-xs btn-default active">eliminar</a>
        </div>

        <table class="table table-bordered table-responsive">
            <thead>
                <tr class="active">
                    <th><input type="checkbox" id="chkAll"></th>
                   
                    <th>Descripción</th>
                    <th>Ubicacion</th>
                    <th>Tamaño</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
<?php foreach ($objModulo as $key): ?>
                    <tr>
                        <td><input type="checkbox" name="chk[]" value="<?php echo $key->id ?>"></td>
                       
                        <td><?php echo $key->desc_modulo ?></td>
                        <td><?php echo $key->ubic_modulo ?></td>
                        <td><?php echo $key->tamaño_modulo ?></td>
                        <td>
                            <a href="<?php echo routing::getInstance()->getUrlWeb('porcino', 'editModulo', array(moduloTableClass::ID => $key->id)) ?>" class="btn btn-primary btn-xs">Editar</a>
                            <a href="#" class="btn btn-sm btn-danger fa fa-trash-o" data-toggle="modal" data-target="#myModalDelete<?php echo $key->id ?>">eliminar</a>
                        </td>
                    </tr>
                    <!-- WINDOWS MODAL DELETE -->
                <div class="modal fade" id="myModalDelete<?php echo $key->id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">Confirmar ELiminar</h4>
                            </div>
                            <div class="modal-body">
                                ¿Desea eliminar el registro?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                <button type="button" class="btn btn-danger fa fa-eraser" onclick="eliminar(<?php echo $key->id ?>, '<?php echo moduloBaseTableClass::getNameField(moduloTableClass::ID, true) ?>', '<?php echo routing::getInstance()->getUrlWeb('porcino', 'deleteModulo') ?>')">Eliminar</button>
                            </div>
                        </div>
                    </div>
                </div> 
<?php endforeach ?>
            </tbody>
        </table>

    </form>
    <div class="text-right">
        <nav>
            <ul class="pagination" id="slqPaginador">
                <li class='<?php echo (($page == 1 or $page == 0) ? "disabled" : "active" ) ?>' id="anterior"><a href="#" aria-label="Previous"onclick="paginador(1, '<?php echo routing::getInstance()->getUrlWeb('porcino', 'indexModulo') ?>')"><span aria-hidden="true">&Ll;</span></a></li>
                <?php for ($x = 1; $x <= $cntPages; $x++): ?>
                    <li class='<?php echo (($page == $x) ? "disabled" : "active" ) ?>' onclick="paginador(<?php echo $x ?>, '<?php echo routing::getInstance()->getUrlWeb('porcino', 'indexModulo') ?>')"><a href="#"><?php echo $x ?> <span class="sr-only">(current)</span></a></li>
    <?php $count ++ ?>        
<?php endfor ?>
                <li class='<?php echo (($page == $count) ? "disabled" : "active" ) ?>' onclick="paginador(<?php echo $count ?>, '<?php echo routing::getInstance()->getUrlWeb('porcino', 'indexModulo') ?>')" id="anterior"><a href="#" aria-label="Previous"><span aria-hidden="true">&Gg;</span></a></li>
            </ul>
        </nav>
    </div> 
    <form id="frmDelete" action="<?php echo routing::getInstance()->getUrlWeb('porcino', 'deleteModulo') ?>" method="POST">
        <input type="hidden" id="idDelete" name="<?php echo moduloTableClass::getNameField(moduloTableClass::ID, true) ?>">
    </form>
</div>

<!-- WINDOWS MODAL FILTER -->
<div class="modal fade" id="myModalFilter" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Filtrar Por:</h4>
            </div>
            <div class="modal-body">
                <form id="filterForm" class="form-horizontal" method="POST" action="<?php echo routing::getInstance()->getUrlWeb('porcino', 'indexModulo') ?>">
 <table class="table">
                    <tr>
                        <th>
<?php echo i18n::__('name', null, 'credencial') ?>:
                        </th>
                        <th>
                            <input type="text" name="filter[name]" >
                        </th>
                    </tr>
                    <tr>
                        <th>
<?php echo i18n::__('location', null, 'modulo') ?>: 
                        </th>
                        <th>
                            <input type="text" name="filter[location]">
                        </th>
                    </tr>
                    <tr>
                        <th>
<?php echo i18n::__('size', null, 'modulo') ?>:  
                        </th>
                        <th>
                            <input type="text" name="filter[size]">
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

<!-- WINDOWS MODAL DELETE MASIVE -->
<div class="modal fade" id="myModalEliminarMasivo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"><?php echo i18n::__('deleteMasive') ?></h4>
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


