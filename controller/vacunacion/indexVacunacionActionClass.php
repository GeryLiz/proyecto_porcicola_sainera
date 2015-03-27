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
class indexVacunacionActionClass extends controllerClass implements controllerActionInterface {

    public function execute() {
        try {
            
            
            $fieldsPorcino = array(
                hojaDeVidaTableClass::ID
            );
            $fieldsInsumo = array(
                insumoTableClass::ID,
                insumoTableClass::DESCRIPCION
            );
            
            $fields = array(
                vacunacionTableClass::ID,
                vacunacionTableClass::FECHA,
                vacunacionTableClass::USUARIO_ID
            );

            $orderBy = array(
                vacunacionTableClass::ID
            );

            $page = 0;
            if (request::getInstance()->hasGet('page')) {
                $page = request::getInstance()->getGet('page') - 1;
                $page = $page * config::getRowGrid();
            }

            $f = array(
                vacunacionTableClass::ID
            );
            $lines = config::getRowGrid();

            $this->cntPages = vacunacionTableClass::getAllCount($f, true, $lines);
            $this->page = request::getInstance()->getGet('page');
             

            $this->objPorcino = hojaDeVIdaTableClass::getAll($fieldsPorcino, true);
            $this->objInsumo = insumoTableClass::getAll($fieldsInsumo, true);
            
            $this->objVacunacion = vacunacionTableClass::getAll($fields, true, $orderBy, 'ASC', config::getRowGrid(), $page);

            log::register(i18n::__('view'), vacunacionTableClass::getNameTable());
            $this->defineView('index', 'vacunacion', session::getInstance()->getFormatOutput());
        } catch (PDOException $exc) {
            session::getInstance()->setFlash('exc', $exc);
            routing::getInstance()->forward('shfSecurity', 'exception');
        }
    }

}
