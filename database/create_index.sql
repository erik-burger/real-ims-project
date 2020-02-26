create index index_f_name 
on patient (first_name); 

create index index_l_name 
on patient (last_name); 

create index index_test_date 
on test (test_date); 

SHOW INDEXES FROM test;