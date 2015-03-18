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
      if (request::getInstance()->hasRequest(hojaDeVidaTableClass::ID)) {
        $fields = array(
            hojaDeVidaTableClass::ID,
            hojaDeVidaTableClass::EDAD,
            hojaDeVidaTableClass::PESO,
            hojaDeVidaTableClass::GENERO,
            hojaDeVidaTableClass::PARTOS,
            hojaDeVidaTableClass::INGRESO,
            hojaDeVidaTableClass::ESTADO,
            hojaDeVidaTableClass::RAZA,
            hojaDeVidaTableClass::MODULO,
            hojaDeVidaTableClass::USUARIO_ID
        );
        $where = array(
            hojaDeVidaTableClass::ID => request::getInstance()->getRequest(hojaDeVidaTableClass::ID)
        );
        
        $this->objHojaDeVida = hojaDeVidaTableClass::getAll($fields, false, null ,null, null, null, $where);
        $this->defineView('edit', 'hojaDeVida', session::getInstance()->getFormatOutput());
      } else {
        routing::getInstance()->redirect('hojaDeVida', 'index');
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


