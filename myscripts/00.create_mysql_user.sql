# MYSQL USER:
CREATE USER 'autocred_user'@'localhost' IDENTIFIED BY 'kokoko2';
GRANT DELETE ON avto_cred.* TO 'autocred_user'@'localhost';
GRANT INSERT ON avto_cred.* TO 'autocred_user'@'localhost';
GRANT SELECT ON avto_cred.* TO 'autocred_user'@'localhost';
GRANT UPDATE ON avto_cred.* TO 'autocred_user'@'localhost';
# -- end user --
