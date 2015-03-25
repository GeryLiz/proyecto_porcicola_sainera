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
class createActionClass extends controllerClass implements controllerActionInterface {

    public function execute() {
        try {
            if (request::getInstance()->isMethod('POST')) {

                
                $id_doc = request::getInstance()->getPost(detalleVacunacionTableClass::getNameField(detalleVacunacionTableClass::ID_DOC, true));
                $id_porcino = request::getInstance()->getPost(detalleVacunacionTableClass::getNameField(detalleVacunacionTableClass::ID_PORCINO, true));
                $id_insumo = request::getInstance()->getPost(detalleVacunacionTableClass::getNameField(detalleVacunacionTableClass::ID_INSUMO, true));
                $cantidad = request::getInstance()->getPost(detalleVacunacionTableClass::getNameField(detalleVacunacionTableClass::CANTIDAD, true));





                $data = array(
                detalleVacunacionTableClass::ID_DOC => $id_doc,
                detalleVacunacionTableClass::ID_PORCINO => $id_porcino,
                detalleVacunacionTableClass::ID_INSUMO => $id_insumo,
                detalleVacunacionTableClass::CANTIDAD => $cantidad
                );

                detalleVacunacionTableClass::insert($data);
                routing::getInstance()->redirect('detalleVacunacion', 'index');
            } else {
                routing::getInstance()->redirect('detalleVacunaciion', 'index');
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
