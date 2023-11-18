<?php
class User extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('my_model');
        $this->load->library('email');
        $this->load->library('pdf');
        if (!$this->session->userdata('username')) {
            return redirect(base_url() . 'crm/login');
        }

    }

    public function index()
    {
        $this->load->view('admin/home');
    }

    public function home()
    {
        $this->load->view('admin/home');
    }

    public function dashboard()
    {
        $this->load->view('admin/home');
    }

    public function pricing()
    {
        $this->load->view('admin/pricing');
    }

    public function new_booking()
    {
        $this->load->view('admin/new_booking');
    }

    public function role()
    {
        $data = array();
        $data['branch'] = $this->my_model->get_data('branch');
        $data['module'] = $this->my_model->get_data('module');
        $data['admin_role'] = $this->my_model->get_data('user_role');
        $data['admin'] = $this->my_model->get_user_details();

        $this->load->view('admin/role', ['info' => $data]);
    }

    public function users()
    {
        $data = array();
        $data['branch'] = $this->my_model->get_data('branch');
        $data['admin'] = $this->my_model->get_user_details();

        $this->load->view('admin/users', ['info' => $data]);
    }

    public function branch()
    {
        $data = array();
        $data['branch'] = $this->my_model->get_data('branch');
        $this->load->view('admin/branch', ['info' => $data]);

    }

    public function booking_list()
    {
        $data = array();
        $data['booking'] = $this->my_model->get_data('booking');
        $data['booking_invoice'] = $this->my_model->get_booking_invoice();
        $this->load->view('admin/booking_list', ['info' => $data]);
    }

    public function invoice_list()
    {
        $data = array();
        $data['invoice'] = $this->my_model->select_invoice();
        $this->load->view('admin/invoice_list', ['info' => $data]);
    }

    public function reporting()
    {
        $data = array();
        $data['invoice'] = $this->my_model->select_invoice();
        $this->load->view('admin/reporting', ['info' => $data]);
    }

    public function invoice()
    {
        $data = array();

        $data['booking'] = $this->my_model->get_data('booking');

        $this->load->view('admin/invoice', ['info' => $data]);

    }

    public function invoice_update()
    {

        $data = array();
        $data['booking'] = $this->my_model->get_data('booking');
        $this->load->view('admin/invoice-update', ['info' => $data]);

    }

    public function query_list()
    {
        $data = array();
        $data['query'] = $this->my_model->get_data('query');
        $this->load->view('admin/query_list', ['info' => $data]);
    }

    public function profile()
    {
        $this->load->view('admin/profile');
    }

    public function new_query()
    {
        $this->load->view('admin/new_query');
    }

    public function get_booking_byid()
    {

        $bid = $_POST['bid'];
        $table = 'booking';
        $column = 'booking_id';

        $cmd = $this->my_model->get_client_details($bid);

        $num = count($cmd);
        if ($num > 0) {
            echo json_encode($cmd);
        } else {
            echo '{"error":"1"}';
        }

    }

    public function get_query_byid()
    {

        $qid = $_POST['qid'];
        $table = 'query';
        $column = 'sno';

        $cmd = $this->my_model->get_table_by_column($table, $column, $qid);
        echo json_encode($cmd);

    }

    public function get_query_details()
    {

        $qid = $_POST['sno'];
        $table = 'query';
        $column = 'sno';

        $cmd = $this->my_model->get_table_by_column($table, $column, $qid);
        echo json_encode($cmd);

    }

    public function followup()
    {
        $data = array();
        $table = 'query';
        $value = date('Y-m-d');
        $data['today'] = $this->my_model->get_today_follow($table, $value);
        $data['missed'] = $this->my_model->get_miss_follow($table, $value);
        $data['all'] = $this->my_model->get_data($table);
        $this->load->view('admin/followup', ['info' => $data]);
    }

    public function report()
    {

        error_reporting(0);
        $col = $_POST['search_col'];
        $val = $_POST['search_txt'];

        if ($col != '' && $val != '') {

            $data = $this->my_model->get_reporting($col, $val);

        } else {

            $data = $this->my_model->default_reporting();
        }

        $i = 1;
        foreach ($data as $key => $value) {

            $cmd = $this->my_model->get_table_by_column('branch', 'bid', $value->bid);
			$base_64 = base64_encode($value->invoice_number);
			$url_param = rtrim($base_64, '=');

            echo '<tr>';
            echo '<td>' . $i++ . '</td>';
            echo '<td>' . $value->name . '</td>';
            echo '<td>' . $value->number . '</td>';
            echo '<td>' . $value->email . '</td>';
            echo '<td>' . $cmd[0]->name . '</td>';
            echo '<td>' . $value->booking_id . '</td>';
            echo '<td>' . $value->customer_id . '</td>';
            echo '<td><a href="javascript:void(0);" title="View" data-toggle="modal" data-target="#myModal" id="' . $value->customer_id . '" data-sno=' . $value->sno . '    id="' . $value->customer_id . '" class="cls_more" ><i class="fa fa-eye"></i></a> | <a href="'.base_url().'user/clientinvoive/'.$url_param.'" target="_blank" ><i class="fa fa-file-pdf-o"></i> </a>  </td>';
            echo '</tr>';
        }

        /*    print_r($data);
        exit();*/
        //$this->load->view('admin/followup',['info'=>$data]);
    }

    public function get_client_by_bk()
    {
        $sno = $this->input->post('sno');
        $cmd = $this->my_model->get_client($sno);
        echo json_encode($cmd);
    }

	public function get_client_by_bk_booking()
	{
		$sno = $this->input->post('sno');
		$cmd = $this->my_model->get_client_booking($sno);
		echo json_encode($cmd);
	}
    public function get_branch_by_id()
    {

        $id = $this->input->post('bid');
        $column = 'bid';
        $table = 'branch';
        $cmd = $this->my_model->get_table_by_column($table, $column, $id);
        echo json_encode($cmd);
    }

    public function get_user_by_id()
    {

        $id = $this->input->post('bid');
        $column = 'sno';
        $table = 'admin_login';
        $cmd = $this->my_model->get_table_by_column($table, $column, $id);
        echo json_encode($cmd);
    }

    public function invoice_details($ids)
    {
        $ids1 = base64_decode($ids);
        $data = array();
        $data['invoice'] = $this->my_model->select_invoice_byid($ids1);
        $this->load->view('admin/invoice_details', ['info' => $data]);
    }

    // user role ---

    public function add_user_role()
    {

        $data = array('success' => false, 'messages' => array());

        $this->form_validation->set_rules('userid', ' Select', 'required');
        $this->form_validation->set_rules('user', ' user', 'required');

        $this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');

        if ($this->form_validation->run()) {

            $user = $this->input->post('user');
            $userid = $this->input->post('userid');

            $check_module = $this->input->post('module');
            $check_data = implode(",", $check_module);

            if (count($check_module) > 0) {
                $table = 'user_role';
                $bind = array(
                    'mid' => $check_data,
                    'uid' => $userid,
                );
                $where = array('uid' => $userid);
                $check_data1 = $this->my_model->get_dynamic_where($table, $where);

                if (count($check_data1) > 0) {
                    $data = array('success' => false, 'messages' => array('record' => 1));
                } else {
                    $cmd_rt = $this->my_model->insert_dynamic($table, $bind);
                    $data = array('success' => true, 'messages' => $cmd_rt);
                }

            } else {
                $data = array('success' => false, 'messages' => array('user' => '', 'user_type' => '', 'check_module' => '<p class="text-danger">At least one module is required.</p>'));
            }

        } else {
            foreach ($_POST as $key => $value) {
                $data['messages'][$key] = form_error($key);
            }
        }

        echo json_encode($data);
    }

    public function clientinvoive($ids)
    {
        $ids1 = base64_decode($ids);
        $get_details = $this->my_model->select_invoice_byid($ids1);
        $cmd = $this->my_model->sum_total_amount($ids1);

        $where_m = array('branch' => $get_details[0]->bid);
        $orderby1 = array('sno' => 'ASC');

        $cmd_gst = $this->my_model->get_dynamic_wherein('admin_login', $where_m, $orderby1);

        $where_m12 = array('bid' => $get_details[0]->bid);
        $orderby12 = array('bid' => 'ASC');

        $cmd_add = $this->my_model->get_dynamic_wherein('branch', $where_m12, $orderby12);

        /*    echo "<pre>";
        //echo $get_details[0]->bid;
        print_r($cmd_add[0]);
        die();*/

        $grand_total = $cmd[0]->iteam_price;

/* http://crm.detailingstreet.com/assets/stylepdf.css
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
	  	<img height="100%" src="http://crm.detailingstreet.com/assets/img/logo-trans.jpg">
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
          <div class="date">GST -: <span>' . $cmd_gst[0]->company_gst_no . ' </span></div>
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

            $html_content .= '<tr class="cls_tr_dy" id="1" data-id="trform-1" class="td_blank" ><td>' . $count++ . '</td>
            <td style="text-align:left;">' . $row->item_name . '</td>
            <td style="text-align:center;">' . $row->item_qty . '</td>
            <td style="text-align:center;">₹ ' . $row->iteam_net_price . '</td>
            <td style="text-align:center;">' . $row->iteam_discount . '</td>
            <td style="text-align:center;">' . $row->item_warranty . '</td>
            <td style="text-align:right;">₹ ' . $row->iteam_price . '</td></tr>';
        }

/*$html_content .= '<tr class="cls_tr_dy" id="1" data-id="trform-1" style="background-color:#e8c58d;" >
<td  class="td_blank" ></td>
<td class="td_blank" ></td>
<td class="td_blank" ></td>
<td class="td_blank" ></td>
<td  class="td_blank" ></td>
<td class="td_blank" ></td>
<td  class="td_blank" >';
$html_content .=  '';
$html_content .= '</td>
</tr>';*/

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
            $this->pdf->stream("" . $customer_id . ".pdf", array("Attachment" => 0));
        }
    }

    // add branch

    public function add_user()
    {
        $data = array('success' => false, 'messages' => array());

        $this->form_validation->set_rules("name", "Name", "trim|required|alpha_numeric_spaces");
        $this->form_validation->set_rules("email", "Email", "trim|required|valid_email");
        $this->form_validation->set_rules("phone", "Phone", "trim|required|numeric|max_length[10]");
        $this->form_validation->set_rules("branch", "Branch", "trim|required");

        $this->form_validation->set_rules("password", "Password", "trim|required|max_length[10]");
        $this->form_validation->set_rules("user_type", "User Type", "trim|required");

        /*new code here */
        $this->form_validation->set_rules("cgst", "CGST", "trim|required|numeric|max_length[3]");
        $this->form_validation->set_rules("sgst", "SGST", "trim|required|numeric|max_length[3]");
        $this->form_validation->set_rules("igst", "IGST", "trim|required|numeric|max_length[3]");
        $this->form_validation->set_rules("gst_number", "company_gst", "trim|required");

        $this->form_validation->set_error_delimiters('<p class="text-danger" style="color:red;">', '</p>');

        if ($this->form_validation->run()) {

            $name = $this->input->post('name');
            $email = $this->input->post('email');
            $mobile = $this->input->post('phone');
            $branch = $this->input->post('branch');

            /*gst new one start*/

            $cgst = $this->input->post('cgst');
            $igst = $this->input->post('igst');
            $sgst = $this->input->post('sgst');
            $gst_number = $this->input->post('gst_number');

            /*gst new one end */

            $user_type = $this->input->post('user_type');
            $status = $this->input->post('status');
            $create_date = date('Y-m-d');

            $password = $this->input->post('password');

            $check_data = $this->my_model->get_table_by_column('admin_login', 'username', $email);

            if (count($check_data) > 0) {
                $data = array('success' => false, 'messages' => 'duplicate');
            } else {
                $bind = array(
                    'name' => $name,
                    'username' => $email,
                    'phone' => $mobile,
                    'branch' => $branch,
                    'type' => 'admin',
                    'create_date' => $create_date,
                    'user_status' => $status,
                    'password' => $password,
                    'user_type' => $user_type,

                    'cgst' => $cgst,
                    'sgst' => $sgst,
                    'igst' => $igst,
                    'company_gst_no' => $gst_number,

                );

                $table = 'admin_login';
                $cmd_rt = $this->my_model->insert_dynamic($table, $bind);
                $data = array('success' => true, 'messages' => $cmd_rt);
            }

        } else {
            foreach ($_POST as $key => $value) {
                $data['messages'][$key] = form_error($key);
            }

        }
        echo json_encode($data);

    }

    // add branch

    public function add_branch()
    {
        $data = array('success' => false, 'messages' => array());

        $this->form_validation->set_rules("name", "Name", "trim|required|alpha_numeric_spaces");
        //    $this->form_validation->set_rules("email","Email","trim|required|valid_email");
        $this->form_validation->set_rules("mobile", "Mobile", "trim|required|numeric|max_length[10]");
        $this->form_validation->set_rules("pincode", "Pincode", "trim|required|numeric|max_length[6]");
        $this->form_validation->set_rules("city", "City", "trim|required");
        $this->form_validation->set_rules("state", "State", "trim|required");
        $this->form_validation->set_rules("address", "Address", "trim|required");
        $this->form_validation->set_error_delimiters('<p class="text-danger" style="color:red;">', '</p>');
        if ($this->form_validation->run()) {
            $name = $this->input->post('name');

            $email = $this->input->post('email');

            $mobile = $this->input->post('mobile');

            $pincode = $this->input->post('pincode');

            $city = $this->input->post('city');

            $state = $this->input->post('state');
            $address = $this->input->post('address');

            $status = $this->input->post('status');

            $create_date = date('Y-m-d');

            $bind = array(
                'name' => $name,
                'email' => $email,
                'address' => $address,
                'mobile' => $mobile,
                'city' => $city,
                'state' => $state,
                'create_date' => $create_date,
                'status' => $status,
                'pincode' => $pincode,
            );
            $table = 'branch';
            $cmd_rt = $this->my_model->insert_dynamic($table, $bind);

            $data = array('success' => true, 'messages' => $cmd_rt);
        } else {
            foreach ($_POST as $key => $value) {
                $data['messages'][$key] = form_error($key);
            }

        }
        echo json_encode($data);

    }

    public function add_query()
    {
        $data = array('success' => false, 'messages' => array());
        $this->form_validation->set_rules("name", "Name", "trim|required|alpha_numeric_spaces");
        $this->form_validation->set_rules("email", "Email", "trim|required|valid_email");
        $this->form_validation->set_rules("mobile", "Mobile", "trim|required|numeric|max_length[10]");
        $this->form_validation->set_rules("comment", "Comment", "trim|required|alpha_numeric_spaces");
        $this->form_validation->set_rules("car_name", "Car Name", "trim|required|alpha_numeric_spaces");
        $this->form_validation->set_rules("followup", "Follow Up Date", "trim|required");

        $this->form_validation->set_rules("bid", "Branch", "trim|required");
        $this->form_validation->set_error_delimiters('<p class="text-danger" style="color:red;">', '</p>');
        if ($this->form_validation->run()) {
            $name = $this->input->post('name');

            $email = $this->input->post('email');

            $mobile = $this->input->post('mobile');

            $comment = $this->input->post('comment');

            $car_name = $this->input->post('car_name');

            $followup = $this->input->post('followup');

            $bid = $this->input->post('bid');

            $query_date = date('Y-m-d h:i:s A');

            $bind = array('client_name' => $name,

                'email' => $email,

                'mobile' => $mobile,

                'car_name' => $car_name,

                'follow_up_date	' => $followup,

                'comment' => 'Date :' . $query_date . '&Comment :' . $comment . ';',
                'status' => '1',
                'query_date' => $query_date, 'bid' => $bid);

            $cmd_rt = $this->my_model->insert_query($bind);

            $data = array('success' => true, 'messages' => $cmd_rt);

        } else {

            foreach ($_POST as $key => $value) {

                $data['messages'][$key] = form_error($key);

            }

        }

        echo json_encode($data);

    }

    public function get_memberci()
    {

        $mid = $this->input->post('membership_id1');
        $bid_branch = $this->input->post('txt_branch');
        $cmd = $this->my_model->get_customer_data($mid);

        $count = count($cmd);
        if ($count > 0) {

            $get_bk = $this->my_model->get_booking_limit();

            $count_bk = count($get_bk);
            $mm = $get_bk[0]->sno;
            $booking_id = 'DSBK00' . ($mm + 1);
            $memberinfo = json_encode($cmd);
            $data = array('success' => true, 'message' => $cmd, 'booking_id' => $booking_id);
        } else {

            $data = array('success' => false, 'message' => '0');

        }

        echo json_encode($data);

    }

    public function del_fullowup()
    {
        $sno = $this->input->post('sno');

        //

        $bind = array('sno' => $sno);
        $table = 'query';
        $b = $this->my_model->delete_fun($table, $bind);
        return $b;

    }

    public function del_fullowup_booking()
    {
        $sno = $this->input->post('sno');

        //

        $bind = array('sno' => $sno);
        $table = 'booking';
        $b = $this->my_model->delete_fun($table, $bind);
        return $b;

    }

	public function del_role()
	{
		$sno = $this->input->post('sno');

		//

		$bind = array('sno' => $sno);
		$table = 'user_role';
		$b = $this->my_model->delete_fun($table, $bind);
		return $b;

	}

    public function del_branch()
    {
        $sno = $this->input->post('sno');
        $bind = array('bid' => $sno);
        $table = 'branch';
        $b = $this->my_model->delete_fun($table, $bind);
        return $b;
    }

    public function del_user()
    {
        $sno = $this->input->post('sno');

		$bind = array('uid' => $sno);
		$table = 'user_role';
		$b = $this->my_model->delete_fun($table, $bind);

        $bind = array('sno' => $sno);
        $table = 'admin_login';
        $b = $this->my_model->delete_fun($table, $bind);
        return $b;
    }

    public function update_query()
    {
        $data = array('success' => false, 'messages' => array());

        $this->form_validation->set_rules("id_query", "Refresh Page And Try Again", "trim|required");
        $this->form_validation->set_rules("sel_status", "Name", "trim|required");
        $this->form_validation->set_rules("comment", "Comment without any alpha numeric characters", "trim|alpha_numeric_spaces|required");
        $this->form_validation->set_rules("followup_date", "Date", "trim|required");
        $this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');

        if ($this->form_validation->run()) {
            $sno = $this->input->post('id_query');
            $status = $this->input->post('sel_status');
            $comment = $this->input->post('comment');
            $follow_date = $this->input->post('followup_date');

            $table = 'query';
            $column = 'sno';

            $data_query = $this->my_model->get_table_by_column($table, $column, $sno);

            $last_coment = $data_query[0]->comment;

			$date = date_create($follow_date);
			$followon = date_format($date, "Y-m-d");

			$today= date('Y-m-d');
			$full_coment = $last_coment . 'Date:' . $today . '&Comment:' . $comment . '.;';

            $bind = array('comment' => $full_coment,
                'follow_up_date' => $followon,
                'status' => $status);
            $insert_info = $this->my_model->update_customer($table, $column, $bind, $sno);
            $data = array('success' => true, 'messages' => 'updated', 'insert_info' => $last_coment);
        } else {

            foreach ($_POST as $key => $value) {
                $data['messages'][$key] = form_error($key);
            }
        }
        echo json_encode($data);
    }

    public function update_query_new()
    {
        $data = array('success' => false, 'messages' => array());

        $this->form_validation->set_rules("query_sno", "Refresh Page And Try Again", "trim|required");
        $this->form_validation->set_rules("query_name", "Name", "trim|required");

        $this->form_validation->set_rules("bid", "Branch", "trim|required");

        $this->form_validation->set_rules("query_email", "Email", "trim|required|valid_email");
        $this->form_validation->set_rules("query_phone", "Mobile", "trim|required|numeric|max_length[10]");

        $this->form_validation->set_rules("query_follow", "Date", "trim|required");

        $this->form_validation->set_rules("query_car", "Date", "trim|required");

        $this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');

        if ($this->form_validation->run()) {
            $sno = $this->input->post('query_sno');
            $query_name = $this->input->post('query_name');

            $query_email = $this->input->post('query_email');
            $query_phone = $this->input->post('query_phone');
            $query_follow = $this->input->post('query_follow');
            $query_car = $this->input->post('query_car');

            $bid = $this->input->post('bid');

            $table = 'query';
            $column = 'sno';

            $bind = array('client_name' => $query_name,
                'email' => $query_email,
                'car_name' => $query_car,
                'follow_up_date' => $query_follow,
                'mobile' => $query_phone, 'bid' => $bid);

            $insert_info = $this->my_model->update_customer($table, $column, $bind, $sno);
            $data = array('success' => true, 'messages' => 'updated');
        } else {

            foreach ($_POST as $key => $value) {
                $data['messages'][$key] = form_error($key);
            }
        }
        echo json_encode($data);
    }

    // branch update
    public function update_user()
    {
        $data = array('success' => false, 'messages' => array());

        $this->form_validation->set_rules("edit_name", "Name", "trim|required|alpha_numeric_spaces");
        $this->form_validation->set_rules("edit_email", "Email", "trim|required|valid_email");
        $this->form_validation->set_rules("edit_phone", "Mobile", "trim|required|numeric|max_length[10]");
        $this->form_validation->set_rules("edit_branch", "Branch", "trim|required");
        $this->form_validation->set_rules("edit_user_type", "User Type", "trim|required");
        $this->form_validation->set_rules("edit_status", "Status", "trim|required");

        // new code for gst start

        /*new code here */
        $this->form_validation->set_rules("edit_cgst", "CGST", "trim|required|numeric|max_length[3]");
        $this->form_validation->set_rules("edit_sgst", "SGST", "trim|required|numeric|max_length[3]");
        $this->form_validation->set_rules("edit_igst", "IGST", "trim|required|numeric|max_length[3]");
        $this->form_validation->set_rules("edit_gst_number", "company_gst", "trim|required");

        /*new code for gst end */

        $this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');

        if ($this->form_validation->run()) {

            $bid = $this->input->post('uid');
            $name = $this->input->post('edit_name');
            $email = $this->input->post('edit_email');
            $mobile = $this->input->post('edit_phone');

            /*new code for gst start */

            $edit_cgst = $this->input->post('edit_cgst');
            $edit_sgst = $this->input->post('edit_sgst');
            $edit_igst = $this->input->post('edit_igst');
            $edit_gst_number = $this->input->post('edit_gst_number');

            /*new code for gst end */

            $branch = $this->input->post('edit_branch');
            $password = $this->input->post('edit_password');

            $edit_user_type = $this->input->post('edit_user_type');
            $status = $this->input->post('edit_status');
            //    $create_date = date('Y-m-d');

            if ($password == '') {
                $bind = array(
                    'name' => $name,
                    'username' => $email,
                    'phone' => $mobile,
                    'branch' => $branch,
                    'user_type' => $edit_user_type,
                    'user_status' => $status,

                    'company_gst_no' => $edit_gst_number,
                    'cgst' => $edit_cgst,
                    'sgst' => $edit_sgst,
                    'igst' => $edit_igst,

                );
            } else {
                $bind = array(
                    'name' => $name,
                    'username' => $email,
                    'phone' => $mobile,
                    'branch' => $branch,
                    'user_type' => $edit_user_type,
                    'user_status' => $status,
                    'password' => $password,

                    'company_gst_no' => $edit_gst_number,
                    'cgst' => $edit_cgst,
                    'sgst' => $edit_sgst,
                    'igst' => $edit_igst,

                );
            }

            $table = 'admin_login';
            $column = 'sno';
            $id = $bid;

            $insert_info = $this->my_model->update_customer($table, $column, $bind, $id);
            $data = array('success' => true, 'messages' => 'updated', 'insert_info' => $insert_info);

        } else {

            foreach ($_POST as $key => $value) {
                $data['messages'][$key] = form_error($key);
            }
        }
        echo json_encode($data);

    }

    // branch update
    public function update_branch()
    {
        $data = array('success' => false, 'messages' => array());

        $this->form_validation->set_rules("edit_name", "Name", "trim|required|alpha_numeric_spaces");
        //        $this->form_validation->set_rules("email","Email","trim|required|valid_email");
        $this->form_validation->set_rules("edit_mobile", "Mobile", "trim|required|numeric|max_length[10]");
        $this->form_validation->set_rules("edit_pincode", "Pincode", "trim|required|numeric|max_length[6]");
        $this->form_validation->set_rules("edit_city", "City", "trim|required");
        $this->form_validation->set_rules("edit_state", "State", "trim|required");
        $this->form_validation->set_rules("edit_address", "Address", "trim|required");
        //
        $this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');

        if ($this->form_validation->run()) {

            $bid = $this->input->post('bid');

            $name = $this->input->post('edit_name');
            $email = $this->input->post('edit_email');
            $mobile = $this->input->post('edit_mobile');
            $pincode = $this->input->post('edit_pincode');
            $city = $this->input->post('edit_city');
            $state = $this->input->post('edit_state');
            $address = $this->input->post('edit_address');
            $status = $this->input->post('edit_status');
            //    $create_date = date('Y-m-d');

            $bind = array(
                'name' => $name,
                'email' => $email,
                'address' => $address,
                'mobile' => $mobile,
                'city' => $city,
                'state' => $state,
                //'create_date'=> $create_date,
                'status' => $status,
                'pincode' => $pincode,
            );

            $table = 'branch';
            $column = 'bid';
            $id = $bid;

            $insert_info = $this->my_model->update_customer($table, $column, $bind, $id);
            $data = array('success' => true, 'messages' => 'updated', 'insert_info' => $insert_info);
        } else {

            foreach ($_POST as $key => $value) {
                $data['messages'][$key] = form_error($key);
            }
        }
        echo json_encode($data);

    }

    // client update start

    public function update_client()
    {
        $data = array('success' => false, 'messages' => array());
        $this->form_validation->set_rules("ecname", "Name", "trim|required");
        $this->form_validation->set_rules("ecnumber", "Mobile", "trim|required|numeric|max_length[10]");
        $this->form_validation->set_rules("ecemail", "Email", "trim|required|valid_email");
        $this->form_validation->set_rules("ecaddress", "Address", "trim|required");

        $this->form_validation->set_rules("eprice", "Price", "trim|required");
        $this->form_validation->set_rules("epackage", "Package", "trim|required");
        $this->form_validation->set_rules("epredate", "Date", "trim|required");

        $this->form_validation->set_rules("bid", "Branch", "trim|required");

        $this->form_validation->set_rules("epiklocation", "Pik Location", "trim|required");

        $this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');

        if ($this->form_validation->run()) {

            $ecid = $this->input->post('ecid');
            $ecname = $this->input->post('ecname');
            $ecnumber = $this->input->post('ecnumber');
            $ecemail = $this->input->post('ecemail');
            $ecaddress = $this->input->post('ecaddress');

            $ebookid = $this->input->post('ebookid');
            $eprice = $this->input->post('eprice');
            $eadvprice = $this->input->post('eadvprice');
            $epackage = $this->input->post('epackage');
            $epredate = $this->input->post('epredate');
            $eremark = $this->input->post('eremark');
            $epiklocation = $this->input->post('epiklocation');
            $ecarcolor = $this->input->post('ecarcolor');
            $ecarnumber = $this->input->post('ecarnumber');
            $ecarname = $this->input->post('ecarname');
            $ecity = $this->input->post('ecity');

            $bid = $this->input->post('bid');

            $bind = array('name' => $ecname,
                'email' => $ecemail,
                'address' => $ecaddress,
                'number' => $ecnumber);
            $table = 'customer';
            $column = 'customer_id';

            $bind_booking = array('vehicle' => $ecarnumber,
                'vehicle_name' => $ecarname,
                'vehicle_color' => $ecarcolor,
                'remark_vehicle' => $eremark,
                'date' => $epredate,
                'pickup' => $epiklocation,
                'price' => $eprice,
                'advance' => $eadvprice,
                'package' => $epackage,
                'bid' => $bid,
            );
            $table_booking = 'booking';
            $column_booking = 'booking_id';

            $insert_into_booking = $this->my_model->update_customer($table_booking, $column_booking, $bind_booking, $ebookid);
            $insert_info = $this->my_model->update_customer($table, $column, $bind, $ecid);
            $data = array('success' => true, 'messages' => 'updated', 'insert_info' => $insert_info . '--' . $insert_into_booking);
        } else {

            foreach ($_POST as $key => $value) {
                $data['messages'][$key] = form_error($key);
            }
        }
        echo json_encode($data);

    }

    public function add_booking()
    {

        $data = array('success' => false, 'message' => array());
        $this->form_validation->set_rules("name", "Name", "trim|required");

        $this->form_validation->set_rules("bid", "Branch", "trim|required");

        $this->form_validation->set_rules("mobile", "Mobile", "trim|required|numeric|max_length[10]");

        $this->form_validation->set_rules("cnf_mobile", "Confirm Mobile", "trim|required|matches[mobile]");

        $this->form_validation->set_rules("address1", "Address", "trim|required");

        $this->form_validation->set_rules("city", "City", "trim|required");

        $this->form_validation->set_rules("zip_code", "Zip Code", "trim|required|numeric|min_length[4]|max_length[6]");

        $this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');

        if ($this->form_validation->run()) {
            $cmd = $this->my_model->get_customer();
            $get_bk = $this->my_model->get_booking();

            $count = count($cmd);
            $count_bk = count($get_bk);
            $member_id = 'DSMB00' . ($count + 1);
            $booking_id = 'DSBK00' . ($count_bk + 1);
            $name = $this->input->post('name');

            $email = $this->input->post('email');

            $state_id = $this->input->post('state_id');

            $address1 = $this->input->post('address1');

            $address2 = $this->input->post('address2');

            $mobile = $this->input->post('mobile');

            $city = $this->input->post('city');

            $zip_code = $this->input->post('zip_code');

            $bid = $this->input->post('bid');

            $bind = array('customer_id' => $member_id,

                'name' => $name,

                'email' => $email,

                'state' => $state_id, 'address' => $address1 . $address2, 'number' => $mobile, 'city' => $city, 'pincode' => $zip_code, 'bid' => $bid);

            $insert_info = $this->my_model->insert_customer($bind);

            $data = array('success' => true, 'messages' => $member_id, 'member_id' => $member_id, 'booking_id' => $booking_id, 'insert_info' => $insert_info);

        } else {

            foreach ($_POST as $key => $value) {

                $data['messages'][$key] = form_error($key);

            }

        }

        echo json_encode($data);

    }

    public function send_invoice()
    {
        //    $this->form_validation->set_rules("pd_tx_name","Name","trim|required");

        $data = array('success' => false, 'messages' => array());

        $this->form_validation->set_rules("mail", "email", "trim|required|valid_email");
        if ($this->form_validation->run()) {

            //    $mail =  $this->input->post('mail');
            $aa = base_url();

            $invoice = $this->input->post('invoice');
            //$row = $info['invoice'][$i];
            $ids1 = base64_decode($invoice);

            $cmd = $this->my_model->select_invoice_byid($ids1);

            $client_email = $cmd[0]->bill_email;

            $config = array(
                'mailtype' => 'html',
                'charset' => 'utf-8',
                'priority' => '1',
            );

            $this->email->initialize($config);
            $from_email = "care@detailingstreet.com";
            //  $to_email = $this->input->post('email');

            //  Load email library
            $this->email->from($from_email, 'Detailing Street Invoice');
            $this->email->to($client_email);
            // $this->email->subject('Detailing Street Booking Details');
            // $this->email->message($body);

            $bid = $cmd[0]->booking_id;
            $this->email->subject("Important!! Detailing Street Invoice for Booking ID $bid");
            $this->email->message('<!doctype html><html xmlns=http://www.w3.org/1999/xhtml xmlns:v=urn:schemas-microsoft-com:vml xmlns:o=urn:schemas-microsoft-com:office:office><head><meta charset=UTF-8><meta http-equiv=X-UA-Compatible content="IE=edge"><meta name=viewport content="width=device-width, initial-scale=1"><title>Invoice</title><style type=text/css>p{margin:10px 0;padding:0}table{border-collapse:collapse}h1,h2,h3,h4,h5,h6{display:block;margin:0;padding:0}img,a img{border:0;height:auto;outline:0;text-decoration:none}body,#bodyTable,#bodyCell{height:100%;margin:0;padding:0;width:100%}.mcnPreviewText{display:none!important}#outlook a{padding:0}img{-ms-interpolation-mode:bicubic}table{mso-table-lspace:0;mso-table-rspace:0}.ReadMsgBody{width:100%}.ExternalClass{width:100%}p,a,li,td,blockquote{mso-line-height-rule:exactly}a[href^=tel],a[href^=sms]{color:inherit;cursor:default;text-decoration:none}p,a,li,td,body,table,blockquote{-ms-text-size-adjust:100%;-webkit-text-size-adjust:100%}.ExternalClass,.ExternalClass p,.ExternalClass td,.ExternalClass div,.ExternalClass span,.ExternalClass font{line-height:100%}a[x-apple-data-detectors]{color:inherit!important;text-decoration:none!important;font-size:inherit!important;font-family:inherit!important;font-weight:inherit!important;line-height:inherit!important}.templateContainer{max-width:600px!important}a.mcnButton{display:block}.mcnImage,.mcnRetinaImage{vertical-align:bottom}.mcnTextContent{word-break:break-word}.mcnTextContent img{height:auto!important}.mcnDividerBlock{table-layout:fixed!important}h1{color:#222;font-family:Helvetica;font-size:40px;font-style:normal;font-weight:bold;line-height:150%;letter-spacing:normal;text-align:center}h2{color:#222;font-family:Helvetica;font-size:34px;font-style:normal;font-weight:bold;line-height:150%;letter-spacing:normal;text-align:left}h3{color:#444;font-family:Helvetica;font-size:22px;font-style:normal;font-weight:bold;line-height:150%;letter-spacing:normal;text-align:left}h4{color:#999;font-family:Georgia;font-size:20px;font-style:italic;font-weight:normal;line-height:125%;letter-spacing:normal;text-align:left}#templateHeader{background-color:#f2f2f2;background-image:none;background-repeat:no-repeat;background-position:center;background-size:cover;border-top:0;border-bottom:0;padding-top:36px;padding-bottom:0}.headerContainer{background-color:#fff;background-image:none;background-repeat:no-repeat;background-position:center;background-size:cover;border-top:0;border-bottom:0;padding-top:45px;padding-bottom:45px}.headerContainer .mcnTextContent,.headerContainer .mcnTextContent p{color:#808080;font-family:Helvetica;font-size:16px;line-height:150%;text-align:left}.headerContainer .mcnTextContent a,.headerContainer .mcnTextContent p a{color:#007e9e;font-weight:normal;text-decoration:underline}#templateBody{background-color:#f2f2f2;background-image:none;background-repeat:no-repeat;background-position:center;background-size:cover;border-top:0;border-bottom:0;padding-top:0;padding-bottom:0}.bodyContainer{background-color:#fff;background-image:none;background-repeat:no-repeat;background-position:center;background-size:cover;border-top:0;border-bottom:0;padding-top:0;padding-bottom:45px}.bodyContainer .mcnTextContent,.bodyContainer .mcnTextContent p{color:#808080;font-family:Helvetica;font-size:16px;line-height:150%;text-align:left}.bodyContainer .mcnTextContent a,.bodyContainer .mcnTextContent p a{color:#007e9e;font-weight:normal;text-decoration:underline}#templateFooter{background-color:#f2f2f2;background-image:none;background-repeat:no-repeat;background-position:center;background-size:cover;border-top:0;border-bottom:0;padding-top:0;padding-bottom:36px}.footerContainer{background-color:#333;background-image:none;background-repeat:no-repeat;background-position:center;background-size:cover;border-top:0;border-bottom:0;padding-top:45px;padding-bottom:45px}.footerContainer .mcnTextContent,.footerContainer .mcnTextContent p{color:#fff;font-family:Helvetica;font-size:12px;line-height:150%;text-align:center}.footerContainer .mcnTextContent a,.footerContainer .mcnTextContent p a{color:#fff;font-weight:normal;text-decoration:underline}@media only screen and (min-width:768px){.templateContainer{width:600px!important}}@media only screen and (max-width:480px){body,table,td,p,a,li,blockquote{-webkit-text-size-adjust:none!important}}@media only screen and (max-width:480px){body{width:100%!important;min-width:100%!important}}@media only screen and (max-width:480px){.mcnRetinaImage{max-width:100%!important}}@media only screen and (max-width:480px){.mcnImage{width:100%!important}}@media only screen and (max-width:480px){.mcnCartContainer,.mcnCaptionTopContent,.mcnRecContentContainer,.mcnCaptionBottomContent,.mcnTextContentContainer,.mcnBoxedTextContentContainer,.mcnImageGroupContentContainer,.mcnCaptionLeftTextContentContainer,.mcnCaptionRightTextContentContainer,.mcnCaptionLeftImageContentContainer,.mcnCaptionRightImageContentContainer,.mcnImageCardLeftTextContentContainer,.mcnImageCardRightTextContentContainer,.mcnImageCardLeftImageContentContainer,.mcnImageCardRightImageContentContainer{max-width:100%!important;width:100%!important}}@media only screen and (max-width:480px){.mcnBoxedTextContentContainer{min-width:100%!important}}@media only screen and (max-width:480px){.mcnImageGroupContent{padding:9px!important}}@media only screen and (max-width:480px){.mcnCaptionLeftContentOuter .mcnTextContent,.mcnCaptionRightContentOuter .mcnTextContent{padding-top:9px!important}}@media only screen and (max-width:480px){.mcnImageCardTopImageContent,.mcnCaptionBottomContent:last-child .mcnCaptionBottomImageContent,.mcnCaptionBlockInner .mcnCaptionTopContent:last-child .mcnTextContent{padding-top:18px!important}}@media only screen and (max-width:480px){.mcnImageCardBottomImageContent{padding-bottom:9px!important}}@media only screen and (max-width:480px){.mcnImageGroupBlockInner{padding-top:0!important;padding-bottom:0!important}}@media only screen and (max-width:480px){.mcnImageGroupBlockOuter{padding-top:9px!important;padding-bottom:9px!important}}@media only screen and (max-width:480px){.mcnTextContent,.mcnBoxedTextContentColumn{padding-right:18px!important;padding-left:18px!important}}@media only screen and (max-width:480px){.mcnImageCardLeftImageContent,.mcnImageCardRightImageContent{padding-right:18px!important;padding-bottom:0!important;padding-left:18px!important}}@media only screen and (max-width:480px){.mcpreview-image-uploader{display:none!important;width:100%!important}}@media only screen and (max-width:480px){h1{font-size:30px!important;line-height:125%!important}}@media only screen and (max-width:480px){h2{font-size:26px!important;line-height:125%!important}}@media only screen and (max-width:480px){h3{font-size:20px!important;line-height:150%!important}}@media only screen and (max-width:480px){h4{font-size:18px!important;line-height:150%!important}}@media only screen and (max-width:480px){.mcnBoxedTextContentContainer .mcnTextContent,.mcnBoxedTextContentContainer .mcnTextContent p{font-size:14px!important;line-height:150%!important}}@media only screen and (max-width:480px){.headerContainer .mcnTextContent,.headerContainer .mcnTextContent p{font-size:16px!important;line-height:150%!important}}@media only screen and (max-width:480px){.bodyContainer .mcnTextContent,.bodyContainer .mcnTextContent p{font-size:16px!important;line-height:150%!important}}@media only screen and (max-width:480px){.footerContainer .mcnTextContent,.footerContainer .mcnTextContent p{font-size:14px!important;line-height:150%!important}}</style></head>
<body>
<span class=mcnPreviewText style=display:none;font-size:0;line-height:0;max-height:0;max-width:0;opacity:0;overflow:hidden;visibility:hidden;mso-hide:all>Important</span>
<center>
<table align=center border=0 cellpadding=0 cellspacing=0 height=100% width=100% id=bodyTable>
<tr>
<td align=center valign=top id=bodyCell>
<table border=0 cellpadding=0 cellspacing=0 width=100%>
<tr>
<td align=center valign=top id=templateHeader>
<table align=center border=0 cellpadding=0 cellspacing=0 width=100% class=templateContainer>
<tr>
<td valign=top class=headerContainer><table border=0 cellpadding=0 cellspacing=0 width=100% class=mcnImageBlock style=min-width:100%>
<tbody class=mcnImageBlockOuter>
<tr>
<td valign=top style=padding:9px class=mcnImageBlockInner>
<table align=left width=100% border=0 cellpadding=0 cellspacing=0 class=mcnImageContentContainer style=min-width:100%>
<tbody><tr>
<td class=mcnImageContent valign=top style=padding-right:9px;padding-left:9px;padding-top:0;padding-bottom:0;text-align:center>
<img align=center alt src="http://crm.detailingstreet.com/assets/img/logo-trans.png" width=196 style=max-width:196px;padding-bottom:0;display:inline!important;vertical-align:bottom class=mcnImage>
</td>
</tr>
</tbody></table>
</td>
</tr>
</tbody>
</table></td>
</tr>
</table>
</td>
</tr>
<tr>
<td align=center valign=top id=templateBody>
<table align=center border=0 cellpadding=0 cellspacing=0 width=100% class=templateContainer>
<tr>
<td valign=top class=bodyContainer><table border=0 cellpadding=0 cellspacing=0 width=100% class=mcnTextBlock style=min-width:100%>
<tbody class=mcnTextBlockOuter>
<tr>
<td valign=top class=mcnTextBlockInner style=padding-top:9px>
<table align=left border=0 cellpadding=0 cellspacing=0 style=max-width:100%;min-width:100% width=100% class=mcnTextContentContainer>
<tbody><tr>
<td valign=top class=mcnTextContent style=padding-top:0;padding-right:18px;padding-bottom:9px;padding-left:18px>
<h3>Hello ' . $cmd[0]->bill_name . ',</h3>
&nbsp;
<p>Greetings... !<br>
<br>
Now you can download your invoice&nbsp;from here.<br>
&nbsp;</p>
</td>
</tr>
</tbody></table>
</td>
</tr>
</tbody>
</table><table border=0 cellpadding=0 cellspacing=0 width=100% class=mcnDividerBlock style=min-width:100%>
<tbody class=mcnDividerBlockOuter>
<tr>
<td class=mcnDividerBlockInner style="min-width:100%;padding:9px 18px 0">
<table class=mcnDividerContent border=0 cellpadding=0 cellspacing=0 width=100% style=min-width:100%>
<tbody><tr>
<td>
<span></span>
</td>
</tr>
</tbody></table>
</td>
</tr>
</tbody>
</table><table border=0 cellpadding=0 cellspacing=0 width=100% class=mcnButtonBlock style=min-width:100%>
<tbody class=mcnButtonBlockOuter>
<tr>
<td style=padding-top:0;padding-right:18px;padding-bottom:18px;padding-left:18px valign=top align=center class=mcnButtonBlockInner>
<table border=0 cellpadding=0 cellspacing=0 class=mcnButtonContentContainer style=border-collapse:separate!important;border-radius:3px;background-color:#00add8>
<tbody>
<tr>
<td align=center valign=middle class=mcnButtonContent style=font-family:Helvetica;font-size:18px;padding:18px>
<a class=mcnButton title="Download Invoice | #DSIN001" href="' . $aa . 'crm/clientinvoive/' . $invoice . '" target=_self style=font-weight:bold;letter-spacing:-0.5px;line-height:100%;text-align:center;text-decoration:none;color:#fff>Download Invoice | #' . $ids1 . '</a>
</td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table></td>
</tr>
</table>
</td>
</tr>
<tr>
<td align=center valign=top id=templateFooter>
<table align=center border=0 cellpadding=0 cellspacing=0 width=100% class=templateContainer>
<tr>
<td valign=top class=footerContainer><table border=0 cellpadding=0 cellspacing=0 width=100% class=mcnTextBlock style=min-width:100%>
<tbody class=mcnTextBlockOuter>
<tr>
<td valign=top class=mcnTextBlockInner style=padding-top:9px>
<table align=left border=0 cellpadding=0 cellspacing=0 style=max-width:100%;min-width:100% width=100% class=mcnTextContentContainer>
<tbody><tr>
<td valign=top class=mcnTextContent style=padding-top:0;padding-right:18px;padding-bottom:9px;padding-left:18px>
<strong>Copyright © 2021 Detailing Street.</strong>&nbsp;All rights reserved.<br>
&nbsp;<br>
<br>
<strong>Our mailing address is:</strong>
<p>C-58, Mansarover Garden</p>
<p>Near Axis Bank, Delhi-110015</p>
<p>Phone :+(91) 7838 509 509</p>
<p>Email: care@detailingstreet.com&nbsp;</p>
</td>
</tr>
</tbody></table>
</td>
</tr>
</tbody>
</table><table border=0 cellpadding=0 cellspacing=0 width=100% class=mcnFollowBlock style=min-width:100%>
<tbody class=mcnFollowBlockOuter>
<tr>
<td align=center valign=top style=padding:9px class=mcnFollowBlockInner>
<table border=0 cellpadding=0 cellspacing=0 width=100% class=mcnFollowContentContainer style=min-width:100%>
<tbody><tr>
<td align=center style=padding-left:9px;padding-right:9px>
<table border=0 cellpadding=0 cellspacing=0 width=100% style=min-width:100% class=mcnFollowContent>
<tbody><tr>
<td align=center valign=top style=padding-top:9px;padding-right:9px;padding-left:9px>
<table align=center border=0 cellpadding=0 cellspacing=0>
<tbody><tr>
<td align=center valign=top>
<table align=left border=0 cellpadding=0 cellspacing=0 style=display:inline>
<tbody><tr>
<td valign=top style=padding-right:10px;padding-bottom:9px class=mcnFollowContentItemContainer>
<table border=0 cellpadding=0 cellspacing=0 width=100% class=mcnFollowContentItem>
<tbody><tr>
<td align=left valign=middle style=padding-top:5px;padding-right:10px;padding-bottom:5px;padding-left:9px>
<table align=left border=0 cellpadding=0 cellspacing=0 width>
<tbody><tr>
<td align=center valign=middle width=24 class=mcnFollowIconContent>
<a href=https://www.facebook.com/detailingstreet/ target=_blank><img src=https://cdn-images.mailchimp.com/icons/social-block-v2/color-facebook-48.png style=display:block height=24 width=24 class></a>
</td>
</tr>
</tbody></table>
</td>
</tr>
</tbody></table>
</td>
</tr>
</tbody></table>
<table align=left border=0 cellpadding=0 cellspacing=0 style=display:inline>
<tbody><tr>
<td valign=top style=padding-right:10px;padding-bottom:9px class=mcnFollowContentItemContainer>
<table border=0 cellpadding=0 cellspacing=0 width=100% class=mcnFollowContentItem>
<tbody><tr>
<td align=left valign=middle style=padding-top:5px;padding-right:10px;padding-bottom:5px;padding-left:9px>
<table align=left border=0 cellpadding=0 cellspacing=0 width>
<tbody><tr>
<td align=center valign=middle width=24 class=mcnFollowIconContent>
<a href=https://www.instagram.com/detailingstreet/ target=_blank><img src=https://cdn-images.mailchimp.com/icons/social-block-v2/color-instagram-48.png style=display:block height=24 width=24 class></a>
</td>
</tr>
</tbody></table>
</td>
</tr>
</tbody></table>
</td>
</tr>
</tbody></table>
<table align=left border=0 cellpadding=0 cellspacing=0 style=display:inline>
<tbody><tr>
<td valign=top style=padding-right:10px;padding-bottom:9px class=mcnFollowContentItemContainer>
<table border=0 cellpadding=0 cellspacing=0 width=100% class=mcnFollowContentItem>
<tbody><tr>
<td align=left valign=middle style=padding-top:5px;padding-right:10px;padding-bottom:5px;padding-left:9px>
<table align=left border=0 cellpadding=0 cellspacing=0 width>
<tbody><tr>
<td align=center valign=middle width=24 class=mcnFollowIconContent>
<a href=https://www.youtube.com/channel/UCZUVfgSnLndXIL7UiPHHc_g target=_blank><img src=https://cdn-images.mailchimp.com/icons/social-block-v2/color-youtube-48.png style=display:block height=24 width=24 class></a>
</td>
</tr>
</tbody></table>
</td>
</tr>
</tbody></table>
</td>
</tr>
</tbody></table>
<table align=left border=0 cellpadding=0 cellspacing=0 style=display:inline>
<tbody><tr>
<td valign=top style=padding-right:10px;padding-bottom:9px class=mcnFollowContentItemContainer>
<table border=0 cellpadding=0 cellspacing=0 width=100% class=mcnFollowContentItem>
<tbody><tr>
<td align=left valign=middle style=padding-top:5px;padding-right:10px;padding-bottom:5px;padding-left:9px>
<table align=left border=0 cellpadding=0 cellspacing=0 width>
<tbody><tr>
<td align=center valign=middle width=24 class=mcnFollowIconContent>
<a href=https://www.youtube.com/channel/UCZUVfgSnLndXIL7UiPHHc_g target=_blank><img src=https://cdn-images.mailchimp.com/icons/social-block-v2/color-googleplus-48.png style=display:block height=24 width=24 class></a>
</td>
</tr>
</tbody></table>
</td>
</tr>
</tbody></table>
</td>
</tr>
</tbody></table>
<table align=left border=0 cellpadding=0 cellspacing=0 style=display:inline>
<tbody><tr>
<td valign=top style=padding-right:0;padding-bottom:9px class=mcnFollowContentItemContainer>
<table border=0 cellpadding=0 cellspacing=0 width=100% class=mcnFollowContentItem>
<tbody><tr>
<td align=left valign=middle style=padding-top:5px;padding-right:10px;padding-bottom:5px;padding-left:9px>
<table align=left border=0 cellpadding=0 cellspacing=0 width>
<tbody><tr>
<td align=center valign=middle width=24 class=mcnFollowIconContent>
<a href=http://www.detailingstreet.com/ target=_blank><img src=https://cdn-images.mailchimp.com/icons/social-block-v2/color-link-48.png style=display:block height=24 width=24 class></a>
</td>
</tr>
</tbody></table>
</td>
</tr>
</tbody></table>
</td>
</tr>
</tbody></table>
</td>
</tr>
</tbody></table>
</td>
</tr>
</tbody></table>
</td>
</tr>
</tbody></table>
</td>
</tr>
</tbody>
</table></td>
</tr>
</table>
</td>
</tr>
</table>
</td>
</tr>
</table>
</center>
</body>
</html>');

            //Send mail
            if ($this->email->send()) {
                echo '1';
                // $this->session->set_flashdata("email_sent","Email sent successfully.");
            } else {
                echo '0';
                //  $this->session->set_flashdata("email_sent","Error in sending Email.");
                /* $this->load->view('email_form'); */
            }

        } else {

            echo '3';
        }
    }

    // invoice

    public function add_invoice()
    {
        //()
        $as = json_encode($_POST);

        $data = array('success' => false, 'messages' => array());

        $this->form_validation->set_rules("pd_tx_name", "Name", "trim|required");
        $this->form_validation->set_rules("pd_tx_addrs1", "Address", "trim|required");
        $this->form_validation->set_rules("pd_tx_phone", "Phone", "trim|required");
        $this->form_validation->set_rules("pd_tx_email", "Email", "trim|required");
        $this->form_validation->set_rules("pd_invoice", "Invoice", "trim|required");
        $this->form_validation->set_rules("pd_cid", "Client", "trim|required");
        $this->form_validation->set_rules("pd_bid", "Booking", "trim|required");
        $this->form_validation->set_rules("pd_pay_date", "Date", "trim|required");
        $this->form_validation->set_rules("pd_tx_date", "Date", "trim|required");
        $this->form_validation->set_rules("pd_tx_vehicle", "Vehicle", "trim|required");
        $this->form_validation->set_rules("pd_tx_type", "Type", "trim|required");
        $this->form_validation->set_rules("pd_tx_rno", "Code", "trim|required");
        $this->form_validation->set_rules("pd_tx_paymenttype", "Type", "trim|required");
        $this->form_validation->set_rules("pd_tx_vcolor", "Color", "trim|required");
        $this->form_validation->set_rules("pd_tx_studio", "Place", "trim|required");
        //$this->form_validation->set_rules("pd_tx_amount","Amount","trim|required");
        $this->form_validation->set_rules("pd_tx_model", "Model", "trim|required");
        $this->form_validation->set_rules("txt_booking_item", "Item", "trim|required");
        $this->form_validation->set_rules("txt_booking_qty", "Name", "trim|required");
        $this->form_validation->set_rules("txt_booking_rate", "Name", "trim|required");
        $this->form_validation->set_rules("txt_booking_tax", "Tax", "trim|required");
        $this->form_validation->set_rules("txt_warranty_year", "Year", "trim|required");
        $this->form_validation->set_rules("txt_booking_amount", "Amount", "trim|required");

        //$this->form_validation->set_rules("txt_gd_total","TotalAmount","trim|required");

        $this->form_validation->set_rules("bid", "Branch", "trim|required");

        $bid = $this->input->post('pd_bid');
        $count = $this->my_model->select_invoice_bid($bid);

        /*print_r($count);

        die();*/

        if (count($count) > 0) {

            $data = array('success' => false, 'messages' => '1');
        } else {

            if ($this->form_validation->run()) {

                $cmd = $this->my_model->get_data('invoice');
                $cmd = count($cmd);
                $inv = $cmd + 1;
                $inv = "DSIN00$inv";

                $pd_tx_name = $this->input->post('pd_tx_name');
                $pd_tx_addrs1 = $this->input->post('pd_tx_addrs1');
                $pd_tx_addrs2 = $this->input->post('pd_tx_addrs2');
                $pd_tx_phone = $this->input->post('pd_tx_phone');
                $pd_tx_email = $this->input->post('pd_tx_email');
                $pd_invoice = $this->input->post('pd_invoice');
                $pd_cid = $this->input->post('pd_cid');
                //    //    //    //    //$pd_cid =  $this->input->post('pd_cid');
                $pd_bid = $this->input->post('pd_bid');
                $pd_pay_date = $this->input->post('pd_pay_date');
				$pd_company_gst = $this->input->post('pd_company_gst');

                $pd_tx_date = $this->input->post('pd_tx_date');
                $pd_tx_vehicle = $this->input->post('pd_tx_vehicle');
                $pd_tx_type = $this->input->post('pd_tx_type');
                $pd_tx_rno = $this->input->post('pd_tx_rno');
                $pd_tx_paymenttype = $this->input->post('pd_tx_paymenttype');
                $pd_tx_vcolor = $this->input->post('pd_tx_vcolor');
                $pd_tx_studio = $this->input->post('pd_tx_studio');
                //    $pd_tx_amount =  $this->input->post('pd_tx_amount');

                $pd_tx_model = $this->input->post('pd_tx_model');

                $txt_cgst_cm = $this->input->post('txt_cgst_cm');
                $txt_sgst_cm = $this->input->post('txt_sgst_cm');
                $txt_igst_cm = $this->input->post('txt_igst_cm');

                $txt_gd_total = $this->input->post('txt_gd_total');

                $pd_tx_customer_gst = $this->input->post('pd_tx_customer_gst');

                $bid = $this->input->post('bid');

                $txt_booking_item = $this->input->post('txt_booking_item');
                $txt_booking_qty = $this->input->post('txt_booking_qty');
                $txt_booking_rate = $this->input->post('txt_booking_rate');
                $txt_booking_tax = $this->input->post('txt_booking_tax');
                $txt_warranty_year = $this->input->post('txt_warranty_year');
                $txt_booking_amount = $this->input->post('txt_booking_amount');

                $arr_booking_item = explode(",", $txt_booking_item);
                $arr_booking_qty = explode(",", $txt_booking_qty);
                $arr_booking_rate = explode(",", $txt_booking_rate);
                $arr_booking_tax = explode(",", $txt_booking_tax);
                $arr_warranty_year = explode(",", $txt_warranty_year);
                $arr_booking_amount = explode(",", $txt_booking_amount);

                for ($i = 0; $i < count($arr_booking_item); $i++) {
                    $booking_item = $arr_booking_item[$i];
                    $booking_qty = $arr_booking_qty[$i];
                    $booking_rate = $arr_booking_rate[$i];
                    $booking_tax = $arr_booking_tax[$i];
                    $warranty_year = $arr_warranty_year[$i];
                    $booking_amount = $arr_booking_amount[$i];

                    /* $pd_invoice.','.$pd_tx_name.','.$booking_item.','.$booking_qty.','.$booking_rate.','.$booking_tax.','.$warranty_year.','.$booking_amount."\n";*/

                    $bind = array('booking_id' => $pd_bid,
                        'customer_id' => $pd_cid,
                        'invoice_number' => $inv,
                        'paydate' => $pd_pay_date,
                        'item_name' => $booking_item,
                        'item_qty' => $booking_qty,
                        'iteam_net_price' => $booking_rate,
                        'iteam_discount' => $booking_tax,
                        'iteam_price' => $booking_amount,
                        'item_warranty' => $warranty_year,
                        'vehicle' => $pd_tx_vehicle,
                        'vehicle_type' => $pd_tx_type,
                        'vehicle_regno' => $pd_tx_rno,
                        'vehicle_model' => $pd_tx_model,
                        'vehicle_color' => $pd_tx_vcolor,
                        'coating_studio' => $pd_tx_studio,
                        'bill_name' => $pd_tx_name,
                        'bill_address' => $pd_tx_addrs1 . ',' . $pd_tx_addrs2,
                        'bill_email' => $pd_tx_email,
                        'pay_mode' => $pd_tx_paymenttype,
                        'bill_phone' => $pd_tx_phone,
                        'created_date' => $pd_tx_date,
                        'cgst' => $txt_cgst_cm,
                        'igst' => $txt_igst_cm,
                        'sgst' => $txt_sgst_cm,
                        'grand_total' => $txt_gd_total,
                        'gst_number' => $pd_tx_customer_gst,
                        'bid' => $bid,
                    );

                    $insert_info = $this->my_model->insert_invoice($bind);
                    // json_encode($bind);

                    $data = array('success' => true, 'messages' => $insert_info);
                    // print_r($bind);
                }

                //    $data =  array('success' => true,'messages'=>$bind );

            } else {
                foreach ($_POST as $key => $value) {

                    $data['messages'][$key] = form_error($key);

                }

            }

        }

        echo json_encode($data);

        //print_r(expression)

    }

    public function update_invoice(){

			$data = array('success' => false, 'messages' => array());

			$this->form_validation->set_rules("pd_tx_name", "Name", "trim|required");
			$this->form_validation->set_rules("pd_tx_addrs1", "Address", "trim|required");
			$this->form_validation->set_rules("pd_tx_phone", "Phone", "trim|required");
			$this->form_validation->set_rules("pd_tx_email", "Email", "trim|required");
			$this->form_validation->set_rules("pd_invoice", "Invoice", "trim|required");
			$this->form_validation->set_rules("pd_cid", "Client", "trim|required");
			$this->form_validation->set_rules("pd_bid", "Booking", "trim|required");
			$this->form_validation->set_rules("pd_pay_date", "Date", "trim|required");
			$this->form_validation->set_rules("pd_tx_date", "Date", "trim|required");
			$this->form_validation->set_rules("pd_tx_vehicle", "Vehicle", "trim|required");
			$this->form_validation->set_rules("pd_tx_type", "Type", "trim|required");
			$this->form_validation->set_rules("pd_tx_rno", "Code", "trim|required");
			$this->form_validation->set_rules("pd_tx_paymenttype", "Type", "trim|required");
			$this->form_validation->set_rules("pd_tx_vcolor", "Color", "trim|required");
			$this->form_validation->set_rules("pd_tx_studio", "Place", "trim|required");
			//$this->form_validation->set_rules("pd_tx_amount","Amount","trim|required");
			$this->form_validation->set_rules("pd_tx_model", "Model", "trim|required");
			$this->form_validation->set_rules("txt_booking_item", "Item", "trim|required");
			$this->form_validation->set_rules("txt_booking_qty", "Name", "trim|required");
			$this->form_validation->set_rules("txt_booking_rate", "Name", "trim|required");
			$this->form_validation->set_rules("txt_booking_tax", "Tax", "trim|required");
			$this->form_validation->set_rules("txt_warranty_year", "Year", "trim|required");
			$this->form_validation->set_rules("txt_booking_amount", "Amount", "trim|required");
			$this->form_validation->set_rules("invoice_isno", "Invoice Id", "trim|required");

			//$this->form_validation->set_rules("txt_gd_total","TotalAmount","trim|required");

			$this->form_validation->set_rules("bid", "Branch", "trim|required");

			$bid = $this->input->post('pd_bid');
			$count = $this->my_model->select_invoice_bid($bid);

			/*print_r($count);

			die();*/

			if (count($count) == 0) {

				$data = array('success' => false, 'messages' => '1');
			} else {

				if ($this->form_validation->run()) {
					$data = array('success' => false, 'messages' => 'run');


					$pd_tx_name = $this->input->post('pd_tx_name');
					$pd_tx_addrs1 = $this->input->post('pd_tx_addrs1');
					$pd_tx_phone = $this->input->post('pd_tx_phone');
					$pd_tx_email = $this->input->post('pd_tx_email');
					$pd_invoice = $this->input->post('pd_invoice');
					$pd_cid = $this->input->post('pd_cid');
					//    //    //    //    //$pd_cid =  $this->input->post('pd_cid');
					$pd_bid = $this->input->post('pd_bid');
					$pd_pay_date = $this->input->post('pd_pay_date');
					$pd_company_gst = $this->input->post('pd_company_gst');


					$pd_tx_date = $this->input->post('pd_tx_date');
					$pd_tx_vehicle = $this->input->post('pd_tx_vehicle');
					$pd_tx_type = $this->input->post('pd_tx_type');
					$pd_tx_rno = $this->input->post('pd_tx_rno');
					$pd_tx_paymenttype = $this->input->post('pd_tx_paymenttype');
					$pd_tx_vcolor = $this->input->post('pd_tx_vcolor');
					$pd_tx_studio = $this->input->post('pd_tx_studio');
					//    $pd_tx_amount =  $this->input->post('pd_tx_amount');

					$pd_tx_model = $this->input->post('pd_tx_model');

					$txt_cgst_cm = $this->input->post('txt_cgst_cm');
					$txt_sgst_cm = $this->input->post('txt_sgst_cm');
					$txt_igst_cm = $this->input->post('txt_igst_cm');

					$txt_gd_total = $this->input->post('txt_gd_total');

					$pd_tx_customer_gst = $this->input->post('pd_tx_customer_gst');

					$bid = $this->input->post('bid');

					$invoice_isno = $this->input->post('invoice_isno');
					$txt_booking_item = $this->input->post('txt_booking_item');
					$txt_booking_qty = $this->input->post('txt_booking_qty');
					$txt_booking_rate = $this->input->post('txt_booking_rate');
					$txt_booking_tax = $this->input->post('txt_booking_tax');
					$txt_warranty_year = $this->input->post('txt_warranty_year');
					$txt_booking_amount = $this->input->post('txt_booking_amount');

					$arr_invoice_isno = explode(",", $invoice_isno);
					$arr_booking_item = explode(",", $txt_booking_item);
					$arr_booking_qty = explode(",", $txt_booking_qty);
					$arr_booking_rate = explode(",", $txt_booking_rate);
					$arr_booking_tax = explode(",", $txt_booking_tax);
					$arr_warranty_year = explode(",", $txt_warranty_year);
					$arr_booking_amount = explode(",", $txt_booking_amount);

					for ($i = 0; $i < count($arr_booking_item); $i++) {
						$invoice_isno = $arr_invoice_isno[$i];
						$booking_item = $arr_booking_item[$i];
						$booking_qty = $arr_booking_qty[$i];
						$booking_rate = $arr_booking_rate[$i];
						$booking_tax = $arr_booking_tax[$i];
						$warranty_year = $arr_warranty_year[$i];
						$booking_amount = $arr_booking_amount[$i];

						/* $pd_invoice.','.$pd_tx_name.','.$booking_item.','.$booking_qty.','.$booking_rate.','.$booking_tax.','.$warranty_year.','.$booking_amount."\n";*/

						$bind = array('isno' => $invoice_isno,
							'booking_id' => $pd_bid,
							'customer_id' => $pd_cid,
							'invoice_number' => $pd_invoice,
							'paydate' => $pd_pay_date,
							'item_name' => $booking_item,
							'item_qty' => $booking_qty,
							'iteam_net_price' => $booking_rate,
							'iteam_discount' => $booking_tax,
							'iteam_price' => $booking_amount,
							'item_warranty' => $warranty_year,
							'vehicle' => $pd_tx_vehicle,
							'vehicle_type' => $pd_tx_type,
							'vehicle_regno' => $pd_tx_rno,
							'vehicle_model' => $pd_tx_model,
							'vehicle_color' => $pd_tx_vcolor,
							'coating_studio' => $pd_tx_studio,
							'bill_name' => $pd_tx_name,
							'bill_address' => $pd_tx_addrs1,
							'bill_email' => $pd_tx_email,
							'pay_mode' => $pd_tx_paymenttype,
							'bill_phone' => $pd_tx_phone,
							'created_date' => $pd_tx_date,
							'bid' => $bid,
							'cgst' => $txt_cgst_cm,
							'igst' => $txt_igst_cm,
							'sgst' => $txt_sgst_cm,
							'grand_total' => $txt_gd_total,
							'gst_number' => $pd_tx_customer_gst,
						);

//						$data =  array('success' => true,'messages'=>$bind );


						$update_info = $this->my_model->update_invoice($bind);
//						echo json_encode($bind);

						$data = array('success' => true, 'messages' => $update_info);
						// print_r($bind);
					}



				} else {
//					$data = array('success' => false, 'messages' => 'not run');

					foreach ($_POST as $key => $value) {

						$data['messages'][$key] = form_error($key);

					}

				}

			}

			echo json_encode($data);

			//print_r(expression)

		}

    public function add_booking_bind()
    {

        $data = array('success' => false, 'messages' => array());

        //$this->form_validation->set_rules("membership_id","Member ID","trim|required");
        $this->form_validation->set_rules("car_name", "Car Name", "trim|required");
        $this->form_validation->set_rules("car_no", "Car Number", "trim|required");
        $this->form_validation->set_rules("date_time", "Date Time", "trim|required");
        $this->form_validation->set_rules("price", "Total Price", "trim|required");
        $this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');
        if ($this->form_validation->run()) {
            $mid = $this->input->post('membership_id');

            $car_colour = $this->input->post('car_colour');

            $car_detail = $this->input->post('car_detail');

            $date_time = $this->input->post('date_time');

            $picup_location = $this->input->post('picup_location');

            $description = $this->input->post('description');

            $price = $this->input->post('price');

            $advance_receive = $this->input->post('advance_receive');

            $package = $this->input->post('package');

            $car_name = $this->input->post('car_name');

            $car_no = $this->input->post('car_no');

            $bid_hid = $this->input->post('bid_hid');

            $date_time = $this->input->post('date_time');

            $cmd = $this->my_model->get_customer_data($mid);

            $count = count($cmd);

            $client_number = $cmd[0]->number;

            $client_email = $cmd[0]->email;

            if ($count > 0) {

                $get_bk = $this->my_model->get_booking_limit();

                $mm = $get_bk[0]->sno;

                $count_bk = count($get_bk);

                $booking_id = 'DSBK00' . ($mm + 1);

                //$this->

                //    $data = array('success' => true,'messages'=>$booking_id);

                $bind = array('booking_id' => $booking_id,
                    'vehicle' => $car_no,
                    'vehicle_name' => $car_name,
                    'vehicle_color' => $car_colour,
                    'remark_vehicle' => $car_detail,
                    'date' => $date_time,
                    'pickup' => $picup_location,
                    'remark_package' => $description,
                    'price' => $price,
                    'advance' => $advance_receive,
                    'status' => '1',
                    'bid' => $bid_hid,
                    'package' => $package,
                    'customer_id' => $mid);

                $cmd = $this->my_model->insert_booking($bind);

                $data = array('success' => true, 'messages' => $client_number);
                $curl = curl_init();

                curl_setopt_array($curl, array(
                    CURLOPT_URL => "http://api.msg91.com/api/sendhttp.php?sender=DTSTRT&route=4&mobiles=$client_number&authkey=213786A8EZYX2C5aec1fbe&country=91&message=Thank you for booking at Detailing Street. Your Booking ID is $booking_id and appointment date is $date_time. The total booking amount is Rs. $price with token amount Rs. $advance_receive&DLT_TE_ID=1307161717199222102",
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => "",
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 30,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => "POST",
                    CURLOPT_POSTFIELDS => "",
                    CURLOPT_SSL_VERIFYHOST => 0,
                    CURLOPT_SSL_VERIFYPEER => 0,
                ));

                $response = curl_exec($curl);
                $err = curl_error($curl);

                curl_close($curl);

                /*mail send to client */

                $config = array(
                    'protocol' => 'ssmtp',
                    'smtp_host' => 'ssl://ssmtp.gmail.com',
                    'mailtype' => 'html',
                    'charset' => 'utf-8',
                    'priority' => '1',
                );
                $this->email->initialize($config);

                $from_email = "care@detailingstreet.com";
                //  $to_email = $this->input->post('email');

                //Load email library
                $this->email->from($from_email, 'Detailing Street');
                $this->email->to($client_email);
                // $this->email->subject('Detailing Street Booking Details');
                // $this->email->message($body);

                $this->email->subject('Important !! Booking Details');
                $this->email->message('<!doctype html><html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office"> <head> <meta charset="UTF-8"> <meta http-equiv="X-UA-Compatible" content="IE=edge"> <meta name="viewport" content="width=device-width, initial-scale=1"> <title></title> <style type="text/css">p{margin:10px 0;padding:0;}table{border-collapse:collapse;}h1,h2,h3,h4,h5,h6{display:block;margin:0;padding:0;}img,a img{border:0;height:auto;outline:none;text-decoration:none;}body,#bodyTable,#bodyCell{height:100%;margin:0;padding:0;width:100%;}.mcnPreviewText{display:none !important;}#outlook a{padding:0;}img{-ms-interpolation-mode:bicubic;}table{mso-table-lspace:0pt;mso-table-rspace:0pt;}.ReadMsgBody{width:100%;}.ExternalClass{width:100%;}p,a,li,td,blockquote{mso-line-height-rule:exactly;}a[href^=tel],a[href^=sms]{color:inherit;cursor:default;text-decoration:none;}p,a,li,td,body,table,blockquote{-ms-text-size-adjust:100%;-webkit-text-size-adjust:100%;}.ExternalClass,.ExternalClass p,.ExternalClass td,.ExternalClass div,.ExternalClass span,.ExternalClass font{line-height:100%;}a[x-apple-data-detectors]{color:inherit !important;text-decoration:none !important;font-size:inherit !important;font-family:inherit !important;font-weight:inherit !important;line-height:inherit !important;}a.mcnButton{display:block;}.mcnImage,.mcnRetinaImage{vertical-align:bottom;}.mcnTextContent{word-break:break-word;}.mcnTextContent img{height:auto !important;}.mcnDividerBlock{table-layout:fixed !important;}body,#bodyTable{background-color:#F2F2F2;}#bodyCell{border-top:0;}#ribbonContainer{background-color:#6DC6DD;}#templateContainer{border:0;}h1{color:#202020 !important;font-family:Helvetica;font-size:24px;font-style:normal;font-weight:bold;line-height:125%;letter-spacing:-1px;text-align:left;}h2{color:#202020 !important;font-family:Helvetica;font-size:22px;font-style:normal;font-weight:bold;line-height:125%;letter-spacing:-.75px;text-align:left;}h3{color:#202020 !important;font-family:Helvetica;font-size:18px;font-style:normal;font-weight:bold;line-height:125%;letter-spacing:-.5px;text-align:left;}h4{color:#202020 !important;font-family:Helvetica;font-size:16px;font-style:normal;font-weight:bold;line-height:125%;letter-spacing:normal;text-align:left;}#templatePreheader{background-color:#FFFFFF;border-top:0;border-bottom:1px solid #EEEEEE;}.preheaderContainer .mcnTextContent,.preheaderContainer .mcnTextContent p{color:#606060;font-family:Helvetica;font-size:11px;line-height:125%;text-align:left;}.preheaderContainer .mcnTextContent a{color:#606060;font-weight:normal;text-decoration:underline;}#templateHeader{background-color:#F2F2F2;border-top:0;border-bottom:0;}.headerContainer .mcnTextContent,.headerContainer .mcnTextContent p{color:#606060;font-family:Helvetica;font-size:15px;line-height:150%;text-align:left;}.headerContainer .mcnTextContent a{color:#6DC6DD;font-weight:normal;text-decoration:underline;}#templateBody{background-color:#F2F2F2;border-top:0;border-bottom:0;}.bodyContainer .mcnTextContent,.bodyContainer .mcnTextContent p{color:#606060;font-family:Helvetica;font-size:15px;line-height:150%;text-align:left;}.bodyContainer .mcnTextContent a{color:#6DC6DD;font-weight:normal;text-decoration:underline;}#templateFooter{background-color:#F2F2F2;border-top:1px solid #E5E5E5;border-bottom:0;}.footerContainer .mcnTextContent,.footerContainer .mcnTextContent p{color:#606060;font-family:Helvetica;font-size:11px;line-height:125%;text-align:left;}.footerContainer .mcnTextContent a{color:#606060;font-weight:normal;text-decoration:underline;}@media only screen and (max-width: 480px){body,table,td,p,a,li,blockquote{-webkit-text-size-adjust:none !important;}}@media only screen and (max-width: 480px){body{width:100% !important;min-width:100% !important;}}@media only screen and (max-width: 480px){.templateContainer{max-width:600px !important;width:100% !important;}}@media only screen and (max-width: 480px){.templateContainer,#templatePreheader,#templateHeader,#templateBody,#templateFooter{max-width:600px !important;width:100% !important;}}@media only screen and (max-width: 480px){.flexibleContainer{width:100% !important;}}@media only screen and (max-width: 480px){.mcnRetinaImage{max-width:100% !important;}}@media only screen and (max-width: 480px){.mcnImage{height:auto !important;width:100% !important;}}@media only screen and (max-width: 480px){.mcnCartContainer,.mcnCaptionTopContent,.mcnRecContentContainer,.mcnCaptionBottomContent,.mcnTextContentContainer,.mcnBoxedTextContentContainer,.mcnImageGroupContentContainer,.mcnCaptionLeftTextContentContainer,.mcnCaptionRightTextContentContainer,.mcnCaptionLeftImageContentContainer,.mcnCaptionRightImageContentContainer,.mcnImageCardLeftTextContentContainer,.mcnImageCardRightTextContentContainer,.mcnImageCardLeftImageContentContainer,.mcnImageCardRightImageContentContainer{max-width:100% !important;width:100% !important;}}@media only screen and (max-width: 480px){.mcnBoxedTextContentContainer{min-width:100% !important;}}@media only screen and (max-width: 480px){.mcnImageGroupContent{padding:9px !important;}}@media only screen and (max-width: 480px){.mcnCaptionLeftContentOuter .mcnTextContent,.mcnCaptionRightContentOuter .mcnTextContent{padding-top:9px !important;}}@media only screen and (max-width: 480px){.mcnImageCardTopImageContent,.mcnCaptionBottomContent:last-child .mcnCaptionBottomImageContent,.mcnCaptionBlockInner .mcnCaptionTopContent:last-child .mcnTextContent{padding-top:18px !important;}}@media only screen and (max-width: 480px){.mcnImageCardBottomImageContent{padding-bottom:9px !important;}}@media only screen and (max-width: 480px){.mcnImageGroupBlockInner{padding-top:0 !important;padding-bottom:0 !important;}}@media only screen and (max-width: 480px){.mcnImageGroupBlockOuter{padding-top:9px !important;padding-bottom:9px !important;}}@media only screen and (max-width: 480px){.mcnTextContent,.mcnBoxedTextContentColumn{padding-right:18px !important;padding-left:18px !important;}}@media only screen and (max-width: 480px){.mcnImageCardLeftImageContent,.mcnImageCardRightImageContent{padding-right:18px !important;padding-bottom:0 !important;padding-left:18px !important;}}@media only screen and (max-width: 480px){.mcpreview-image-uploader{display:none !important;width:100% !important;}}@media only screen and (max-width: 480px){h1{font-size:24px !important;line-height:125% !important;}}@media only screen and (max-width: 480px){h2{font-size:20px !important;line-height:125% !important;}}@media only screen and (max-width: 480px){h3{font-size:18px !important;line-height:125% !important;}}@media only screen and (max-width: 480px){h4{font-size:16px !important;line-height:125% !important;}}@media only screen and (max-width: 480px){.mcnBoxedTextContentContainer .mcnTextContent,.mcnBoxedTextContentContainer .mcnTextContent p{font-size:18px !important; line-height:125% !important;}}@media only screen and (max-width: 480px){#templatePreheader{display:block !important;}}@media only screen and (max-width: 480px){.preheaderContainer .mcnTextContent,.preheaderContainer .mcnTextContent p{font-size:14px !important;line-height:115% !important;}}@media only screen and (max-width: 480px){.headerContainer .mcnTextContent,.headerContainer .mcnTextContent p{font-size:18px !important;line-height:125% !important;}}@media only screen and (max-width: 480px){.bodyContainer .mcnTextContent,.bodyContainer .mcnTextContent p{font-size:18px !important;line-height:125% !important;}}@media only screen and (max-width: 480px){.footerContainer .mcnTextContent,.footerContainer .mcnTextContent p{font-size:14px !important;line-height:115% !important;}}</style></head> <body leftmargin="0" marginwidth="0" topmargin="0" marginheight="0" offset="0"> <span class="mcnPreviewText" style="display:none; font-size:0px; line-height:0px; max-height:0px; max-width:0px; opacity:0; overflow:hidden; visibility:hidden; mso-hide:all;"> DETAILING STREET SERVICES </span> <center> <table align="center" border="0" cellpadding="0" cellspacing="0" height="100%" width="100%" id="bodyTable"> <tr> <td align="center" valign="top" id="bodyCell"> <table border="0" cellpadding="0" cellspacing="0" width="100%"> <tr> <td align="center" valign="top"> <table border="0" cellpadding="0" cellspacing="0" width="100%" id="templatePreheader"> <tr> <td align="center" valign="top"> <table border="0" cellpadding="0" cellspacing="0" width="640" class="flexibleContainer"> <tr> <td valign="top" class="preheaderContainer" style="padding-top:10px; padding-bottom:10px"><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnTextBlock" style="min-width:100%;"> <tbody class="mcnTextBlockOuter"> <tr> <td valign="top" class="mcnTextBlockInner" style="padding-top:9px;"> <table align="left" border="0" cellpadding="0" cellspacing="0" style="max-width:100%; min-width:100%;" width="100%" class="mcnTextContentContainer"> <tbody><tr> <td valign="top" class="mcnTextContent" style="padding: 0px 18px 9px; text-align: center;"> <a href="*|ARCHIVE|*" target="_blank">View this email in your browser</a> </td></tr></tbody></table> </td></tr></tbody></table></td></tr></table> </td></tr></table> </td></tr><tr> <td align="center" valign="top"> <table border="0" cellpadding="0" cellspacing="0" width="640" class="templateContainer"> <tr> <td align="center" valign="top" width="60" id="ribbonContainer"> <table border="0" cellpadding="0" cellspacing="0"> <tr> <td align="center" valign="top" style="padding-top:18px; padding-right:4px; padding-bottom:18px; padding-left:4px;"> <img src="http://crm.detailingstreet.com/assets/img/logo-trans.png" height="40" width="40" class="mcnImage" style="border:0; display:block; line-height:100%; outline:none; text-decoration:none;"> </td></tr></table> </td><td align="center" valign="top" class="mobilePaddingR9" style="padding-bottom:9px; padding-left:9px;"> <table border="0" cellpadding="0" cellspacing="0" width="100%"> <tr> <td align="center" valign="top" style="padding-top:9px;"> <table border="0" cellpadding="0" cellspacing="0" width="100%" id="templateHeader"> <tr> <td valign="top" class="headerContainer"><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnImageBlock" style="min-width:100%;"> <tbody class="mcnImageBlockOuter"> <tr> <td valign="top" style="padding:9px" class="mcnImageBlockInner"> <table align="left" width="100%" border="0" cellpadding="0" cellspacing="0" class="mcnImageContentContainer" style="min-width:100%;"> <tbody><tr> <td class="mcnImageContent" valign="top" style="padding-right: 9px; padding-left: 9px; padding-top: 0; padding-bottom: 0; text-align:center;"> <a href="http://crm.detailingstreet.com/assets/img/logo-trans.png" title="" class="" target="_blank"> <img align="center" alt="" src="http://crm.detailingstreet.com/assets/img/logo-trans.png" width="233" style="max-width:233px; padding-bottom: 0; display: inline !important; vertical-align: bottom;" class="mcnImage"> </a> </td></tr></tbody></table> </td></tr></tbody></table></td></tr></table> </td></tr><tr> <td align="center" valign="top"> <table border="0" cellpadding="0" cellspacing="0" width="100%" id="templateBody"> <tr> <td valign="top" class="bodyContainer"><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnTextBlock" style="min-width:100%;"> <tbody class="mcnTextBlockOuter"> <tr> <td valign="top" class="mcnTextBlockInner" style="padding-top:9px;"> <table align="left" border="0" cellpadding="0" cellspacing="0" style="max-width:100%; min-width:100%;" width="100%" class="mcnTextContentContainer"> <tbody><tr> <td valign="top" class="mcnTextContent" style="padding-top:0; padding-right:18px; padding-bottom:9px; padding-left:18px;"> <strong>Dear Customer</strong>,<br><br>&nbsp;&nbsp;<table border="0" cellpadding="0" cellspacing="0" width="95%"><tbody><tr><td align="left" valign="middle">Congratulations! Your&nbsp;vehicle&nbsp;is&nbsp;booked&nbsp;with the following details:</td></tr><tr><td align="left" valign="middle"><br>Booking&nbsp;ID :&nbsp; ' . $booking_id . '<br>Membership ID :&nbsp;' . $mid . '<br>Car&nbsp;/Bike No. :&nbsp;' . $car_name . '<br><br>Workshop : Detailing Street<br>Preferred Date : ' . $date_time . '<br>Total Amount :&nbsp;' . $price . '<br>Token Amount :&nbsp;' . $advance_receive . '</td></tr><tr></tr></tbody></table><br>Thanks for a great year.<br><br><br>Thank you!<br><br>Team Detailing Street <br>&nbsp; </td></tr></tbody></table> </td></tr></tbody></table></td></tr></table> </td></tr><tr> <td align="center" valign="top"> <table border="0" cellpadding="0" cellspacing="0" width="100%" id="templateFooter"> <tr> <td valign="top" class="footerContainer" style="padding-bottom:9px;"></td></tr></table> </td></tr></table> </td></tr></table> </td></tr></table> </td></tr></table> </center> </body></html>');

                //Send mail
                if ($this->email->send()) {
                    $this->session->set_flashdata("email_sent", "Email sent successfully.");
                } else {
                    $this->session->set_flashdata("email_sent", "Error in sending Email.");
                    /* $this->load->view('email_form'); */
                }
            } else {

                $data = array('success' => false, 'messages' => '0');

            }

        } else {

            foreach ($_POST as $key => $value) {

                $data['messages'][$key] = form_error($key);

            }

        }

        echo json_encode($data);

    }

    public function new_maintainance(){
		$this->load->view('admin/new_maintainance');
	}

	public function get_appointments(){
		$date = $this->input->get('date');
		$branch = $this->input->get('branch');

		$table='appointment';
		$where = array('date' => $date , 'branch' => $branch);

		$cmd = $this->my_model->get_dynamic_where($table, $where);

		echo json_encode($cmd);
	}

	public function add_appointment(){
		$data = array('success' => false, 'messages' => array());
		$this->form_validation->set_rules("date", "Date", "trim|required");
		$this->form_validation->set_rules("branch", "Branch", "trim|required|alpha_numeric_spaces");
		$this->form_validation->set_rules("bid", "Booking Id", "trim|required|alpha_numeric_spaces");
		$this->form_validation->set_rules("time", "Time", "trim|required");
		$this->form_validation->set_rules("comment", "Comment", "trim|required");
		$this->form_validation->set_error_delimiters('<p class="text-danger" style="color:red;">', '</p>');
		if ($this->form_validation->run()) {
			$flag = 1;
			$date = $this->input->post('date');

			$time = $this->input->post('time');

			$branch = $this->input->post('branch');

			$bid = $this->input->post('bid');

			$comment = $this->input->post('comment');

			$where_m = array('booking_id' => $bid);
			$orderby12 = array('sno' => 'ASC');
			$booking_id=$this->my_model->get_dynamic_wherein('booking',$where_m,$orderby12);

			if (! $booking_id) {
				$flag = 0;
			}


			$bind = array('date' => $date,

				'time' => $time,

				'branch' => $branch,

				'booking_id' => $bid,

				'comment' => $comment,

			);

			if($flag==1){
			$cmd_rt = $this->my_model->insert_appointment($bind);

			$data = array('success' => true, 'messages' => $bind);
		}else {
				$data = array('success' => false, 'messages' => '1');
			}

		} else {

			foreach ($_POST as $key => $value) {

				$data['messages'][$key] = form_error($key);

			}

		}

		echo json_encode($data);
	}

	public function del_appointment()
	{
		$sno = $this->input->post('sno');

		//

		$bind = array('id' => $sno);
		$table = 'appointment';
		$b = $this->my_model->delete_fun($table, $bind);
		return $b;

	}

	public function maintainance_history(){
		$this->load->view('admin/maintainance_history');
	}

	public function get_appointment_history(){

		$bid = $this->input->get('bid');
		$table='appointment';
		$where = array('booking_id' => $bid );

		$cmd = $this->my_model->get_dynamic_where($table, $where);

		echo json_encode($cmd);
	}


}
