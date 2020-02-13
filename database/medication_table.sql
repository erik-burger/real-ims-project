create table medication (
    medication_id int not null auto_increment, 
    medication_name varchar(255) not null,
    primary key (medication_id));

create table patient_medication (
    patient_id int not null, 
    medication_id int not null, 
    dose varchar(255) not null,
    medication_interval varchar(255) not null,
    primary key(patient_id, medication_id),
    foreign key (patient_id) references patient(patient_id),
    foreign key (medication_id) references medication(medication_id));
