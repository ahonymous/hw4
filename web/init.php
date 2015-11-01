<?php
/**
 * Created by PhpStorm.
 * User: victor
 * Date: 01/11/15
 * Time: 10:07
 */

ini_set('display_errors', 'on');
require '../config/autoload.php';
use Layer\Manager\Manager;
use \Entity\Group;
use \Entity\Pupil;
use \Entity\Teacher;
$manager = new Manager();
$manager->execute(Group::initScript());
$manager->execute(Pupil::initScript());
$manager->execute(Teacher::initScript());
$manager->execute("CREATE TRIGGER `clean_teacher_group` BEFORE DELETE ON `teacher`
 FOR EACH ROW DELETE FROM `teacher_group` WHERE `teacher_id` = `id`");
$manager->execute("CREATE TABLE `teacher_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `teacher_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `teacher_group_group_FK` (`group_id`),
  KEY `teacher_id` (`teacher_id`),
  CONSTRAINT `teacher_group_ibfk_2` FOREIGN KEY (`group_id`) REFERENCES `group` (`id`),
  CONSTRAINT `teacher_group_ibfk_1` FOREIGN KEY (`teacher_id`) REFERENCES `teacher` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1");
