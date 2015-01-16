<?php
class Gayatin_model extends CI_Model{

	public function login_check($user,$pass){
		$this->db->where('username',$user);
		$this->db->where('password',$pass);
		$res=$this->db->get('user');
		return $res->row_array();
	}

	public function add_user($data){
		$this->db->insert('user',$data);
	}

	public function get_users($id){
		$this->db->where('id',$id);
		$us = $this->db->get('user');
		return $us->result();
	}

	// public function code_check($user,$code){
	// 	$this->db->where('STATUS LIKE BINARY',$code);
	// 	$this->db->where('USERNAME',$user);
	// 	$d=$this->db->get('user');
	// 	return $d->row_array();
	// }

	// public function update_status($data,$user,$code){
	// 	$this->db->where('STATUS',$code);
	// 	$this->db->where('USERNAME',$user);
	// 	$this->db->update('user',$data);
	// }

	// public function update_image($data,$user){
	// 	$this->db->where('USERNAME',$user);
	// 	$this->db->update('user',$data);
	// }

	// public function delete_user($user){
	// 	$this->db->where('USERNAME',$user);
	// 	$this->db->delete('user');
	// }

	public function get_profile(){
		$res = $this->db->get('patients');
		return $res->result();
	}

	public function get_profile_info($id){
		$this->db->select('*');
		$this->db->from('patients');
		$this->db->where('id',$id);
		$res = $this->db->get();
		return $res->result();
	}

	public function get_allergy_info($id){
		$this->db->select('*');
		$this->db->from('allergies');
		$this->db->where('patientid',$id);
		$res = $this->db->get();
		return $res->result();
	}

	public function get_drugstaken_info($id){
		$this->db->select('*');
		$this->db->from('drugstaken');
		$this->db->where('patientid',$id);
		$res = $this->db->get();
		return $res->result();
	}

	public function get_chronicailments_info($id){
		$this->db->select('*');
		$this->db->from('chronicailments');
		$this->db->where('patientid',$id);
		$res = $this->db->get();
		return $res->result();
	}

	public function add_patient($data){
		$this->db->insert('patients',$data);
		return $this->db->insert_id();
	}

	public function add_allergies($data){
		$this->db->insert('allergies',$data);
	}

	public function add_drugstaken($data){
		$this->db->insert('drugstaken',$data);
	}

	public function add_chronicailment($data){
		$this->db->insert('chronicailments',$data);
	}

	public function update_patient($data,$id){
		$this->db->where("id",$id);
		$this->db->update("patients",$data);
	}

	public function update_allergy($data,$id){
		$this->db->where("id",$id);
		$this->db->update("allergies",$data);
	}

	public function update_drugstaken($data,$id){
		$this->db->where("id",$id);
		$this->db->update("drugstaken",$data);
	}

	public function update_chronicailments($data,$id){
		$this->db->where("id",$id);
		$this->db->update("chronicailments",$data);
	}

	public function check_patient($data){
		$this->db->where(array('firstname'=>$data['firstname'], 'lastname'=>$data['lastname'], 'middlename'=>$data['middlename']));
		$query = $this->db->get('patients');
		if($query->num_rows()>0){
			return 1;
		}
		else{
			return 0;
		}
	}

	public function check_staff($data){
		$this->db->where(array('firstname'=>$data['firstname'], 'lastname'=>$data['lastname']));
		$query = $this->db->get('user');
		if($query->num_rows()>0){
			return 1;
		}
		else{
			return 0;
		}
	}

	public function check_username($data){
		$this->db->where('username',$data['username']);
		$query = $this->db->get('user');
		if($query->num_rows()>0){
			return 1;
		}
		else{
			return 0;
		}
	}

	public function get_staffs($id){
		$res = $this->db->query("SELECT * FROM (`user`) WHERE `id` != $id");
		return $res->result();
	}

	public function check_password($op,$sid){
		$this->db->where(array('password'=>$op, 'id'=>$sid));
		$query = $this->db->get('user');
		if($query->num_rows()>0){
			return 1;
		}
		else{
			return 0;
		}
	}

	public function update_staff($data,$id){
		$this->db->where('id',$id);
		$this->db->update('user',$data);
	}

	public function delete_staff($id){
		$this->db->where('id',$id);
		$this->db->delete('user');
	}
}

?>