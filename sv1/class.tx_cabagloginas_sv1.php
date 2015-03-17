<?php

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2010 Dimitri König <dk@cabag.ch>
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/
/*
 * Service 'Login as' for the 'cabag_loginas' extension.
 *
 * @author	Dimitri König <dk@cabag.ch>
 */


class tx_cabagloginas_sv1 extends tx_sv_authbase {
	var $rowdata;

	function getUser() {
		$row = FALSE;
		$cabag_loginas_data = t3lib_div::_GP('tx_cabagloginas');
		if (isset($cabag_loginas_data['verification'])) {
			$ses_id = $_COOKIE['be_typo_user'];
			$verificationHash = $cabag_loginas_data['verification'];
			unset($cabag_loginas_data['verification']);
			if (md5($GLOBALS['TYPO3_CONF_VARS']['SYS']['encryptionKey'] . $ses_id . serialize($cabag_loginas_data)) === $verificationHash &&
				$cabag_loginas_data['timeout'] > time()) {

				$user = $GLOBALS['TYPO3_DB']->exec_SELECTgetRows(
					'*',
					'fe_users',
					'uid = ' . intval($cabag_loginas_data['userid'])
				);
				if ($user[0]) {
					$row = $this->rowdata = $user[0];
					$GLOBALS["TSFE"]->fe_user->setKey('ses', 'tx_cabagloginas', TRUE);
				}

			}
		}

		return $row;
	}

	function authUser($user) {
		$OK = 100;

		if ($this->rowdata['uid'] == $user['uid']) {
			$OK = 200;
		}

		return $OK;
	}
}


if (defined("TYPO3_MODE") && $TYPO3_CONF_VARS[TYPO3_MODE]["XCLASS"]["ext/cabag_loginas/sv1/class.tx_cabagloginas_sv1.php"]) {
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]["XCLASS"]["ext/cabag_loginas/sv1/class.tx_cabagloginas_sv1.php"]);
}