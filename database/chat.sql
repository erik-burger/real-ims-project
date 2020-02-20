create table chat (
    chat_message_ID int not null auto_increment,
    to_user_id int not null, 
    to_user_type char(1) not null,
    from_user_id int not null, 
    from_user_type char(1) not null, 
    chat_message text not null,
    date_time timestamp not NULL, 
    message_status int(1) not null);
