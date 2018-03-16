create database FreeBoard;
use FreeBoard;

create table User(
    ID VARCHAR(100),
    PASSWORD VARCHAR(100) NOT NULL,
    NICKNAME VARCHAR(100) NOT NULL,
    TEL VARCHAR(13) NOT NULL,
    PRIMARY KEY(ID)
);
INSERT INTO user VALUES('dummy@dummy.com','dummy','dummy','000-0000-0000');

create table User_Image(
    USER_ID VARCHAR(100),
    IMAGE_PATH VARCHAR(600), 
    constraint fk_id foreign key ( USER_ID ) references User ( ID ) on delete cascade on update cascade
);

create table Article(
    USER_ID VARCHAR(100),
    ARTICLE_NO INT(10) AUTO_INCREMENT,
    TITLE VARCHAR(300) NOT NULL,
    CONTENT VARCHAR(2000),
    CREATION_TIME VARCHAR(100),
    PRIMARY KEY(ARTICLE_NO),
    constraint fk_article_id foreign key ( USER_ID ) references User ( ID ) on delete cascade on update cascade
);

INSERT INTO Article VALUES('dummy@dummy.com','','안녕하세요 운영자입니다.','청결한 게시판 이용 부탁드리겠습니다.', '2018-01-29 03:43:17');
INSERT INTO Article VALUES('wleo12345@naver.com','','안녕하세요 함성준입니다.','저는 게시판 제작자에요 ^^', '2018-01-29 03:43:17');


