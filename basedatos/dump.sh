#$1 usuario
#$2 password
#$3 base datos
mysqldump --opt -u $1 -p"$2" $3 > $(date +"$3_%Y%m%d%H%M%S").dump

