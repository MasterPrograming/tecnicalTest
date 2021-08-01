<?php 
    class Testview extends Controllers{

        public function __construct()
        {
            parent::__construct();            
        }

        public function testview()
        {
            $data['tag_page'] = "Home";
            $data['page_title'] = "Cart Game";
            $data['page_name'] = "home";
            $data['page_function'] = "home_functions";
            $this->views->getView($this,"testview",$data);
        }
    }