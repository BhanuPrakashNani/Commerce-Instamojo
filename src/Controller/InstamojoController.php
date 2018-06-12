<?php

namespace Drupal\modules\commerce_instamojo\Controller;

use Drupal\core\Controller\ControllerBase;

/**
 * Provides responses for the Instamojo module.
 */

class InstamojoController extends Controllerbae {

/**
 * Returns a page
 */

function page_send_response_data() {
  $api_key     = $_POST['api_key'];
  $api_token   = $_POST['api_token'];
  $data_name   = $_POST['api_key'];
  $order_id    = $_POST['vpc_OrderInfo'];
  $order       = commerce_order_load($order_id);
  $profile_id  = $order->commerce_customer_billing[LANGUAGE_NONE][0]['profile_id'];
  $profile     = commerce_customer_profile_load($profile_id);
  $data_name   = $profile->commerce_customer_address[LANGUAGE_NONE][0]['first_name'];
  $data_amount = $order->commerce_order_total[LANGUAGE_NONE][0]['amount'] / 100;
  $data_email  = $order->mail;
  $data_phone  = $profile->field_phone_no[LANGUAGE_NONE][0]['value'];
  $virtualpaymentclienturl = $_POST['virtualPaymentClientURL'];
  $vpcurl      = $virtualpaymentclienturl . "?api_key=$api_key&auth_token=$api_token&data_name=$data_name&data_phone=$data_phone&data_email=     $data_email&data_amount=$data_amount&data_readonly=data_amount&intent=buy";
  $response = new RedirectResponse($vpcurl);
  $response->send();
  return;
}
