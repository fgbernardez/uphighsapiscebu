<?php
defined('BASEPATH') OR exit('No direct script access allowed');


require_once APPPATH . "controllers/MainController.php";
require_once APPPATH . "modules/TemplateModule.php";

class ErrorPageController extends MainController{

    public function __construct()
    {
        parent::__construct();
        $this->template = new TemplateModule();
    }

    public function Page404(){
        $this->template->page404();
        
    }
}