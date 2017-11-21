<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
$config = array(
	'registration' => array(
			array(
				'field' => 'username',
				'label' => 'UserName',
				'rules' => 'required'
				),
			array(
				'field' => 'password',
				'label' => 'PassWord',
				'rules' => 'required|matches[Repassword]'
				),
			array(
				'field' => 'PhoneNo',
				'label' => 'Phone No',
				'rules' => 'required|callback_validPhoneNo'
				),
			array(
				'field' => 'FullName',
				'label' => 'Full  Name',
				'rules' => 'required'
				)
		),

	'post' => array(
			array(
				'field' => 'HouseName',
				'label' => 'House Name',
				'rules' => 'required'
				),
			array(
				'field' => 'Floor',
				'label' => 'Floor',
				'rules' => 'required'
				),
			array(
				'field' => 'address',
				'label' => 'Full Address',
				'rules' => 'required'
				),
			array(
				'field' => 'PhoneNo',
				'label' => 'Phone Number',
				'rules' => 'required|callback_validPhoneNo'
				),
			array(
				'field' => 'rent',
				'label' => 'Rent',
				'rules' => 'required'
				)
		),

	
	);