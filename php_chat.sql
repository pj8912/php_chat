CREATE TABLE users(
	user_id int auto_increment primary key not null,
	user_uname varchar(150) not null,
	user_pwd varchar(300) not null,
	created_at datetime default current_timestamp
);


create table messages(

        mid int auto_increment primary key not null,
        sender_id int not null,
        receiver_id int not null,
        on_date datetime default current_timestamp,
        FOREIGN KEY (sender_id) REFERENCES users(user_id),
	FOREIGN KEY (receiver_id) REFERENCES users(user_id),
	created_at datetime DEFAULT CURRENT_TIMESTAMP
);


ALTER TABLE messages ADD COLUMN receiver_name varchar(200);


create table connection_requests(
	id int auto_increment primary key not null,
	sender_id int not null,
	receiver_id int not null,
	FOREIGN KEY (sender_id) REFERENCES users(user_id),
	FOREIGN KEY (receiver_id) REFERENCES users(user_id),
	created_at datetime default current_timestamp

);


create table connected(
	id int auto_increment primary key not null,
	user1 int not null,
	user2 int not null,
	FOREIGN KEY (user1) REFERENCES users(user_id),
	FOREIGN KEY (user2) REFERENCES users(user_id),
	created_at datetime default current_timestamp 

);


