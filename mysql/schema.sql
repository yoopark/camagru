USE camagru;

CREATE TABLE user (
  id INT UNSIGNED AUTO_INCREMENT,
  username VARCHAR(20) NOT NULL,
  password VARCHAR(255) NOT NULL,  -- hashed
  email VARCHAR(100) NOT NULL,
  email_verified BOOLEAN DEFAULT FALSE,
  email_notification BOOLEAN DEFAULT TRUE,

  UNIQUE (username, email),
  PRIMARY KEY (id)
);

CREATE TABLE post (
  id INT UNSIGNED AUTO_INCREMENT,
  user_id INT UNSIGNED NOT NULL, 
  image_url VARCHAR(1024) NOT NULL,
  description TEXT,
  likes INT UNSIGNED DEFAULT 0,
  comments INT UNSIGNED DEFAULT 0,
  creation_date DATETIME DEFAULT CURRENT_TIMESTAMP,

  PRIMARY KEY (id),
  FOREIGN KEY (user_id) REFERENCES user(id)
);

CREATE TABLE draft (
  id INT UNSIGNED AUTO_INCREMENT,
  user_id INT UNSIGNED NOT NULL,
  image_url VARCHAR(1024) NOT NULL,  

  PRIMARY KEY (id),
  FOREIGN KEY (user_id) REFERENCES user(id)
);

CREATE TABLE comment (
  id INT UNSIGNED AUTO_INCREMENT,
  user_id INT UNSIGNED NOT NULL,
  post_id INT UNSIGNED NOT NULL,
  text TEXT NOT NULL,
  creation_date DATETIME DEFAULT CURRENT_TIMESTAMP,

  PRIMARY KEY (id),
  FOREIGN KEY (user_id) REFERENCES user(id),
  FOREIGN KEY (post_id) REFERENCES post(id)
);

CREATE TABLE like_ (
  id INT UNSIGNED AUTO_INCREMENT,
  user_id INT UNSIGNED NOT NULL,
  post_id INT UNSIGNED NOT NULL,
  creation_date DATETIME DEFAULT CURRENT_TIMESTAMP,

  PRIMARY KEY (id),
  FOREIGN KEY (user_id) REFERENCES user(id),
  FOREIGN KEY (post_id) REFERENCES post(id),
  UNIQUE KEY user_post_id (user_id, post_id)
);