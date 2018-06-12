try {
    $response = $api->refundCreate(array(
        'payment_id'=>'MOJO5c04000J30502939',
        'type'=>'QFL',
        'body'=>'Customer is not satified.'
        ));
    print_r($response);
}
catch (Exception $e) {
    print('Error: ' . $e->getMessage());
}
