CREATE DATABASE IF NOT EXISTS video_exp;
USE video_exp;

CREATE TABLE users(
	id 			int(255) auto_increment not null,
	name		varchar(50) not null,
	surname 	varchar(150),
	email		varchar(255) not null,
	password 	varchar(255) not null,
    role        varchar(20),
	created_at  datetime DEFAULT CURRENT_TIMESTAMP,
	CONSTRAINT pk_users PRIMARY KEY(id)
)ENGINE=InnoDb;

CREATE TABLE sucursales(
	id 			int(255) auto_increment not null,
	user_id		int(255) not null,
	title		varchar(255),
	description	text,
	url		    varchar(255) not null,
	created_at  datetime,
	updated_at  datetime,
	CONSTRAINT pk_sucursales PRIMARY KEY(id),
	CONSTRAINT fk_sucursal_user FOREIGN KEY(user_id) REFERENCES users(id)
)ENGINE=InnoDb;
