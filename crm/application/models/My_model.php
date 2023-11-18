<?php

class My_Model extends CI_Model
{

	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}


	public function get_data($table)
	{
		$cmd = $this->db->select('*')->get($table)->result();
		return $cmd;
	}


	public function get_data_single($table)
	{
		$cmd = $this->db->select('*')->get($table)->row_array();
		return $cmd;
	}
	
	
	public function get_dynamic_wherein($table,$where = array(),$orderby)
	{
		if(count($where)>0)
		{
			foreach($where as $key=>$val)
			$this->db->where_in($key, $val);
		}

		if(count($orderby)>0) {
				foreach($orderby as $keyu=>$valu)
				$this->db->order_by($keyu, $valu);
			}
		
		$cmd = $this->db->select('*')->get($table)->result();
		return $cmd;
	}

	public function default_reporting()
	{

		$query = $this->db->select('*')
			->from('booking')
			->join('customer','booking.customer_id = customer.customer_id')
			->join('invoice','booking.booking_id = invoice.booking_id')
			->get();
		return $query->result();
	}

	public function get_reporting($col,$val)
	{
				 
				$query = $this->db->select('*')
		 					->from('booking')
		 					->join('customer','booking.customer_id = customer.customer_id')
					        ->join('invoice','booking.booking_id = invoice.booking_id');

		if($col=='number'){
		   $query=$query->like('customer.number',$val)
			            ->get();
		}
		if($col=='email'){
			$query=$query->like('customer.email',$val)
				->get();
		}
		if($col=='vehicle'){
			$query=$query->like('booking.vehicle',$val)
				->get();
		}


	 
		 return $query->result();
	}

	public function get_user_details()
	{
		$cmd = $this->db->select('*')->where('user_type !=','0')->where('type !=','superadmin')->get('admin_login')->result();
		return $cmd;
	}

	 function get_model_info($data_all) {
        $query = $this->db->query("SELECT * FROM module WHERE mid = ?", array($data_all));
        return $query->row_array();
    }

    public function get_user_in($data_all)
	{

		$cmd = $this->db->select('*')->where_in('mid',$data_all)->get('module')->result();
		return $cmd;
	}
    

	public function get_today_follow($table,$value)
	{
		date_default_timezone_set('Asia/Kolkata');
		$date = date('Y-m-d');
		$cmd = $this->db->select('*')->from($table)->where('follow_up_date',$date)->where('status','1')->get();
		return $cmd->result();
	}

	public function get_today_follow_br($table,$value,$bid)
	{
		date_default_timezone_set('Asia/Kolkata');
		$date = date('Y-m-d');
$cmd = $this->db->select('*')->from($table)->where('follow_up_date',$date)->where('status','1')->where('bid',$bid)->get();
		return $cmd->result();
	}

    public function get_miss_follow($table,$value)
	{
		date_default_timezone_set('Asia/Kolkata');
		$date = date('Y-m-d');
		$cmd = $this->db->select('*')->from($table)
			->where('follow_up_date <',$date)
			->where('status','1')
			->order_by('follow_up_date','DESC')
			->get();
		return $cmd->result();
	}

	public function get_miss_follow_br($table,$value,$bid)
	{
		date_default_timezone_set('Asia/Kolkata');
		$date = date('Y-m-d');
		$cmd = $this->db->select('*')->from($table)->where('follow_up_date <',$date)->where('status','1')->where('bid',$bid)->get();
		return $cmd->result();
	}

	public function get_table_by_column($table,$column,$id)
	{
		$cmd= $this->db->select('*')->from($table)->where($column, $id)->get();
		return $cmd->result();
	}

	public function get_booking_invoice($bid = null)
	{
		$query = $this->db->query('SELECT booking_id FROM invoice');
		$array=array();
		foreach ($query->result_array() as $row)
		  {
		        array_push($array,$row['booking_id']);
		  }

		if($bid==null) {
			$query1 = $this->db->select('*')
				->from('booking')
				->where_not_in('booking_id', $array)
				->get();
		}
		else{
			$query1 = $this->db->select('*')
				->from('booking')
				->where('bid', $bid)
				->where_not_in('booking_id', $array)
				->get();

		}
         return $query1->result();

        // SELECT * FROM booking WHERE booking_id NOT IN (SELECT booking_id FROM invoice)
	}

	public function get_client_contact()
	{

		// $cmd= $this->db->select('*')->from($table)->where($column, $id)->get();

		 $query = $this->db->select('booking.date,booking.vehicle,booking.vehicle_name,booking.package,customer.customer_id,customer.number,customer.name,customer.email')
		 					->from('booking')
		 					->join('customer','booking.customer_id = customer.customer_id')
		 					->get();  	
         return $query->result();
	}

	public function get_client_details($bid)
	{

		// $cmd= $this->db->select('*')->from($table)->where($column, $id)->get();

		 $query = $this->db->select('booking.*,customer.*')
		 					->from('booking')
		 					->join('customer','booking.customer_id = customer.customer_id')
		 					->where('booking.booking_id',$bid)
		 					->get();  	
         return $query->result();
	}

	public function get_client($sno)
	{

		 $query = $this->db->select('*')
		 					->from('booking')
		 					->join('customer','booking.customer_id = customer.customer_id')
			                ->join('invoice','booking.booking_id = invoice.booking_id')
		 					->where('booking.sno',$sno)
		 					->get();  	
         return $query->result();
	}

	public function get_client_booking($sno)
	{

		$query = $this->db->select('*')
			->from('booking')
			->join('customer','booking.customer_id = customer.customer_id')
			->where('booking.sno',$sno)
			->get();
		return $query->result();
	}



	public function delete_fun($table,$bind)
	{
		
		$cmd = $this->db->delete($table,$bind);

		return $cmd;
	}

	public function login_model($membership_id,$password)

	{



		$query = $this->db->select('*')->where(['username'=>$membership_id,'password'=>$password])->get('admin_login');

	/*	$this->db->where('username',$membership_id);

		$this->db->where('password',$password);*/



	//	$query = $this->get('admin_login')->result();



		/*print_r($query);*/

		if ($query->num_rows() > 0) {

			return true;

		}

		else

		{

			return false;

		}

	}



	public function get_customer_data($mid)
	{

		$cmd = $this->db->select('*')->where('customer_id',$mid)->get('customer')->result();
		return $cmd;

	}



	public function get_customer()
	{

		$cmd = $this->db->select('*')->get('customer')->result();
		return $cmd;

	}

	public function get_booking()
	{

		$cmd = $this->db->select('*')->get('booking')->result();
		return $cmd;
	}

	public function select_invoice()
	{
		$cmd = $this->db->select('*')->group_by('invoice_number')->get('invoice')->result();

		return $cmd;
	}

	public function select_invoice_br($bid)
	{
		$cmd = $this->db->select('*')->where('bid',$bid)->group_by('invoice_number')->get('invoice')->result();

		return $cmd;
	}


	public function select_invoice_bid($bid)
	{
		$cmd = $this->db->select('*')->where('booking_id',$bid)->get('invoice')->result();
		return $cmd;
	}

	public function select_branch_invoice_byid($ids)
	{
		$cmd = $this->db->select('*')->where('invoice_number',$ids)->get('invoice')->result();
		return $cmd;
	}

	public function select_invoice_byid($ids)
	{
		$cmd = $this->db->select('*')->where('invoice_number',$ids)->get('invoice')->result();
		return $cmd;
	}

	public function sum_total_amount($ids)
	{
		  $this->db->select_sum('iteam_price');
    $this->db->from('invoice');
    $this->db->where('invoice_number',$ids);
    $cmd = $this->db->get()->result();

    return $cmd;
	}

 
   

	public function select_invoice_pdf_byid($ids)
	{
		$cmd = $this->db->select('*')->where('invoice_number',$ids)->get('invoice')->result();

		$html_content =  '
 <hr style="margin-right:10%;">
    <main>
      <div id="details" class="clearfix" style="width:54.5%;">
        <div id="client">
          <div class="to">INVOICE TO:</div>
          <h2 class="name">'.$cmd[0]->bill_name.'</h2>
          <div class="address">'.$cmd[0]->bill_address.'</div>
          <div class="address">'.$cmd[0]->bill_phone.'</div>
          <div class="email"><a href="mailto:'.$cmd[0]->bill_email.'">'.$cmd[0]->bill_email.'</a></div>
        </div>
        <div id="invoice" style="margin-right:5px;">
          <h1 style="font-size:18px;padding:2px;">INVOICE #'.$cmd[0]->invoice_number.'</h1>
          <div class="date">CUSTOMER ID: <span>'.$cmd[0]->customer_id.' </span></div>
          <div class="date">BOOKING ID: <span>'.$cmd[0]->booking_id.' </span></div>
          <div class="date">Date of Invoice: <span>'.$cmd[0]->paydate.' </span></div>
          
        </div>
      </div>
      <table class="table table-striped" id="tbl_invoice" border="1" cellspacing="0" cellpadding="0" style="width:90%;">	
            <thead style="background-color:#c52d2d !important;">
            <tr >
             <th >Payment Date</th>
              <th>Vehicle Type</th>
              <th>Car/Bike Type</th>
              <th>Registration No.</th>
            </tr>
            </thead>
            <tbody>
            <tr>
              <td style="text-align:center;border-top:1px solid #000;">'.$cmd[0]->paydate.'</td>
              <td style="text-align:center;border-top:1px solid #000;">'.$cmd[0]->vehicle.'</td>	
              <td style="text-align:center;border-top:1px solid #000;">'.$cmd[0]->vehicle_type.'</td>
              <td style="text-align:center;border-top:1px solid #000;">'.$cmd[0]->vehicle_regno.'</td>
            </tr>
            </tbody>
          </table>
              <table class="table table-striped" id="tbl_invoice" border="1" cellspacing="0" cellpadding="0" style="width:90%;">	
            <thead style="background-color:#c52d2d !important;">
            <tr >
             <th >Vehicle Model</th>
              <th>Payment Mode</th>
              <th>Vehicle Color</th>
              <th>Coating Studio</th>
            </tr>
            </thead>
            <tbody>
            <tr>
              <td style="text-align:center;border-top:1px solid #000;"> '.$cmd[0]->vehicle_model.'</td>
              <td style="text-align:center;border-top:1px solid #000;">';
              if($cmd[0]->pay_mode=='') {
            		 $html_content .= 'CASH';
              }
              else
              { 
              		$html_content .=  $cmd[0]->pay_mode;
              }
              $html_content .=  '</td>	
              <td style="text-align:center;border-top:1px solid #000;"> '.$cmd[0]->vehicle_color.'</td>
              <td style="text-align:center;border-top:1px solid #000;"> '.$cmd[0]->coating_studio.'</td>
            </tr>
            </tbody>
          </table>
      <table class="table table-striped" id="tbl_invoice" border="1" cellspacing="0" cellpadding="0" style="width:90%;">	
            <thead>
            <tr>
              <th>#</th>
              <th>Item &amp; Description</th>
              <th>Qty</th>
              <th>Rate</th>
              <th>Tax %</th>
              <th>Warranty</th>
              <th>Amount</th>
            </tr>
            </thead>
            <tbody id="tbl_body">';

foreach ($cmd as $row) {

	$html_content .=  '<tr class="cls_tr_dy" id="1" data-id="trform-1"><td>1</td>
            <td style="text-align:left;">'.$row->item_name.'</td>
            <td style="text-align:center;">'.$row->item_qty.'</td>
            <td style="text-align:center;"><img src="http://crm.detailingstreet.com/assets/img/money.png" width="7px" /> '.$row->iteam_net_price.'</td>
            <td style="text-align:center;">'.$row->iteam_discount.'</td>
            <td style="text-align:center;">'.$row->item_warranty.'</td>
            <td style="text-align:center;"><img src="http://crm.detailingstreet.com/assets/img/money.png" width="7px" /> '.$row->iteam_price.'</td></tr>';
}
$html_content .= '<tr class="cls_tr_dy" id="1" data-id="trform-1">
            <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td style="background-color:#c52d2d;color:#fff;font-size:18px;font-weight:700px;">Total</td>
                  <td style="background-color:#fff;color:#000;font-size:18px;font-weight:700px;"><img src="http://crm.detailingstreet.com/assets/img/money.png" width="10px" /> 10000000</td>
        </tr></tbody></table><div id="thanks">Thank you!</div><div id="notices">
        <div>NOTICE:</div>
        <div class="notice">A finance charge of 1.5% will be made on unpaid balances after 30 days.</div>
      	</div>
    </main>
    <footer>
      Invoice was created on a computer and is valid without the signature and seal.
    </footer>
  </body>
</html>';

return $html_content;
	}

	public function get_booking_limit()
	{

		$cmd = $this->db->select('*')->order_by('sno','DESC')->limit('1')->get('booking')->result();
		return $cmd;
	}



	public function insert_customer($bind)

	{

		$cmd = $this->db->insert("customer",$bind);

		return $cmd;

	}



	public function insert_booking($bind)

	{

		$cmd = $this->db->insert("booking",$bind);

		return $cmd;

	}

		public function get_dynamic_where($table,$where = array())
	{
		 if(count($where)>0)
		{
			foreach($where as $key=>$val)
			$this->db->where($key, $val);
		}
		
		$cmd = $this->db->select('*')->get($table)->result();
		return $cmd;
	}

	public function insert_invoice($bind)
	{

		//print_r($bind);
		$cmd = $this->db->insert("invoice",$bind);

		return $cmd;

	}

	public function update_invoice($bind){
		//print_r($bind);
		$cmd = $this->db->replace("invoice",$bind);

		return $cmd;

	}


	public function insert_dynamic($table,$bind)
	{
		 
		$cmd = $this->db->insert($table,$bind);

		return $cmd;

	}

	public function insert_query($bind)
	{

		$cmd = $this->db->insert("query",$bind);

		return $cmd;

	}


	public function update_customer($table,$column,$bind,$id)
	{
		 
		//echo '$this->db->where($column, $id)->update($table, $bind)';

		$cmd= $this->db->where($column, $id)->update($table, $bind);
		return $cmd;
	}

	public function insert_appointment($bind)
	{

		$cmd = $this->db->insert("appointment",$bind);

		return $cmd;

	}


}



?>
