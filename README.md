# MPGram Web Chinese
基于 MadelineProto 的简洁 Telegram 网页客户端

MPGram CN Demo：<a href="http://mp.bangumi.cyou">(http)

MPGram原版Demo： <a href="https://mp.nnchan.ru/">https://mp.nnchan.ru</a>

即使我们已经为您提供了现成的Demo，但是我们推荐您自建一个MPGram

## 安装步骤
- 您需要安装 `php 8.1`
- 您需要去创建 `config.php` 和 `api_values.php` 这两个配置文件（有 example 文件提供参考）
- 您需要前往 <a href="https://my.telegram.org/apps">https://my.telegram.org/apps</a> 生成API ID，然后将生成后的 `api_id` 和 `api_hash` 复制到 `api_values.php`
- 您可能需要禁止会话文件夹和 adelineProto.log 的访问权限 (会话文件夹默认为 `s/`，可以在 `config.php` 中查看)
- 您必须要安装PHP扩展 `php-gd` 以确保图片可以正常加载 (例如 `apt-get install php8.1-gd` ，如果你使用宝塔面板默认情况下是安装了的)<br>
以及 MadelineProto 所需要的 `php-mbstring` (`apt-get install php8.1-mbstring` ，如果你使用宝塔面板默认情况下是安装了的)
- 您需要在 php.ini 中设置 browscap 以获得更好的设备标签
- MadelineProto 需要通过 Composer 进行安装，在网站根目录输入 `composer update` 进行安装 (如果没有Composer请先安装 composer v2 及以上的版本)
- 请查看 MadelineProto 的文档进行安装 MadelineProto <a href="https://docs.madelineproto.xyz/docs/INSTALLATION.html">跳转到 MadelineProto文档</a>

## 在replit上搭建
你也可以在 [replit](https://replit.com/@reallanta/mpgram-cn?v=1) 上建立一个属于你的MPGram CN！（请注意，因为 replit 将仓库设置成 private 需要付费，所以 **请不要泄漏你的仓库防止API密钥泄漏**）

## 测试过的浏览器
完全支持
- Internet Explorer 6.0 及以上
- Opera 9.0 及以上
- Nokia Browser for Symbian (Symbian 9.2 及以上)
- S40 6th Edition
- Mozilla Firefox 2.0
- WebPositive
- 所有的现代浏览器 (如Chrome, Safari等)

部分支持 (自动更新不工作 和（或） 自动滑动不工作)
- Internet Explorer 3.0-5.0
- Opera Mini (所有版本)
- S40 5th Edition 及以下
- Internet Explorer Mobile （不确定）

不支持的浏览器
- Internet Explorer 2 and older
- 未知

## Thanks for
[mpgram-web](https://github.com/shinovon/mpgram-web)