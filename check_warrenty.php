<?php
$phone_no=$_POST['number1'];
$otp=$_POST['otp'];
if (($phone_no==""))
{
echo "Please enter mobile number";  
} else if (($otp=="")) {
    echo "Please enter otp";  
}
else {
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "detailingstreet";

// Mobile number to search for
$mobileNumber = "1234567890"; // Example mobile number

try {
    // Establish database connection
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // Set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Prepare SQL statement with a placeholder for the mobile number
    $stmt = $conn->prepare("SELECT * FROM customer WHERE number = :phone_no");
    
    // Bind the mobile number parameter to the prepared statement
    $stmt->bindParam(':phone_no', $phone_no);
    
    // Execute the prepared statement
    $stmt->execute();
    
    // Fetch the user data
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
    // Output the user data
    if ($user) {
        if ($user['mobile_otp'] != $otp) {
            echo ('Invalid otp');
        } else {
            $stmt1 = $conn->prepare("SELECT * FROM booking WHERE customer_id = :customer_id");
            $stmt1->bindParam(':customer_id', $user['customer_id']);
            $stmt1->execute();
            $booking = $stmt1->fetchAll(PDO::FETCH_ASSOC);
            $html_content = "";
            foreach($booking as $item) {
                $html_content = $html_content.'<tr>';
                // print_r($booking['sno']);
                $date = $item['date'];
                $vehicle_name = $item['vehicle_name'];
                $vehicle = $item['vehicle'];
                $package = $item['package'];

                $purchased_date = $item['date'];
                // $currentDate = date('Y/m/d');
                $currentDate = new DateTime();
                $status = '';
                if ($package == 'Silver') {
                    $givenDateTime = new DateTime($date);
                    $interval = $givenDateTime->diff($currentDate);
                    $years = $interval->y;
                
                    if ($years > 0) {
                        $status = 'InActive';
                    } else {
                        $status = 'Active';
                    }
                } else if ($package == 'Gold') {
                    $givenDateTime = new DateTime($date);
                    $interval = $givenDateTime->diff($currentDate);
                    $years = $interval->y;
                
                    if ($years > 3) {
                        $status = 'InActive';
                    } else {
                        $status = 'Active';
                    }
                } else if ($package == 'Platinum') {
                    $givenDateTime = new DateTime($date);
                    $interval = $givenDateTime->diff($currentDate);
                    $years = $interval->y;
                
                    if ($years > 5) {
                        $status = 'InActive';
                    } else {
                        $status = 'Active';
                    }
                } else if ($package == 'Platinum Plus') {
                    $givenDateTime = new DateTime($date);
                    $interval = $givenDateTime->diff($currentDate);
                    $years = $interval->y;
                
                    if ($years > 10) {
                        $status = 'InActive';
                    } else {
                        $status = 'Active';
                    }
                } else if ($package == 'PPF (5 years)') {
                    $givenDateTime = new DateTime($date);
                    $interval = $givenDateTime->diff($currentDate);
                    $years = $interval->y;
                
                    if ($years > 5) {
                        $status = 'InActive';
                    } else {
                        $status = 'Active';
                    }
                } else if ($package == 'PPF (10 years)') {
                    $givenDateTime = new DateTime($date);
                    $interval = $givenDateTime->diff($currentDate);
                    $years = $interval->y;
                
                    if ($years > 10) {
                        $status = 'InActive';
                    } else {
                        $status = 'Active';
                    }
                } else if ($package == 'Graphene (5 years)') {
                    $givenDateTime = new DateTime($date);
                    $interval = $givenDateTime->diff($currentDate);
                    $years = $interval->y;
                
                    if ($years > 5) {
                        $status = 'InActive';
                    } else {
                        $status = 'Active';
                    }
                } else if ($package == 'Graphene (10 years)') {
                    $givenDateTime = new DateTime($date);
                    $interval = $givenDateTime->diff($currentDate);
                    $years = $interval->y;
                
                    if ($years > 10) {
                        $status = 'InActive';
                    } else {
                        $status = 'Active';
                    }
                }


                $html_content = $html_content."<td style='text-align:center;border-top:1px solid #000;'> $date </td>";
                $html_content = $html_content."<td style='text-align:center;border-top:1px solid #000;'>$vehicle_name</td>";
                $html_content = $html_content."<td style='text-align:center;border-top:1px solid #000;'> $vehicle</td>";
                $html_content = $html_content."<td style='text-align:center;border-top:1px solid #000;'> $package</td>";
                $html_content = $html_content."<td style='text-align:center;border-top:1px solid #000;'> $status</td>";
            
                $html_content = $html_content.'</tr>';
            }
            echo 
            '
            <table class="table table-striped" id="tbl_invoice" border="1" cellspacing="0" cellpadding="0" style="width:90%; margin-top:2rem;">
                        <thead style="background-color:#c52d2d !important;">
                            <tr >
                                <th style="color:white">Booking Date</th>
                                <th style="color:white">Vehicle Name</th>
                                <th style="color:white">Vehicle Number</th>
                                <th style="color:white">Package</th>
                                <th style="color:white">Status</th>
                            </tr>
                        </thead>
                        <tbody id="tbody">
                            <tr>
                                '.$html_content.'
                            </tr>
                        </tbody>
                    </table>
            ';
        }
    } else {
        echo "No user found with mobile number $phone_no";
    }
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

// Close the database connection
$conn = null;
}