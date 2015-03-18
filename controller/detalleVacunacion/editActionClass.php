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
class editActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {
    try {
      if (request::getInstance()->hasRequest(detalleVacunacionTableClass::ID)) {
        $fields = array(
        detalleVacunacionTableClass::ID,
        detalleVacunacionTableClass::ID_DOC,
        detalleVacunacionTableClass::ID_PORCINO,
        detalleVacunacionTableClass::ID_INSUMO,
        detalleVacunacionTableClass::CANTIDAD
        );
        $where = array(
            detalleVacunacionTableClass::ID => request::getInstance()->getRequest(detalleVacunacionTableClass::ID)
        );
        
        $this->objDetalleVacunacion = detalleVacunacionTableClass::getAll($fields, false, null ,null, null, null, $where);
        $this->defineView('edit', 'detalleVacunacion', session::getInstance()->getFormatOutput());
      } else {
        routing::getInstance()->redirect('detalleVacunacion', 'index');
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


