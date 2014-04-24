<?php

App::uses('DocumentsController', 'Controller');

class OrdersController extends DocumentsController {

    protected function getModel() {
        return $this->Order;
    }

}
