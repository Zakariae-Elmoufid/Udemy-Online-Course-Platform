create DATABASE  udemy;

use udemy;


CREATE TABLE `Users` (
    id int PRIMARY KEY AUTO_INCREMENT,
    email varchar(100) unique,
     username varchar(50),
    `password` varchar(200),
    created_at Date not null DEFAULT (CURRENT_DATE),
    deleted_at Date default NULL,
    role ENUM('Admin', 'Teacher', 'Student')

CREATE TABLE Students (
    id int PRIMARY KEY AUTO_INCREMENT,
    field varchar(100),
    status ENUM('Activation', 'suspension', 'suppression') DEFAULT 'Activation',
    user_id int,
    FOREIGN KEY (user_id) REFERENCES `Users`(id)
);

CREATE TABLE Teachers (
    id int PRIMARY KEY AUTO_INCREMENT,
    speciality varchar(50),
    status ENUM('Activation', 'suspension', 'suppression') DEFAULT 'suspension',
    user_id int,
    FOREIGN KEY (user_id) REFERENCES `Users`(id)
);

CREATE TABLE `Categories` (
    id int PRIMARY KEY AUTO_INCREMENT,
    title varchar(100),
    created_at Date not null DEFAULT (CURRENT_DATE),
    deleted_at Date default NULL
);

CREATE TABLE Courses (
   id int PRIMARY KEY AUTO_INCREMENT,
    title varchar(100),
   `description` text,
    content varchar(200),
    created_at Date not null DEFAULT (CURRENT_DATE),
    deleted_at Date default NULL,
    category_id int ,
    FOREIGN KEY (category_id) REFERENCES Categorys(id)
)


CREATE TABLE `Tags` (
    id int PRIMARY KEY AUTO_INCREMENT,
    title varchar(50),
    created_at Date not null DEFAULT (CURRENT_DATE),
    deleted_at Date default NULL
);

CREATE TABLE `Course_Tag` (
    tag_id int,
    course_id int,
    FOREIGN KEY (tag_id) REFERENCES `Tags`(id),
    FOREIGN KEY (course_id) REFERENCES `Courses`(id)
);

CREATE TABLE Enrollment (
    id int PRIMARY KEY AUTO_INCREMENT,
    course_id int,
    student_id int,
    enrolled_date Date default (CURRENT_DATE),
    FOREIGN KEY (course_id) REFERENCES `Courses`(id),
    FOREIGN KEY (student_id) REFERENCES `Students`(id)
);

