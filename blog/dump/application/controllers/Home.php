<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		 $url_author= "https://blog.daydone.com.ng/backend/wp-json/wp/v2/users/1";
		 $data['author']  = json_decode(file_get_contents($url_author), true);
		 $url = "https://blog.daydone.com.ng/backend/wp-json/wp/v2/posts?_embed";
		 $data['posts']  = json_decode(file_get_contents($url), true);
		$this->load->view('home/header',$data);
		$this->load->view('home/home',$data);
		$this->load->view('home/footer',$data);
	}
	

	public function post($id)
	{
		$url = "https://blog.daydone.com.ng/backend/wp-json/wp/v2/posts/".$id."?_embed";
				if($data['post_details'] = json_decode(file_get_contents($url), true)){
				$this->load->view('home/header', $data);
				$this->load->view('home/post', $data);
				$this->load->view('home/footer');
				}
				else{
				header('Location: '.base_url());
				}
		}



	public function page_404()
	{
		$this->load->view('home/header');
		$this->load->view('home/404');
		$this->load->view('home/footer');
	}

	public function search()
	{    
		$url_author= "https://blog.daydone.com.ng/backend/wp-json/wp/v2/users/1";
		$data['author']  = json_decode(file_get_contents($url_author), true);
		$query = str_replace(" ","%20", $_GET['search']);
	    $url = "https://blog.daydone.com.ng/backend/wp-json/wp/v2/posts?search=".$query;
		$data['result']  = json_decode(file_get_contents($url), true);
		$this->load->view('home/header');
		$this->load->view('home/result', $data);
		$this->load->view('home/footer');
	}


	public function categories($id)
	{    
		$url_author= "https://blog.daydone.com.ng/backend/wp-json/wp/v2/users/1";
		$data['author']  = json_decode(file_get_contents($url_author), true);
	    $url = "https://blog.daydone.com.ng/backend/wp-json/wp/v2/posts?categories=".$id;
		$data['result']  = json_decode(file_get_contents($url), true);
		$this->load->view('home/header');
		$this->load->view('home/categories', $data);
		$this->load->view('home/footer');
	}


}
