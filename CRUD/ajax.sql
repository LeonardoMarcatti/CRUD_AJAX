create database ajax2;
use ajax2;
create table categoria(
	id int unsigned not null auto_increment primary key,
    nome varchar(30) not null unique
);

create table produto(
	id int unsigned not null auto_increment primary key,
    nome varchar(30) not null unique,
    idcategoria int unsigned,
    constraint produto_categoria foreign key(idcategoria) references categoria(id)
);