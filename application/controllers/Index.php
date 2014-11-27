<?php

/**
 * Description of Index
 *
 * @author Eric
 */
class Index extends CI_Controller {
    private $dirView = "index/";
    private $dirTemplate="templates/template";
    public function __construct() {
        parent::__construct();
        
    }
    
    public function index(){
        $this->template->load($this->dirTemplate,  $this->dirView.'home');
    }
}
