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
class updateModuloActionClass extends controllerClass implements controllerActionInterface {

    public function execute() {
        try {
            if (request::getInstance()->isMethod('POST')) {

//        $id = request::getInstance()->getPost(usuarioTableClass::getNameField(usuarioTableClass::ID, true));
//        $usuario = request::getInstance()->getPost(usuarioTableClass::getNameField(usuarioTableClass::USER, true));
//        $password = request::getInstance()->getPost(usuarioTableClass::getNameField(usuarioTableClass::PASSWORD, true));
                $id = request::getInstance()->getPost(moduloTableClass::getNameField(moduloTableClass::ID, true));
                $desc_modulo = request::getInstance()->getPost(moduloTableClass::getNameField(moduloTableClass::DESCRIPCION, true));
                $ubic_modulo = request::getInstance()->getPost(moduloTableClass::getNameField(moduloTableClass::UBICACION, true));
                $tamaño_modulo = request::getInstance()->getPost(moduloTableClass::getNameField(moduloTableClass::TAMAÑO, true));


                $ids = array(
                    moduloTableClass::ID => $id
                );
                $data = array(
                    moduloTableClass::DESCRIPCION => $desc_modulo,
                    moduloTableClass::UBICACION => $ubic_modulo,
                    moduloTableClass::TAMAÑO => $tamaño_modulo
                );
                moduloTableClass::update($ids, $data);
            }

            routing::getInstance()->redirect('porcino', 'indexModulo');
        } catch (PDOException $exc) {
            echo $exc->getMessage();
            echo '<br>';
            echo '<pre>';
            print_r($exc->getTrace());
            echo '</pre>';
        }
    }

}
