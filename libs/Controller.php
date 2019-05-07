<?php

class Controller
{
    private $model;
    private $view;

    public function __construct()
    {
        $this->model = new Model();
        $this->view = new View(TEMPLATE);
        if (isset($_FILES) && !empty($_FILES)) {
            $this->sendToParse();
        } else {
            $this->pageDefault();
        }

        $this->view->templateRender();
    }

    private function sendToParse()
    {

        $out = $this->model->valid($_FILES);
        $mArray = $this->model->getArray();
        $this->view->addToReplace($mArray);
    }

    private function pageDefault()
    {
        $mArray = $this->model->getArray();
        $this->view->addToReplace($mArray);
    }
}
