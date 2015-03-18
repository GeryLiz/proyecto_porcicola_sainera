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
                $edad_porcino = request::getInstance()->getPost(hojaDeVidaTableClass::getNameField(hojaDeVidaTableClass::EDAD, true));
                $peso_porcino = request::getInstance()->getPost(hojaDeVidaTableClass::getNameField(hojaDeVidaTableClass::PESO, true));
                $genero_porcino = request::getInstance()->getPost(hojaDeVidaTableClass::getNameField(hojaDeVidaTableClass::GENERO, true));
                $cant_partos = request::getInstance()->getPost(hojaDeVidaTableClass::getNameField(hojaDeVidaTableClass::PARTOS, true));
                $fecha_ingreso = request::getInstance()->getPost(hojaDeVidaTableClass::getNameField(hojaDeVidaTableClass::INGRESO, true));
                $id_estado = request::getInstance()->getPost(hojaDeVidaTableClass::getNameField(hojaDeVidaTableClass::ESTADO, true));
                $id_raza = request::getInstance()->getPost(hojaDeVidaTableClass::getNameField(hojaDeVidaTableClass::RAZA, true));
                $id_modulo = request::getInstance()->getPost(hojaDeVidaTableClass::getNameField(hojaDeVidaTableClass::MODULO, true));
                $usuario_id = request::getInstance()->getPost(hojaDeVidaTableClass::getNameField(hojaDeVidaTableClass::USUARIO_ID, true));

                $data = array(
                    hojaDeVidaTableClass::EDAD => $edad_porcino,
                    hojaDeVidaTableClass::PESO => $peso_porcino,
                    hojaDeVidaTableClass::GENERO => $genero_porcino,
                    hojaDeVidaTableClass::PARTOS => $cant_partos,
                    hojaDeVidaTableClass::INGRESO => $fecha_ingreso,
                    hojaDeVidaTableClass::ESTADO => $id_estado,
                    hojaDeVidaTableClass::RAZA => $id_raza,
                    hojaDeVidaTableClass::MODULO => $id_modulo,
                    hojaDeVidaTableClass::USUARIO_ID => $usuario_id
                );

                hojaDeVidaBaseTableClass::insert($data);
                session::getInstance()->setSuccess("OLA MUNDO");
                routing::getInstance()->redirect('hojaDeVida', 'index');
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
