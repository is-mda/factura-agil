<?php

App::uses('Component', 'Controller');

class MessagingComponent extends Component {

    private $controller;
    
    public function initialize(Controller $controller) {
        $this->controller = $controller;
    }

    public function message($type, $message, $namespace = null) {
        $this->controller->Session->setFlash($message, 'default', array('class' => "alert alert-$type"), $namespace);
    }
    
    public function info($message, $namespace = null) {
        $this->message('info', $message, $namespace);
    }
    
    public function success($message, $namespace = null) {
        $this->message('success', $message, $namespace);
    }
    
    public function warning($message, $namespace = null) {
        $this->message('warning', $message, $namespace);
    }
    
    public function error($message, $namespace = null) {
        $this->message('danger', $message, $namespace);
    }

}