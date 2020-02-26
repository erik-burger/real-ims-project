CREATE TABLE users (
  usertype char(1) NOT NULL,
  password_hash varchar(255) NOT NULL,
  email varchar(50) NOT NULL UNIQUE,
  verified int(11) DEFAULT NULL,
  verification_hash varchar(255) DEFAULT NULL,
  user_id int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (user_id)
);
  
INSERT INTO users (password_hash, email, verified, verification_hash, user_id)
SELECT DISTINCT password_hash, email, verified, verification_hash, patient_id FROM patient;

INSERT INTO users (password_hash, email, verified, verification_hash, user_id)
SELECT DISTINCT password_hash, email, verified, verification_hash, doctor_id FROM doctor;

INSERT INTO users (password_hash, email, verified, verification_hash, user_id)
SELECT DISTINCT password_hash, email, verified, verification_hash, researcher_id FROM researcher;

INSERT INTO users (password_hash, email, verified, verification_hash, user_id)
SELECT DISTINCT password_hash, email, verified, verification_hash, caregiver_id FROM caregiver;
  
ALTER TABLE patient 
	DROP password_hash,
	DROP email,
    DROP verified,
    DROP verification_hash;
    