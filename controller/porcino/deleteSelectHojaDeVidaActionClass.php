<?php

use mvc\interfaces\controllerActionInterface;
use mvc\controller\controllerClass;
use mvc\config\configClass as config;
use mvc\request\requestClass as request;
use mvc\routing\routingClass as routing;
use mvc\session\sessionClass as session;
use mvc\i18n\i18nClass as i18n;
use hook\log\logHookClass as log;

/**
 * Description of ejemploClass
 *
 * @author Julian Lasso <ingeniero.julianlasso@gmail.com>
 */
class deleteSelectHojaDeVidaActionClass extends controllerClass implements controllerActionInterface {

    public function execute() {
        try {
            if (request::getInstance()->isMethod('POST')) {

                $idsToDelete = request::getInstance()->getPost('chk');

                foreach ($idsToDelete as $id) {
                    $ids = array(
                        hojaDeVidaTableClass::ID => $id
                    );
                    hojaDeVidaTableClass::delete($ids, true);
                }
                session::getInstance()->setSuccess("Registro ELiminado");
                log::register(i18n::__('delete'), hojaDeVidaTableClass::getNameTable());
                routing::getInstance()->redirect('porcino', 'indexHojaDeVida');
            } else {
                routing::getInstance()->redirect('porcino', 'indexHojaDeVida');
            }
        } catch (PDOException $exc) {
            session::getInstance()->setFlash('exc', $exc);
            routing::getInstance()->forward('shfSecurity', 'exception');
        }
    }

}
