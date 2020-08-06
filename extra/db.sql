drop DATABASE users;
create DATABASE users;
use users;
create table names(fname varchar(20) NOT NULL, age INT not null);
insert INTO names(fname, age) values('chnaka','24');
insert into names(fname, age) values('anu','23');

SELECT* from names;
