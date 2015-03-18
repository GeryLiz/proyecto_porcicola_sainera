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
class indexActionClass extends controllerClass implements controllerActionInterface {

    public function execute() {
        try {
            $fields = array(
                detalleFacturaCompraInsumoTableClass::ITEM,
                detalleFacturaCompraInsumoTableClass::ID_FACT,
                detalleFacturaCompraInsumoTableClass::ID,
                detalleFacturaCompraInsumoTableClass::CANTIDAD,
                detalleFacturaCompraInsumoTableClass::PRECIO,
                detalleFacturaCompraInsumoTableClass::SUBTOTAL,
                detalleFacturaCompraInsumoTableClass::FABRICACION,
                detalleFacturaCompraInsumoTableClass::VENCIMIENTO
            );

            $this->objDetalle = detalleFacturaCompraInsumoTableClass::getAll($fields, false);
            $this->defineView('index', 'detalleFacturaCompraInsumo', session::getInstance()->getFormatOutput());
        } catch (PDOException $exc) {
            echo $exc->getMessage();
            echo '<br>';
            echo '<pre>';
            print_r($exc->getTrace());
            echo '</pre>';
        }
    }

}
