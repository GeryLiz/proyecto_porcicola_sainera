<?php use mvc\routing\routingClass as routing ?>

<div class="container container-fluid">
  <form id="frmDeleteAll" action="<?php echo routing::getInstance()->getUrlWeb('linea', 'deleteSelect') ?>" method="POST">
    <div style="margin-bottom: 10px; margin-top: 30px">
      <a href="<?php echo routing::getInstance()->getUrlWeb('linea', 'insert') ?>" class="btn btn-success btn-xs">Nuevo</a>
      <a href="#" class="btn btn-danger btn-xs" onclick="borrarSeleccion()">Borrar</a>
    </div>
      
    <table class="table table-bordered table-responsive">
      <thead>
        <tr>
          <th><input type="checkbox" id="chkAll"></th>
       
          <th>Descripción</th>
          
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($objLinea as $key): ?>
          <tr>
            <td><input type="checkbox" name="chk[]" value="<?php echo $key->id ?>"></td>
    
            <td><?php echo $key-> desc_linea ?></td>
          
            <td>
                <a href="<?php echo routing::getInstance()->getUrlWeb('linea', 'edit', array(lineaTableClass::ID => $key->id)) ?>" class="btn btn-primary btn-xs">Editar</a>
              <a href="#" class="btn btn-sm btn-danger fa fa-trash-o" data-toggle="modal" data-target="#myModalDelete<?php echo $key->id ?>">eliminar</a>
            </td>
          </tr>
           <!-- WINDOWS MODAL DELETE -->
                        <div class="modal fade" id="myModalDelete<?php echo $key->id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="myModalLabel">Confirmar Eliminar</h4>
                                    </div>
                                    <div class="modal-body">
                                        ¿Desea eliminar el registro?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                        <button type="button" class="btn btn-danger fa fa-eraser" onclick="eliminar(<?php echo $key->id ?>, '<?php echo lineaBaseTableClass::getNameField(lineaTableClass::ID, true) ?>', '<?php echo routing::getInstance()->getUrlWeb('linea', 'delete') ?>')">Eliminar</button>
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
                <li class='<?php echo (($page == 1 or $page == 0) ? "disabled" : "active" ) ?>' id="anterior"><a href="#" aria-label="Previous"onclick="paginador(1, '<?php echo routing::getInstance()->getUrlWeb('linea', 'index') ?>')"><span aria-hidden="true">&Ll;</span></a></li>
                <?php for ($x = 1; $x <= $cntPages; $x++): ?>
                    <li class='<?php echo (($page == $x) ? "disabled" : "active" ) ?>' onclick="paginador(<?php echo $x ?>, '<?php echo routing::getInstance()->getUrlWeb('linea', 'index') ?>')"><a href="#"><?php echo $x ?> <span class="sr-only">(current)</span></a></li>
                    <?php $count ++ ?>        
                <?php endfor ?>
                <li class='<?php echo (($page == $count) ? "disabled" : "active" ) ?>' onclick="paginador(<?php echo $count ?>, '<?php echo routing::getInstance()->getUrlWeb('linea', 'index') ?>')" id="anterior"><a href="#" aria-label="Previous"><span aria-hidden="true">&Gg;</span></a></li>
            </ul>
        </nav>
    </div> 
  <form id="frmDelete" action="<?php echo routing::getInstance()->getUrlWeb('linea', 'delete') ?>" method="POST">
      <input type="hidden" id="idDelete" name="<?php echo lineaTableClass::getNameField(lineaTableClass::ID, true) ?>">
  </form>
</div>


