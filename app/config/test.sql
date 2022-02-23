create table if not exists users (
	id int AUTO_INCREMENT PRIMARY key,
    first_name varchar(255),
    last_name varchar(255),
    email varchar(255),
    password varchar(255)
);


create table if not exists posts (
	id int AUTO_INCREMENT PRIMARY key,
    user_id int,
    title varchar(255),
    photo varchar(255),
    description text,
    category varchar(255),
	FOREIGN key (user_id) REFERENCES users(id) ON DELETE CASCADE ON UPDATE,
);

create table if not exists comments (
	id int AUTO_INCREMENT PRIMARY key,
    post_id int,
    user_id int,
    content text,
    FOREIGN key (user_id) REFERENCES users(id) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN key (post_id) REFERENCES posts(id) ON DELETE CASCADE ON UPDATE CASCADE
);