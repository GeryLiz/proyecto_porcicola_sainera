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
class deleteHojaDeVidaActionClass extends controllerClass implements controllerActionInterface {

    public function execute() {
        try {
            if (request::getInstance()->isMethod('POST')and request::getInstance()->isAjaxRequest()) {

                $id = request::getInstance()->getPost(hojaDeVidaTableClass::getNameField(hojaDeVidaTableClass::ID, true));

                $ids = array(
                    hojaDeVidaTableClass::ID => $id
                );
                $this->arrayAjax = array(
                    'code' => 11,
                    'msg' => 'La eliminacion ha sido exitosa'
                ); 
         
         hojaDeVidaTableClass::delete($ids, false);

                $this->defineView('delete', 'hojaDeVida', session::getInstance()->getFormatOutput());

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
