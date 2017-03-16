<?php
/*
 * Static class for hooks handle by MoegirlAD.
 * 
 * @file MoegirlAD.hooks.php
 * 
 * @license Apache-2.0+
 * @author Fish Thirteen < fishthrteen@qq.com >
 *  *  *  *  *  *  *  *  *  *  *  *  *  *  *  *  *  *  *  *  * 
 * 注意这个版本针对MobileFrontEnd和有过修改！不要直接拖新版本覆盖！ by baskice
 *  *  *  *  *  *  *  *  *  *  *  *  *  *  *  *  *  *  *  *  * 
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
		//检查是否是移动版，是的话通过sitenotice这个位置展现移动广告
		if (MobileContext::singleton()->shouldDisplayMobileView()) {
			$siteNotice = $wgMoegirlADMobileTopADCode;
		}else{
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
  
  public static function onBeforePageDisplayMobile(OutputPage $out) {
    global $wgMoegirlADMobileFooterEnabled, $wgMoegirlADMobileFooterADCode;

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

      //只对5次编辑以下的用户显示广告
      return !( $currentUser->getEditCount() > 5);
    } else {
      return false;
    }
  }
}


?>
