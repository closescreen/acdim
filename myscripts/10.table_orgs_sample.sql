use avto_cred;
# примеры организаций

# должна иметься административна организация  с id=1, она прописана в скрипте создания таблицы 
# insert into orgs (name,org_type_id) values ('Административная организация','admins');

insert into orgs (name,org_type_id) values ('Авто Быстр Тестовый','salon');
insert into orgs (name,org_type_id) values ('Авто Умелые Ребята Тестовый','salon');
insert into orgs (name,org_type_id) values ('Салон Авто Лучший Тестовый','salon');

insert into orgs (name,org_type_id) values ('Банк Надежный Тестовый','bank');
insert into orgs (name,org_type_id) values ('Банк Восторг Тестовый','bank');
insert into orgs (name,org_type_id) values ('Современный Банк Тестовый','bank');