<?php

$wgExtensionCredits['parserhook'][] = array(
    'path' => __FILE__,
    'name' => 'MoegirlAD',
    'author' => array( 'Fish Thirteen', 'The Little Moe New LLC' ),
    'url' => 'https://github.com/FishThirteen/MoegirlAD',
    'description' => 'Show advertisement in the page header and page footer in Moegirlpedia',
    'version'  => 0.42,
    'license-name' => "Apache-2.0+",   // Short name of the license, links LICENSE or COPYING file if existing - string, added in 1.23.0
);
$wgExtensionMessagesFiles['MoegirlADMagic'] = __DIR__ . '/MoegirlAD.i18n.magic.php';

/*
 * Options: (Wrote some/all of these settings into LocalSettings.php file)
 *
 * $wgMoegirlADEnabled
 *      - Boolean. determine if show advertisement in moegirl.
 *
 * $wgMoegirlADHeaderscriptDesktop
 *      - Add AD script into desktop version page header.
 *
 * $wgMoegirlADHeaderscriptMobile
 *      - Add AD script into mobile version page header.
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
 *      - Boolean.  show/hide the footer Advertisement
 *
 * $wgMoegirlADFooterADCode
 *      - the Advertisement code used to show in below of the footer
 *
 *$wgMoegirlADSideBarEnabled
 *      - Boolean.  show/hide the sidebar Advertisement
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
 *      -Integer. Minimum edit counts to hide advertisement
 *
 */
$wgMoegirlADEnabled  = true;
$wgMoegirlADHeaderscriptDesktop = "";
$wgMoegirlADHeaderscriptMobile = "";


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


$wgHooks['BeforePageDisplay'][] = 'MoegirlADHooks::BeforePageDisplay';
$wgHooks['BeforePageDisplayMobile'][] = 'MoegirlADHooks::BeforePageDisplayMobile';

$wgHooks['SkinAfterContent'][] = 'MoegirlADHooks::onSkinAfterContent';
$wgHooks['SiteNoticeAfter'][] = 'MoegirlADHooks::onSiteNoticeAfter';
$wgHooks['SkinAfterBottomScripts'][] = 'MoegirlADHooks::onSkinAfterBottomScripts';
$wgHooks['SkinBuildSidebar'][] = 'MoegirlADHooks::onSkinBuildSidebar';
$wgHooks['GetDoubleUnderscoreIDs'][] = 'MoegirlADHooks::onGetDoubleUnderscoreIDs';

