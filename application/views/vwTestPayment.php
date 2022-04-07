<script type="text/javascript" src="https://www.foloosi.com/js/foloosipay.v2.js"></script>

<?php

$uniqueId = uniqid();

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://foloosi.com/api/v1/api/initialize-setup',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => array('redirect_url' => 'https://localhost/vinita-michel/home/callback', 'transaction_amount' => '100', 'cart_id' => $uniqueId, 'currency' => 'AED','customer_name' => 'Ram','customer_email' => 'ram@infoquest.com','customer_mobile' => '9876543210'),
  CURLOPT_HTTPHEADER => array(
    'merchant_key: test_$2y$10$-XuWVAtVufMXugE28lnpU.i9n8tie7gqoax5y88Ne.7mbZ4Tv4xgm'
  ),
));

$response = curl_exec($curl);

curl_close($curl);
$response = json_decode($response);

$token = '';

if (isset($response->data->reference_token) && !empty($response->data->reference_token)) {
  
  $token = $response->data->reference_token;

}


?>

<script type="text/javascript">
    var options = {
        "reference_token" : "<?= $token ?>", //which is get from step2
        "merchant_key" : "test_$2y$10$-XuWVAtVufMXugE28lnpU.i9n8tie7gqoax5y88Ne.7mbZ4Tv4xgm"
    }

    var fp1 = new Foloosipay(options);
    fp1.open();

    foloosiHandler(response, function (e) {
       if(e.data.status == 'success'){
          //responde success code
          console.log(e);
          console.log(e.data);
          console.log(e.data.status);
          console.log(e.data.data.transaction_no);
          if (e.data.data.transaction_no != '') {
            window.location.href = e.data.data.redirect_url;
          }
       }
       if(e.data.status == 'error'){
          //responde success code
          console.log(e.data.status);
          console.log(e.data.data.payment_status);
       }
       if(e.data.status == 'closed'){
          //Payment Popup Closed
          console.log(e.data);
       }
    });
</script>

