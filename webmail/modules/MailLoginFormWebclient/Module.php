<?php
/**
 * This code is licensed under AGPLv3 license or Afterlogic Software License
 * if commercial version of the product was purchased.
 * For full statements of the licenses see LICENSE-AFTERLOGIC and LICENSE-AGPL3 files.
 */

namespace Aurora\Modules\MailLoginFormWebclient;

use Aurora\Modules\Mail\Enums\ServerOwnerType;
use Aurora\Modules\Mail\Models\Server;
use Aurora\Modules\Mail\Module as MailModule;

/**
 * @license https://www.gnu.org/licenses/agpl-3.0.html AGPL-3.0
 * @license https://afterlogic.com/products/common-licensing Afterlogic Software License
 * @copyright Copyright (c) 2019, Afterlogic Corp.
 *
 * @package Modules
 */
class Module extends \Aurora\System\Module\AbstractWebclientModule
{
	/***** public functions might be called with web API *****/
	/**
	 * Obtains list of module settings for authenticated user.
	 * 
	 * @return array
	 */
	public function GetSettings()
	{
		\Aurora\System\Api::checkUserRoleIsAtLeast(\Aurora\System\Enums\UserRole::Anonymous);

		return array(
			'ServerModuleName' => $this->getConfig('ServerModuleName', ''),
			'HashModuleName' => $this->getConfig('HashModuleName', ''),
			'CustomLoginUrl' => $this->getConfig('CustomLoginUrl', ''),
			'DemoLogin' => $this->getConfig('DemoLogin', ''),
			'DemoPassword' => $this->getConfig('DemoPassword', ''),
			'InfoText' => $this->getConfig('InfoText', ''),
			'BottomInfoHtmlText' => $this->getConfig('BottomInfoHtmlText', ''),
			'LoginSignMeType' => $this->getConfig('LoginSignMeType', 0),
			'AllowChangeLanguage' => $this->getConfig('AllowChangeLanguage', true),
			'UseDropdownLanguagesView' => $this->getConfig('UseDropdownLanguagesView', false),
		);
	}

	public function Login($Login, $Password, $Domain, $Language = '', $SignMe = false)
	{
		\Aurora\System\Api::checkUserRoleIsAtLeast(\Aurora\System\Enums\UserRole::Anonymous);

		$sLogin = \trim($Login);
		$sDomain = \trim($Domain);

		if (empty($sLogin) || empty($sDomain))
		{
			throw new \Aurora\System\Exceptions\ApiException(\Aurora\System\Notifications::InvalidInputParameter);
		}

		return \Aurora\Modules\StandardLoginFormWebclient\Module::Decorator()->Login($sLogin . '@' . $sDomain, $Password, $Language, $SignMe);
	}

	public function GetMailDomains()
	{
		\Aurora\System\Api::checkUserRoleIsAtLeast(\Aurora\System\Enums\UserRole::Anonymous);

		$bPrevState = \Aurora\System\Api::skipCheckUserRole(true);
		$aAllDomains = [];
		$oTenant = \Aurora\System\Api::getTenantByWebDomain();
		$aArgs = [];
		if ($oTenant instanceof \Aurora\Modules\Core\Models\Tenant)
		{
			$aArgs = [
				'TenantId' => $oTenant->Id
			];
		}
		$mResult = [];
		$this->broadcastEvent(
			'GetMailDomains',
			$aArgs,
			$mResult
		);
		if (is_array($mResult) && !empty($mResult))
		{
			$aAllDomains = $mResult;
		}
		else
		{
			$Filter = null;
			if ($oTenant instanceof \Aurora\Modules\Core\Models\Tenant)
			{
				$Filter = Server::orWhere(function($query) use ($oTenant) {
					$query->where('OwnerType', ServerOwnerType::SuperAdmin)
						->where(function($query) use ($oTenant) {
							$query->where('TenantId', $oTenant->Id)
								->where('OwnerType', ServerOwnerType::Tenant);
						});
				});
			}
			else
			{
				//get all servers for all tenants
				$Filter = Server::where('OwnerType', ServerOwnerType::Tenant)
					->orWhere('OwnerType', ServerOwnerType::SuperAdmin);
			}

			$aServers = MailModule::getInstance()->getServersManager()->getServerListByFilter($Filter);
			if ($aServers)
			{
				foreach ($aServers as $oServer)
				{
					$aDomains = explode("\n", $oServer->Domains);
					$aDomains = array_filter($aDomains, function($sDomain) {
						return $sDomain !== '*';
					});
					if (count($aDomains) > 0) {
						$aAllDomains = array_merge($aAllDomains, $aDomains);
					}
				}
			}
		}
		\Aurora\System\Api::skipCheckUserRole($bPrevState);

		return array_unique($aAllDomains);
	}
	/***** public functions might be called with web API *****/
}
