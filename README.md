Factura Agil
=========

Factura Agil is an online invoicing software. 

Requirements
----

* Apache 2.x (with mod_rewrite enabled)
* PHP 5.3
* Mysql server 5.x

Installation
--------------

```sh
git clone [git-repo-url] factura-agil
cd factura-agil/app
cp Config/database.php.default Config/database.php
./Console/cake schema create
mkdir -p public/files/{md,html,pdf}
```
Remember to modified the database config file as needed, the default config needs to database at the mysql server (factura_agil_development, factura_agil_test)

Apache config
---------------

You must create a virtual host that points to the app/webroot directory of factura-agil, example config:
```sh
<VirtualHost *:80>    
	ServerName factura-agil.local
	ServerAlias www.factura-agil.local
	DocumentRoot /[factura-agil-dir]/app/webroot
	SetEnv CAKE_ENVIRONMENT development	
	<Directory /[factura-agil-dir]/app/webroot>
		Options Indexes FollowSymLinks
		AllowOverride All
		Order allow,deny
		allow from all
	</Directory>
</VirtualHost>
```

