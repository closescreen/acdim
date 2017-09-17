use avto_cred;

# org_types:
CREATE TABLE org_types (
    id varchar(255) not null primary key, 
    name varchar(255) not null
) ENGINE=MyISAM;

ALTER TABLE org_types AUTO_INCREMENT=0;

# hard-saved records for org_types:
insert into org_types (id,name) values ('bank','банк');
insert into org_types (id,name) values ('salon','салон');
insert into org_types (id,name) values ('admins','администрация');





