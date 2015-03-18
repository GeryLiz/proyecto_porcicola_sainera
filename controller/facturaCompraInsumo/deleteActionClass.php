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

        $id = request::getInstance()->getPost(facturaCompraInsumoTableClass::getNameField(facturaCompraInsumoTableClass::ID, true));

         $ids = array(
             facturaCompraInsumoTableClass::ID => $id
         );
         facturaCompraInsumoTableClass::delete($ids, false);
                routing::getInstance()->redirect('facturaCompraInsumo' , 'index');
      } else {
        routing::getInstance()->redirect('facturaCompraInsumo', 'index');
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

