CREATE TABLE `users` (
  'id' INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  'username' VARCHAR(50) NOT NULL,
  'password' VARCHAR(50) NOT NULL,
) ENGINE= MyISAM DEFAULT CHARSET utf8;

INSERT INTO 'users' ('id', 'username', 'password') VALUES (1, 'admin', 'admin1234');

CREATE TABLE 'newsletter' (
  'id' INT(11)NOT NULL PRIMARY KEY AUTO_INCREMENT,
  'name' VARCHAR(50) NOT NULL,
  'description' VARCHAR(255) NOT NULL,
  'visible' VARCHAR(10) NOT NULL,
)