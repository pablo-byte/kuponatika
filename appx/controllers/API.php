<?php

require(APPPATH . '/libraries/REST_Controller.php');

class Api extends REST_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model('book_model');
    }
    
    function books_get() {

        $result = $this->book_model->getallbooks();

        if ($result) {
            $this->response($result, 200);
        } else {
            $this->response("No record found", 404);
        }
    }

    function search_post() {

        $keyword = $this->post("keyword");

        if ( !$keyword) {
            $this->response("Enter keyword", 400);
        } else {
            $result = $this->book_model->getbookbykeyword($keyword);
            
            if ($result) {
                $this->response($result, 200);
            } else {
                $this->response("No record found", 404);
            }
        }
    }

}
