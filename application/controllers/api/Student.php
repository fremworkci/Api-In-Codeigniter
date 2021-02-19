<?php

require APPPATH."libraries/REST_Controller.php";

class Student extends REST_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model("api/Student_model");
	}
	function index_post()   //for insert
	{
		$data=json_decode(file_get_contents("php://input"));
		$name=$data->name;
		$email=$data->email;
		$password=$data->password;
		$mobile=$data->mobile;
		if(!empty($name) && !empty($email) && !empty($password) && !empty($mobile)) //check all field not empty
		{
			$student=array(
				"name"=>$name,
				"email"=>$email,
				"password"=>$password,
				"mobile"=>$mobile
			);
			$qry=$this->Student_model->insert_data($data);
			$this->response(array(
				"status"=>1,
				"message"=>"Data Insert"
			),REST_Controller::HTTP_OK);
		}
		else
		{
			$this->response(array(
				"status"=>0,
				"message"=>"All Fields Are Required"
			),REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
		}
	}

	function index_put()   //for update
	{
		$data=json_decode(file_get_contents("php://input"));
		$id=$data->id;
		$student=array(
			"name"=>$data->name,
			"email"=>$data->email,
			"password"=>$data->password,
			"mobile"=>$data->mobile
		);
		$qry=$this->Student_model->update_data($student,$id);
		if($qry)
		{
			$this->response(array(
				"status"=>1,
				"message"=>"Student Record Update",
				"data"=>$qry
			),REST_Controller::HTTP_OK);
		}
	}

	function index_delete()   //for delete
	{
		$data=json_decode(file_get_contents("php://input"));
		$id=$data->id;
		$qry=$this->Student_model->delete_data($id);
		if($qry)
		{
			$this->response(array(
				"status"=>1,
				"message"=>"Student Record Delete",
				"data"=>$qry
			),REST_Controller::HTTP_OK);
		}
	}

	function index_get()   //for get
	{
		if(@$id=$_REQUEST["id"])  //show single record  done himself
		{
			$qry=$this->Student_model->getdata(array("id"=>$id));
			if(count($qry) > 0)
			{
				$this->response(array(
					"status"=>1,
					"message"=>"Student Record Found",
					"data"=>$qry 
				),REST_Controller::HTTP_OK);
			}
			else
			{
				$this->response(array(
					"status"=>0,
					"message"=>"Not Student Record Found",
					"data"=>$qry
				),REST_Controller::HTTP_NOT_FOUND);
			}
		}
		else  //show all record
		{
			$qry=$this->Student_model->getdata();
			//echo json_encode($qry);
			if(count($qry) > 0)
			{
				$this->response(array(
					"status"=>1,
					"message"=>"Student Record Found",
					"data"=> $qry
				),REST_Controller::HTTP_OK);
			}
			else
			{
				$this->response(array(
					"status"=>0,
					"message"=>"Not Student Record Found",
					"data"=>$qry
				),REST_Controller::HTTP_NOT_FOUND);
			}
		}
	}
}
?>