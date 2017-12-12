一、配置app路径
找到config/constants.php，并打开；在这里可以设置app的路径，默认路径是devman3
当然，如果你的域名或ip直接指向app根目录，则修改
$config['rootUrl'] = host."/devman3/";
为：
define('rootUrl',host."/");


二、新版设备管理系统数据库的变动
user表增加的字段：{email，}