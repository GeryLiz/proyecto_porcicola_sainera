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
class indexHojaDeVidaActionClass extends controllerClass implements controllerActionInterface {

    public function execute() {
        try {
            
            $where = null;
            
            if(request::getInstance()->hasPost('filter')){
                $filter = request::getInstance()->getPost('filter');
                if (isset($filter['edad']) and $filter['edad'] !== null and $filter['edad'] !== ''){
                    $where[hojaDeVidaTableClass::EDAD] = $filter['edad'];
                }
            }
            
               if(request::getInstance()->hasPost('filter')){
                $filter = request::getInstance()->getPost('filter');
                if (isset($filter['peso']) and $filter['peso'] !== null and $filter['peso'] !== ''){
                    $where[hojaDeVidaTableClass::PESO] = $filter['peso'];
                }
            }
            
                if(request::getInstance()->hasPost('filter')){
                $filter = request::getInstance()->getPost('filter');
                if (isset($filter['genero']) and $filter['genero'] !== null and $filter['genero'] !== ''){
                    $where[hojaDeVidaTableClass::GENERO] = $filter['genero'];
                }
            }
            
                 if(request::getInstance()->hasPost('filter')){
                $filter = request::getInstance()->getPost('filter');
                if (isset($filter['cant_partos']) and $filter['cant_partos'] !== null and $filter['cant_partos'] !== ''){
                    $where[hojaDeVidaTableClass::PARTOS] = $filter['cant_partos'];
                }
            }
            
                if(request::getInstance()->hasPost('filter')){
                $filter = request::getInstance()->getPost('filter');
                if (isset($filter['fecha_ingreso']) and $filter['fecha_ingreso'] !== null and $filter['fecha_ingreso'] !== ''){
                    $where[hojaDeVidaTableClass::INGRESO] = $filter['fecha_ingreso'];
                }
            }
            
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

            $orderBy = array(
                hojaDeVidaTableClass::ID
            );

            $fieldsRaza = array(
                razaTableClass::ID,
                razaTableClass::DESCRIPCION
            );
            $fieldsUsuario = array(
                usuarioTableClass::ID,
                usuarioTableClass::USER
            );
            $fieldsModulo = array(
                moduloTableClass::ID,
                moduloTableClass::DESCRIPCION
            );




            $page = 0;
            if (request::getInstance()->hasGet('page')) {
                $page = request::getInstance()->getGet('page') - 1;
                $page = $page * config::getRowGrid();
            }

            $f = array(
                hojaDeVidaTableClass::ID
            );
            $lines = config::getRowGrid();

            $this->cntPages = hojaDeVidaTableClass::getAllCount($f, true, $lines);
            $this->page = request::getInstance()->getGet('page');
            $this->objModulo = moduloTableClass::getAll($fieldsModulo, true);
            $this->objUsuario = usuarioTableClass::getAll($fieldsUsuario, true);
            $this->objRaza = razaTableClass::getAll($fieldsRaza, true);
            $this->objHojaDeVida = hojaDeVidaTableClass::getAll($fields, true, $orderBy, 'ASC', config::getRowGrid(), $page, $where);

            $this->defineView('index', 'hojaDeVida', session::getInstance()->getFormatOutput());
        } catch (PDOException $exc) {
            echo $exc->getMessage();
            echo '<br>';
            echo '<pre>';
            print_r($exc->getTrace());
            echo '</pre>';
        }
    }

}
