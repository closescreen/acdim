use avto_cred;

# org_types:
CREATE TABLE org_types (
    id varchar(255) not null primary key, 
    name varchar(255) not null
) ENGINE=MyISAM;

# hard-saved records for org_types:
insert into org_types (id,name) values ('bank','банк');
insert into org_types (id,name) values ('salon','салон');
insert into org_types (id,name) values ('admins','администрация');

# orgs:
CREATE TABLE orgs ( 
    id int(11) NOT NULL AUTO_INCREMENT, 
    name varchar(255) NOT NULL, 
    org_type_id varchar(255)  NOT NULL, 
    PRIMARY KEY (id), 
    KEY org_type_id (org_type_id), 
    FOREIGN KEY (org_type_id) REFERENCES org_types(id)
    ) ENGINE=MyISAM;

# Должна быть первая организация id=1 org_type_id='admins'
# она нужна для жестко прописанног в модель User пользователя
insert into orgs (id, name, org_type_id) values (1,'АдминДляВас', 'admins');

# users:
create table users (
    id int not null AUTO_INCREMENT PRIMARY KEY, 
    username varchar(255) not null UNIQUE KEY, 
    password varchar(255) not null, 
    org_id int not null, 
    FOREIGN KEY (org_id) REFERENCES orgs(id)
    ) ENGINE=MyISAM;

# ORG_BINDINGS
create table org_bindings (
    id INT not null AUTO_INCREMENT PRIMARY KEY, 
    bank_id INT not null, 
    salon_id INT not null, 
    FOREIGN KEY (bank_id) REFERENCES orgs(id), 
    FOREIGN KEY (salon_id) REFERENCES orgs(id) 
) ENGINE=MyISAM;

