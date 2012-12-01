mysql -u'root' -p"$1" -e "drop database if exists emeres;"
mysql -u'root' -p"$1" -e "drop user emeres@'localhost';"
mysql -u'root' -p"$1" -e "create user 'emeres'@'localhost' identified by 'emeres';"
mysql -u'root' -p"$1" -e "create database emeres;"
mysql -u'root' -p"$1" -e "grant all on emeres.* to 'emeres'@'localhost' IDENTIFIED by 'emeres' with grant option;"

