<?php

try {
    $response = $api->paymentRequestStatus(['PAYMENT REQUEST ID']);
    print_r($response);
}
catch (Exception $e) {
    print('Error: ' . $e->getMessage());
}

try {
    $response = $api->paymentRequestPaymentStatus(['PAYMENT REQUEST ID'], ['PAYMENT ID']);
    print_r($response['purpose']);  // print purpose of payment request
    print_r($response['payment']['status']);  // print status of payment
}
catch (Exception $e) {
    print('Error: ' . $e->getMessage());
}
