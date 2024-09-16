#!/bin/bash

# 设置 MySQL 数据目录
VOLUME_HOME="/var/lib/mysql"

# 更新 PHP 配置
sed -ri -e "s/^upload_max_filesize.*/upload_max_filesize = ${PHP_UPLOAD_MAX_FILESIZE}/" \
    -e "s/^post_max_size.*/post_max_size = ${PHP_POST_MAX_SIZE}/" /etc/php5/apache2/php.ini

# 检查 MySQL 数据目录是否为空
if [[ ! -d $VOLUME_HOME/mysql ]]; then
    echo "=> An empty or uninitialized MySQL volume is detected in $VOLUME_HOME"
    echo "=> Installing MySQL ..."
    mysql_install_db >/dev/null 2>&1
    echo "=> Done!"
    /create_mysql_admin_user.sh
else
    echo "=> Using an existing volume of MySQL"
fi

# 启动 supervisord
exec supervisord -n &

# 等待 MySQL 启动
echo "等待 MySQL 启动..."
until mysqladmin ping -hlocalhost --silent; do
    echo "MySQL 未准备好，等待 5 秒后重试..."
    sleep 5
done

echo "MySQL 已启动，执行 SQL 脚本..."

# 执行 SQL 脚本
mysql <<EOF 2>/dev/null
    create database 2web;
    use 2web;
    source /root/2web.sql;
EOF

echo "脚本已执行"

# 保持容器运行状态
wait
