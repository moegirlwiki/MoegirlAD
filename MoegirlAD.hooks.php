<?php
/*
 * Static class for hooks handle by MoegirlAD.
 * 
 * @file MoegirlAD.hooks.php
 * 
 * @license Apache-2.0+
 * @author Fish Thirteen < fishthrteen@qq.com >
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
    global $wgMoegirlADTopADCode;

    if (MoegirlADHooks::shouldShowADs()) {
      $siteNotice = $wgMoegirlADTopADCode . $siteNotice;
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
  
  public static function onBeforePageDisplayMobile(OutputPage $out) {
    global $wgMoegirlADMobileEnabled, $wgMoegirlADMobileADCode;

    if (MoegirlADHooks::shouldShowADs() && $wgMoegirlADMobileEnabled) {
      $out->addHTML($wgMoegirlADMobileADCode);
    }

    return true;
  }


  /**
   * Check if the advertice should be display
   * 
   * @return boolean 
   */
  public static function shouldShowADs() {
    global $wgMoegirlADEnabled;

    if ($wgMoegirlADEnabled) {
      $currentUser = RequestContext::getMain()->getUser();

      //只对未登录用户和没有编辑过任何条目的用户显示广告
      return !(is_object($currentUser) && $currentUser->isLoggedIn() && $currentUser->getEditCount() != null && $currentUser->getEditCount() > 0);
    } else {
      return false;
    }
  }
}


?>
