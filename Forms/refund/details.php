try {
    $response = $api->refundDetail('[REFUND ID]');
    print_r($response);
}
catch (Exception $e) {
    print('Error: ' . $e->getMessage());
}
