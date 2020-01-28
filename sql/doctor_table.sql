create table doctor (
	doctor_id int not null auto_increment primary key,
    password_hash varchar(255),
    email varchar(255) not null unique,
    first_name varchar(255) not null,
    middle_name varchar(255),
    last_name varchar(255) not null,
    street varchar(255) not null,
    street_no varchar(255) not null,
    zip varchar(255),
    city varchar(255) not null,
    country varchar(255) not null);
    
    
    