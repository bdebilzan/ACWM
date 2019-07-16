CREATE TABLE `history` (
  `parent_table` varchar(255) DEFAULT NULL,
  `date_updated` datetime DEFAULT NULL,
  `updated_by` varchar(255) DEFAULT NULL,
  `asset_id` int(11) DEFAULT NULL,
  `action_performed` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;