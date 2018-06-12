<?php
    /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $form['first_name'] = array(
      '#type' => 'textfield',
      '#title' => t('First Name:'),
      '#required' => TRUE,
    );
    $form['middle_name'] = array(
      '#type' => 'textfield',
      '#title' => t('Middle Name:'),
      '#required' => TRUE,
    );
    $form['last_name'] = array(
      '#type' => 'textfield',
      '#title' => t('Last Name:'),
      '#required' => TRUE,
    );
    $form['age'] = array(
      '#type' => 'textfield',
      '#title' => t('Age:'),
      '#required' => TRUE,
    );
    $form['customer_number'] = array (
      '#type' => 'tel',
      '#title' => t('Mobile no'),
    );
    $form['customer_dob'] = array (
      '#type' => 'date',
      '#title' => t('DOB'),
      '#required' => TRUE,
    );
    $form['customer_gender'] = array (
      '#type' => 'select',
      '#title' => ('Gender'),
      '#options' => array(
        'Female' => t('Female'),
        'male' => t('Male'),
      ),
    );
    $form['nationality'] = array (
      '#type' => 'radios',
      '#title' => ('Nationality'),
      '#options' => array(
        'india' =>t('Indian'),
        'other' =>t('Others')
      ),
    );
    $form['address'] = array(
      '#type' => 'textarea',
      '#title' => ('Address'),
      '#default_value' => '',
      '#rows' => 4,
    );
    $form['bank_details'] = array(
      '#type' => 'textarea',
      '#title' => ('Bank Details'),
      '#default_value' => '',
      '#rows' => 5,
    );
    $form['actions']['#type'] = 'actions';
    $form['actions']['submit'] = array(
      '#type' => 'submit',
      '#value' => $this->t('Save'),
      '#button_type' => 'primary',
    );
    return $form;
  }

?>
