<?php

class m140822_151651_create_tables_with_data extends CDbMigration
{
	public function up()
	{
		$db = $this->getDbConnection();

		$query = '
create table clients (
	id int(11) auto_increment,
	fullname varchar(255),
	email varchar(255),
	phone varchar(50),

	primary key(id),
	index(id)

) default charset=utf8 engine=InnoDb;

		';
		$db->createCommand($query)->query();

                $query = '
create table goods (
	id int(11) auto_increment,
	name varchar(255),
	price double(12,2),

	primary key(id),
	index(id)

) default charset=utf8 engine=InnoDb;

                ';
                $db->createCommand($query)->query();


                $query = '
create table memberships (
	id int(11) auto_increment,
	client_id int(11) not null,
	`desc` text,

	primary key(id),
	index(id),
	foreign key fk_clients(client_id) references clients(id)

) default charset=utf8 engine=InnoDb;

                ';
                $db->createCommand($query)->query();

                $query = '
create table ActiveRecordHistory (
  id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  value VARCHAR(255) NULL,
  model VARCHAR(45) NULL,
  idModel INTEGER UNSIGNED NULL,
  field VARCHAR(45) NULL,
  creationdate TIMESTAMP NOT NULL,
  userid VARCHAR(45) NULL,
  PRIMARY KEY(id)
) engine=InnoDB;
                ';
                $db->createCommand($query)->query();


                $query = "
INSERT INTO `ActiveRecordHistory` VALUES (1,'010-1-88-1235555','Client',5,'phone','2014-08-22 14:51:21',NULL),(2,'010-1-88-1234444','Client',5,'phone','2014-08-22 14:55:19',NULL),(3,'010-1-88-1233333','Client',5,'phone','2014-08-22 14:55:38',NULL),(4,'010-1-88-1233333','Client',3,'phone','2014-08-22 14:55:51',NULL);

                ";
                $db->createCommand($query)->query();

                $query = "
INSERT INTO `clients` VALUES (1,'test1','test@domain1','55-44-33-1'),(2,'test1','test@domain1','55-44-33-1'),(3,'test1','test@domain1','010-1-88-1233333'),(4,'test2','test@domain2','55-44-33-2'),(5,'test','test@domain3','010-1-88-1233333'),(6,'test4','test@domain4','55-44-33-4'),(7,'test5','test@domain5','55-44-33-5'),(8,'test6','test@domain6','55-44-33-6'),(9,'test7','test@domain7','55-44-33-7'),(10,'test8','test@domain8','55-44-33-8'),(11,'test9','test@domain9','55-44-33-9'),(12,'test10','test@domain10','55-44-33-10');

                ";
                $db->createCommand($query)->query();

                $query = "
INSERT INTO `goods` VALUES (1,'good1',56.00),(2,'good1',56.00),(3,'good2',57.00),(4,'good3',58.00),(5,'good4',59.00),(6,'good5',60.00),(7,'good6',61.00),(8,'good7',62.00),(9,'good8',63.00),(10,'good9',64.00),(11,'good10',65.00);

                ";
                $db->createCommand($query)->query();

                $query = "
INSERT INTO `memberships` VALUES (1,2,'standart1'),(2,3,'standart2'),(3,4,'standart3'),(4,5,'standart4'),(5,6,'standart5'),(6,7,'standart6'),(7,8,'standart7'),(8,9,'standart8'),(9,10,'standart9'),(10,11,'standart10');

                ";
                $db->createCommand($query)->query();

	}

	public function down()
	{
		echo "m140822_151651_create_tables_with_data does not support migration down.\n";
		return false;
	}

	/*
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
	}

	public function safeDown()
	{
	}
	*/
}
