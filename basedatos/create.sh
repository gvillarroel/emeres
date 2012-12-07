sh createUser.sh $1
mysql -u emeres -p'emeres' -D emeres < scripts/create.sql
