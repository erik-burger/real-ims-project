
INSERT INTO doctor (password_hash, email, phone, first_name, last_name, street, street_no, zip, city, country)
VALUES("abc123",
		"headdoc@abc.com",
        "764656869",
        "Alva",
        "Ann",
        "Vag",
        "1",
        "75252",
        "Uppsala",
        "Sweden");
        
INSERT INTO doctor (password_hash, email, phone, first_name, middle_name, last_name, street, street_no, zip, city, country)
VALUES("abc123",
		"braindoc@abc.com",
        "758595456",
        "Raph",
        "Anna",
        "Pen",
        "Vag",
        "3",
        "75232",
        "Uppsala",
        "Sweden");
        
INSERT INTO doctor (password_hash, email, phone, first_name, last_name, street, street_no, zip, city, country)
VALUES("123",
		"psychdoc@abc.com",
        "754656869",
        "Erik",
        "Berg",
        "Vag",
        "2",
        "75242",
        "Uppsala",
        "Sweden");
        
INSERT INTO patient (first_name, last_name, SSN, email, phone, password_hash, street, street_no, city, country, zip,  state, date_of_birth, gender, stage, education, bedroom_floor, diagnosis_date, diagnosis_description)
VALUES("xyz",
		"abc",
        "194705065645",
        "abc.xyz@doc.com",
        "754658123",
        "123abc",
        "Vag",
        "12",
        "Uppsala",
        "Sweden",
		"75231",
        "state",
        "1947-05-06",
        "Male",
        "1",
        "12",
        "0",
        "2018-05-15",
        "In mattis, risus sit amet fermentum facilisis, est dolor convallis tortor, vitae sagittis lacus odio nec metus. Vestibulum mauris tellus, gravida blandit sollicitudin quis, ultricies nec augue. Nam facilisis ac nunc eget posuere. Aenean sit amet pulvinar metus, at tincidunt lectus. Vestibulum ac risus at nisi imperdiet semper. In nec.");
         
INSERT INTO patient (first_name, last_name, state, SSN, email, phone, password_hash, street, street_no, city, country, zip, date_of_birth, gender, stage, education, bedroom_floor, diagnosis_date, diagnosis_description)
VALUES("def",
		"uvw",
        "state",
        "196706061645",
        "def.uvw@doc.com",
        "754632167",
        "456abc",
        "Vag",
        "10",
        "Uppsala",
        "Sweden",
        "75241",
        "1967-06-06",
        "Female",
        "2",
        "19",
        "1",
        "2019-02-20",
        "Maecenas cursus tortor purus, quis sollicitudin lorem posuere at. Aliquam cursus ante in metus lobortis, non sodales dolor rhoncus. Suspendisse mollis eget erat quis blandit. Nulla non erat molestie, euismod tortor at, gravida neque. In hac habitasse platea dictumst. Aenean vulputate cursus risus, pharetra blandit libero sollicitudin ac. Duis sit.");
         
INSERT INTO patient (first_name, middle_name, state, last_name, SSN, email, phone, password_hash, street, street_no, city, country, zip, date_of_birth, gender, stage, education, bedroom_floor, diagnosis_date, diagnosis_description)
VALUES("qwerty",
		"blahblah",
        "state",
		"haha",
        "195712231985",
        "qwerty.haha@doc.com",
        "764656867",
        "456abc",
        "Vag",
        "16",
        "Uppsala",
        "Sweden",
		"75341",
        "1957-12-23",
        "Male",
        "3",
        "23",
        "3",
        "2016-04-01",
        "Sed nec vulputate nisl, mattis dapibus erat. Quisque vulputate erat eu felis ornare maximus a eu lorem. Cras vel nulla sit amet lorem eleifend aliquam eu sed nisi. Sed sed rutrum felis, eu efficitur turpis. Pellentesque id odio fermentum, pellentesque metus eget, tincidunt massa. Nulla efficitur dui sed elit ornare.");

insert into patient_doctor(patient_id, doctor_id)
values(1, 2); 

insert into patient_doctor(patient_id, doctor_id)
values(2, 3); 

insert into patient_doctor(patient_id, doctor_id)
values(3, 1); 