<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        $this->load->library(array('session', 'form_validation'));
        $this->load->helper(array('url', 'form', 'language'));
        
        $this->load->model('book_model');
        
    }
    
    function index() {
        $this->load->view('search/form');
    }
    
    public function search_table() {
        $aColumns = array('id', 'name', 'price', 'author', 'category', 'language', 'ISBN', 'publish_date');
        
        $iDisplayStart = $this->input->get_post('iDisplayStart', true);
        $iDisplayLength = $this->input->get_post('iDisplayLength', true);
        $iSortCol_0 = $this->input->get_post('iSortCol_0', true);
        $sSortDir_0 = $this->input->get_post('sSortDir_0', true);
        
        $sLimit = "";
        if (isset($iDisplayStart) && $iDisplayLength != '-1') {
            $sLimit = $iDisplayStart . "," . $iDisplayLength;
        }
        
        $keyword = $this->input->get_post('keyword', true);
        $result = $this->book_model->getbookbykeyword($keyword);
        $total = count($result);
        
        $output = array(
            "sEcho" => intval(@$_GET['sEcho']),
            "iTotalRecords" => $total,
            "iTotalDisplayRecords" => $total,
            "limit" => $sLimit,
            "aaData" => array(),
        );
        
        foreach ($result as $aRow) {
            /*ESTADISTICAS*/
            $this->add_keyword($aRow['id'], $keyword);
            
            $row = array();
            for ($i = 0; $i < count($aColumns); $i++) {
                
                switch ($aColumns[$i]) {
                        
                    default:
                        $row[] = $aRow[$aColumns[$i]];
                        break;
                }
            }
            $output['aaData'][] = $row;
        }
        echo json_encode($output);
    }
   
    private function add_keyword($id, $keyword) {
        $keyword = strval($keyword);
        $book = $this->book_model->getbookbyid($id);
        $search = $book[0]['search'];
        $cant = $book[0]['cant'] + 1;
        //print_r($search);
        
        if(is_null($search)) {//NUEVO
            $new_data[$keyword] = 1;
        } else {//EXISTE
            $data = (array) json_decode($search);//print_r($new_data);
            if( !array_key_exists($keyword, $data)) {
                $data[$keyword] = 0;
            }
            //var_dump($data);die();
            foreach ($data as $k => $v) {
                if($keyword == $k) {//echo $k.":".$v."-";
                    $new_data[$k] = $v + 1;//print_r($new_data);
                } else {
                    $new_data[$k] = $v;
                }
            }
           
            
        }
        //print_r($new_data);die();
        $this->book_model->update($id, array('cant' => $cant, 'search' => json_encode($new_data)));
        
    }
}
