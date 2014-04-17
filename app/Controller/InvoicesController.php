<?php

App::uses('DocumentsController', 'Controller');

class InvoicesController extends DocumentsController {

    protected function getModel() {
        return $this->Invoice;
    }

}
