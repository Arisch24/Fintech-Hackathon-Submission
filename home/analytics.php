<?php
require_once('../config/userHeader.php');
require_once('../database/db.php');


$sql = "SELECT phone_number FROM users WHERE id=". $_SESSION['id'];
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result) > 0){
    $data = mysqli_fetch_assoc($result);
    $phoneNum = $data['phone_number'];
}
?>

<section class="py-4" id="analytics-section">
    <div class="container py-5 px-3">
        <div class="container-fluid">
            <h1 class="display-4 text-center">Your Analytics</h1>
            <hr class="mb-5">
            <!-- Wallet -->
            <div class="box shadow border-top border-3 border-info p-4 h-100 bg-light mx-auto mb-5">
                <h1 class="display-6 mb-3">E-Wallet</h1>
                <hr class="my-3 text-dark">
                <h2 class="text-info">RM10,000</h1>
                <h3 class="float-end">2.3&percnt;</h1>
            </div>
            <!-- Cards -->
            <div class="row" id="boxes">
                <div class="col-12 col-md-4 mb-4">
                    <div class="box shadow border-top border-3 border-info bg-light p-4 h-100">
                        <h1 class="display-6 mb-3">Current Balance</h1>
                        <hr class="my-3 text-dark">
                        <h2 class="text-info">RM10,000</h1>
                        <h3 class="float-end">2.3&percnt;</h1>
                    </div>
                </div>
                <div class="col-12 col-md-4 mb-4">
                    <div class="box shadow border-top border-3 border-info bg-light p-4 h-100">
                        <h1 class="display-6 mb-3">Current Expenses</h1>
                        <hr class="my-3 text-dark">
                        <h2 class="text-info">RM10,000</h1>
                        <h3 class="float-end">2.3&percnt;</h1>
                    </div>
                </div>
                <div class="col-12 col-md-4 mb-4">
                    <div class="box shadow border-top border-3 border-info bg-light p-4 h-100">
                        <h1 class="display-6 mb-3">Current Income</h1>
                        <hr class="my-3 text-dark">
                        <h2 class="text-info">&dollar;10,000</h1>
                        <h3 class="float-end">2.3&percnt;</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container px-5 py-3">
        <div class="row justify-content-center">
            <table class="table table-bordered table-striped border-dark table-hover">
                <thead>
                    <tr class="table-info table-responsive-sm">
                        <th scope="col">Card Number</th>
                        <th scope="col">Card Scheme</th>
                        <th scope="col">Date Transferred</th>
                        <th scope="col">Billing Amount</th>
                        <th scope="col">Payment Description</th>
                        <th scope="col">Payment Type</th>
                    </tr>
                </thead>
                <!-- Transaction History -->
                <?php
                //define certifcate and random values
                require_once('../API/certDetails.php');
                $sequenceNo = rand(1000000000000000, 9999999999999999);
                //required parameters
                $params = array(
                    "sequenceNo"=>$sequenceNo,
                    "FI"=>"004665",
                    "sourceSystem"=>"HCK",
                    "userID"=>$phoneNum,
                    "trxMth"=>"",
                    "trxMID"=>"",
                    "signedMessage"=>""
                );
                //curl url
                $endpoint = 'https://dev.finexusgroup.com:10501/fnxc/portal/ws/transactionHistory.action';
                $url = $endpoint . '?' . http_build_query($params);
                curl_setopt($ch, CURLOPT_URL, $url);
                $resp = curl_exec($ch);
                curl_close($ch);
                // output
                $decode = json_decode($resp, true);
                if($decode['responseCode'] != 000000){
                    // get error
                    $responseError = $decode['responseDescription'];
                    echo '<h1>'.$responseError.'</h1>';
                }
                else{
                    echo 
                    '<tr>
                        <td>'.$decode['data'][0]['maskedPAN'].'</td>
                        <td>'.$decode['data'][0]['cardScheme'].'</td>
                        <td>'.$decode['data'][0]['trxDate'].'</td>
                        <td>RM'.$decode['data'][0]['billingAmt'].'</td>
                        <td>'.$decode['data'][0]['trxDescription'].'</td>
                        <td>'.$decode['data'][0]['TCC_desc'].'</td>
                    </tr>';
                }
                ?>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</section>

<?php
require_once('../config/userFooter.php');
mysqli_close($conn);
?>