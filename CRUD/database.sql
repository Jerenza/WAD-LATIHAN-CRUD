create database mahasiswa_db;
 
use mahasiswa_db;
 
CREATE TABLE `mahasiswa` (
  `id` int(11) NOT NULL auto_increment,
  `nama` varchar(100),
  `email` varchar(100),
  `nim` varchar(15),
  PRIMARY KEY  (`id`)
);