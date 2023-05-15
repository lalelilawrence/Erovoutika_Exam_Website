<?php

require (__DIR__.'/paymongo_instance.php');
require (__DIR__.'/../includes/connectdb.php');


$examID = mysqli_real_escape_string($connectdb, $_POST['exam_id']);
$examPrice = mysqli_real_escape_string($connectdb, $_POST['price']);
$userID = mysqli_real_escape_string($connectdb, $_POST['user_id']);

$paymentIntent = $client->paymentIntents->create([
    "amount" => $examPrice * 100,
    "payment_method_allowed" => [
        "gcash",
        "paymaya",
        "grab_pay",
        "card"
    ],
    "currency" => "PHP",
    "capture_type" => "automatic"
]);


$data["pi"] = $paymentIntent->id;
$data["u"] = $userID;


$qry = "INSERT INTO `tbtransaction` (`transactionID`, 
                                     `ExID`, 
                                     `transactionUserID`, 
                                     `transactionAmt`, 
                                     `transactionStat`) VALUES (?, ?, ?, ?, ?)";

$stmt = $connectdb->prepare($qry);
$stmt->bind_param("siids", $paymentIntent->id,
                           $examID,
                           $userID,
                           $examPrice,
                           $paymentIntent->status);

$stmt->execute();
$stmt->close();

echo json_encode($data);

/*
SAMPLE INTENT DATA
{
  "data": {
    "id": "pi_SUFZioiGnCxyakaRmT5t5BBN",
    "type": "payment_intent",
    "attributes": {
      "amount": 10000,
      "capture_type": "automatic",
      "client_key": "pi_SUFZioiGnCxyakaRmT5t5BBN_client_LvsZ1SVqGtirZ2gDa9MNntio",
      "currency": "PHP",
      "description": null,
      "livemode": false,
      "statement_descriptor": "Lakbay Sa Bayan",
      "status": "awaiting_payment_method",
      "last_payment_error": null,
      "payment_method_allowed": [
        "grab_pay",
        "gcash",
        "card",
        "paymaya",
        "dob",
        "billease",
        "atome"
      ],
      "payments": [],
      "next_action": null,
      "payment_method_options": {
        "card": {
          "request_three_d_secure": "any",
          "installments": {
            "enabled": true
          }
        }
      },
      "metadata": null,
      "setup_future_usage": null,
      "created_at": 1682581607,
      "updated_at": 1682581607
    }
  }
}

*/