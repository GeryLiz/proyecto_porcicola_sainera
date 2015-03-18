<?php use mvc\routing\routingClass as routing ?>
<?php use mvc\i18n\i18nClass as i18n ?>

<form method="post" action="<?php echo routing::getInstance()->getUrlWeb('facturaCompraInsumo', ((isset($objFacturaCompraInsumo)) ? 'update' : 'create' )) ?>">
  <?php if(isset($objFacturaCompraInsumo) == true): ?>
    <input name="<?php echo facturaCompraInsumoTableClass::getNameField(facturaCompraInsumoTableClass::ID, true) ?>" value="<?php echo $objFacturaCompraInsumo[0]->id ?>" type="hidden">
  <?php endif ?>
  <?php echo i18n::__('date', null, 'montar') ?>: <input placeholder="<?php echo ((isset($objFacturaCompraInsumo) == true) ? $objFacturaCompraInsumo[0]-> fecha : '') ?>" type="date" name="<?php echo facturaCompraInsumoTableClass::getNameField(facturaCompraInsumoTableClass::FECHA, true) ?>">
  <br>
      <?php echo i18n::__('iva', null, 'facturaCompraInsumo') ?>: <input placeholder="<?php echo ((isset($objFacturaCompraInsumo) == true) ? $objFacturaCompraInsumo[0]->iva : '') ?>" type="text" name="<?php echo facturaCompraInsumoTableClass::getNameField(facturaCompraInsumoTableClass::IVA, true) ?>">
  <br>
  <?php echo i18n::__('subtotal', null, 'facturaCompraInsumo') ?>: <input placeholder="<?php echo ((isset($objFacturaCompraInsumo) == true) ? $objFacturaCompraInsumo[0]-> subtotal : '') ?>" type="text" name="<?php echo facturaCompraInsumoTableClass::getNameField(facturaCompraInsumoTableClass::SUBTOTAL, true) ?>">
  <br>
      <?php echo i18n::__('total', null, 'facturaCompraInsumo') ?>: <input placeholder="<?php echo ((isset($objFacturaCompraInsumo) == true) ? $objFacturaCompraInsumo[0]->total : '') ?>" type="text" name="<?php echo facturaCompraInsumoTableClass::getNameField(facturaCompraInsumoTableClass::TOTAL, true) ?>">
  <br>
  <br>
      <?php echo i18n::__('user_id', null, 'hojaDeVida') ?>:
      
      <select name="<?php echo facturaCompraInsumoTableClass::getNameField(facturaCompraInsumoTableClass::USUARIO_ID, true) ?>">
         <?php foreach ($objUsuario as $key):?>
          <option value="<?php echo $key->id ?>"><?php echo $key->user_name ?></option>
          <?php endforeach; ?>
      </select>
      
      <br>
  <input type="submit" value="<?php echo i18n::__(((isset($objFacturaCompraInsumo)) ? 'update' : 'register')) ?>">
</form>

