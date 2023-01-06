DROP DATABASE IF EXISTS digit;

CREATE DATABASE IF NOT EXISTS digit;
USE digit;
# -----------------------------------------------------------------------------
#       TABLE : users
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS users
 (
   id INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY,
   email VARCHAR (128) NOT NULL  ,
   password VARCHAR (128) NOT NULL  ,
   username VARCHAR (128) NOT NULL
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       TABLE : messages
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS messages
 (
   id INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY ,
   id_send INTEGER NOT NULL  ,
   id_receive INTEGER NOT NULL  ,
   content TEXT NOT NULL  ,
   message_date DATE NOT NULL DEFAULT CURDATE()  ,
   message_hour TIME NOT NULL DEFAULT CURTIME()
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE messages
# -----------------------------------------------------------------------------


CREATE  INDEX i_fk_messages_users
     ON messages (id_send ASC);

CREATE  INDEX i_fk_messages_users_2
     ON messages (id_receive ASC);

# -----------------------------------------------------------------------------
#       TABLE : articles
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS articles
 (
   id INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY ,
   id_publish INTEGER NOT NULL  ,
   content TEXT NULL  ,
   image TEXT NULL  ,
   article_date DATE NOT NULL  ,
   article_hour TIME NOT NULL
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE articles
# -----------------------------------------------------------------------------


CREATE  INDEX i_fk_articles_users
     ON articles (id_publish ASC);


# -----------------------------------------------------------------------------
#       CREATION DES REFERENCES DE TABLE
# -----------------------------------------------------------------------------


ALTER TABLE messages
  ADD FOREIGN KEY fk_message_user (id_send)
      REFERENCES users (id) ;


ALTER TABLE messages 
  ADD FOREIGN KEY fk_message_user_2 (id_receive)
      REFERENCES users (id) ;


ALTER TABLE articles 
  ADD FOREIGN KEY fk_article_user (id_publish)
      REFERENCES users (id) ;
