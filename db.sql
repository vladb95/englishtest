use EnglishTest;
create table role(id int auto_increment primary key, val varchar(50));
create table users(id int auto_increment primary key, login varchar(100) not null, pass varchar(100) not null, role_id int,foreign key (role_id) references role(id));
create table profile(id int auto_increment primary key,name varchar(100) not null, users_id int, rate float, foreign key (users_id) references users(id));
create table test_type(id int auto_increment primary key, type_value varchar(100));
create table test(id int auto_increment primary key, test_name varchar(256) not null,test_type_id int,test_context text not null,foreign key (test_type_id) references test_type(id));
create table test_event(id int auto_increment primary key, profile_id int,test_id int, hits float,foreign key (profile_id) references profile(id),foreign key (test_id) references test(id));