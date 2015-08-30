CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


alter table document add category integer(4);
alter table document add foreign key category references category(id);