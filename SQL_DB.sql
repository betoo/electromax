create table servicio(
	id______ser int not null auto_increment  PRIMARY KEY,
	servicioserv varchar(50),
	imagen__ser varchar(300), 
	descrip_ser text,
	id_emp__ser int,
 	foreign key (id_emp__ser) references empresa (id______emp) on delete cascade
) 

CREATE TABLE  `empresa` (
 `id______emp` INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
 `num_cel_emp` INT NOT NULL ,
 `num_tel_emp` INT NOT NULL ,
 `mail____emp` INT NOT NULL ,
 `nosotrosemp` TEXT NOT NULL,

) ENGINE = MYISAM ;


insert into empresa() values();