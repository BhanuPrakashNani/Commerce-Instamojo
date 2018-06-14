<?php
/**
 * @file
 * Contains \Drupal\Commerce_Instamojo\Controller\InstamojoController.
 */
 
namespace Drupal\Commerce_Instamojo\Controller;
 
use Drupal\Core\Controller\ControllerBase;
 
class InstamojoController extends ControllerBase {
	public function pageSendResponseData() {
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
		  drupal_goto($vpcurl);
	}
	/**
	 * Function handle response from gateway .
	 */
	public function pageResponseData() {
	  $api_key = variable_get('api_key', '');
	  $api_token = variable_get('api_token', '');
	  $order_id = variable_get('order_id', '');
	  $site_url = variable_get('site_url', '');
	  $api_url = variable_get('api_url', '');
	  $pay_id = $_GET['payment_id'];
	  $status = $_GET['status'];
	  $json = json_decode(file_get_contents($api_url . "/" . $pay_id . "?api_key=$api_key&auth_token=$api_token"));
	  $amount = $json->payment->amount;
	  if ($status == "success") {
		$commerce_order = commerce_order_load($order_id);
		$wrapper = entity_metadata_wrapper('commerce_order', $commerce_order);
		$currency = $wrapper->commerce_order_total->currency_code->value();
		$name = 'checkout_complete';
		$order_success = commerce_order_status_update($commerce_order, $name, FALSE, TRUE, '');
		commerce_checkout_complete($order_success);
		$wrapper = entity_metadata_wrapper('commerce_order', $commerce_order);
		$currency = $wrapper->commerce_order_total->currency_code->value();
		$transaction = commerce_payment_transaction_new('instamojo', $order_id);
		$transaction->amount = $amount;
		$transaction->message = $status;
		$transaction->currency_code = $currency;
		$transaction->status = COMMERCE_PAYMENT_STATUS_SUCCESS;
		commerce_payment_transaction_save($transaction);
		commerce_payment_redirect_pane_next_page($order_success);
		drupal_goto($site_url . '/checkout/' . $order_id . '/complete');
	  }
	  else {
		$commerce_order = commerce_order_load($order_id);
		$name = 'checkout_review';
		$order_failure = commerce_order_status_update($commerce_order, $name, FALSE, TRUE, '');
		$transaction = commerce_payment_transaction_new('instamojo', $order_id);
		$transaction->message = $status;
		$transaction->status = COMMERCE_PAYMENT_STATUS_FAILURE;
		commerce_payment_transaction_save($transaction);
		commerce_payment_redirect_pane_previous_page($order_failure);
		drupal_goto($site_url . '/checkout/' . $order_id . '/review');
	  }
	}
}
