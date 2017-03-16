MoegirlAD
=========

Show advertisement in moegirl


使用
---------
在mediawiki的安装目录中打开 `LocalSettings.php`, 加入 `require_once "$IP/extensions/MoegirlAD/MoegirlAD.php";`


配置
---------
在 `LocalSettings.php` 中使用下面的变量进行配置

`$wgMoegirlADEnabled  = true;`  //是否显示广告，如果为 true 可以省略

`$wgMoegirlADTopADCode = "advertice code in here";`   // 广告提供商给的代码，显示在顶部 (注意代码双引号改单引号)

`$wgMoegirlADBottomADCode = "advertice code in here";`   // 广告提供商给的代码，显示wiki内容底部

`$wgMoegirlADFooterEnabled = true;`  // 是否显示页面底部的广告，如果为 true 可以省略

`$wgMoegirlADFooterADCode = "advertice code in here";`   // 广告提供商给的代码，显示在页面底部

`$wgMoegirlADSideBarEnabled = true;`    // 是否显示左侧sidebar 的广告，如果为 true 可以省略

`$wgMoegirlADSideBarADName;`   // 设置 Sidebar 中分组的标题

`$wgMoegirlADSideBarADCode = "advertice code in here";`   // 广告提供商给的代码，显示在Sidebar



`$wgMoegirlADMobileTopADCode = "mobile ad code in here";`

`$wgMoegirlADMobileFooterEnabled = true;`

`$wgMoegirlADMobileFooterADCode = "mobile ad code in here";`



