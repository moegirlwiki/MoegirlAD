<?php

$wgExtensionCredits['parserhook'][] = array(
    'path' => __FILE__,
    'name' => 'MoegirlAD',
    'author' => array( 'Fish Thirteen', 'The Little Moe New LLC' ),
    'url' => 'https://github.com/FishThirteen/MoegirlAD',
    'description' => 'Show advertisement in the page header and page footer in Moegirlpedia',
    'version'  => 0.3,
    'license-name' => "Apache-2.0+",   // Short name of the license, links LICENSE or COPYING file if existing - string, added in 1.23.0
);


/*
 * Options: (Check these settings in LocalSettings.php file)
 *
 * $wgMoegirlADEnabled
 *      - determine if show advertisement in moegirl.
 *
 * $wgMoegirlADTopADCode
 *      - the Advertisement code form the advertising company in top bar
 *      E.g.
 *      $wgMoegirlADADCode = <<<EOD
 * <!-- 728*90 -->
 * <div id='div-gpt-ad-1388996185454-0' style='width:728px; height:90px;'>
 *   <script type='text/javascript'>
 *     googletag.cmd.push(function() { googletag.display('div-gpt-ad-1388996185454-0'); });
 *   </script>
 * </div>
 * EOD;
 *
 * $wgMoegirlADBottomADCode
 *      - the Advertisement code in bottom bar
 *
 * $wgMoegirlADFooterEnabled
 *      - show/hide the footer Advertisement
 *
 * $wgMoegirlADFooterADCode
 *      - the Advertisement code used to show in below of the footer
 *
 *$wgMoegirlADSideBarEnabled
 *      - show/hide the sidebar Advertisement
 *
 * $wgMoegirlADSideBarADName
 *      - the side bar group name
 *
 * $wgMoegirlADSideBarADCode
 *      - the Advertisement code used to show in the bottom of the side bar
 *
 * $wgMoegirlADMobileTopADCode
 *      - the Advertisement code used for mobile view
 *
 * $wgMoegirlADEditCountQualification
 *      - Minimum edit counts to hide advertisement
 *
 */
$wgMoegirlADEnabled  = true;
$wgMoegirlADTopADCode = "";
$wgMoegirlADBottomADCode = "";
$wgMoegirlADFooterEnabled = true;
$wgMoegirlADFooterADCode = "";
$wgMoegirlADSideBarEnabled = true;
$wgMoegirlADSideBarADName = "";
$wgMoegirlADSideBarADCode = "";
$wgMoegirlADMobileTopADCode = "";
$wgMoegirlADEditCountQualification = 5;


$wgAutoloadClasses['MoegirlADHooks'] = __DIR__ . '/MoegirlAD.hooks.php';


$wgHooks['SkinAfterContent'][] = 'MoegirlADHooks::onSkinAfterContent';
$wgHooks['SiteNoticeAfter'][] = 'MoegirlADHooks::onSiteNoticeAfter';
$wgHooks['SkinAfterBottomScripts'][] = 'MoegirlADHooks::onSkinAfterBottomScripts';
$wgHooks['SkinBuildSidebar'][] = 'MoegirlADHooks::onSkinBuildSidebar';

$wgExtensionMessagesFiles['MoegirlAD'] = __DIR__ . '/MoegirlAD.i18n.php';