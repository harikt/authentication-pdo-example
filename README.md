Example for the article over http://securepasswords.info/aura-for-php/

## Installation

```bash
git clone https://github.com/harikt/authentication-pdo-example
cd authentication-pdo-example
composer install
cp .env_dist .env
```

> Hope you know about [composer](https://getcomposer.org)

Edit `.env` and make the necessary changes for `databasename`, `username`, `password`, `host` etc.

```php
DB_DSN=mysql:dbname=databasename;host=127.0.0.1
DB_USERNAME=username
DB_PASSWORD=password
```

Create the table

```sql
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL COMMENT 'Username',
  `email` varchar(255) NOT NULL COMMENT 'Email',
  `password` varchar(255) NOT NULL COMMENT 'Password',
  `fullname` varchar(255) NOT NULL COMMENT 'Full name',
  `website` varchar(255) DEFAULT NULL COMMENT 'Website',
  `active` int(11) NOT NULL COMMENT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
INSERT INTO `users` (`id`, `username`, `email`, `password`, `fullname`, `website`, `active`) VALUES
(1,	'harikt',	'hello@example.com',	'$2y$10$PAzgJnHd/gTQzNznVg7un.HGEuGHYtYACCFknGuf.4diSunu3MA7C',	'Hari KT',	'http://harikt.com', 1),
(2,	'pmjones',	'hello@example.com',	'$2y$10$vtW.Fu8fhWuuCZz6s/jus.ilkzOMjMGwbzdkZNUzIVZLc.PV/6dVG',	'Paul M Jones',	'http://paul-m-jones.com',	1);
```

Try pointing your browser to `login.php`, `next.php`, `logout.php` .

Username / Password : harikt/123456 , pmjones/123456
