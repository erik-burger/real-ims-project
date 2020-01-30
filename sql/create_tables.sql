create table patient(
	patient_id int not null auto_increment, 
	first_name varchar(255) not null, 
	middle_name varchar(255), 
	last_name varchar(255) not null,
	email varchar(255) not null, 
	password_hash varchar(255) not null, 
	street varchar(255) not null, 
	street_no varchar(255) not null, 
	city varchar(255) not null, 
	country varchar(255) not null, 
	zip varchar(255) not null, 
	date_of_birth date not null, 
	gender varchar(255) not null, 
	stage varchar(255) not null,
	education int not null, 
	diagnosis_date datetime not null, 
	diagnosis_description text, 
	primary key (patient_id)); 

create table test(
	test_id int not null auto_increment, 
	test_date datetime not null, 
	primary key (test_id)); 
 
create table question(
	question_id int not null, 
    test_id int not null, 
    category varchar(255),
    primary key (question_id, test_id), 
    foreign key (test_id) references test (test_id)); 
    
create table answer(
	patient_id int not null, 
    question_id int not null, 
    test_id int not null, 
    answer_score int not null, 
    primary key (patient_id, question_id, test_id), 
    foreign key (patient_id) references patient (patient_id), 
    foreign key (question_id) references question (question_id), 
    foreign key (test_id) references test (test_id)); 
    
create table doctor (
	doctor_id int not null auto_increment,
    password_hash varchar(50) not null unique,
    email varchar(50) not null unique,
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




