CREATE TABLE IF NOT EXISTS `cachegrind_sessions` (
  `id` int(11) NOT NULL auto_increment,
  `file_name` varchar(100) NOT NULL,
  `dot_file_name` varchar(500) DEFAULT NULL,
  `subdomain` varchar(100) NOT NULL,
  `http_request_method` varchar(10) NOT NULL,
  `uri` varchar(500) NOT NULL,
  `get_vars` longtext NOT NULL,
  `post_vars` longtext NOT NULL,
  `rendered_output` longtext default NULL,
  `created_at` datetime NOT NULL,
  `execution_duration` int(11) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `subdomain` (`subdomain`,`http_request_method`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;