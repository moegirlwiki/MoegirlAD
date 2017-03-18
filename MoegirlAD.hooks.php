<?php
/*
 * Static class for hooks handle by MoegirlAD.
 * 
 * @file MoegirlAD.hooks.php
 * 
 * @license Apache-2.0+
 * @author Fish Thirteen < fishthrteen@qq.com >
 * @author Baskice
 * @author Bingxing Wang (The Little Moe New LLC) <ben@lmn.cat>
 *
 */
final class MoegirlADHooks {

  public static function onSkinAfterContent(&$data, $skin) {
    global $wgMoegirlADBottomADCode;

    if (MoegirlADHooks::shouldShowADs()) {
      $data .= $wgMoegirlADBottomADCode; 
    }

    return true;
  }

  public static function onSiteNoticeAfter(&$siteNotice, $skin) {
    global $wgMoegirlADTopADCode, $wgMoegirlADMobileTopADCode;

    if (MoegirlADHooks::shouldShowADs()) {
		// Determine the availability: If MobileFrontend exists and mobile view is enabled, present mobile ad
		if (class_exists('MobileContext') && MobileContext::singleton()->shouldDisplayMobileView()) {
			$siteNotice = $wgMoegirlADMobileTopADCode;
		} else {
			$siteNotice = $wgMoegirlADTopADCode . $siteNotice;
		}
    }

    return true;
  }

  public static function onSkinAfterBottomScripts( $skin, &$text )  {
    global $wgMoegirlADFooterEnabled, $wgMoegirlADFooterADCode;

    if (MoegirlADHooks::shouldShowADs() && $wgMoegirlADFooterEnabled) {
      $text .= $wgMoegirlADFooterADCode;
    }

    return true;
  }


  public static function onSkinBuildSidebar( Skin $skin, &$bar ) {
    global $wgMoegirlADSideBarEnabled, $wgMoegirlADSideBarADName, $wgMoegirlADSideBarADCode;
    
    if (MoegirlADHooks::shouldShowADs() && $wgMoegirlADSideBarEnabled) {
      $bar[$wgMoegirlADSideBarADName] = $wgMoegirlADSideBarADCode;
    }

    return true;
  }


  /**
   * Check if the advertice should be display
   * 
   * @return boolean 
   */
  public static function shouldShowADs() {
    global $wgMoegirlADEnabled, $wgMoegirlADEditCountQualification;

    if ($wgMoegirlADEnabled) {
      $currentUser = RequestContext::getMain()->getUser();

      // Show advertisements for users that have given edits (default: 5) or less / guests
	  return !( $currentUser->getEditCount() > $wgMoegirlADEditCountQualification);
    } else {
      return false;
    }
  }
}
