<?php

App::uses('DocumentsController', 'Controller');

class DeliveryNotesController extends DocumentsController {

    protected function getModel() {
        return $this->DeliveryNote;
    }

}
