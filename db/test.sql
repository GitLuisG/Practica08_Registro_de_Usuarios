create database test;
use test;
create table users (
`id` int NOT NULL AUTO_INCREMENT,
`username` varchar(300),
`name` varchar(300),
`email` varchar(300),
`password` varchar(300),
PRIMARY KEY (`id`)
);
insert into scores(score, player, game)value(5000, "play 1", "Pacman");
select * from users;
insert into users(`username`, `name`, `email`, `password`)value("GitLuisG", "Luis", "1730505@upv.edu.mx","Luis");