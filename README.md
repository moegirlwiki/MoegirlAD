MoegirlAD
=========

Show advertisement in moegirl.

这是为萌娘百科添加广告所写插件。这不是一个通用插件，因此在其他wiki上可能不运行，或出现预期外行为。

这个插件使用过时方法加载，版本升级后可能失效。需要重制以符合更新后的Mediawiki插件规范（e.g. load with wfLoadExtension）： https://www.mediawiki.org/wiki/Manual:Developing_extensions

这个插件目前可以运行在MediaWiki 1.31 版本上。

使用
---------
在mediawiki的安装目录中打开 `LocalSettings.php`, 加入 `require_once "$IP/extensions/MoegirlAD/MoegirlAD.php";`

出于广告代码灵活性考虑，该插件设计为填入原始广告脚本代码。因此会遭遇单括号/双括号解释冲突。解决此类冲突有两种途径：
1.将冲突的单括号改为双括号（反之亦然）。
2.使用Heredoc <<<,尖括号后接单词在结尾再次使用表示结束。 https://php.net/manual/en/language.types.string.php#language.types.string.syntax.heredoc
```php
<<<EOT
......
EOT
```
配置
---------
在 `LocalSettings.php` 中使用下面的变量进行配置

`$wgMoegirlADEnabled  = true;`  // 是否显示广告，如果为 true 可以省略

`$wgMoegirlADHeaderscriptDesktop = "advertice script in here";` // 向桌面版页面Header内添加script标签广告脚本

`$wgMoegirlADHeaderscriptMobile = "advertice script in here";` // 向移动版版页面Header内添加script标签广告脚本



`$wgMoegirlADTopADCode = "advertice code in here";`   // 广告提供商给的代码，显示在桌面顶部 (Sitenotice上方)

`$wgMoegirlADFooterEnabled = true;`  // 是否显示页面底部的广告，如果为 true 可以省略

`$wgMoegirlADBottomADCode = "advertice code in here";`   // 广告提供商给的代码，显示在桌面版wiki内容下方

`$wgMoegirlADFooterADCode = "advertice code in here";`   // 广告提供商给的代码，显示在桌面版页面底部

`$wgMoegirlADSideBarEnabled = true;`    // 是否显示左侧sidebar 的广告，如果为 true 可以省略

`$wgMoegirlADSideBarADName = "SideBar title name";`   // 设置 Sidebar 中分组的标题

`$wgMoegirlADSideBarADCode = "advertice code in here";`   // 广告提供商给的代码，显示在Sidebar



`$wgMoegirlADMobileTopADCode = "mobile ad code in here";` // 移动版顶部广告插入点

`$wgMoegirlADMobileFooterEnabled = true;`  // 是否显示移动版页面底部的广告，如果为 true 可以省略

`$wgMoegirlADMobileFooterADCode = "mobile ad code in here";` // 移动版底部广告插入点



