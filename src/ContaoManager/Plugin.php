<?php

namespace Schachbulle\ContaoMitgliederverwaltungBundle\ContaoManager;

use Contao\CoreBundle\ContaoCoreBundle;
use Contao\ManagerPlugin\Bundle\BundlePluginInterface;
use Contao\ManagerPlugin\Bundle\Config\BundleConfig;
use Contao\ManagerPlugin\Bundle\Parser\ParserInterface;
use Schachbulle\ContaoMitgliederverwaltungBundle\ContaoMitgliederverwaltungBundle;

class Plugin implements BundlePluginInterface
{
	/**
	 * {@inheritdoc}
	 */
	public function getBundles(ParserInterface $parser)
	{
		return [
			BundleConfig::create(ContaoMitgliederverwaltungBundle::class)
				->setLoadAfter([ContaoCoreBundle::class]),
		];
	}
}
