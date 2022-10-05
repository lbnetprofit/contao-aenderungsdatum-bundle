<?php
namespace Lbnetprofit\ContaoAenderungsdatumBundle\ContaoManager;

use Contao\ManagerPlugin\Bundle\BundlePluginInterface;
use Contao\ManagerPlugin\Bundle\Config\BundleConfig;
use Contao\ManagerPlugin\Bundle\Parser\ParserInterface;
use Contao\CoreBundle\ContaoCoreBundle;
use Lbnetprofit\ContaoAenderungsdatumBundle\ContaoAenderungsdatumBundle;

class Plugin implements BundlePluginInterface{

    public function getBundles(ParserInterface $parser): array{
        return [BundleConfig::create(ContaoAenderungsdatumBundle::class)->setLoadAfter([ContaoCoreBundle::class]), ];
    }

}