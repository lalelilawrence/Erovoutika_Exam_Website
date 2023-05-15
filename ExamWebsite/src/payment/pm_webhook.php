<?php
header('Content-Type: application/json');

require (__DIR__."/../includes/connectdb.php");

// REQUEST
$request = file_get_contents('php://input');
$signatureHeader = $_SERVER['HTTP_PAYMONGO_SIGNATURE'] ?? null;
$whsk = "whsk_wLeUvNFXeTtQExR65Db6dvPK";

if(isset($signatureHeader)){
    
    $arrSignature = explode(',', $signatureHeader);
    
    $timestamp = explode('=', $arrSignature[0])[1];
    $testModeSignature = explode('=', $arrSignature[1])[1];
    $liveModeSignature = explode('=', $arrSignature[2])[1];
    
    if (!empty($testModeSignature)) {
        $comparisonSignature = $testModeSignature;
    }
    
    if (!empty($liveModeSignature)) {
        $comparisonSignature = $liveModeSignature;
    }
    
    if (hash_hmac('sha256', $timestamp . '.' . $request, $whsk) != $comparisonSignature) {
        file_put_contents ('gotmongo.log', $signatureHeader . ' is not Paymongo');
    }
    
    file_put_contents ('gotmongo.log', $signatureHeader);
}

$payload = json_decode($request, true);

// LOGGING

$type = $payload['data']['attributes']['type'] ?? null;

//If event type is source.chargeable, call the createPayment API
if ($type == "payment.paid" ) {
    
    $pid = $payload["data"]["attributes"]["data"]["attributes"]["payment_intent_id"];
    
    $status = $payload["data"]["attributes"]["data"]["attributes"]["status"];
    
    
    $qry = "UPDATE tbtransaction SET transactionStat = ? WHERE transactionID = ?";
    
    $sql = $connectdb->prepare($qry);
    $sql->bind_param("ss", $status, $pid);
    $sql->execute();
    $sql->close();
} else {
    echo "<pre>";
    var_dump($payload);
    echo "</pre>";
}
?>