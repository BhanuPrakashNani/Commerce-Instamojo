<?php

namespace Drupal\your_module\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Defines a form that configures forms module settings.
 */
class ModuleConfigurationForm extends ConfigFormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'first_module_admin_settings';
  }

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return [
      'first_module.settings',
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
		$config = $this->config('first_module.settings');
	  $settings = (array) $settings + array(
		'api_key' => '',
		'api_token' => '',
		'virtualPaymentClientURL' => '',
		'site_url' => '',
		'api_url'  => 'https://www.instamojo.com/api/1.1/payments',
	  );
	  $form['api_key'] = array(
		'#type' => 'textfield',
		'#title' => t('Api Key'),
		'#default_value' => $settings['api_key'],
		'#required' => TRUE,
	  );
	  $form['api_token'] = array(
		'#type' => 'textfield',
		'#title' => t('Auth Token'),
		'#default_value' => $settings['api_token'],
		'#required' => TRUE,
	  );
	  $form['virtualPaymentClientURL'] = array(
		'#type' => 'textfield',
		'#title' => t('Virtual Payment Client Url'),
		'#default_value' => $settings['virtualPaymentClientURL'],
		'#required' => TRUE,
	  );
	  $form['site_url'] = array(
		'#type' => 'textfield',
		'#title' => t('Site URL'),
		'#default_value' => $settings['site_url'],
		'#required' => TRUE,
		'#description' => t('Please remove last slash from the site url'),
	  );
	  $form['api_url'] = array(
		'#type' => 'textfield',
		'#title' => t('Payment Api Url'),
		'#default_value' => $settings['api_url'],
		'#required' => TRUE,
	  );
    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $values = $form_state->getValues();
	$route_name = 'first_module.response';
    $form_state->setRedirect($route_name);
  }

}
