DROP TABLE books;nnCREATE TABLE `books` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `number` int(11) unsigned NOT NULL,
  `edition` int(11) unsigned NOT NULL,
  `start_page` int(11) unsigned NOT NULL,
  `end_page` int(11) unsigned NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;nnINSERT INTO books VALUES("1","1","1","1","100","1","2014-02-19 17:45:51","2014-02-20 06:59:27");nINSERT INTO books VALUES("2","2","1","101","200","1","2014-03-18 03:50:41","2014-03-18 03:50:41");nINSERT INTO books VALUES("3","3","1","201","300","1","2014-03-18 04:24:24","2014-03-18 04:24:24");nnnnDROP TABLE contacts;nnCREATE TABLE `contacts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `subject` varchar(100) DEFAULT NULL,
  `message` text,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;nnnnnDROP TABLE contents;nnCREATE TABLE `contents` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `alias` varchar(255) NOT NULL,
  `introtext` mediumtext NOT NULL,
  `fulltext` mediumtext NOT NULL,
  `category` varchar(255) DEFAULT NULL,
  `metakey` text,
  `metadesc` text,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;nnnnnDROP TABLE expense_types;nnCREATE TABLE `expense_types` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `remark` text,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;nnINSERT INTO expense_types VALUES("1","Land","For Land Development","1","2014-02-19 19:22:17","2014-02-24 06:12:45");nINSERT INTO expense_types VALUES("2","Nirman","Any Kinds of Development and Repair","1","2014-02-24 06:12:04","2014-02-24 06:12:04");nINSERT INTO expense_types VALUES("3","Quran Teaching","For Quran Teaching","1","2014-02-26 05:55:20","2014-02-26 05:55:20");nINSERT INTO expense_types VALUES("4","Masjid","For Masjid Development,","1","2014-02-26 05:58:00","2014-02-26 05:58:00");nINSERT INTO expense_types VALUES("5","Iftary","Iftar Program","1","2014-02-26 05:59:15","2014-02-26 05:59:15");nINSERT INTO expense_types VALUES("6","Appayan","Food for Gust  ","1","2014-02-26 06:40:35","2014-02-26 06:40:35");nINSERT INTO expense_types VALUES("7","Trening Center","T T","1","2014-02-26 06:41:16","2014-02-26 06:41:16");nINSERT INTO expense_types VALUES("8","Printing ","p","1","2014-02-26 06:41:45","2014-02-26 06:41:45");nINSERT INTO expense_types VALUES("9","Asbab ","any Goods","1","2014-02-26 06:42:28","2014-02-26 06:42:28");nINSERT INTO expense_types VALUES("10","Bills","electric","1","2014-02-26 06:43:09","2014-02-26 06:43:09");nINSERT INTO expense_types VALUES("11","Etc","Miscellaneous ","1","2014-02-26 06:49:48","2014-02-26 06:49:48");nINSERT INTO expense_types VALUES("12","Stationary","Any Kinds of stationary","1","2014-02-26 06:54:54","2014-02-26 06:54:54");nINSERT INTO expense_types VALUES("13","Aid/staipend","","1","2014-02-26 06:57:06","2014-02-26 06:57:06");nnnnDROP TABLE expenses;nnCREATE TABLE `expenses` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `expense_type_id` int(11) unsigned NOT NULL,
  `date` date NOT NULL,
  `vouchar_no` varchar(100) NOT NULL,
  `purpose_id` int(11) unsigned NOT NULL,
  `payable_amount` float unsigned NOT NULL,
  `paid` float unsigned NOT NULL,
  `due` float unsigned NOT NULL,
  `payment_id` int(11) unsigned NOT NULL,
  `payment_for` varchar(100) DEFAULT NULL,
  `remark` text,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;nnINSERT INTO expenses VALUES("1","1","2014-02-19","2369","1","8000","6000","2000","0","babul","","1","2014-02-19 19:36:54","2014-02-24 06:19:42");nINSERT INTO expenses VALUES("2","2","2014-02-24","24022014","2","1500","1500","0","0","ll","","1","2014-02-24 06:35:52","2014-02-24 06:35:52");nINSERT INTO expenses VALUES("3","2","2014-02-28","01022014","2","5000","5000","0","0","nirman","","1","2014-02-28 18:35:58","2014-02-28 18:35:58");nINSERT INTO expenses VALUES("4","4","2014-03-14","01032014","3","5000","4000","1000","1","imam","","1","2014-03-21 10:08:22","2014-03-21 10:08:22");nINSERT INTO expenses VALUES("5","7","2014-03-15","10032014","10","4000","4000","0","1","UM Maltimidia","","1","2014-03-21 10:10:47","2014-03-21 10:10:47");nnnnDROP TABLE income_types;nnCREATE TABLE `income_types` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `remark` text,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;nnINSERT INTO income_types VALUES("3","Land","For Land","1","2014-02-24 06:32:04","2014-02-24 06:32:04");nINSERT INTO income_types VALUES("4","Quran Teaching","For Quran Teaching","1","2014-02-26 05:27:44","2014-02-26 05:27:44");nINSERT INTO income_types VALUES("5","Masjid","For Ummahat Jame Masjid","1","2014-02-26 05:28:30","2014-02-26 05:28:30");nINSERT INTO income_types VALUES("6","Badary 313","From Badary Members","1","2014-02-26 06:22:22","2014-02-26 06:22:22");nINSERT INTO income_types VALUES("7","Arbaeen 40","Arbaeen Member Fees ","1","2014-02-26 06:23:18","2014-02-26 06:23:18");nINSERT INTO income_types VALUES("8","Ashara mubashshara 10","Asharamubashshsara Member fees","1","2014-02-26 06:24:32","2014-02-26 06:27:06");nINSERT INTO income_types VALUES("9","Ummahat 11","From Ummahat Member Fees","1","2014-02-26 06:25:42","2014-02-26 06:25:42");nINSERT INTO income_types VALUES("10","Aid/Stipends","Stipends for student","1","2014-02-26 06:34:59","2014-02-26 06:34:59");nINSERT INTO income_types VALUES("11","Generel Donation","Any Kinds of General Donation","1","2014-02-26 07:01:13","2014-02-26 07:01:13");nINSERT INTO income_types VALUES("12","Nirman Meramot","Development","1","2014-02-26 07:02:58","2014-02-26 07:02:58");nINSERT INTO income_types VALUES("13","Training Center","Any Vocational Training ","1","2014-02-26 07:04:38","2014-02-26 07:04:38");nINSERT INTO income_types VALUES("14","Etc","M","1","2014-02-26 07:05:47","2014-02-26 07:05:47");nnnnDROP TABLE incomes;nnCREATE TABLE `incomes` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `income_type_id` int(11) unsigned NOT NULL,
  `date` date NOT NULL,
  `book_id` int(11) unsigned NOT NULL,
  `receipt_no` varchar(100) NOT NULL,
  `user_id` int(11) unsigned NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `payable_amount` float unsigned NOT NULL,
  `paid` float unsigned NOT NULL,
  `due` float unsigned NOT NULL,
  `payment_id` int(11) unsigned NOT NULL,
  `purpose_id` int(11) unsigned NOT NULL,
  `monthly_fee` float unsigned DEFAULT '0',
  `yearly_charge` float unsigned DEFAULT '0',
  `fooding_fee` float unsigned DEFAULT '0',
  `admission_fee` float unsigned DEFAULT '0',
  `other_fee` float DEFAULT '0',
  `payment_for` varchar(100) DEFAULT NULL,
  `remark` text,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;nnINSERT INTO incomes VALUES("3","14","2014-02-26","1","15","11","A","2000","1000","1000","0","2","","","","","","","","1","2014-02-26 05:34:20","2014-02-27 16:05:16");nINSERT INTO incomes VALUES("4","9","2014-02-26","1","05","15","","20000","5000","15000","0","4","","","","","","","","1","2014-02-26 17:41:22","2014-02-26 17:41:22");nINSERT INTO incomes VALUES("6","6","2014-02-28","1","16","10","anwar","2000","2000","0","1","4","","","","","","","","1","2014-02-28 17:56:54","2014-03-16 02:05:03");nINSERT INTO incomes VALUES("7","7","2014-02-28","1","17","0","a","2000","1000","1000","0","6","","","","","","","","1","2014-02-28 18:20:10","2014-02-28 18:20:10");nINSERT INTO incomes VALUES("8","8","2014-02-28","1","18","10","Fajar Ali","25000","20000","5000","0","7","","","","","","","","1","2014-02-28 18:21:48","2014-02-28 18:21:48");nINSERT INTO incomes VALUES("9","4","2014-02-28","1","19","0","abu b","2000","2000","0","1","4","","","","","","","","1","2014-02-28 18:29:44","2014-03-18 04:07:53");nINSERT INTO incomes VALUES("10","11","2014-02-28","1","20","10","Amin","1000","500","500","0","9","","","","","","","","1","2014-02-28 18:32:32","2014-02-28 18:32:32");nINSERT INTO incomes VALUES("11","9","2014-03-17","1","25788","16","NA","2000","1500","500","2","8","0","0","0","0","0","Donation","Test","1","2014-03-17 16:05:09","2014-03-17 16:05:09");nINSERT INTO incomes VALUES("14","13","2014-03-16","1","88","0","a","3000","2500","500","1","10","0","0","0","0","0","","","1","2014-03-21 10:13:07","2014-03-21 10:13:07");nINSERT INTO incomes VALUES("15","14","2014-03-21","1","89","0","anwar","3500","3000","500","1","9","0","0","0","0","0","","","1","2014-03-21 10:19:15","2014-03-21 10:19:15");nINSERT INTO incomes VALUES("16","6","2014-03-21","1","90","0","anwar","1000","1000","0","1","5","0","0","0","0","0","","","1","2014-03-21 10:23:23","2014-03-21 10:23:23");nINSERT INTO incomes VALUES("17","7","2014-03-27","1","20","2","Hosen","5000","5000","0","1","6","0","0","0","0","0","","","1","2014-03-27 10:10:40","2014-03-27 10:10:40");nnnnDROP TABLE member_types;nnCREATE TABLE `member_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `status` tinyint(4) unsigned NOT NULL DEFAULT '1',
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;nnINSERT INTO member_types VALUES("1","Staff","1","2014-02-13 16:35:34","2014-02-13 16:37:38");nINSERT INTO member_types VALUES("2","Badari Member 313","1","2014-02-24 05:28:47","2014-02-24 05:28:47");nINSERT INTO member_types VALUES("3","Ashara Mubashshara","1","2014-02-24 06:47:19","2014-02-24 06:47:37");nINSERT INTO member_types VALUES("4","Arbaeen 40","1","2014-02-26 05:16:11","2014-02-26 05:16:11");nINSERT INTO member_types VALUES("5","Ummahat 11","1","2014-02-26 05:16:43","2014-02-26 05:16:43");nINSERT INTO member_types VALUES("6","Ganarel Donar","1","2014-02-26 05:17:26","2014-02-26 05:17:26");nnnnDROP TABLE messages;nnCREATE TABLE `messages` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `from` int(11) unsigned NOT NULL,
  `subject` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;nnINSERT INTO messages VALUES("2","0","16","This is test message","I have opinion and fsafsdaf fasdfadjl sdfasfl sdfafasdf jlsfas flakdfdf lksflsdlkjer rfasdlfker afe 

Thank you","1","2014-03-17 16:01:07","2014-03-17 16:01:07");nINSERT INTO messages VALUES("3","11","2","Test","Hah","1","2014-03-17 16:10:10","2014-03-17 16:10:10");nINSERT INTO messages VALUES("7","1","17","test","123659","1","2014-03-17 17:17:48","2014-03-17 17:17:48");nINSERT INTO messages VALUES("10","11","2","Notice for All","Dear visitor,
Assalamu Alikum
We are start work of our Masjid & Madrasah building project. You can share in this Sadaqa-e-zaria by donation on Account of the Trust fallow.
Ummahatul muminin Trust
A/c No 16216, Islami Bank bangladesh ltd. Gulshan Branch, Dhaka
Md. Anwarul Hoque 
-Chairman","1","2014-03-18 03:46:14","2014-03-18 03:46:14");nINSERT INTO messages VALUES("11","0","2","Aplication for Donation ","Mosque & Madrasah Building working is running please help us ","1","2014-03-27 09:55:24","2014-03-27 09:55:24");nnnnDROP TABLE organization_groups;nnCREATE TABLE `organization_groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `remarks` text,
  `status` tinyint(4) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;nnINSERT INTO organization_groups VALUES("1","Ummah","","1");nnnnDROP TABLE organization_types;nnCREATE TABLE `organization_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `remarks` text,
  `status` tinyint(4) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;nnINSERT INTO organization_types VALUES("1","Nonprofit Organization","","1");nnnnDROP TABLE organizations;nnCREATE TABLE `organizations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `organization_type_id` int(11) unsigned NOT NULL,
  `organization_group_id` int(11) unsigned NOT NULL,
  `address` text NOT NULL,
  `address_optional` text,
  `contact_person` varchar(100) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `mobile` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `bsti_license_no` varchar(100) DEFAULT NULL,
  `logo` varchar(100) DEFAULT NULL,
  `remarks` text,
  `status` tinyint(4) unsigned NOT NULL DEFAULT '1',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;nnINSERT INTO organizations VALUES("1","Nonprofit Organization","1","1","dhaka","dhaka","Mr. S. Alam","02-7711885","01711511111","mr.x@s.alam.com","","1_logo.png","","1","0000-00-00 00:00:00","2013-11-18 05:04:39");nnnnDROP TABLE payments;nnCREATE TABLE `payments` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `description` text,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;nnINSERT INTO payments VALUES("1","Cash","Paid with cash","1","2014-03-15 20:17:40","2014-03-15 20:17:40");nINSERT INTO payments VALUES("2","Master Card ","Paid with Master Card Payment","1","2014-03-16 02:12:19","2014-03-16 02:12:38");nnnnDROP TABLE purposes;nnCREATE TABLE `purposes` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `description` text,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;nnINSERT INTO purposes VALUES("1","Land","Land development ","1","2014-02-19 18:05:10","2014-03-19 10:20:36");nINSERT INTO purposes VALUES("2","Nirman","Any kind of Buildup ","1","2014-02-24 05:51:31","2014-02-24 05:51:31");nINSERT INTO purposes VALUES("3","Masjid","Masjid ","1","2014-02-26 05:22:29","2014-02-26 05:22:29");nINSERT INTO purposes VALUES("4","Quran Teaching","For Quran Teaching","1","2014-02-26 05:26:08","2014-02-26 05:26:08");nINSERT INTO purposes VALUES("5","Badry 313","Badary Member","1","2014-02-28 17:58:22","2014-02-28 18:01:19");nINSERT INTO purposes VALUES("6","Arbaeen 40","Arbaeen Member","1","2014-02-28 18:02:22","2014-02-28 18:02:22");nINSERT INTO purposes VALUES("7","Ashara Mubashshara 10","Member 10","1","2014-02-28 18:03:23","2014-02-28 18:03:23");nINSERT INTO purposes VALUES("8","Ummahat 11","Ummahat","1","2014-02-28 18:04:37","2014-02-28 18:04:37");nINSERT INTO purposes VALUES("9","Etc","Bibidh","1","2014-02-28 18:05:26","2014-02-28 18:05:26");nINSERT INTO purposes VALUES("10","Training Center","Any Training Center (Vocational) ","1","2014-02-28 18:09:06","2014-02-28 18:09:06");nINSERT INTO purposes VALUES("11","Asbab","Asset for Trust ","1","2014-02-28 18:10:30","2014-02-28 18:10:30");nINSERT INTO purposes VALUES("12","Appaon ","Mehmandary","1","2014-02-28 18:11:28","2014-02-28 18:11:28");nINSERT INTO purposes VALUES("13","Aid\\stipende ","Any Kind of Aid and stipend for Student ","1","2014-02-28 18:16:13","2014-02-28 18:16:13");nnnnDROP TABLE settings;nnCREATE TABLE `settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `hints` text,
  `default` text,
  `value` text,
  `group` varchar(150) NOT NULL,
  `input_type` varchar(50) NOT NULL DEFAULT 'text' COMMENT 'text,checkbox,radio,textarea,password,color,date,datetime,datetime-local,email,month,number,range,search,tel,time,url,week',
  `sort_order` tinyint(4) NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;nnINSERT INTO settings VALUES("1","siteName","","Ummah Trust","Ummahatul Trust","A","text","0","1");nINSERT INTO settings VALUES("2","adminEmail","","shihab13rocks@hotmail.com","shihab13rocks@hotmail.com","Email","text","0","1");nINSERT INTO settings VALUES("3","address","","Dhaka, Bangladesh","Dhaka, Bangladesh","B","textarea","0","1");nINSERT INTO settings VALUES("4","currency","","BDT","BDT","C","text","0","1");nINSERT INTO settings VALUES("5","paypalEmail","","str@paypal.com","str@paypal.com","C","text","0","1");nINSERT INTO settings VALUES("6","contactMobile","","","01670623701","contact","text","3","1");nnnnDROP TABLE user_roles;nnCREATE TABLE `user_roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `organization_type_id` int(11) unsigned NOT NULL,
  `user_type_id` int(11) unsigned NOT NULL,
  `rights` text NOT NULL,
  `status` tinyint(4) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;nnINSERT INTO user_roles VALUES("1","Super Admin","1","1","a:20:{s:8:\"Contacts\";a:2:{i:0;s:4:\"view\";i:1;s:5:\"index\";}s:10:\"Dashboards\";a:1:{i:0;s:5:\"index\";}s:21:\"InspectionTestMethods\";a:2:{i:0;s:4:\"view\";i:1;s:5:\"index\";}s:28:\"InspectionTestStandardLimits\";a:2:{i:0;s:4:\"view\";i:1;s:5:\"index\";}s:15:\"InspectionTests\";a:2:{i:0;s:4:\"view\";i:1;s:5:\"index\";}s:11:\"Inspections\";a:2:{i:0;s:4:\"view\";i:1;s:5:\"index\";}s:18:\"OrganizationGroups\";a:5:{i:0;s:3:\"add\";i:1;s:4:\"edit\";i:2;s:6:\"delete\";i:3;s:4:\"view\";i:4;s:5:\"index\";}s:17:\"OrganizationTypes\";a:2:{i:0;s:4:\"view\";i:1;s:5:\"index\";}s:13:\"Organizations\";a:5:{i:0;s:3:\"add\";i:1;s:4:\"edit\";i:2;s:6:\"delete\";i:3;s:4:\"view\";i:4;s:5:\"index\";}s:14:\"PremixRequests\";a:2:{i:0;s:4:\"view\";i:1;s:5:\"index\";}s:20:\"PremixStandardLimits\";a:5:{i:0;s:3:\"add\";i:1;s:4:\"edit\";i:2;s:6:\"delete\";i:3;s:4:\"view\";i:4;s:5:\"index\";}s:8:\"Premixes\";a:5:{i:0;s:3:\"add\";i:1;s:4:\"edit\";i:2;s:6:\"delete\";i:3;s:4:\"view\";i:4;s:5:\"index\";}s:13:\"ProductBrands\";a:2:{i:0;s:4:\"view\";i:1;s:5:\"index\";}s:19:\"ProductionForecasts\";a:2:{i:0;s:4:\"view\";i:1;s:5:\"index\";}s:11:\"Productions\";a:2:{i:0;s:4:\"view\";i:1;s:5:\"index\";}s:8:\"Products\";a:5:{i:0;s:3:\"add\";i:1;s:4:\"edit\";i:2;s:6:\"delete\";i:3;s:4:\"view\";i:4;s:5:\"index\";}s:7:\"Reports\";a:8:{i:0;s:18:\"organizationReport\";i:1;s:10:\"userReport\";i:2;s:19:\"premixRequestReport\";i:3;s:23:\"monthlyProductionReport\";i:4;s:22:\"yearlyProductionReport\";i:5;s:24:\"productionForecastReport\";i:6;s:11:\"premixStore\";i:7;s:16:\"inspectionReport\";}s:8:\"Settings\";a:3:{i:0;s:4:\"edit\";i:1;s:4:\"view\";i:2;s:5:\"index\";}s:9:\"UserRoles\";a:4:{i:0;s:3:\"add\";i:1;s:4:\"edit\";i:2;s:4:\"view\";i:3;s:5:\"index\";}s:5:\"Users\";a:6:{i:0;s:3:\"add\";i:1;s:4:\"edit\";i:2;s:6:\"delete\";i:3;s:4:\"view\";i:4;s:5:\"index\";i:5;s:7:\"profile\";}}","1");nINSERT INTO user_roles VALUES("2","Admin","1","2","a:17:{s:5:\"Books\";a:5:{i:0;s:3:\"add\";i:1;s:4:\"edit\";i:2;s:6:\"delete\";i:3;s:4:\"view\";i:4;s:5:\"index\";}s:8:\"Contacts\";a:3:{i:0;s:6:\"delete\";i:1;s:4:\"view\";i:2;s:5:\"index\";}s:10:\"Dashboards\";a:1:{i:0;s:5:\"index\";}s:12:\"ExpenseTypes\";a:5:{i:0;s:3:\"add\";i:1;s:4:\"edit\";i:2;s:6:\"delete\";i:3;s:4:\"view\";i:4;s:5:\"index\";}s:8:\"Expenses\";a:5:{i:0;s:3:\"add\";i:1;s:4:\"edit\";i:2;s:6:\"delete\";i:3;s:4:\"view\";i:4;s:5:\"index\";}s:11:\"IncomeTypes\";a:5:{i:0;s:3:\"add\";i:1;s:4:\"edit\";i:2;s:6:\"delete\";i:3;s:4:\"view\";i:4;s:5:\"index\";}s:7:\"Incomes\";a:5:{i:0;s:3:\"add\";i:1;s:4:\"edit\";i:2;s:6:\"delete\";i:3;s:4:\"view\";i:4;s:5:\"index\";}s:11:\"MemberTypes\";a:5:{i:0;s:3:\"add\";i:1;s:4:\"edit\";i:2;s:6:\"delete\";i:3;s:4:\"view\";i:4;s:5:\"index\";}s:8:\"Messages\";a:5:{i:0;s:3:\"add\";i:1;s:4:\"edit\";i:2;s:6:\"delete\";i:3;s:4:\"view\";i:4;s:5:\"index\";}s:13:\"Organizations\";a:3:{i:0;s:4:\"view\";i:1;s:5:\"index\";i:2;s:7:\"profile\";}s:8:\"Payments\";a:5:{i:0;s:3:\"add\";i:1;s:4:\"edit\";i:2;s:6:\"delete\";i:3;s:4:\"view\";i:4;s:5:\"index\";}s:8:\"Purposes\";a:5:{i:0;s:3:\"add\";i:1;s:4:\"edit\";i:2;s:6:\"delete\";i:3;s:4:\"view\";i:4;s:5:\"index\";}s:7:\"Reports\";a:5:{i:0;s:13:\"balanceReport\";i:1;s:12:\"incomeReport\";i:2;s:13:\"expenseReport\";i:3;s:6:\"backup\";i:4;s:16:\"particularReport\";}s:8:\"Settings\";a:5:{i:0;s:3:\"add\";i:1;s:4:\"edit\";i:2;s:6:\"delete\";i:3;s:4:\"view\";i:4;s:5:\"index\";}s:9:\"UserRoles\";a:2:{i:0;s:4:\"view\";i:1;s:5:\"index\";}s:9:\"UserTypes\";a:5:{i:0;s:3:\"add\";i:1;s:4:\"edit\";i:2;s:6:\"delete\";i:3;s:4:\"view\";i:4;s:5:\"index\";}s:5:\"Users\";a:6:{i:0;s:3:\"add\";i:1;s:4:\"edit\";i:2;s:6:\"delete\";i:3;s:4:\"view\";i:4;s:5:\"index\";i:5;s:7:\"profile\";}}","1");nINSERT INTO user_roles VALUES("3","User","1","3","a:6:{s:8:\"Contacts\";a:2:{i:0;s:4:\"view\";i:1;s:5:\"index\";}s:10:\"Dashboards\";a:1:{i:0;s:5:\"index\";}s:9:\"Histories\";a:1:{i:0;s:11:\"transaction\";}s:8:\"Messages\";a:3:{i:0;s:3:\"add\";i:1;s:4:\"view\";i:2;s:5:\"index\";}s:17:\"OrganizationTypes\";a:1:{i:0;s:5:\"index\";}s:5:\"Users\";a:2:{i:0;s:4:\"view\";i:1;s:7:\"profile\";}}","1");nINSERT INTO user_roles VALUES("4","Staff","1","4","a:9:{s:5:\"Books\";a:2:{i:0;s:4:\"view\";i:1;s:5:\"index\";}s:10:\"Dashboards\";a:1:{i:0;s:5:\"index\";}s:9:\"Histories\";a:1:{i:0;s:11:\"transaction\";}s:8:\"Messages\";a:3:{i:0;s:3:\"add\";i:1;s:4:\"view\";i:2;s:5:\"index\";}s:8:\"Payments\";a:2:{i:0;s:4:\"view\";i:1;s:5:\"index\";}s:8:\"Purposes\";a:2:{i:0;s:4:\"view\";i:1;s:5:\"index\";}s:7:\"Reports\";a:3:{i:0;s:13:\"balanceReport\";i:1;s:12:\"incomeReport\";i:2;s:13:\"expenseReport\";}s:8:\"Settings\";a:2:{i:0;s:4:\"view\";i:1;s:5:\"index\";}s:5:\"Users\";a:3:{i:0;s:4:\"view\";i:1;s:5:\"index\";i:2;s:7:\"profile\";}}","1");nnnnDROP TABLE user_types;nnCREATE TABLE `user_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `status` tinyint(4) unsigned NOT NULL DEFAULT '1',
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;nnINSERT INTO user_types VALUES("1","Super Admin","1","2013-09-23 12:32:01","0000-00-00 00:00:00");nINSERT INTO user_types VALUES("2","Organization Admin","1","2013-09-23 12:32:01","0000-00-00 00:00:00");nINSERT INTO user_types VALUES("3","User","1","2013-09-23 12:33:01","0000-00-00 00:00:00");nINSERT INTO user_types VALUES("4","Staff","1","2013-09-23 12:33:01","0000-00-00 00:00:00");nnnnDROP TABLE users;nnCREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `organization_id` int(11) unsigned NOT NULL DEFAULT '0',
  `user_role_id` int(11) unsigned NOT NULL DEFAULT '0',
  `member_type_id` int(11) unsigned NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `middle_name` varchar(100) DEFAULT NULL,
  `date_of_birth` date NOT NULL DEFAULT '0000-00-00',
  `code` varchar(100) NOT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `mobile` varchar(100) NOT NULL,
  `father_name` varchar(100) NOT NULL,
  `mother_name` varchar(100) DEFAULT NULL,
  `present_address` text,
  `parmanent_address` text,
  `upload` text,
  `joining_date` date NOT NULL DEFAULT '0000-00-00',
  `remarks` text,
  `status` tinyint(4) unsigned NOT NULL DEFAULT '1',
  `last_visit` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;nnINSERT INTO users VALUES("1","1","1","1","admin","admin@cms.com","2052b7e85eed14e03389db21a1f4d79822fb9224","Admin","Super","","1989-07-01","SADM","","01720102445","Md. Morshadul Tabrij","","","","admin.png","2011-01-01","121212","1","2014-04-10 19:21:33","2013-09-25 00:00:00","2014-04-10 19:21:33");nINSERT INTO users VALUES("2","1","2","1","anwar","abuammar6@yahoo.com","64259683a8dddcc2bada1fe7368816e9d55d3ace","Hoque","Anwarul ","Mohammad","1989-12-01","01/313","028831303","01911324141","Md. Nurul Islam","Mozirun Nisa","4/D, miavai Plaza, Vatara Road, Natun Bazar,
P.S. Vatara, Dhaka, Bangladesh.","1335, Vatara, Vatara, Dhaka
Bangladesh","admin.png","2003-03-11","Founder Chairman","1","2014-04-10 19:20:54","2014-02-24 10:57:42","2014-04-10 19:20:55");nINSERT INTO users VALUES("17","1","3","6","tester","shihab13rocks@gmail.com","8952b7e9da66cdc6251c0dc094fc4976831790a7","Reza","Tester","","2014-03-04","888","","01568988","sdfsdf","","sdfsdf","sdfsdf","admin.png","2014-03-17","","1","2014-04-07 15:59:05","2014-03-17 16:59:51","2014-04-09 17:45:01");nINSERT INTO users VALUES("12","1","3","2","Nazmun Nahar Hena","hena.nazmi@gmail.com","04f8560de5eaa30a08febad9ab4da2d24676e90f"," Hena","Nazmun ","Nahar","1974-12-14","02/313","028831303","01917361767","Md. Habibur Rahman","Umme Kulsum","4/D Miavai plaza, Natun Bazar, Vatara, Gulshan, Dhaka","1335 vatara, Gulshan Vatara, Dhaka","admin.png","2003-11-03","","1","0000-00-00 00:00:00","2014-02-26 15:37:38","2014-03-18 04:28:06");nINSERT INTO users VALUES("13","1","3","3","fajar01","abuammar66@gmail.com","b8d0e0ad3dda7f0436e08d3a4cb4d41e02eaf41d","Khan","Fajar ","Ali","2011-11-03","01/10","01717063311","01752201761","Abdul Mabud Khan","Jahanara","A.","A","admin.png","2014-02-26","","1","0000-00-00 00:00:00","2014-02-26 16:58:40","2014-03-12 18:25:17");nINSERT INTO users VALUES("14","1","4","4","hasain","abinanwar@yahoo.com","2052b7e85eed14e03389db21a1f4d79822fb9224","Munshi","Hosain","Ahmad","2014-02-26","01/40","01710214842","0502446466","Abdullah","Amena","a","a","admin.png","2014-02-26","","1","0000-00-00 00:00:00","2014-02-26 17:08:46","2014-03-12 18:23:05");nINSERT INTO users VALUES("15","1","4","5","Nazimuddin","nazimuddin@ummahatulmuminin.com","cccb01e1c6318dc983cb34299186d1b08b905cf8","Nazimuddin","Faqir","Chand","2014-01-01","01/11","028810567","01911324141","Hasmuddin","Amena","Pincsity","Gulshan","admin.png","2013-12-01","","1","0000-00-00 00:00:00","2014-02-26 17:36:14","2014-02-26 17:36:14");nINSERT INTO users VALUES("16","1","3","5","sakil","sakil09@gmail.com","e27a422eb5942ee5a287783eb8f128151e7a4f91","Ahmed ","Mr.","Sakil","1991-01-01","00569","01724670926","01677027543","Md. Tariqul Islam","Mast. Saleha Begum","1044 khilbarir tek, Vatara, gulshan, Dhaka-1212","Vill- Munsefpur, Chapai Nawabganj","admin.png","2014-03-14","Test","1","2014-04-09 16:48:59","2014-03-14 03:23:57","2014-04-09 17:46:43");nINSERT INTO users VALUES("10","0","0","0","","","","","","","0000-00-00","","","","","","","","","0000-00-00","","1","2014-03-17 17:19:10","2014-03-17 17:19:10","2014-03-17 17:19:10");nnnn