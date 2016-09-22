<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {

	
	public function index()
	{
		$this->load->view('welcome_message');
	}


public function  store()
{
$data =$this->input->get();

$this->db->insert('bigdata', $data);
$s=$this->db->insert_id();

$this->output
        ->set_content_type('application/json')
        ->set_output(json_encode(array('Status' => $s)));		


}

public function  store_activity()
{
$data =$this->input->get();

$this->db->insert('activity', $data);
$s=$this->db->insert_id();

$this->output
        ->set_content_type('application/json')
        ->set_output(json_encode(array('Status' => $s)));		

}		

public  function  getjsondata($t="bigdata",$f="*",$w="0",$l=10,$o=1)
{
	
$this->db->select($f);

if($w!="0")
{
$this->db->where($w);
}
$this->db->limit($l,$o);
$query =$this->db->get($t);

$this->output
        ->set_content_type('application/json')
        ->set_output(json_encode(array('chartdata' => $query->result_array())));	
}	




}
