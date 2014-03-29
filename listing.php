	public function listing()
	{
		$this->load->library('pagination');
		$config = array(
			'base_url' => base_url() . 'user/listing',
			'total_rows' => $this->db->get('users')->num_rows(),
			'per_page' => 10,
			'uri_segment' => 3,
			'current' => $this->uri->segment(3)
			);
		$this->pagination->initialize($config);
		$this->data['user_listing'] = $this->db->get('users',$config['per_page'],$config['current'])->result();
		$this->data['template'] = 'user/listing';
		$this->load->view('partials/template', $this->data);
	}
