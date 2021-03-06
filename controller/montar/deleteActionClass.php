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
      if (request::getInstance()->isMethod('POST')and request::getInstance()->isAjaxRequest()) {

        $id = request::getInstance()->getPost(montarTableClass::getNameField(montarTableClass::ID, true));

         $ids = array(
             montarTableClass::ID => $id
         );
      $this->arrayAjax = array(
                    'code' => 11,
                    'msg' => 'La eliminacion ha sido exitosa'
                ); 
         
         montarTableClass::delete($ids, true);

                $this->defineView('delete', 'montar', session::getInstance()->getFormatOutput());

      } else {
        routing::getInstance()->redirect('montar', 'index');
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




