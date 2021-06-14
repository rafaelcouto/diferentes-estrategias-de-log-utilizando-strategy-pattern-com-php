create table logs
(
	id int not null primary key auto_increment,
	datetime datetime not null,
	level enum('1', '2', '3') not null,
	text text not null
);