#$1 usuario
#$2 password
#$3 base dato
#$4 dump
echo "Droping tables"
sh dropTables.sh $1 $2 $3
echo "Loading"
mysql -D $3 -u $1 -p$2 $3 < $4
