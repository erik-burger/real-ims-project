create table patient_doctor (
	patient_id int not null,
    doctor_id int not null,
    primary key (patient_id, user_id), 
    foreign key (patient_id) references patient(patient_id),
    foreign key (doctor_id) references doctor(doctor_id));
