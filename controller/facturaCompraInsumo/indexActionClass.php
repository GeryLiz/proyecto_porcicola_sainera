<?php

use mvc\interfaces\controllerActionInterface;
use mvc\controller\controllerClass;
use mvc\config\configClass as config;
use mvc\request\requestClass as request;
use mvc\routing\routingClass as routing;
use mvc\session\sessionClass as session;
use mvc\i18n\i18nClass as i18n;

/**
 * Description of ejemploClass
 *
 * @author Julian Lasso <ingeniero.julianlasso@gmail.com>
 */
class indexActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {
    try {
$fields = array (
    facturaCompraInsumoTableClass::ID,
    facturaCompraInsumoTableClass::FECHA,
    facturaCompraInsumoTableClass::IVA,
    facturaCompraInsumoTableClass::SUBTOTAL,
    facturaCompraInsumoTableClass::TOTAL,
    facturaCompraInsumoTableClass::USUARIO_ID
);
        
        $this->objFacturaCompraInsumo = facturaCompraInsumoTableClass::getAll($fields, false);
        $this->defineView('index', 'facturaCompraInsumo', session::getInstance()->getFormatOutput());
        } catch (PDOException $exc) {
      echo $exc->getMessage();
      echo '<br>';
      echo '<pre>';
      print_r($exc->getTrace());
      echo '</pre>';
    }
  }

}



