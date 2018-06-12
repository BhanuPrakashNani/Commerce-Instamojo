<?php

/**
* Collecting customer details
*
*/

function customerdetails_createform()
{

//define a form
$form = array(
'#attributes' => array('class' => 'customerdetails-form'),
);
// display search form // Age from field
$form['_agefrom'] = array(
'#type' => 'textfield',
'#title' => t('Agefrom'),
'#default_value' => '18',
'#size' => 2,
'#maxlength' => 2,
'#attributes' => array('class' => 'texin'),
'#prefix' => '',
'#description' => t(''),
);

$form['_ageto'] = array( // Age To field
'#type' => 'textfield',
'#title' => t('To'),
'#default_value' => '',
'#size' => 3,
'#maxlength' => 3,
'#attributes' => array('class' => 'texin'),
'#prefix' => '

',
'#description' => t(''),
);

$form['gen_option']=array(
'#type'=> 'value',
'#value'=> array(t('Male'),t('Female'))

);

$Gender=array("Male","Female"); // Gender select box
$form['_sex']=array(
'#type' => 'select',
'#title' => t('Looking for'),
'#default_value' => '',
'#prefix' => '

',
'#options' => $Gender
);
$form['submit'] = array('#type' => 'submit', '#value' => t('Search')); // submit button
return $form;

}
