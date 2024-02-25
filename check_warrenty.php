<?php
$phone_no=$_POST['phone_no'];
if (($phone_no==""))
{
echo "Please enter mobile number";  
} else {
$servername = "127.0.0.1";
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

            $html_content = $html_content."<td style='text-align:center;border-top:1px solid #000;'> $date </td>";
            $html_content = $html_content."<td style='text-align:center;border-top:1px solid #000;'>$vehicle_name</td>";
            $html_content = $html_content."<td style='text-align:center;border-top:1px solid #000;'> $vehicle</td>";
            $html_content = $html_content."<td style='text-align:center;border-top:1px solid #000;'> $package</td>";
        
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
                        </tr>
                    </thead>
                    <tbody id="tbody">
                        <tr>
                            '.$html_content.'
                        </tr>
                    </tbody>
                </table>
        ';
    } else {
        echo "No user found with mobile number $mobileNumber";
    }
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

// Close the database connection
$conn = null;
}