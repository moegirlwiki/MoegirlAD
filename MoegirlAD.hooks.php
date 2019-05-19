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

	public static function BeforePageDisplay( OutputPage &$out, Skin &$skin ) {
		global $wgMoegirlADHeaderscriptDesktop;
		$isMobileView = MoegirlADHooks::isMobileView();
		if (!$isMobileView) {
			$out->addHeadItem('ADScriptforDesktop',$wgMoegirlADHeaderscriptDesktop);
		}
	}

	public static function BeforePageDisplayMobile( OutputPage &$out, Skin &$skin ) {
		global $wgMoegirlADHeaderscriptMobile;
		$out->addHeadItem('ADScriptforMobile',$wgMoegirlADHeaderscriptMobile);
	}


	public static function onSkinAfterContent(&$data, $skin) {
		global $wgMoegirlADBottomADCode;

		if (MoegirlADHooks::shouldShowADs()) {
		  $data .= $wgMoegirlADBottomADCode;
		}

		return true;
	}

	public static function onSiteNoticeAfter(&$siteNotice, $skin) {
    global $wgMoegirlADTopADCode, $wgMoegirlADMobileTopADCode;
	$isMobileView = MoegirlADHooks::isMobileView();

    if (MoegirlADHooks::shouldShowADs()) {
		// Determine the availability: If MobileFrontend exists and mobile view is enabled, present mobile ad
		if ($isMobileView) {
			$siteNotice = $wgMoegirlADMobileTopADCode;			
		} else {
			$siteNotice = $wgMoegirlADTopADCode . $siteNotice;
		}
    } else if ($isMobileView) {
		// Fix by case: Since MobileFrontend will display SiteNotice for some users, clear site notice if we are in mobile view.
		$siteNotice = '';
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
   * @param array $ids
   */
  public static function onGetDoubleUnderscoreIDs( array &$ids ) {
      $ids[] = 'noad';
  }

  /**
   * Check if the advertice should be display
   *
   * @return boolean
   */
  public static function shouldShowADs() {
    global $wgMoegirlADEnabled, $wgMoegirlADEditCountQualification;

    if (!$wgMoegirlADEnabled) return false;

    $currentReqContext = RequestContext::getMain();
    $currentTitle = $currentReqContext->getTitle();
    // Special namespace has NSID -1
    $isSpecialPage = $currentTitle->getNamespace() === -1;

    // Ignore advertisements for all special pages on mobile device
    if (MoegirlADHooks::isMobileView() && $isSpecialPage) return false;

    if (!$isSpecialPage) {
        // Ignore advertisements if page attribute is set
        $pageProps = PageProps::getInstance();

        // See the magic word definition
        $suppressAdAttributes = $pageProps->getProperties($currentTitle, 'noad');

        // Suppress advertisement if attribute is set
        if (!empty($suppressAdAttributes)) return false;
    }

    // Show advertisements for users that have given edits (default: 5) or less / guests
    $currentUser = $currentReqContext->getUser();
    return !( $currentUser->getEditCount() > $wgMoegirlADEditCountQualification);
  }

  public static function isMobileView() {
	return class_exists('MobileContext') && MobileContext::singleton()->shouldDisplayMobileView();
  }
}
