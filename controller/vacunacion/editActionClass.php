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
      if (request::getInstance()->hasRequest(vacunacionTableClass::ID)) {
        $fields = array(
            vacunacionTableClass::ID,
            vacunacionTableClass::FECHA,
            vacunacionTableClass::USUARIO_ID
        );
        $where = array(
        vacunacionTableClass::ID => request::getInstance()->getRequest(vacunacionTableClass::ID)
        );
        
        $this->objVacunacion = vacunacionTableClass::getAll($fields, false, null ,null, null, null, $where);
        $this->defineView('edit', 'vacunacion', session::getInstance()->getFormatOutput());
      } else {
        routing::getInstance()->redirect('vacunacion', 'index');
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




