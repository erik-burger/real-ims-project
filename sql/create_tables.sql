create table patient(
	patient_id int not null auto_increment, 
	first_name varchar(50) not null, 
	middle_name varchar(50), 
	last_name varchar(50) not null,
    SSN varchar(50) not null, 
	email varchar(50) not null unique, 
    phone int not null, 
	password_hash varchar(50) not null, 
	street varchar(50) not null, 
	street_no varchar(50) not null, 
	city varchar(50) not null, 
	country varchar(50) not null, 
	zip varchar(50) not null, 
    state varchar(50) not null, 
	date_of_birth date not null, 
	gender varchar(50) not null, 
	stage varchar(50),
	education int not null, 
    bedroom_floor int not null, 
	diagnosis_date date not null, 
	diagnosis_description text, 
	primary key (patient_id)); 

create table doctor (
	doctor_id int not null auto_increment,
    password_hash varchar(50) not null,
    email varchar(50) not null unique,
    phone int not null, 
    first_name varchar(50) not null,
    middle_name varchar(50),
    last_name varchar(50) not null,
    street varchar(50) not null,
    street_no varchar(50) not null,
    zip varchar(50),
    city varchar(50) not null,
    country varchar(50) not null, 
    primary key (doctor_id));
    
create table patient_doctor (
	patient_id int not null,
    doctor_id int not null,
    primary key (patient_id, doctor_id), 
    foreign key (patient_id) references patient(patient_id),
    foreign key (doctor_id) references doctor(doctor_id));
    
create table test(
	test_id int not null auto_increment, 
	patient_id int not null,
	test_date datetime not null, 
	score_1 int not null,
	score_2 int not null,
	score_4 int not null,
	score_5 int not null,
	score_6 int not null,
	score_7 int not null,
	score_8 int not null,
	score_9 int not null,
	score_10 int not null,
	score_11 int not null,
	score_12 int not null,
	score_13 int not null,
	score_14 int not null,
	primary key (test_id),
	foreign key(patient_id) references patient(patient_id));
    
select * 
from patient

