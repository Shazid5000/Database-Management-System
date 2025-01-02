SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

-- Create database
CREATE DATABASE IF NOT EXISTS `lab_test`;
USE `lab_test`;

-- Table structure for table `course_offerings`
CREATE TABLE IF NOT EXISTS `course_offerings` (
  `time` varchar(50) DEFAULT NULL,
  `sec_no` varchar(50) DEFAULT NULL,
  `room` varchar(25) DEFAULT NULL,
  `course_no` int(11) NOT NULL,
  `semester` varchar(50) DEFAULT NULL,
  `year` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`course_no`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Insert data into `course_offerings` table
INSERT INTO `course_offerings` (`time`, `sec_no`, `room`, `course_no`, `semester`, `year`) VALUES
('9:00 AM', '001', 'Room A', 101, 'Fall', '2024');

-- Table structure for table `exam`
CREATE TABLE IF NOT EXISTS `exam` (
  `eid` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `place` varchar(50) DEFAULT NULL,
  `time` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`eid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Insert data into `exam` table
INSERT INTO `exam` (`eid`, `name`, `place`, `time`) VALUES
(3, 'Final', 'Hall_A', '9:00 AM');

-- Table structure for table `student`
CREATE TABLE IF NOT EXISTS `student` (
  `stud_id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `program` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`stud_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Insert data into `student` table
INSERT INTO `student` (`stud_id`, `name`, `program`) VALUES
(1, 'Rafi', 'Compiler');

-- Table structure for table `takes`
CREATE TABLE IF NOT EXISTS `takes` (
  `student_id` int(11) NOT NULL,
  `course_no` int(11) NOT NULL,
  `exam_id` int(11) NOT NULL,
  PRIMARY KEY (`student_id`, `course_no`, `exam_id`),
  CONSTRAINT `takes_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student` (`stud_id`),
  CONSTRAINT `takes_ibfk_2` FOREIGN KEY (`course_no`) REFERENCES `course_offerings` (`course_no`),
  CONSTRAINT `takes_ibfk_3` FOREIGN KEY (`exam_id`) REFERENCES `exam` (`eid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
