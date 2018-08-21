<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Statistics extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library(array('session', 'form_validation'));
        $this->load->helper(array('url', 'form', 'language'));

        $this->load->model('book_model');
    }

    function index() {
        $this->load->view('statistics/list');
    }

    public function statistics_table() {
        $aColumns = array('id', 'name', 'cant', 'search');

        $iDisplayStart = $this->input->get_post('iDisplayStart', true);
        $iDisplayLength = $this->input->get_post('iDisplayLength', true);
        $iSortCol_0 = $this->input->get_post('iSortCol_0', true);
        $sSortDir_0 = $this->input->get_post('sSortDir_0', true);

        $sLimit = "";
        if (isset($iDisplayStart) && $iDisplayLength != '-1') {
            $sLimit = $iDisplayStart . "," . $iDisplayLength;
        }

        $result = $this->book_model->getallbooksstats();//print_r($result);
        $total = count($result);

        $output = array(
            "sEcho" => intval(@$_GET['sEcho']),
            "iTotalRecords" => $total,
            "iTotalDisplayRecords" => $total,
            "limit" => $sLimit,
            "aaData" => array(),
        );

        foreach ($result as $aRow) {

            $row = array();
            for ($i = 0; $i < count($aColumns); $i++) {

                switch ($aColumns[$i]) {
                    case 'search':
                        $tags = (array) json_decode($aRow['search']);//print_r($tags);
                        
                        $res = "";
                        $j = 0;
                        if(count($tags) > 0) {
                            array_multisort($tags, SORT_NUMERIC, SORT_DESC);//print_r($tags);
                            foreach ($tags as $k => $v) {
                                $j++;
                                if($j <= 5) {
                                    $res .= '<button class="btn btn-primary btn-xs" id="buscar">' . $k . ' (' . $v . ')</button> ';
                                    //$res .= $v.", ";
                                } else {
                                    break;
                                } 
                            }
                        }
                        $row[] = $res;
                        break;

                    default:
                        $row[] = $aRow[$aColumns[$i]];
                        break;
                }
            }
            $output['aaData'][] = $row;
        }
        echo json_encode($output);
    }

}
