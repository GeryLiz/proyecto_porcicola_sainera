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
class deleteActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {
    try {
      if (request::getInstance()->isMethod('POST')) {

        $item = request::getInstance()->getPost(detalleFacturaCompraInsumoTableClass::getNameField(detalleFacturaCompraInsumoTableClass::ITEM, true));

         $ids = array(
         detalleFacturaCompraInsumoTableClass::ITEM=> $item
         );
         detalleFacturaCompraInsumoTableClass::delete($ids, false);
                routing::getInstance()->redirect('detalleFacturaCompraInsumo' , 'index');
      } else {
        routing::getInstance()->redirect('detalleFacturaCompraInsumo', 'index');
      }
    } catch (PDOException $exc) {
      echo $exc->getMessage();
      echo '<br>';
      echo '<pre>';
      print_r($exc->getTrace());
      echo '</pre>';
    }
  }

}


