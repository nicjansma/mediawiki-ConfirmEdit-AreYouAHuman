<?php
/**
 * AreYouAHuman ConfirmEdit Extension
 * http://areyouahuman.com
 *
 * Copyright (C) 2013 Nic Jansma <nic@nicj.net>
 * http://nicj.net/
 *
 * @author Nic Jansma <nic@nicj.net>
 *
 * @file
 * @ingroup Extensions
 *
 * @section LICENSE
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along
 * with this program; if not, write to the Free Software Foundation, Inc.,
 * 51 Franklin Street, Fifth Floor, Boston, MA 02110-1301, USA.
 * http://www.gnu.org/copyleft/gpl.html
 */

require_once dirname( __FILE__ ) . '/AreYouAHuman/ayah.php';

class AreYouAHumanCaptcha extends SimpleCaptcha {
	/**
	* Determines if the Catpcha was a pass.
	*
	* @return {bool} True if the Catpcha was a pass
	*/
	function passCaptcha() {
		$ayah = new AYAH();
		return $ayah->scoreResult();
	}

        /* Suppress redundant generation of SimpleCaptcha itself */
	function addCaptchaAPI( &$resultArr ) {
	}

	/**
	* Gets the HTML that will be displayed on a form.
	*
	* @return {string} HTML
	*/
	function getForm() {
		$ayah = new AYAH();
		return $ayah->getPublisherHTML() . '<noscript>' . wfMessage( 'areyouahumancaptcha-nojs' )->parse() . '</noscript>';
	}

	/**
	* Gets a localized string
	*
	* @param {string} $action Action being taken
	*
	* @return {string} Localized string
	*/
	function getMessage( $action ) {
		$name = 'areyouahumancaptcha-' . $action;
		$text = wfMessage( $name )->text();
		return wfMessage( $name, $text )->isDisabled() ? wfMessage( 'areyouahumancaptcha-edit' )->text() : $text;
	}

	/**
	* Adds a help message to the output
	*/
	function showHelp() {
		global $wgOut;
		$wgOut->setPageTitle( wfMessage( 'captchahelp-title' )->text() );
		$wgOut->addWikiText( wfMessage( 'areyouahumancaptcha-text' )->text() );
	}
}
