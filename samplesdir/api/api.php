<?php

require_once "onpay_payment.php";

if(COnpayPayment::OpenDB()) {

    $rqst = COnpayPaymentV2::GetData();
	if($rqst['type'] == 'check') {
		$psObj = new COnpayPaymentV2();
		$psObj->CheckAction($rqst);
	} elseif($rqst['type'] == 'pay') {
		$psObj = new COnpayPaymentV2();
		$psObj->PayAction($rqst);
	} elseif($_REQUEST['type'] == 'check') {
		$psObj = new COnpayPayment();
		$psObj->CheckAction($_REQUEST);
	} elseif($_REQUEST['type'] == 'pay') {
		$psObj = new COnpayPayment();
		$psObj->PayAction($_POST);
	} else {
		COnpayPayment::SaveLog(array_merge($_REQUEST, array('INPUT.REQUEST' => $rqst)));
	}

	COnpayPayment::CloseDB();
}
?>
