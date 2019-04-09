<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function index()
	{
		$c = curl_init();
		curl_setopt($c, CURLOPT_URL, "https://alfian99.000webhostapp.com/ci_pkl/api/penjual");
		curl_setopt($c, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($c, CURLOPT_FOLLOWLOCATION, TRUE);
		curl_setopt($c, CURLOPT_HEADER, FALSE);
		curl_setopt($c, CURLOPT_CUSTOMREQUEST, "GET");

		$data = curl_exec($c);

		$data = array(
			'data' => json_decode($data),
			'page' => 'data'
		);

		$this->load->view('master',$data);
	}

	public function add()
	{
		$submit	= $this->input->post('submit');
		$nama_warung	= $this->input->post('nama_warung');
		$nama_penjual = $this->input->post('nama_penjual');
	

		if ($submit) {
			$param = [
				
				'nama_warung' 		=> $nama_warung,
				'nama_penjual'	=> $nama_penjual,
			
			];

			$c = curl_init();
			curl_setopt($c, CURLOPT_URL, "https://alfian99.000webhostapp.com/ci_pkl/api/penjual/add");
			curl_setopt($c, CURLOPT_RETURNTRANSFER, TRUE);
			curl_setopt($c, CURLOPT_FOLLOWLOCATION, TRUE);
			curl_setopt($c, CURLOPT_HEADER, FALSE);
			curl_setopt($c, CURLOPT_CUSTOMREQUEST, "POST");
			curl_setopt($c, CURLOPT_POST, TRUE);
			curl_setopt($c, CURLOPT_POSTFIELDS, http_build_query($param));

			$data = curl_exec($c);

 			header('location:'.base_url());
		}

		$this->load->view('master',['page' => 'add']);
	}

	public function edit()
	{
		$id_penjual 	= $this->uri->segment(3);
		$submit	= $this->input->post('submit');

		if ($submit) {
			$nama_warung	= $this->input->post('nama_warung');
			$nama_penjual = $this->input->post('nama_penjual');
			$id_penjual = $this->input->post('id_penjual');
			

			$param = [
			    'id_penjual ' => $id_penjual,
				'nama_warung'		=> $nama_warung,
				'nama_penjual' 		=> $nama_penjual
				
			];

			$c = curl_init();
			curl_setopt($c, CURLOPT_URL, "https://alfian99.000webhostapp.com/ci_pkl/api/penjual/edit");
			curl_setopt($c, CURLOPT_RETURNTRANSFER, TRUE);
			curl_setopt($c, CURLOPT_FOLLOWLOCATION, TRUE);
			curl_setopt($c, CURLOPT_HEADER, FALSE);
			curl_setopt($c, CURLOPT_CUSTOMREQUEST, "POST");
			curl_setopt($c, CURLOPT_POST, TRUE);
			curl_setopt($c, CURLOPT_POSTFIELDS, http_build_query($param));

			$data = curl_exec($c);

			print_r(json_decode($data));

			header('location:'.base_url());
		}

		$c = curl_init();
		curl_setopt($c, CURLOPT_URL, "https://alfian99.000webhostapp.com/ci_pkl/api/penjual?id_penjual=$id_penjual");
		curl_setopt($c, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($c, CURLOPT_FOLLOWLOCATION, TRUE);
		curl_setopt($c, CURLOPT_HEADER, FALSE);
		curl_setopt($c, CURLOPT_CUSTOMREQUEST, "GET");

		$data = curl_exec($c);

		$data = array(
			'data' => json_decode($data),
			'page' => 'update'
		);

		$this->load->view('master', $data);
	}

	public function delete()
	{
		$id_penjual = $this->uri->segment(3);

		$c = curl_init();
		curl_setopt($c, CURLOPT_URL, "https://alfian99.000webhostapp.com/ci_pkl/api/penjual/delete?id_penjual=$id_penjual");
		curl_setopt($c, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($c, CURLOPT_FOLLOWLOCATION, TRUE);
		curl_setopt($c, CURLOPT_HEADER, FALSE);
		curl_setopt($c, CURLOPT_CUSTOMREQUEST, "GET");

		$data = curl_exec($c);

		header('location:'.base_url());
	}
}
