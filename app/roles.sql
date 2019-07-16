drop table if exists acwm.roles;

CREATE TABLE acwm.roles (
  `UID` varchar(256) DEFAULT NULL,
  `ROLE` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


insert into acwm.roles values ('43cdc4c6-7d1b-11e7-b36c-005056a5b2f3', 'USER');
insert into acwm.roles values ('59a6ceaa-7d1b-11e7-b36c-005056a5b2f3', 'MANAGER');
insert into acwm.roles values ('5e72c1dc-7d1b-11e7-b36c-005056a5b2f3', 'ADMIN');
insert into acwm.roles values ('a054ead2-ce54-11e7-92d4-005056a5b2f3', 'USER_E');
insert into acwm.roles values ('b19363a0-ce54-11e7-92d4-005056a5b2f3', 'USER_FV');
insert into acwm.roles values ('25c3e548-fbc2-11e7-92d4-005056a5b2f3', 'SCANNER_USER');
insert into acwm.roles values ('baddd044-fbcc-11e7-92d4-005056a5b2f3', 'SCANNER_ADMIN');
insert into acwm.roles values ('c6ba1972-fbcc-11e7-92d4-005056a5b2f3', 'DEVICE_USER');
insert into acwm.roles values ('d7bb20a4-fbcc-11e7-92d4-005056a5b2f3', 'DEVICE_ADMIN');
insert into acwm.roles values ('a5b44cb4-fbce-11e7-92d4-005056a5b2f3', 'DEVICE_MANAGER');
insert into acwm.roles values ('9a1f32c4-fbce-11e7-92d4-005056a5b2f3', 'SCANNER_MANAGER');
insert into acwm.roles values ('ab84587e-64f0-11e8-8e81-005056a5b2f3', 'ITADMIN');