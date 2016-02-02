<?php
	function EncryptedPin($sPin, $sCardNo ,$sPubKeyURL)
	{
		global $log;
		$sPubKeyURL = trim(SDK_ENCRYPT_CERT_PATH," ");
	/**
 * [WeEngine System] Copyright (c) 2014 WE7.CC
 * WeEngine is NOT a free software, it under the license terms, visited http://www.we7.cc/ for more details.
 */		$fp = fopen($sPubKeyURL, "r");
		if ($fp != NULL)
		{
			$sCrt = fread($fp, 8192);
				fclose($fp);
		}
		$sPubCrt = openssl_x509_read($sCrt);
		if ($sPubCrt === FALSE)
		{
			print("openssl_x509_read in false!");
			return (-1);
		}
					$sPubKey = openssl_x509_parse($sPubCrt);
				
		$sInput = Pin2PinBlockWithCardNO($sPin, $sCardNo);
		if ($sInput == 1)
		{
			print("Pin2PinBlockWithCardNO Error ! : " . $sInput);
			return (1);
		}
		$iRet = openssl_public_encrypt($sInput, $sOutData, $sCrt, OPENSSL_PKCS1_PADDING);
		if ($iRet === TRUE)
		{
				$sBase64EncodeOutData = base64_encode($sOutData);		
						return $sBase64EncodeOutData;
		}
		else 
		{
			print("openssl_public_encrypt Error !");
			return (-1);
		}
	}
	
	
?>