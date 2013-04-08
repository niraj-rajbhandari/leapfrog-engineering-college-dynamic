-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 08, 2013 at 04:14 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_personal_info`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_album`
--

CREATE TABLE IF NOT EXISTS `tbl_album` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `album_name` varchar(255) NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tbl_album`
--

INSERT INTO `tbl_album` (`id`, `album_name`, `created_date`, `updated_date`) VALUES
(3, 'naresh maharaja', '2013-03-20 05:09:58', NULL),
(5, 'niraj', '2013-03-28 10:10:10', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gallery`
--

CREATE TABLE IF NOT EXISTS `tbl_gallery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `image_caption` varchar(255) DEFAULT NULL,
  `album_id` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_date` datetime NOT NULL,
  `thumb_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_tbl_gallery` (`album_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `tbl_gallery`
--

INSERT INTO `tbl_gallery` (`id`, `title`, `image_caption`, `album_id`, `created_date`, `updated_date`, `thumb_name`) VALUES
(14, 'Desert.jpg', 'Desert', 3, '2013-03-24 04:40:24', '0000-00-00 00:00:00', 'Desert_thumb.jpg'),
(15, 'Jellyfish.jpg', 'jelly Fish', 3, '2013-03-24 04:40:36', '0000-00-00 00:00:00', 'Jellyfish_thumb.jpg'),
(16, 'Penguins.jpg', 'Penguins', 3, '2013-03-24 04:40:44', '0000-00-00 00:00:00', 'Penguins_thumb.jpg'),
(17, 'Tulips.jpg', 'tulips', 3, '2013-03-24 04:40:56', '0000-00-00 00:00:00', 'Tulips_thumb.jpg'),
(25, 'school_bus.jpeg', 'School Bus', 5, '2013-03-28 11:47:11', '0000-00-00 00:00:00', 'school_bus_thumb.jpeg'),
(26, 'school_bus1.jpeg', 'school bus 1', 5, '2013-03-28 11:47:23', '0000-00-00 00:00:00', 'school_bus1_thumb.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_menu`
--

CREATE TABLE IF NOT EXISTS `tbl_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_name` varchar(255) NOT NULL,
  `menu_title` varchar(255) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tbl_menu`
--

INSERT INTO `tbl_menu` (`id`, `menu_name`, `menu_title`, `active`) VALUES
(1, 'home', 'Home', 1),
(2, 'about-us', 'About Us', 1),
(3, 'facilities', 'Facilities', 1),
(4, 'gallery', 'Gallery', 1),
(5, 'academic', 'Academic', 1),
(6, 'contact', 'Contact', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_posts`
--

CREATE TABLE IF NOT EXISTS `tbl_posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_title` varchar(255) NOT NULL,
  `post_type` varchar(255) NOT NULL,
  `post_image` varchar(255) DEFAULT NULL,
  `post_body` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `fk_tbl_posts` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `tbl_posts`
--

INSERT INTO `tbl_posts` (`id`, `post_title`, `post_type`, `post_image`, `post_body`, `user_id`, `active`) VALUES
(6, 'Leapfrog College of Engineering', 'about-us', 'about_us_image.png', '<p>Leapfrog College of Engineering, Kopundole, is an educational institution of higher learning established in 2010 and managed by the leapfrog Technologies. They began their work in Nepal in 2010 with the opening of Leapfrog Technologies, Kopundole, followed by Leapfrog College of Engineering, Kopundole and Leapfrog College of Engineering, Deonia.Jesuits have served people of all faiths, all over the world, as educators, scientists, explorers and social reformers since 1540. That centuries old tradition of service to others is the cornerstone of Jesuit education. Education at Leapfrog prepares each student to live and lead in all the endeavors. It fosters critical thinking, positive action and service to others. It challenges students to go beyond career preparation. It encourages the student to be job creators rather than job seekers, creative designers of the future.</p>\r\n\r\n<p>Leapfrog College of Engineering, Kopundole, is an educational institution of higher learning established in 2010 and managed by the leapfrog Technologies. They began their work in Nepal in 2010 with the opening of Leapfrog Technologies, Kopundole, followed by Leapfrog College of Engineering, Kopundole and Leapfrog College of Engineering, Deonia.Jesuits have served people of all faiths, all over the world, as educators, scientists, explorers and social reformers since 1540. That centuries old tradition of service to others is the cornerstone of Jesuit education. Education at Leapfrog prepares each student to live and lead in all the endeavors. It fosters critical thinking, positive action and service to others. It challenges students to go beyond career preparation. It encourages the student to be job creators rather than job seekers, creative designers of the future.</p>\r\n', 9, 1),
(8, 'Message from Principal', 'home', '', '<p><img alt="" src="/img/post-image/images/principal.png" style="float:left; height:156px; width:150px" />Leapfrog College of Engineering maintains a very special place in the academic landscape of Nepal. Our great strength lies in our continuous endeavour to rise above the standards of excellence we continuously redefine for ourselves and for the students in turn. In striving to keep ourselves and our students at the helm of the latest in academics and technology, we do not forget that much of what goes into the making of a successful person is a healthy mindset and strong values. In addition to the holistic grooming of our students, we encourage students to pursue their intellectual curiosity, which could most often overstep the boundaries of the classroom.</p>\r\n\r\n<p>The upkeep of the brand that the Jesuits have laboriously built over the years is anything but easy. And it isn&rsquo;t any easier on the students who make up this very brand. However, the strength of an indomitable spirit to constantly rise above ourselves is what propels each of us &ndash; students and teachers &ndash; to never falter in our vision of excellence.</p>\r\n\r\n<p>With time, all that you have studied and memorised will fade in its grandeur, but what remains are the virtues of tenacity, heroism and a strong sense of justice, among many, that Leapfrog imbues in every leapfroger. After your formation in Leapfrog, much is expected of you. You are no longer a student, but a Leapfrog leader and the solution to many a challenge that plague the society and country as a whole.</p>\r\n\r\n<p>Welcome to Leapfrog College of Engineering family.<br />\r\n<br />\r\nGod bless you.<br />\r\nMr. Sisir Joshi<br />\r\nPrincipal<br />\r\nLeapfrog College of Engineering<br />\r\nMaitighar, Kathmandu</p>\r\n', 9, 1),
(11, '.NET training has started', 'news', '', '<p><code><img alt="" src="/img/post-image/images/profilepic.png" style="float:left; height:207px; width:150px" />Zend_Auth</code> provides an API for authentication and includes concrete authentication adapters for common use case scenarios.</p>\r\n\r\n<p><code>Zend_Auth</code> is concerned only with <em>authentication</em> and not with <em>authorization</em>. Authentication is loosely defined as determining whether an entity actually is what it purports to be (i.e., identification), based on some set of credentials. Authorization, the process of deciding whether to allow an entity access to, or to perform operations upon, other entities is outside the scope of <code>Zend_Auth</code>. For more information about authorization and access control with Zend Framework, please see <a href="http://doczf.mikaelkael.fr/1.11/en/zend.acl.html"><code>Zend_Acl</code></a>.</p>\r\n\r\n<p>A <code>Zend_Auth</code> adapter is used to authenticate against a particular type of authentication service, such as LDAP, RDBMS, or file-based storage. Different adapters are likely to have vastly different options and behaviors, but some basic things are common among authentication adapters. For example, accepting authentication credentials (including a purported identity), performing queries against the authentication service, and returning results are common to <code>Zend_Auth</code> adapters.</p>\r\n\r\n<p>Each <code>Zend_Auth</code> adapter class implements <code>Zend_Auth_Adapter_Interface</code>. This interface defines one method, authenticate(), that an adapter class must implement for performing an authentication query. Each adapter class must be prepared prior to calling authenticate(). Such adapter preparation includes setting up credentials (e.g., username and password) and defining values for adapter-specific configuration options, such as database connection settings for a database table adapter.</p>\r\n\r\n<p>The following is an example authentication adapter that requires a username and password to be set for authentication. Other details, such as how the authentication service is queried, have been omitted for brevity:</p>\r\n', 9, 1),
(12, 'LCOE Football Tournament Glory', 'news', '', '<p><img alt="" src="/img/post-image/images/slide_basketball.jpg" style="float:left; height:63px; width:200px" />Authenticating a request that includes authentication credentials is useful per se, but it is also important to support maintaining the authenticated identity without having to present the authentication credentials with each request.</p>\r\n\r\n<p>HTTP is a stateless protocol, however, and techniques such as cookies and sessions have been developed in order to facilitate maintaining state across multiple requests in server-side web applications.</p>\r\n\r\n<p>Default Persistence in the PHP Session</p>\r\n\r\n<p>By default, <code>Zend_Auth</code> provides persistent storage of the identity from a successful authentication attempt using the PHP session. Upon a successful authentication attempt, Zend_Auth::authenticate() stores the identity from the authentication result into persistent storage. Unless configured otherwise, <code>Zend_Auth</code> uses a storage class named <code>Zend_Auth_Storage_Session</code>, which, in turn, uses <a href="http://doczf.mikaelkael.fr/1.11/en/zend.session.html"><code>Zend_Session</code></a>. A custom class may instead be used by providing an object that implements <code>Zend_Auth_Storage_Interface</code> to Zend_Auth::setStorage().</p>\r\n', 9, 1),
(13, 'Bachelor in Computer Engineering ', 'academic', '', '<p>The Bachelor of computer Engineering focuses on the design and application of computer systems. The program integrates the study of computer science and electronic engineering.The strong theoretical foundation with sufficient practical exposure prepares students to solve real-world problems, combining ideas from engineering and basic science with economics and sociology.BE Computer is a four-year academic program consisting of eight semesters and170 credit hours. It gives knowledge and expertise in the latest technology . It incorporates intensive laboratory assignments that give significant experiences with state-of-the-art facilities and design.</p>\r\n\r\n<h1>Objectives</h1>\r\n\r\n<p>The courses aim to</p>\r\n\r\n<ul>\r\n	<li>Provide in-depth study of hardware and software systems</li>\r\n	<li>Impart knowledge to invent and deploy ideas for solving real-life problems.</li>\r\n	<li>Train to analyze ,design and develop computer-based systems in different arenas of development</li>\r\n	<li>Prepare students for research in recent technologies for future development.</li>\r\n	<li>Develop entrepreneurship skills</li>\r\n	<li>Build sound presentation and communication skills</li>\r\n</ul>\r\n\r\n<h1>Career Options</h1>\r\n\r\n<p>Computer Engineering has excellent opportunities in different industries, including software, hardware, electronics, electrical and telecommunications sectors.Computer Engineers are the most-sought experts to be employed in the industries where computer systems (both systems software and hardware) are manufactured. They possess the level of technical skills required to hold positions as System Analysts, Programmers, Product Managers, System Administrators, Database Administrators and Web Developers.Lucrative opportunities for these graduates are open in the universities and research centers worldwide.</p>\r\n\r\n<h1>BE Computer Curriculum - 169 Credit Hours</h1>\r\n\r\n<h2>SEMESTER I - 21 Credit Hours</h2>\r\n\r\n<ul>\r\n	<li>BEG 101 SH Engineering Mathematics I - 3</li>\r\n	<li>BEG 170 CO Computer Concepts - 3</li>\r\n	<li>BEG 103 SH Physics - 4</li>\r\n	<li>BEG 146 ME Engineering Drawing I - 2</li>\r\n	<li>BEG 148 ME Workshop Technology - 2</li>\r\n	<li>BEG 105 SH Communicative English - 3</li>\r\n	<li>BEG 175 CO Computer Programming - 4</li>\r\n</ul>\r\n\r\n<h2>SEMESTER II - 21 Credit Hours</h2>\r\n\r\n<ul>\r\n	<li>BEG 102 SH Engineering Mathematics II - 3</li>\r\n	<li>BEG 176 CO Object-Oriented Programming C++ - 4</li>\r\n	<li>BEG 150 CI Applied Mechanics - 3</li>\r\n	<li>BEG 104 SH Chemistry - 3</li>\r\n	<li>BEG 147 ME Engineering Drawing II - 2</li>\r\n	<li>BEG 122 EL Electro Engineering Materials - 3</li>\r\n	<li>BEG 123 EL Electrical Engineering I - 3</li>\r\n</ul>\r\n\r\n<h2>SEMESTER III - 20 Credit Hours</h2>\r\n\r\n<ul>\r\n	<li>BEG 201 HS Engineering Mathematics III - 3</li>\r\n	<li>BEG 240 ME Thermodynamics Heat and Mass Transfer - 3</li>\r\n	<li>BEG 230 EC Digital Electronics - 4</li>\r\n	<li>BEG 231 EC Electronics Devices - 3</li>\r\n	<li>BEG 250 CI Data structure &amp; Algorithm - 4</li>\r\n	<li>BEG 223 EL Electrical Engineering - 3</li>\r\n</ul>\r\n\r\n<h2>SEMESTER IV - 23 Credit Hours</h2>\r\n\r\n<ul>\r\n	<li>BEG 274 CO Theory of Computer - 3</li>\r\n	<li>BEG 275 CO Visual Programming - 4</li>\r\n	<li>BEG 233 EC Microprocessor - 4</li>\r\n	<li>BEG 234 EC Electronic Circuit I - 3</li>\r\n	<li>BEG 224 EL Electrical Machines and Drives - 3</li>\r\n	<li>BEG 395 MS Applied Sociology - 3</li>\r\n	<li>BEG 736 ES Electromagnetic &amp; propagation - 3</li>\r\n</ul>\r\n\r\n<h2>SEMESTER V - 22 Credit Hours</h2>\r\n\r\n<ul>\r\n	<li>BEG 370 CO Numerical Methods - 3</li>\r\n	<li>BEG 330 EC Instrumentation I - 3</li>\r\n	<li>BEG 371 CO System Analysis &amp; Design - 3</li>\r\n	<li>BEG 372 CO Computer Organization &amp; Design - 3</li>\r\n	<li>BEG 373 CO Operating System - 4</li>\r\n	<li>BEG 320 EL Control Systems - 3</li>\r\n	<li>BEG 331 EC Communication Systems - 3</li>\r\n</ul>\r\n\r\n<h2>SEMESTER VI - 23 Credit Hours</h2>\r\n\r\n<ul>\r\n	<li>BEG 396MS Research Methodology - 2</li>\r\n	<li>BEG 203 SH Probability and Statistics - 3</li>\r\n	<li>BEG 374 CO Computer Network - 4</li>\r\n	<li>BEG 375 CO Computer Graphics - 4</li>\r\n	<li>BEG 332 EL Microprocessor Based Instrumentation - 3</li>\r\n	<li>BEG 376 CO Database Management System - 4</li>\r\n	<li>BEG 495 MS Engineering Economics - 3</li>\r\n</ul>\r\n\r\n<h2>SEMESTER VII - 22 Credit Hours</h2>\r\n\r\n<ul>\r\n	<li>BEG 470 CO Web Programming Technique - 4</li>\r\n	<li>BEG 203 SH Organization Management - 2</li>\r\n	<li>BEG 374 CO Artificial Intelligences - 3</li>\r\n	<li>BEG 375 CO Software Engineering - 3</li>\r\n	<li>BEG 332 EC project Management - 3</li>\r\n	<li>BEG 376 CO Simulations and Modeling - 4</li>\r\n	<li>BEG 495 MS Elective I - 3</li>\r\n</ul>\r\n\r\n<h2>SEMESTER VIII - 17 Credit Hours</h2>\r\n\r\n<ul>\r\n	<li>BEG 476 CO Image Processing and Pattern Recognition - 3</li>\r\n	<li>BEG 459 CI Engineering Professional Practice - 2</li>\r\n	<li>BEG 433 EC Digital Signal Processing - 3</li>\r\n	<li>BEG 477 CO Advance Computer Architecture - 3</li>\r\n	<li>BEG 478 CO Elective II - 3</li>\r\n	<li>BEG 480 CO Project Work - 3</li>\r\n</ul>\r\n', 9, 1),
(14, 'Bachelor in Civil Engineering', 'academic', '', '<p>The Bachelor of computer Engineering focuses on the design and application of computer systems. The program integrates the study of computer science and electronic engineering.The strong theoretical foundation with sufficient practical exposure prepares students to solve real-world problems, combining ideas from engineering and basic science with economics and sociology.BE Computer is a four-year academic program consisting of eight semesters and170 credit hours. It gives knowledge and expertise in the latest technology . It incorporates intensive laboratory assignments that give significant experiences with state-of-the-art facilities and design.</p>\r\n\r\n<h1>Objectives</h1>\r\n\r\n<p>The courses aim to</p>\r\n\r\n<ul>\r\n	<li>Provide in-depth study of hardware and software systems</li>\r\n	<li>Impart knowledge to invent and deploy ideas for solving real-life problems.</li>\r\n	<li>Train to analyze ,design and develop computer-based systems in different arenas of development</li>\r\n	<li>Prepare students for research in recent technologies for future development.</li>\r\n	<li>Develop entrepreneurship skills</li>\r\n	<li>Build sound presentation and communication skills</li>\r\n</ul>\r\n\r\n<h1>Career Options</h1>\r\n\r\n<p>Computer Engineering has excellent opportunities in different industries, including software, hardware, electronics, electrical and telecommunications sectors.Computer Engineers are the most-sought experts to be employed in the industries where computer systems (both systems software and hardware) are manufactured. They possess the level of technical skills required to hold positions as System Analysts, Programmers, Product Managers, System Administrators, Database Administrators and Web Developers.Lucrative opportunities for these graduates are open in the universities and research centers worldwide.</p>\r\n\r\n<h1>BE Computer Curriculum - 169 Credit Hours</h1>\r\n\r\n<h2>SEMESTER I - 21 Credit Hours</h2>\r\n\r\n<ul>\r\n	<li>BEG 101 SH Engineering Mathematics I - 3</li>\r\n	<li>BEG 170 CO Computer Concepts - 3</li>\r\n	<li>BEG 103 SH Physics - 4</li>\r\n	<li>BEG 146 ME Engineering Drawing I - 2</li>\r\n	<li>BEG 148 ME Workshop Technology - 2</li>\r\n	<li>BEG 105 SH Communicative English - 3</li>\r\n	<li>BEG 175 CO Computer Programming - 4</li>\r\n</ul>\r\n\r\n<h2>SEMESTER II - 21 Credit Hours</h2>\r\n\r\n<ul>\r\n	<li>BEG 102 SH Engineering Mathematics II - 3</li>\r\n	<li>BEG 176 CO Object-Oriented Programming C++ - 4</li>\r\n	<li>BEG 150 CI Applied Mechanics - 3</li>\r\n	<li>BEG 104 SH Chemistry - 3</li>\r\n	<li>BEG 147 ME Engineering Drawing II - 2</li>\r\n	<li>BEG 122 EL Electro Engineering Materials - 3</li>\r\n	<li>BEG 123 EL Electrical Engineering I - 3</li>\r\n</ul>\r\n\r\n<h2>SEMESTER III - 20 Credit Hours</h2>\r\n\r\n<ul>\r\n	<li>BEG 201 HS Engineering Mathematics III - 3</li>\r\n	<li>BEG 240 ME Thermodynamics Heat and Mass Transfer - 3</li>\r\n	<li>BEG 230 EC Digital Electronics - 4</li>\r\n	<li>BEG 231 EC Electronics Devices - 3</li>\r\n	<li>BEG 250 CI Data structure &amp; Algorithm - 4</li>\r\n	<li>BEG 223 EL Electrical Engineering - 3</li>\r\n</ul>\r\n\r\n<h2>SEMESTER IV - 23 Credit Hours</h2>\r\n\r\n<ul>\r\n	<li>BEG 274 CO Theory of Computer - 3</li>\r\n	<li>BEG 275 CO Visual Programming - 4</li>\r\n	<li>BEG 233 EC Microprocessor - 4</li>\r\n	<li>BEG 234 EC Electronic Circuit I - 3</li>\r\n	<li>BEG 224 EL Electrical Machines and Drives - 3</li>\r\n	<li>BEG 395 MS Applied Sociology - 3</li>\r\n	<li>BEG 736 ES Electromagnetic &amp; propagation - 3</li>\r\n</ul>\r\n\r\n<h2>SEMESTER V - 22 Credit Hours</h2>\r\n\r\n<ul>\r\n	<li>BEG 370 CO Numerical Methods - 3</li>\r\n	<li>BEG 330 EC Instrumentation I - 3</li>\r\n	<li>BEG 371 CO System Analysis &amp; Design - 3</li>\r\n	<li>BEG 372 CO Computer Organization &amp; Design - 3</li>\r\n	<li>BEG 373 CO Operating System - 4</li>\r\n	<li>BEG 320 EL Control Systems - 3</li>\r\n	<li>BEG 331 EC Communication Systems - 3</li>\r\n</ul>\r\n\r\n<h2>SEMESTER VI - 23 Credit Hours</h2>\r\n\r\n<ul>\r\n	<li>BEG 396MS Research Methodology - 2</li>\r\n	<li>BEG 203 SH Probability and Statistics - 3</li>\r\n	<li>BEG 374 CO Computer Network - 4</li>\r\n	<li>BEG 375 CO Computer Graphics - 4</li>\r\n	<li>BEG 332 EL Microprocessor Based Instrumentation - 3</li>\r\n	<li>BEG 376 CO Database Management System - 4</li>\r\n	<li>BEG 495 MS Engineering Economics - 3</li>\r\n</ul>\r\n\r\n<h2>SEMESTER VII - 22 Credit Hours</h2>\r\n\r\n<ul>\r\n	<li>BEG 470 CO Web Programming Technique - 4</li>\r\n	<li>BEG 203 SH Organization Management - 2</li>\r\n	<li>BEG 374 CO Artificial Intelligences - 3</li>\r\n	<li>BEG 375 CO Software Engineering - 3</li>\r\n	<li>BEG 332 EC project Management - 3</li>\r\n	<li>BEG 376 CO Simulations and Modeling - 4</li>\r\n	<li>BEG 495 MS Elective I - 3</li>\r\n</ul>\r\n\r\n<h2>SEMESTER VIII - 17 Credit Hours</h2>\r\n\r\n<ul>\r\n	<li>BEG 476 CO Image Processing and Pattern Recognition - 3</li>\r\n	<li>BEG 459 CI Engineering Professional Practice - 2</li>\r\n	<li>BEG 433 EC Digital Signal Processing - 3</li>\r\n	<li>BEG 477 CO Advance Computer Architecture - 3</li>\r\n	<li>BEG 478 CO Elective II - 3</li>\r\n	<li>BEG 480 CO Project Work - 3</li>\r\n</ul>\r\n', 9, 1),
(15, 'Contact Information', 'contact', '', '<p>Leapfrog College of Engineering</p>\r\n\r\n<p>Kupandol, Lalitpur</p>\r\n\r\n<p>www.lfcoe.com</p>\r\n\r\n<p>www.info@lfcoe.com</p>\r\n\r\n<p>+977-01-5534403,5534404</p>\r\n\r\n<p>Notice Board No.: 1618014221365</p>\r\n\r\n<p>GPO: 1234</p>\r\n', 9, 1),
(16, 'Transportation', 'facilities', 'school_bus1.jpeg', '<p><img alt="" src="/img/post-image/images/transportation.jpeg" style="float:left; height:84px; width:150px" />Leapfrog College of Engineering is reknown for its services to the students for a comfortable and easy environment. This helps the student in their path to obtain perfection in future. leapfrog College of Engineering provides transport facility to the students through its own buses for transporting the students from different localities to the school and vice-versa.</p>\r\n\r\n<p>Students can avail the Transport facility by putting up an application for the same. They are required to duly complete the &#39;Consent Form&#39; and get the Bus Fee endorsed on their Fee Booklet. Bus charges have to be paid quarterly along with the school fee at the office counter along with the Tuition Fee. Bus charges can be revised whenever necessary and Transport facility can be withdrawn in case of any emergency.</p>\r\n\r\n<p>The following site-map shows the different routes of our shuttle services</p>\r\n\r\n<ul class="thumbnails " id=''transport-thumb''>\r\n                        <li class="span6">\r\n                            <div class="thumbnail landscape">\r\n                                <img src="/img/post-image/images/route2.png"  alt="">\r\n                                <h3>Route 1</h3>\r\n                                <p>Kopundole <i class=''icon-arrow-right''></i> Kalanki </p>\r\n                            </div>\r\n                        </li>\r\n                        <li class="span6">\r\n                            <div class="thumbnail landscape">\r\n                                <img src="/img/post-image/images/route4.png"  alt="">\r\n                                <h3>Route 2</h3>\r\n                                <p>Kopundole <i class=''icon-arrow-right''></i> Bhaktapur</p>\r\n                            </div>\r\n                        </li>\r\n                    </ul>\r\n                    <ul class="thumbnails " id=''transport-thumb''>\r\n                        <li class="span6 ">\r\n                            <div class="thumbnail portrait ">\r\n                                <img src="/img/post-image/images/Route1.png"  alt="">\r\n                                <h3>Route 3</h3>\r\n                                <p>Kopundole <i class=''icon-arrow-right''></i> Dhapasi</p>\r\n                            </div>\r\n                        </li>\r\n                        <li class="span6">\r\n                            <div class="thumbnail portrait1 ">\r\n                                <img src="/img/post-image/images/route3.png"  alt="">\r\n                                <h3>Route 4</h3>\r\n                                <p>Kopundole <i class=''icon-arrow-right''></i> Dhapakhel</p>\r\n                            </div>\r\n                        </li>\r\n                    </ul>\r\n\r\n', 9, 1),
(17, 'Sports & Recreation ', 'facilities', '', '<p><img alt="" src="/img/post-image/images/sports.jpeg" style="float:left; height:120px; width:150px" />KCC provides good numbers of sports facilities like- Table Tennis, Badminton, Cricket, Football, etc. Students participate in Media club, Sports club and Cultural club. It keeps the spirit of sports and extra-curricular activities alive and kicking. Every year KCC organizes an Inter-College Cricket Tournament, KCC Running Trophy. Twelve different colleges, affiliated to Purbanchal University, competed for KCC Running Trophy-2003.</p>\r\n', 9, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE IF NOT EXISTS `tbl_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) NOT NULL,
  `middle_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `user_name` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `image_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `first_name`, `middle_name`, `last_name`, `address`, `phone`, `user_name`, `password`, `email`, `image_name`) VALUES
(7, 'Sudip', 'J', 'Puda', 'Putalisadak', '4785563', 'sudip_ji', '58680ffb9b073cde5a6d1e57f4dfa9c8', 'sudip_ji@gmail.com', NULL),
(9, 'Hari', 'Bahadur', 'Gyawali', 'Jhapa', '4785563', 'hari_bahadur', '9d898bf27fe0fe9b364d7ff9e2c84eb8', 'hari_bahadur@gmail.com', 'president_me.jpg'),
(10, 'Naresh', 'Maharaja', 'Dhiraaz', 'Balaju', '4785563', 'naresh_maharaja', '68423007518bc515bde7107e7dba10b5', 'naresh_maharaja@gmail.com', NULL),
(13, 'ojash', '', 'dahal', 'dhapasi', '4785563', 'ojash_dahal', 'a5b4c15152e100c43c6dfd97bb45dd3f', 'ojashdahal@lftechnology.com', 'profilepic.png');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_gallery`
--
ALTER TABLE `tbl_gallery`
  ADD CONSTRAINT `fk_tbl_gallery` FOREIGN KEY (`album_id`) REFERENCES `tbl_album` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_posts`
--
ALTER TABLE `tbl_posts`
  ADD CONSTRAINT `fk_tbl_posts` FOREIGN KEY (`user_id`) REFERENCES `tbl_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
