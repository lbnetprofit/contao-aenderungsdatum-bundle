<?php
namespace Lbnetprofit\ContaoAenderungsdatumBundle\EventListener;

use Contao\CoreBundle\ServiceAnnotation\Hook;
use Contao\System;

/**
 * @Hook("replaceInsertTags")
 */
class AenderungsdatumGlobalInsertTagListener{

    public const TAG = 'aenderungsdatum_global';
    
    public function __invoke(string $tag){
        $chunks = explode('::', $tag);
        if (self::TAG !== $chunks[0]) {
            return false;
		}

		$db = \System::getContainer()->get('doctrine')->getConnection('default'); 
		$date = $db->prepare("SELECT tstamp FROM tl_version ORDER BY tstamp DESC LIMIT 1;")->executeQuery()->fetchAssociative()["tstamp"];
		return \Date::parse(\Config::get('dateFormat'), $date);
    }

}
