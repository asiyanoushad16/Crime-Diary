/*
SQLyog Community v13.1.6 (64 bit)
MySQL - 5.7.9 : Database - crimediary
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`crimediary` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `crimediary`;

/*Table structure for table `case_diary` */

DROP TABLE IF EXISTS `case_diary`;

CREATE TABLE `case_diary` (
  `diary_id` int(10) NOT NULL AUTO_INCREMENT,
  `crime_id` int(10) DEFAULT NULL,
  `police_id` int(10) DEFAULT NULL,
  `file_path` varchar(2000) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  `date_time` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`diary_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `case_diary` */

insert  into `case_diary`(`diary_id`,`crime_id`,`police_id`,`file_path`,`description`,`date_time`) values 
(4,1,7,'uploads/images_65013b54d751d.docx','case diary','2023-08-29T10:40'),
(2,1,7,'uploads/images_650134bee82fb.docx','CASE diary report','2023-09-08T09:38'),
(3,4,7,'uploads/images_650134e545d68.docx','case diAry rePort','2023-08-30T09:37'),
(6,5,3,'uploads/images_6502a606e0ae7.docx','Case diAry','2023-09-06T11:49');

/*Table structure for table `case_news` */

DROP TABLE IF EXISTS `case_news`;

CREATE TABLE `case_news` (
  `news_id` int(10) NOT NULL AUTO_INCREMENT,
  `crime_id` int(10) DEFAULT NULL,
  `police_id` int(10) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `descrition` varchar(100) DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  `date_time` varchar(100) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`news_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `case_news` */

insert  into `case_news`(`news_id`,`crime_id`,`police_id`,`title`,`descrition`,`image`,`date_time`,`status`) values 
(6,1,7,'crimiNal daMage','crime neWs','uploads/images_650179e9e3ce8.jpg','2023-09-06T16:29','private'),
(5,1,7,'crimiNal daMage','cAse diAry','uploads/images_65017a0a48d49.jpg','2023-09-13T16:29','private'),
(3,4,7,'Cybercrime And Online Fraud','crime news','uploads/images_6501428d2c744.jpg','2023-09-01T01:11','private'),
(7,5,3,'criminal damage','criMe NeWs','uploads/images_6502a65059597.jpg','2023-09-14T11:54','public');

/*Table structure for table `crime_types` */

DROP TABLE IF EXISTS `crime_types`;

CREATE TABLE `crime_types` (
  `crime_type_id` int(10) NOT NULL AUTO_INCREMENT,
  `crime_type_name` varchar(1000) DEFAULT NULL,
  `description` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`crime_type_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `crime_types` */

insert  into `crime_types`(`crime_type_id`,`crime_type_name`,`description`) values 
(4,'Antisocial Behaviour','Feel intimidated or distressed by a persons behaviour towards you'),
(7,'Fraud','Someone tricks or deceives you to gain a dishonest advantage'),
(6,'Cybercrime And Online Fraud','Cybercrime refers to a variety of crimes carried out online');

/*Table structure for table `crimes` */

DROP TABLE IF EXISTS `crimes`;

CREATE TABLE `crimes` (
  `crime_id` int(10) NOT NULL AUTO_INCREMENT,
  `police_id` int(10) DEFAULT NULL,
  `crime_type_id` int(10) DEFAULT NULL,
  `crime_title` varchar(100) DEFAULT NULL,
  `crime_discription` varchar(100) DEFAULT NULL,
  `date_time_occurred` varchar(100) DEFAULT NULL,
  `date_time_reported` varchar(100) DEFAULT NULL,
  `crime_status` varchar(100) DEFAULT NULL,
  `place` varchar(100) DEFAULT NULL,
  `district` varchar(100) DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`crime_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `crimes` */

insert  into `crimes`(`crime_id`,`police_id`,`crime_type_id`,`crime_title`,`crime_discription`,`date_time_occurred`,`date_time_reported`,`crime_status`,`place`,`district`,`image`) values 
(1,7,4,'Criminal Damage','Burning Car','2023-08-29T10:04','2023-09-21T13:11','added','Kochi','Kochi','uploads/images_650001314b409.jpg'),
(5,3,6,'online cReadit card','online crEdit card frauddd','2023-03-03T03:03','2023-04-04T04:04','added','Thrissur','Thrissur','uploads/images_6502a527d8798.jpg'),
(4,7,6,'Creadit Card','Online Credit Card Fraud','2023-08-30T13:43','2023-09-07T12:40','added','Thrissur','Thrissur','uploads/images_650001acd95be.jpg');

/*Table structure for table `criminals` */

DROP TABLE IF EXISTS `criminals`;

CREATE TABLE `criminals` (
  `criminal_id` int(10) NOT NULL AUTO_INCREMENT,
  `crime_id` int(10) DEFAULT NULL,
  `fname` varchar(100) DEFAULT NULL,
  `lname` varchar(100) DEFAULT NULL,
  `house_name` varchar(100) DEFAULT NULL,
  `place` varchar(100) DEFAULT NULL,
  `district` varchar(100) DEFAULT NULL,
  `gender` varchar(100) DEFAULT NULL,
  `dob` varchar(100) DEFAULT NULL,
  `photo` varchar(100) DEFAULT NULL,
  `identification_mark1` varchar(100) DEFAULT NULL,
  `identification_mark2` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`criminal_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `criminals` */

insert  into `criminals`(`criminal_id`,`crime_id`,`fname`,`lname`,`house_name`,`place`,`district`,`gender`,`dob`,`photo`,`identification_mark1`,`identification_mark2`) values 
(3,4,'jeo','jos','J.House','thiruvanandhapuram','thiruvanandhapuram','male','2023-08-31','uploads/images_65001e37a3775.png','on leg','on head'),
(7,1,'Jhon','Wick','K.home','Thiruvanandhapuram','Thiruvanandhapuram','male','2023-09-11','uploads/images_65003b6b73b1d.jpg','On Leg','On Fingers'),
(5,4,'sukugumara','kurupp','l.house','kollam','kollam','male','2023-09-11','uploads/images_650029a8ee545.jpg','on eye','on fingers'),
(6,1,'thorappan','kochunni','b.house','malaputram','malaputram','male','2023-08-29','uploads/images_650036b65883b.jpg','on eye','on head'),
(8,5,'SABU','kl','mh.House','thiruvanandHapuram','thiruvanandhapuRam','male','2023-08-29','uploads/images_6502a5be27aed.png','ON EYE','ON head');

/*Table structure for table `emergency_number` */

DROP TABLE IF EXISTS `emergency_number`;

CREATE TABLE `emergency_number` (
  `emergency_id` int(10) NOT NULL AUTO_INCREMENT,
  `emergency_num` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`emergency_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `emergency_number` */

insert  into `emergency_number`(`emergency_id`,`emergency_num`) values 
(6,'3265689845'),
(4,'9569696969'),
(5,'3265415258');

/*Table structure for table `feedback` */

DROP TABLE IF EXISTS `feedback`;

CREATE TABLE `feedback` (
  `feed_id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) DEFAULT NULL,
  `feed_description` varchar(100) DEFAULT NULL,
  `reply` varchar(100) DEFAULT NULL,
  `date_time` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`feed_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `feedback` */

insert  into `feedback`(`feed_id`,`user_id`,`feed_description`,`reply`,`date_time`) values 
(1,2,'fake news','cheking','2023-09-12T12:12'),
(2,3,'fake crime','solved','2023-09-12T13:56');

/*Table structure for table `foundreport` */

DROP TABLE IF EXISTS `foundreport`;

CREATE TABLE `foundreport` (
  `found_id` int(10) NOT NULL AUTO_INCREMENT,
  `criminal_id` int(10) DEFAULT NULL,
  `user_id` int(10) DEFAULT NULL,
  `place` varchar(100) DEFAULT NULL,
  `date_time` varchar(100) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`found_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `foundreport` */

insert  into `foundreport`(`found_id`,`criminal_id`,`user_id`,`place`,`date_time`,`description`) values 
(1,8,2,'thrissur','2023-09-14T18:18','case diary'),
(2,8,2,'Thrissur','2023-08-29T15:23','hgyyh yugg gh'),
(3,7,3,'Thrissur','2023-09-14T14:14','vv vxvds dvdgd'),
(4,6,3,'malaputram','2023-09-01T01:01','aaaaaaaaaa d');

/*Table structure for table `login` */

DROP TABLE IF EXISTS `login`;

CREATE TABLE `login` (
  `login_id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `usertype` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`login_id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

/*Data for the table `login` */

insert  into `login`(`login_id`,`username`,`password`,`usertype`) values 
(1,'admin','admin','admin'),
(4,'amalkv123','amalkv123','police'),
(5,'sumithps123','sumithps123','police'),
(16,'sss123','sss123','user'),
(9,'praveenps123','praveenps123','police'),
(15,'riss123','riss123','user'),
(14,'samkk123','samkk123','user');

/*Table structure for table `police_station` */

DROP TABLE IF EXISTS `police_station`;

CREATE TABLE `police_station` (
  `station_id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `place` varchar(100) DEFAULT NULL,
  `landmark` varchar(100) DEFAULT NULL,
  `pincode` varchar(100) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`station_id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

/*Data for the table `police_station` */

insert  into `police_station`(`station_id`,`name`,`place`,`landmark`,`pincode`,`phone`) values 
(2,'C.I','Ernakulamm','South Railway','651235','8963654998');

/*Table structure for table `polices` */

DROP TABLE IF EXISTS `polices`;

CREATE TABLE `polices` (
  `police_id` int(10) NOT NULL AUTO_INCREMENT,
  `login_id` int(10) DEFAULT NULL,
  `station_id` int(10) DEFAULT NULL,
  `fname` varchar(100) DEFAULT NULL,
  `lname` varchar(100) DEFAULT NULL,
  `house_name` varchar(100) DEFAULT NULL,
  `place` varchar(100) DEFAULT NULL,
  `dob` varchar(100) DEFAULT NULL,
  `gender` varchar(100) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`police_id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

/*Data for the table `polices` */

insert  into `polices`(`police_id`,`login_id`,`station_id`,`fname`,`lname`,`house_name`,`place`,`dob`,`gender`,`phone`,`email`) values 
(3,5,2,'Sumith','Ps','Pulikkal','Thrissurr','2023-09-12','male','7593938854','sumithps78@gmail.com'),
(7,9,2,'Praveen','Ps','Thadathill','Thiruvanandhapuram','2023-09-13','male','9865321545','praveen123@gmail.com');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `user_id` int(10) NOT NULL AUTO_INCREMENT,
  `login_id` int(10) DEFAULT NULL,
  `fname` varchar(100) DEFAULT NULL,
  `lname` varchar(100) DEFAULT NULL,
  `house_name` varchar(100) DEFAULT NULL,
  `place` varchar(100) DEFAULT NULL,
  `pincode` varchar(100) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `aadhar_no` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `users` */

insert  into `users`(`user_id`,`login_id`,`fname`,`lname`,`house_name`,`place`,`pincode`,`phone`,`email`,`aadhar_no`) values 
(2,14,'SAM','KK','J.House','kochi','680565','6595452575','sam123@gmail.com','326544889885'),
(3,15,'Riss','Technology','Pulikkal','thrissur','680696','9565355285','riss123@gmail.com','656565656565'),
(4,16,'fgvhg','ffr','jHouse','thrissur','651235','8963654999','amal123@gmail.com','888888888888');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
