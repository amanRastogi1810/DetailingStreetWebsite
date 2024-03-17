<?php
$phone_no=$_POST['phone_no'];
if (($phone_no==""))
{
echo "Please enter mobile number";  
} else {
    $servername = "172.31.2.145";
    $username = "mukul_2212";
    $password = "P.&QA!rI+F2~";
    $dbname = "mukul_database";
    // $servername = "127.0.0.1";
    // $username = "root";
    // $password = "";
    // $dbname = "detailingstreet";
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
        $stmt = $conn->prepare("UPDATE customer SET mobile_otp = :mobile_otp, mobile_otp_time = :mobile_otp_time WHERE number = :phone_no");
        $stmt->bindParam(':phone_no', $phone_no);
        $currentDate = date('y-m-d h:i:s');
        $random_number = random_int(100000, 999999);
        $stmt->bindParam(':mobile_otp', $random_number);        
        $stmt->bindParam(':mobile_otp_time', $currentDate);
        
        $stmt->execute();
        $curl = curl_init();

                curl_setopt_array($curl, array(
                    CURLOPT_URL => "http://api.msg91.com/api/sendhttp.php?sender=DTSTRT&route=4&mobiles=$phone_no&authkey=213786A8EZYX2C5aec1fbe&country=91&message=Your Detailing Street warranty check OTP is $random_number&DLT_TE_ID=1307165416338648146",
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
        echo "Otp sent to user";
        echo $err;
    } else {
        echo "No user found with mobile number $phone_no";
    }
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

// Close the database connection
$conn = null;
}