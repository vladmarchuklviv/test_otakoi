# test_otakoi

====================

Для коректної роботи потрібно змінити константу PATH на абсолютний шлях, у файлі config.php

===================

Також для коректного роутингу потрібно створити файл .htaccess, з кодом:

RewriteEngine On
RewriteCond %{REQUEST_FILENAME} !-d
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-l
RewriteRule ^(.+)$ index.php?url=$1 [QSA,L]

===================
