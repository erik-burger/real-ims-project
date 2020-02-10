create table researcher (
	researcher_id int not null auto_increment,
    password_hash varchar(255) not null,
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
    primary key (researcher_id));

create table caregiver (
    caregiver_id int not null auto_increment,
    password_hash varchar(255) not null,
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
    primary key (caregiver_id));

create table patient_caregiver (
    patient_id int not null,
    caregiver_id int not null,
    primary key (patient_id, caregiver_id), 
    foreign key (patient_id) references patient(patient_id),
    foreign key (caregiver_id) references caregiver(caregiver_id));

create table doctor_researcher (
	researcher_id int not null,
    doctor_id int not null,
    primary key (researcher_id, doctor_id), 
    foreign key (researcher_id) references researcher(researcher_id),
    foreign key (doctor_id) references doctor(doctor_id));
    