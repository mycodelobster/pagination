	public function listing()
	{

		// Inject Custom Filter
		if($this->input->post('formfilter'))
		{
			$base = base_url() . 'user/listing';
			$base .= ($_POST['filterBy']=='false') ? '?filterBy=false' : '?filterBy='.$_POST['filterBy'];
			$base .= ($_POST['orderBy']=='false') ? '&orderBy=false' : '&orderBy='.$_POST['orderBy'];
			redirect($base);
		}

		// If Custom Filter
		if(isset($_GET['filterBy']))
		{
			$base_url = base_url() . 'user/listing/' . "?filterBy=".$_GET['filterBy'] ;
			$base_url .= "&orderBy=" . $_GET['orderBy'];
		}
		else{
			$base_url = base_url() . 'user/listing?filterBy=false&orderBy=false';
		}


		// Custom MYSQL Query
		$query = "SELECT * from users WHERE users.id != 0 ";
		$query .= ($this->input->get('filterBy')=='yes') ? "and users.id > 10 " : '';
		$query .= ($this->input->get('filterBy')=='no') ? "and users.id > 20 " : '';

		$query .= ($this->input->get('orderBy')=='yes') ? "and  users.username like 'a%' " : '';
		$query .= ($this->input->get('orderBy')=='no') ? "and  users.username like 'b%' " : '';



		// Current Page
		$current_page = 0;
		if(isset($_GET['page']))
		{
			$current_page = ($_GET['page']=='')? 0 : $_GET['page'];
		}

		$this->load->library('pagination');
		$config = array(
			'base_url' => $base_url,
			'total_rows' => $this->db->query($query)->num_rows(),
			'per_page' => 10,
			'current' => $current_page,
			'page_query_string' => TRUE,
			//'display_pages' => false,
			'query_string_segment' => 'page'
			);
		$this->pagination->initialize($config);
		// Add Limit
		$query .= " LIMIT ".$config['current'].",".$config['per_page'];

		$this->data['user_listing'] = $this->db->query($query)->result();
		$this->data['template'] = 'user/listing';
		$this->load->view('partials/template', $this->data);

	}
