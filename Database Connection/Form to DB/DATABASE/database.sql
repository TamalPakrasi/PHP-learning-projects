create database taitonaki;

use taitonaki;

create table miniAuth (
 id int primary key auto_increment,
 username varchar(200) not null,
 age int not null,
 email varchar(200) not null check (email like "%@%"),
 password varchar(200) not null
);

show tables;

drop table miniAuth;

select * from miniauth;