-- Users
DROP TABLE IF EXISTS users;
CREATE TABLE users (
    id int unsigned auto_increment,
    firstname varchar(255) not null,
    lastname varchar(255) not null,
    username varchar(255) not null,
    password varchar(255) not null,
    primary key(id)
);

INSERT INTO users (username, firstname, lastname, password) VALUES('admin', 'Jordan', 'Cooper', md5('password123'));
INSERT INTO users (username, firstname, lastname, password) VALUES('mcphersonr', 'Ramone', 'McPherson', md5('password123'));
INSERT INTO users (username, firstname, lastname, password) VALUES('hyltonk', 'Khadejah', 'Hylton', md5('password123'));
INSERT INTO users (username, firstname, lastname, password) VALUES('williamsa', 'Ackeam', 'Williams', md5('password123'));

-- Messages
DROP TABLE IF EXISTS messages;
CREATE TABLE messages (
    id int unsigned auto_increment,
    recipient_ids varchar(255) not null,
    sender_id varchar(255) not null,
    subject varchar(255) not null,
    body text(65535) not null,
    date_sent datetime not null,
    primary key(id)
);

INSERT INTO messages (recipient_ids,sender_id,subject,body,date_sent) VALUES('2,3,4','1','FirstLesson','We are almost finish with the project','2017-11-08 06:38:54');
INSERT INTO messages (recipient_ids,sender_id,subject,body,date_sent) VALUES('2,3,1','1','SecondLesson','This school year needs to over','2017-11-09 06:48:54');
INSERT INTO messages (recipient_ids,sender_id,subject,body,date_sent) VALUES('2,1,4','1','ThirdLesson','Need to finish','2017-11-10 06:58:54');
INSERT INTO messages (recipient_ids,sender_id,subject,body,date_sent) VALUES('2,3,4','1','FourthLesson','Waiting for it','2017-11-12 06:18:54');
INSERT INTO messages (recipient_ids,sender_id,subject,body,date_sent) VALUES('2,3,1','2','FifthLesson','Still waiting for it','2017-11-13 06:28:54');
INSERT INTO messages (recipient_ids,sender_id,subject,body,date_sent) VALUES('2,3,1','2','SixthLesson','Getting impatient. Need to be done with it','2017-11-14 06:08:54');
INSERT INTO messages (recipient_ids,sender_id,subject,body,date_sent) VALUES('2,3,4','2','SeventhLesson','Yay we are finally finish','2017-11-15 06:27:54');
INSERT INTO messages (recipient_ids,sender_id,subject,body,date_sent) VALUES('2,4,1','3','EigthLesson','Next thing to do is to find a job','2017-11-16 06:22:54');
INSERT INTO messages (recipient_ids,sender_id,subject,body,date_sent) VALUES('2,1,4','3','NinthLesson','Waiting on a job. Would like one tomorrow','2017-11-17 06:19:54');
INSERT INTO messages (recipient_ids,sender_id,subject,body,date_sent) VALUES('1,3,4','3','TenthLesson','Got an interview. Hope to get it','2017-11-18 06:15:54');
INSERT INTO messages (recipient_ids,sender_id,subject,body,date_sent) VALUES('1,3,4','4','EleventhLesson','Got the job start Monday. Waiting to get paid.','2017-11-19 06:18:54');
INSERT INTO messages (recipient_ids,sender_id,subject,body,date_sent) VALUES('1,3,4','4','TwelvethLesson','Five days till pay day.','2017-11-20 06:05:54');
INSERT INTO messages (recipient_ids,sender_id,subject,body,date_sent) VALUES('1,3,4','4','ThirteenthLesson','The dollars drop I am rich until the midddle of the month','2017-11-21 06:12:54');
-- Messages_Read
DROP TABLE IF EXISTS messages_read;
CREATE TABLE messages_read (
    id int unsigned auto_increment,
    message_id varchar(255) not null,
    reader_id varchar(255) not null,
    date_read datetime not null,
    primary key(id)
);