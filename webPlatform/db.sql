create table IVA(
    id int(1) not null auto_increment,
    taxa double(5) not null
);

insert into IVA values ('0.06');
insert into IVA values ('0.16');
insert into IVA values ('0.23');

create table fv_reports(
    id int(2) not null auto_increment,
    report varchar(50) not null,
    code varchar(16) not null
);

insert into fv_reports (report, code) values ('Encomenda', 'LCO_F_PT_04_00');

create table fv_fields(
    id int(4) not null auto_increment,
    name varchar(30) not null
    originTable varchar(20) not null
);

//TERMINAR
insert into fv_fields (name, originTable) values ('docCode',);

create table fv_fieldsReports(
    id int(4) not null auto_increment,
    report int(2) not null,
    field int(4) not null
);