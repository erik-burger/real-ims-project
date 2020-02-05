create table test_images(
	image_id int not null, 
	image_url varchar(50) not null, 
    image_name varchar(50) not null,
    primary key (image_id)); 
    
INSERT INTO test_images (image_id, image_url, image_name)
VALUES("0","../test_images/0.glas.jpg", "Glas");

INSERT INTO test_images (image_id, image_url, image_name)
VALUES("1","../test_images/1.pencil.jpg", "Pencil");

INSERT INTO test_images (image_id, image_url, image_name)
VALUES("2","../test_images/2.fork.jpg", "Fork");

INSERT INTO test_images (image_id, image_url, image_name)
VALUES("3","../test_images/3.spoon.jpg", "Spoon");

INSERT INTO test_images (image_id, image_url, image_name)
VALUES("4","../test_images/4.knife.jpg", "Knife");

INSERT INTO test_images (image_id, image_url, image_name)
VALUES("5","../test_images/5.knife.jpg", "Cup");

INSERT INTO test_images (image_id, image_url, image_name)
VALUES("6","../test_images/6.chair.jpg", "Chair");