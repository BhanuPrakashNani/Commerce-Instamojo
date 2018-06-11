<?php

try {
    $response = $api->paymentRequestsList();
    print_r($response);
}
catch (Exception $e) {
    print('Error: ' . $e->getMessage());
}
