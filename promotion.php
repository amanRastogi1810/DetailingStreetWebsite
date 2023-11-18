<?php

 

$url='http://crm.detailingstreet.com/crm/promotion'; 

// rss link for the twitter timeline

 //get_data($url);

// dumps the content, you can manipulate as you wish to
 
// die();

/* gets the data from a URL */

 
$ch = curl_init();

$timeout = 5;

curl_setopt($ch,CURLOPT_URL,$url);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,$timeout);

$data = curl_exec($ch);

$customer_data = json_decode($data);

 $today = date('Y-m-d');

    $d2 = date_create($today);

 //  $date_td=date_create($today);
  //echo $date_today =  date_format($date_td,"Y-m-d");
    

    $out = array();

    foreach ($customer_data as $row ) {


        $date1=date_create($row->date);
        $date =  date_format($date1,"Y-m-d");

        $number = $row->date;
       
        $vname = $row->vehicle_name;
        $name = $row->name;
        $bdate = $row->date;
        $cid = $row->customer_id;
        $mob = $row->number;
		$vnum = $row->vehicle;
	    $package = $row->package;
				
				
        $d1 = date_create($date);

        $interval = date_diff($d1, $d2);

        $as = $interval->format('%a');
         
        /*  echo $as."->".$mob;
          echo "<br>";*/
          //DSMB00177   DSMB0062
          
          	$authentication_key = "213786A8EZYX2C5aec1fbe";
          
        if($package=='Silver'){
      	$silver= array("181","182","183","360","361","362");
      	if(in_array($interval->days, $silver)){
			$curl = curl_init();


		

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
		  $gold= array("181","182","183","360","361","362",
			  "540","541","542","720","721","722",
			  "900","901","902","1080","1081","1082");
		  if(in_array($interval->days, $gold)){
			  $curl = curl_init();



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
		  $platinum= array("181","182","183","360","361","362",
			  "540","541","542","720","721","722",
			  "900","901","902","1080","1081","1082",
			  "1260","1261","1262","1440","1441","1442",
			  "1620","1621","1622","1800","1801","1802");

		  if(in_array($interval->days, $platinum)){
			  $curl = curl_init();


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
		  $platplus= array("181","182","183","360","361","362",
			  "540","541","542","720","721","722",
			  "900","901","902","1080","1081","1082",
			  "1260","1261","1262","1440","1441","1442",
			  "1620","1621","1622","1800","1801","1802",
			  "1980","1981","1982","2160","2161","2162",
			  "2340","2341","2342","2520","2521","2522",
			  "2700","2701","2702","2880","2881","2882",
			  "3060","3061","3062","3240","3241","3242",
			  "3420","3421","3422","3600","3601","3602");
		  if(in_array($interval->days, $platplus)){
			  $curl = curl_init();



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
        else
        {
        	$out[] = '{"message:False"}';
        }
    }


print_r($out);
//curl_close($ch);

 

?>
