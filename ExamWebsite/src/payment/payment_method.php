<?php 


require (__DIR__.'/paymongo_instance.php');
require (__DIR__.'/../includes/connectdb.php');

$method = $_POST['pmethod'];
$plan = $_POST['plan'];
$pid = $_POST['pid'];
$ON_PROCESS = "on_process";


$paymentMethod = $client->paymentMethods->create([
    'type' => $method
]);

if(1 == 2){
$paymentMethod = $client->paymentMethods->create([
    'details' => [
        'card_number' => "",
        'exp_month' => "",
        'exp_year' => "",
        'cvc' => "",
        'bank_code' => ""
    ],
    'billing' => [
        'name' => "",
        'email' => "",
        'phone' => ""
    ],
    'payment_method_option' => [
        'card' => [
            'installments' => [
                'plan' => [
                    'issuer_id' => "",
                    'tenure' => ""
                ]
            ]
        ]
    ],
    'type' => $method
]);
}

$qry = "UPDATE `tbtransaction` 
        SET transactionMthd = ?, transactionStat = ? 
        WHERE transactionID = ?";

$exec = $connectdb->prepare($qry);
$exec->bind_param("sss", $method, $ON_PROCESS, $pid);
$exec->execute();
$exec->close();

$paymentAttach = $client->paymentIntents->attach($pid, [
    'payment_method' => $paymentMethod->id,
    'return_url' => "http://localhost:4444/src/payment/payment_success.php"
]);

// $paymentMethod = $client->paymentMethods->retrieve("pm_9o89sYcj2fqRjorW6R9sqS2U");


// $paymentAttach = $client->paymentIntents->attach("pi_2HvHBPT22gofvrder4MhSqKT", [
//     'payment_method' => "pm_9o89sYcj2fqRjorW6R9sqS2U",
//     'return_url' => "http://localhost:4444/src/payment.php?eid=2&pid=pi_ESSY4Xy6BxuHa1cUPzjMrwyf&uid=2"
// ]);

// $paymentAttach = $client->paymentIntents->retrieve("pi_2HvHBPT22gofvrder4MhSqKT");

// echo "<pre>";
// var_dump($paymentAttach);
// echo "</pre>";

// echo $paymentAttach->next_action['redirect']['url'];

header('location:'.$paymentAttach->next_action['redirect']['url'].'');

// pi_2HvHBPT22gofvrder4MhSqKT