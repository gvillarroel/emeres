#$1 = contraseña root mysql
sh createUser.sh $1
#mysql -u emeres -p'emeres' -D emeres < scripts/create.sql
#mysql -u emeres -p'emeres' -D emeres < scripts/emeres.sql
mysql -u'emeres' -p'emeres' -D emeres < scripts/ScriptBD.sql
mysql -u'emeres' -p'emeres' -D emeres < scripts/datosIniciales.sql
mysql -u'emeres' -p'emeres' -D emeres < scripts/grupoInicio.sql
