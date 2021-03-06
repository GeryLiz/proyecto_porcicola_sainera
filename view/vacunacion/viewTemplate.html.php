

<?php use mvc\routing\routingClass as routing ?>
<?php use mvc\i18n\i18nClass as i18n ?>

<div class="container container-fluid">

    <br/> <br/>
   <?php echo i18n::__('vaccination', null, 'vacunacion') ?>
    <br /> <br/>

    <table class="table table-bordered table-responsive ">
        <thead>
            <tr class="active">
                <th>Id Doc</th>
                <th>Fecha</th>
                <th>Usuario</th>
            </tr>
        </thead>
        <tbody>
<?php foreach ($objVacunacion as $key): ?>
                <tr>
                    <td><?php echo $key->id ?></td>
                    <td><?php echo $key->fecha ?></td>
                    <td><?php echo $key->usuario_id ?></td>

                </tr>
                            
<?php endforeach ?>
        </tbody>
    </table>
    <br/> 
      <?php echo i18n::__('detailVaccination', null, 'detalleVacunacion') ?>
    <br /> <br />
    <table class="table table-bordered table-responsive ">
        <thead>
            <tr>
                <th>N°</th>
                <th>N° Documento de Vacunacion</th>
                <th>Porcino</th>
                <th>Insumo</th>
                <th>Cantidad</th>
            </tr>
        </thead>
        <tbody>
<?php foreach ($objDetalleVacunacion as $key): ?>
                <tr>
                    <td><?php echo $key->id ?></td>
                    <td><?php echo $key->id_doc ?></td>
                    <td><?php echo $key->id_porcino ?></td>
                    <td><?php echo $key->id_insumo ?></td>
                    <td><?php echo $key->cantidad ?></td>
                </tr>
                            
<?php endforeach ?>
        </tbody>
    </table>
    <!-- PAGINATOR -->
    <div class="text-right">
        <nav>
            <ul class="pagination" id="slqPaginador">
                <li class='<?php echo (($page == 1 or $page == 0) ? "disabled" : "active" ) ?>' id="anterior"><a href="#" aria-label="Previous"onclick="paginador(1, '<?php echo routing::getInstance()->getUrlWeb('vacunacion', 'viewVacunacion') ?>')"><span aria-hidden="true">&Ll;</span></a></li>
                <?php for ($x = 1; $x <= $cntPages; $x++): ?>
                    <li class='<?php echo (($page == $x) ? "disabled" : "active" ) ?>' onclick="paginador(<?php echo $x ?>, '<?php echo routing::getInstance()->getUrlWeb('vacunacion', 'viewVacunacion') ?>')"><a href="#"><?php echo $x ?> <span class="sr-only">(current)</span></a></li>
    <?php $count ++ ?>        
<?php endfor ?>
                <li class='<?php echo (($page == $count) ? "disabled" : "active" ) ?>' onclick="paginador(<?php echo $count ?>, '<?php echo routing::getInstance()->getUrlWeb('vacunacion', 'viewVacunacion') ?>')" id="anterior"><a href="#" aria-label="Previous"><span aria-hidden="true">&Gg;</span></a></li>
            </ul>
        </nav>
    </div> 
</div>