Yii 2 使用 MongoDB 数据库  
============================  

####数据库连接的设置####

	mongodb' => [  
		'class' => '\yii\mongodb\Connection',  
		#'dsn' => 'mongodb://用户名:密码@主机地址:端口号/数据库名',  
		'dsn' => 'mongodb://yii2:yii2admin@127.0.0.1:27017/yii2',  
		# 创建一个对数据库具有读写权限的数据库用户 :   
		# use dbname ;   
		# db.createUser({user: "dbuser", pwd: "dbuseradmin", roles:[{role: "readWrite", db: "dbname"}] })  
		# 数据库用户登录 :   
		# mongo dbname -u dbuser -p dbduseradmin  
	]  
