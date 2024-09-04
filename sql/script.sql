create table Jogador
(
    id    serial primary key not null,
    email varchar(30)        not null,
    senha varchar(30)        not null
);

create table Categoria (
                           id    serial primary key not null,
                           descricao varchar(250)
);

create table Forum (
                       id    serial primary key not null,
                       data date,
                       autor varchar(20),
                       titulo varchar(30),
                       descricao varchar(250),
                       categoria_id int,
                       foreign key (categoria_id) references Categoria (id)
);

