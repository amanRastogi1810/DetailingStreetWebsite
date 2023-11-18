<?php

class Crm extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('my_model');

        $this->load->library('email');

        $this->load->library('pdf');
    }

    public function index()
    {

        $this->load->view('home');
    }

    public function promotion()
    {
        
        $customer_data = $this->my_model->get_client_contact();

        echo json_encode($customer_data);

        die();
        //print_r($customer_data);

        $today = date('Y-m-d');

        $d2 = date_create($today);

        //  $date_td=date_create($today);
        //echo $date_today =  date_format($date_td,"Y-m-d");

        foreach ($customer_data as $row) {

            $date1 = date_create($row->date);
            $date = date_format($date1, "Y-m-d");

            $vname = $row->vehicle_name;
            $name = $row->name;
            $bdate = $row->date;
            $cid = $row->customer_id;
            $mob = $row->number;
            $vnum = $row->vehicle;
            $package = $row->package;

            $number = $row->date;
            //  echo $today;

            /* $diff = abs(strtotime($today) - strtotime($date));
            $years = floor($diff / (365*60*60*24));
            $months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
            $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
             */
            $d1 = date_create($date);

            $interval = date_diff($d1, $d2);
            $interval->format('%a');
			$curl = curl_init();


			$authentication_key = "213786A8EZYX2C5aec1fbe";

			curl_setopt_array($curl, array(
				CURLOPT_URL => "https://api.msg91.com/api/v2/sendsms",
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_ENCODING => "",
				CURLOPT_MAXREDIRS => 10,
				CURLOPT_TIMEOUT => 30,
				CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				CURLOPT_CUSTOMREQUEST => "POST",
				CURLOPT_POSTFIELDS => "{ \"sender\": \"DTSTRT\", \"route\": \"4\", \"country\": \"91\", \"DLT_TE_ID\": \"1307161717172273219\", \"sms\": [ { \"message\": \"Dear customer, your coated vehicle $vname($vnum) is due for Inspection at DETAILING STREET this week. Please ignore if already visit\", \"to\": [ '8055339991'  } ] }",
				CURLOPT_SSL_VERIFYHOST => 0,
				CURLOPT_SSL_VERIFYPEER => 0,
				CURLOPT_HTTPHEADER => array(
					"authkey: $authentication_key",
					"content-type: application/json",
				),
			));

			$response = curl_exec($curl);
			$err = curl_error($curl);

			curl_close($curl);
print_r($response);
			die();
      if($package=='Silver'){
      	if($interval->days == '182' || $interval->days == '365' ){
			$curl = curl_init();


			$authentication_key = "213786A8EZYX2C5aec1fbe";

			curl_setopt_array($curl, array(
				CURLOPT_URL => "https://api.msg91.com/api/v2/sendsms",
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_ENCODING => "",
				CURLOPT_MAXREDIRS => 10,
				CURLOPT_TIMEOUT => 30,
				CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				CURLOPT_CUSTOMREQUEST => "POST",
				CURLOPT_POSTFIELDS => "{ \"sender\": \"DTSTRT\", \"route\": \"4\", \"country\": \"91\", \"DLT_TE_ID\": \"1307161717172273219\", \"sms\": [ { \"message\": \"Dear customer, your coated vehicle $vname($vnum) is due for Inspection at DETAILING STREET this week. Please ignore if already visit\", \"to\": [ $mob ] } ] }",
				CURLOPT_SSL_VERIFYHOST => 0,
				CURLOPT_SSL_VERIFYPEER => 0,
				CURLOPT_HTTPHEADER => array(
					"authkey: $authentication_key",
					"content-type: application/json",
				),
			));

			$response = curl_exec($curl);
			$err = curl_error($curl);

			$out[] = '{"message:Success","name: ' . $vname . '","ID:' . $cid . '","BookingDate:' . $bdate . '","Car:' . $vname . '","Car Number:' . $vnum . '","Mobile:' . $mob . '"}';
			curl_close($curl);
		}
	  }
      elseif ($package=='Gold'){
		  if($interval->days == '182' || $interval->days == '365' || $interval->days == '547' || $interval->days == '730'){
			  $curl = curl_init();


			  $authentication_key = "213786A8EZYX2C5aec1fbe";

			  curl_setopt_array($curl, array(
				  CURLOPT_URL => "https://api.msg91.com/api/v2/sendsms",
				  CURLOPT_RETURNTRANSFER => true,
				  CURLOPT_ENCODING => "",
				  CURLOPT_MAXREDIRS => 10,
				  CURLOPT_TIMEOUT => 30,
				  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				  CURLOPT_CUSTOMREQUEST => "POST",
				  CURLOPT_POSTFIELDS => "{ \"sender\": \"DTSTRT\", \"route\": \"4\", \"country\": \"91\", \"DLT_TE_ID\": \"1307161717172273219\", \"sms\": [ { \"message\": \"Dear customer, your coated vehicle $vname($vnum) is due for Inspection at DETAILING STREET this week. Please ignore if already visit\", \"to\": [ $mob ] } ] }",
				  CURLOPT_SSL_VERIFYHOST => 0,
				  CURLOPT_SSL_VERIFYPEER => 0,
				  CURLOPT_HTTPHEADER => array(
					  "authkey: $authentication_key",
					  "content-type: application/json",
				  ),
			  ));

			  $response = curl_exec($curl);
			  $err = curl_error($curl);

			  $out[] = '{"message:Success","name: ' . $vname . '","ID:' . $cid . '","BookingDate:' . $bdate . '","Car:' . $vname . '","Car Number:' . $vnum . '","Mobile:' . $mob . '"}';
			  curl_close($curl);
		  }
	  }
	  elseif ($package=='Platinum'){
		  if($interval->days == '182' || $interval->days == '365' || $interval->days == '547' || $interval->days == '730' || $interval->days == '912' || $interval->days == '1095'){
			  $curl = curl_init();


			  $authentication_key = "213786A8EZYX2C5aec1fbe";

			  curl_setopt_array($curl, array(
				  CURLOPT_URL => "https://api.msg91.com/api/v2/sendsms",
				  CURLOPT_RETURNTRANSFER => true,
				  CURLOPT_ENCODING => "",
				  CURLOPT_MAXREDIRS => 10,
				  CURLOPT_TIMEOUT => 30,
				  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				  CURLOPT_CUSTOMREQUEST => "POST",
				  CURLOPT_POSTFIELDS => "{ \"sender\": \"DTSTRT\", \"route\": \"4\", \"country\": \"91\", \"DLT_TE_ID\": \"1307161717172273219\", \"sms\": [ { \"message\": \"Dear customer, your coated vehicle $vname($vnum) is due for Inspection at DETAILING STREET this week. Please ignore if already visit\", \"to\": [ $mob ] } ] }",
				  CURLOPT_SSL_VERIFYHOST => 0,
				  CURLOPT_SSL_VERIFYPEER => 0,
				  CURLOPT_HTTPHEADER => array(
					  "authkey: $authentication_key",
					  "content-type: application/json",
				  ),
			  ));

			  $response = curl_exec($curl);
			  $err = curl_error($curl);

			  $out[] = '{"message:Success","name: ' . $vname . '","ID:' . $cid . '","BookingDate:' . $bdate . '","Car:' . $vname . '","Car Number:' . $vnum . '","Mobile:' . $mob . '"}';
			  curl_close($curl);
		  }
	  }
	  elseif ($package=='Platinum Plus'){
		  if($interval->days == '182' || $interval->days == '365' || $interval->days == '547' || $interval->days == '730' || $interval->days == '912' || $interval->days == '1095' || $interval->days == '1277' || $interval->days == '1460'){
			  $curl = curl_init();


			  $authentication_key = "213786A8EZYX2C5aec1fbe";

			  curl_setopt_array($curl, array(
				  CURLOPT_URL => "https://api.msg91.com/api/v2/sendsms",
				  CURLOPT_RETURNTRANSFER => true,
				  CURLOPT_ENCODING => "",
				  CURLOPT_MAXREDIRS => 10,
				  CURLOPT_TIMEOUT => 30,
				  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				  CURLOPT_CUSTOMREQUEST => "POST",
				  CURLOPT_POSTFIELDS => "{ \"sender\": \"DTSTRT\", \"route\": \"4\", \"country\": \"91\", \"DLT_TE_ID\": \"1307161717172273219\", \"sms\": [ { \"message\": \"Dear customer, your coated vehicle $vname($vnum) is due for Inspection at DETAILING STREET this week. Please ignore if already visit\", \"to\": [ $mob ] } ] }",
				  CURLOPT_SSL_VERIFYHOST => 0,
				  CURLOPT_SSL_VERIFYPEER => 0,
				  CURLOPT_HTTPHEADER => array(
					  "authkey: $authentication_key",
					  "content-type: application/json",
				  ),
			  ));

			  $response = curl_exec($curl);
			  $err = curl_error($curl);

			  $out[] = '{"message:Success","name: ' . $vname . '","ID:' . $cid . '","BookingDate:' . $bdate . '","Car:' . $vname . '","Car Number:' . $vnum . '","Mobile:' . $mob . '"}';
			  curl_close($curl);
		  }
	  }

            break;
        }

    }


    public function forget($value = '')
    {

        $this->load->view('forget');

    }

    public function clientinvoive($ids)
    {
        $ids1 = base64_decode($ids);
        $get_details = $this->my_model->select_invoice_byid($ids1);
        $cmd = $this->my_model->sum_total_amount($ids1);
        $grand_total = $cmd[0]->iteam_price;

		$where_m12 = array('bid' => $get_details[0]->bid);
		$orderby12 = array('bid' => 'ASC');

		$cmd_add = $this->my_model->get_dynamic_wherein('branch', $where_m12, $orderby12);

        /*
        http://crm.detailingstreet.com/assets/stylepdf.css
        http://crm.detailingstreet.com/assets/img/logo-trans.png
         */

        $html_content = '<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>' . $get_details[0]->bill_name . ' | INVOICE NUMBER #' . $ids1 . '</title>
    <link rel="stylesheet" href="http://crm.detailingstreet.com/assets/stylepdf.css" media="all" />
  </head>
  <body>
    <header class="clearfix" style="width:54.5%;" >
      <div id="logo">
        <img src="http://crm.detailingstreet.com/assets/img/logo-trans.png">
      </div>
     <div id="compadny" style=" text-align: right; margin-right: -280 px">
        <h2 class="name">' . $cmd_add[0]->name . '</h2>
        <div>' . $cmd_add[0]->address . ' </div>
        <div>' . $cmd_add[0]->city . ',' . $cmd_add[0]->state . '-' . $cmd_add[0]->pincode . ' </div>
        <div>+91-' . $cmd_add[0]->mobile . ' </div>
        <div><a href="mailto:' . $cmd_add[0]->email . '">' . $cmd_add[0]->email . '</a></div>
        </div>
    </header>
 <hr style="margin-right:10%;">
    <main>
      <div id="details" class="clearfix" style="width:54.5%;">
        <div id="client">
          <div class="to">INVOICE TO:</div>
          <h2 class="name">' . $get_details[0]->bill_name . '</h2>
          <div class="address">' . $get_details[0]->bill_address . '</div>
          <div class="address">' . $get_details[0]->bill_phone . '</div>
          <div class="email"><a href="mailto:' . $get_details[0]->bill_email . '">' . $get_details[0]->bill_email . '</a></div>
        </div>
        <div id="invoice" style="margin-right:5px;">
          <h1 style="font-size:18px;padding:2px;">INVOICE #' . $get_details[0]->invoice_number . '</h1>
          <div class="date">CUSTOMER ID: <span>' . $get_details[0]->customer_id . ' </span></div>
          <div class="date">BOOKING ID: <span>' . $get_details[0]->booking_id . ' </span></div>
          <div class="date">Date of Invoice: <span>' . $get_details[0]->paydate . ' </span></div>

        </div>
      </div>
      <table class="table table-striped" id="tbl_invoice" border="1" cellspacing="0" cellpadding="0" style="width:90%;">
            <thead style="background-color:#c52d2d !important;">
            <tr >
             <th >Booking Date</th>
              <th>Vehicle Type</th>
              <th>Car/Bike Type</th>
              <th>Registration No.</th>
            </tr>
            </thead>
            <tbody>
            <tr>
              <td style="text-align:center;border-top:1px solid #000;">' . $get_details[0]->created_date . '</td>
              <td style="text-align:center;border-top:1px solid #000;">' . $get_details[0]->vehicle . '</td>
              <td style="text-align:center;border-top:1px solid #000;">' . $get_details[0]->vehicle_type . '</td>
              <td style="text-align:center;border-top:1px solid #000;">' . $get_details[0]->vehicle_regno . '</td>
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
              <td style="text-align:center;border-top:1px solid #000;"> ' . $get_details[0]->vehicle_model . '</td>
              <td style="text-align:center;border-top:1px solid #000;">';
        if ($get_details[0]->pay_mode == '') {
            $html_content .= 'Cash';
        } else {
            $html_content .= $get_details[0]->pay_mode;
        }
        $html_content .= '</td>
              <td style="text-align:center;border-top:1px solid #000;"> ' . $get_details[0]->vehicle_color . '</td>
              <td style="text-align:center;border-top:1px solid #000;"> ' . $get_details[0]->coating_studio . '</td>
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
        $count = 1;
        foreach ($get_details as $row) {

            $html_content .= '<tr class="cls_tr_dy" id="1" data-id="trform-1"><td>' . $count++ . '</td>
            <td style="text-align:left;">' . $row->item_name . '</td>
            <td style="text-align:center;">' . $row->item_qty . '</td>
            <td style="text-align:center;">₹ ' . $row->iteam_net_price . '</td>
            <td style="text-align:center;">' . $row->iteam_discount . '</td>
            <td style="text-align:center;">' . $row->item_warranty . '</td>
            <td style="text-align:center;">₹ ' . $row->iteam_price . '</td></tr>';
        }
		$html_content .= '<tr class=""  style="background-color:#e8c58d;border: 0px solid black;" >
           		  <td class="td_blank" > </td>
                  <td class="td_blank" ></td>
                  <td class="td_blank" ></td>
                  <td class="td_blank" ></td>
                  <td class="td_blank" style="background-color:#e8c58d;border: 0px solid black;" >Sub Total</td>
                  <td  class="td_blank" style="background-color:#e8c58d;" ></td>
                  <td class="td_blank" style="background-color:#e8c58d;" >₹';
		$html_content .= $grand_total;
		$html_content .= '</td>
        </tr>';
		$html_content .= '<tr   >
		          <td class="td_blank"  ></td>
                  <td class="td_blank" ></td>
                  <td class="td_blank" ></td>
                  <td class="td_blank" ></td>

                  <td class="td_blank" style="background-color:#e8c58d;"  >SGST</td>
                  <td class="td_blank" style="text-align:center;background-color:#e8c58d;" >' . $get_details[0]->sgst . ' % </td>
                  <td class="td_blank" style="background-color:#e8c58d;" >₹';
		$cal_sgst = (((float) $grand_total) * ((float) $get_details[0]->sgst)) / 100;
		$html_content .= $cal_sgst;
		$html_content .= '</td>
        </tr>';
		$html_content .= '<tr  >
		          <td class="td_blank" ></td>
                  <td class="td_blank" ></td>
                  <td class="td_blank" ></td>
                  <td class="td_blank" ></td>
                  <td class="td_blank" style="background-color:#e8c58d;"  >CGST</td>
                  <td class="td_blank" style="text-align:center;background-color:#e8c58d;" >' . $get_details[0]->cgst . ' % </td>
                  <td class="td_blank" style="background-color:#e8c58d;" >₹';
		$cal_cgst = (((float) $grand_total) * ((float) $get_details[0]->cgst)) / 100;
		$html_content .= $cal_cgst;
		$html_content .= '</td>
        </tr>';
		$html_content .= '<tr  >
                  <td class="td_blank" ></td>
                  <td class="td_blank" ></td>
                  <td class="td_blank"  ></td>
                  <td class="td_blank" ></td>
                  <td class="td_blank" style="background-color:#e8c58d;"  >IGST</td>
                  <td class="td_blank" style="text-align:center;background-color:#e8c58d;" >' . $get_details[0]->igst . ' % </td>
                  <td class="td_blank" style="background-color:#e8c58d;" >₹';
		$cal_igst = (((float) $grand_total) * ((float) $get_details[0]->igst)) / 100;
		$html_content .= $cal_igst;
		$html_content .= '</td>
        </tr>';
		$html_content .= '<tr class="cls_tr_dy" id="1" data-id="trform-1" style="background-color:#e8c58d;" >
            	  <td class="td_blank" ></td>
                  <td class="td_blank" ></td>
                  <td class="td_blank" ></td>
                  <td class="td_blank" ></td>
                  <td class="td_blank" style="font-size:15px;background-color:#e8c58d;border:1px; solid #000;"> Grand Total </td>
                  <td class="td_blank" style="background-color:#e8c58d;" > </td>
                  <td class="td_blank" style="background-color:#c52d2d;color:#fff;font-size:15px;font-weight:700px;">₹';
		$grand = ((float) $cal_cgst) + ((float) $cal_sgst) + ((float) $cal_igst) + ((float) $grand_total);
		$html_content .= $grand;
		$html_content .= '</td>
        </tr>';
		$html_content .= '</tbody></table><div id="thanks">Thank you!</div><div id="notices">
        <div>NOTICE:</div>
        <div class="notice" style="width:90%;">All rates are inclusive of taxes. T&C Apply**
<br> Thank You for visiting our coating studio.</div>
      	</div>
    </main>
    <footer style="width:90%;" >
      Invoice was created on a computer and is valid without the signature and seal.
    </footer>
  </body>
</html>';

        if ($this->uri->segment(3)) {
            $customer_id = $this->uri->segment(3);

            $this->pdf->loadHtml($html_content);
            $this->pdf->render();
            $this->pdf->stream("" . $ids1 . ".pdf", array("Attachment" => 1));
        }
    }

    public function login()
    {
        if ($this->session->userdata('username') != '') {

            redirect(base_url() . 'user');

        } else {

            $this->load->view('login');

        }

    }

    public function login_validation()
    {

        $data = array('success' => false, 'messages' => array());

        $this->form_validation->set_rules("membership_id", "Membership ID12", "trim|required");

        $this->form_validation->set_rules("password", "Password", "trim|required");

        $this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');

        if ($this->form_validation->run()) {

            $data['success'] = true;

            //$data['messages'] = $_POST['membership_id'];

            $membership_id = $this->input->post('membership_id');

            $password = $this->input->post('password');

            if ($this->my_model->login_model($membership_id, $password)) {

                $session_data = array('username' => $membership_id);

                $this->session->set_userdata($session_data);

                $data['messages'] = '1';

                //redirect(base_url().'user/home');

            } else {

                $data['messages'] = '0';

                // $this->session->set_flashdata('error','Invalid username and password');

            }

        } else {

            foreach ($_POST as $key => $value) {

                $data['messages'][$key] = form_error($key);

            }

        }

        echo json_encode($data);

    }

    public function check_session()
    {

        if ($this->session->userdata('username') != '') {

            redirect(base_url() . 'user');

        } else {

            redirect(base_url() . 'crm/login');

        }

    }

    public function logout()
    {

        $this->session->unset_userdata('username');

        redirect(base_url() . 'crm/login');

    }

}
