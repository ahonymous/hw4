CREATE DATABASE researches DEFAULT CHARACTER SET utf8;
GRANT USAGE ON *.* TO dbuser@localhost IDENTIFIED BY '11111';
GRANT ALL ON researches.* TO dbuser@localhost;
GRANT SUPER ON *.* TO 'dbuser'@'localhost';

USE researches;

SET FOREIGN_KEY_CHECKS = 0;

CREATE TABLE researchers (
  id INT NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (id),
  full_name CHAR (30),
  experience INT,
  degree CHAR(30),
  nationality_id INT,
  FOREIGN KEY (nationality_id) REFERENCES nationalities(id)
);

INSERT INTO researchers(id, full_name, experience, degree, nationality_id)
VALUES
(1,'Джордж Акерлоф ', '46', 'Доктор', 3),
(2,'Хироси Амано', '12', 'Магистр', 1),
(3,'Отто Валлах', '9', 'Магистр', 2),
(4,'Ирен Жолио-Кюри', '38', 'Доктор', 3),
(5,'Брюс Бётлер', '40', 'Доктор', 4),
(6,'Нильс Бор', '10', 'Магистр', 4),
(7,'Карл Бош', '4', 'Бакалавр', 3),
(8,'Арвид Карлссон', '36', 'Доктор', 3),
(9,'Такааки Кадзита', '3', 'Бакалавр', 1),
(10,'Ада Йонат', '7', 'Магистр', 2);


CREATE TABLE projects (
  id INT NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (id),
  project_name VARCHAR (100),
  execution_time INT,
  field CHAR(30)
);

INSERT INTO projects (id, project_name, execution_time, field)
VALUES
(1, 'Исследование гуморальных передатчиков в нервных окончаниях', 3, 'Медицина'),
(2, 'Эффект реакции Дильса-Альдера', 2, 'Химия'),
(3, 'Применение антибактериального эффекта пронтозила', 3, 'Медицина'),
(4, 'Влияние стереохимии и химической кинетики на человека', 4, 'Химия'),
(5, 'Повторное исследование договорных основ принятия экономических решений', 5, 'Экономика'),
(6, 'Анализ финансовых рынков в отношении сбережений', 1, 'Экономика'),
(7, 'Новые возможности нитрид-галлиевых светодиодов', 3, 'Физика'),
(8, 'Применение светоизлучающих диодов в бытовой сфере', 2, 'Физика');

CREATE TABLE reserchers_projects (
  id INT NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (id),
  researcher_id INT,
  project_id INT,
  FOREIGN KEY (researcher_id) REFERENCES researchers(id),
  FOREIGN KEY (project_id) REFERENCES projects(id)
);

INSERT INTO reserchers_projects (id, researcher_id, project_id)
VALUES
(1, 1, 2),
(2, 1, 4),
(3, 2, 2),
(4, 3, 5),
(5, 3, 6),
(6, 4, 5),
(7, 5, 5),
(8, 6, 1),
(9, 7, 1),
(10, 7, 3),
(11, 8, 7),
(12, 9, 7),
(13, 9, 8),
(14, 10, 8);

CREATE TABLE nationalities (
  id INT NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (id),
  nationality CHAR (30)
);

INSERT INTO nationalities (id, nationality)
VALUES
(1, 'Азиат'),
(2, 'Африканец'),
(3, 'Европеец'),
(4, 'Американец');

CREATE TABLE grants (
  id INT NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (id),
  granted INT,
  fund CHAR (30),
  project_id INT,
  FOREIGN KEY (project_id) REFERENCES projects(id)
);

INSERT INTO grants (id, granted, fund, project_id)
VALUES
(1, 30000, 'WAJDH', 1),
(2, 40000, 'KJLK', 2),
(3, 20000, 'WAJDH', 3),
(4, 30000, 'WVSX', 4),
(5, 25000, 'NXC', 5),
(6, 24000, 'WAJDH', 6),
(7, 16000, 'KJHH', 7),
(8, 50000, 'CGG', 8);
