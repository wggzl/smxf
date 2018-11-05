create database if not exists smxf;

use smxf;
-- 管理员表

create table if not exists smxf_user(
	id int unsigned primary key auto_increment,
	username varchar(20) not null,
	password char(32),
	created_at datetime,
	updated_at datetime
)engine=innoDB charset=utf8;

rename table smxf_user to smxf_users;


insert into smxf_users values (null, 'admin', md5('adminsmxf*'), unix_timestamp(), unix_timestamp());




-- 学校
-- 学校字段 -- 学校名称  英文名称 搜索关键词 类别
create table if not exists smxf_schools(
	id int unsigned primary key auto_increment,
	sch_name varchar(30) not null,
	sch_type char(2) not null,
	created_at datetime,
	updated_at datetime
)engine=innoDB charset=utf8;

alter table smxf_schools add column sch_name_en varchar(30) not null default '' after sch_name;
alter table smxf_schools add column keywords text not null default '' after sch_name_en;
alter table smxf_schools modify column keywords text not null default '';
alter table smxf_schools add column isInter tinyint not null default 1;

-- 年届
create table if not exists smxf_years(
	id int unsigned primary key auto_increment,
	year char(4) not null
)engine=innoDB charset=utf8;

-- 年级
create table if not exists smxf_grades(
	id int unsigned primary key auto_increment,
	sch_id int unsigned not null,
	year_id int unsigned not null,
	grade_sn char(10) not null,
	created_at datetime,
	updated_at datetime
)engine=innoDB charset=utf8;

-- 学生
create table if not exists smxf_students(
	id int unsigned primary key auto_increment,
	sch_id int unsigned not null,
	grade_id int unsigned not null,
	stu_name varchar(30) not null,
	created_at datetime,
	updated_at datetime
)engine=innoDB charset=utf8;

-- 商品  -- 未完 
create table if not exists smxf_goods(
	id int unsigned primary key auto_increment,
	goods_name varchar(50) not null,
	goods_sn char(10) not null,
	stock int not null default 0,
	price decimal(10, 2) not null default 0,
	created_at datetime,
	updated_at datetime
)engine=innoDB charset=utf8;

-- 订单
create table if not exists smxf_orders(
	id int unsigned primary key auto_increment,
	order_sn char(15) not null,
	created_at datetime,
	updated_at datetime
)engine=innoDB charset=utf8;


-- 订单详细
create table if not exists smxf_order_infos(
	id int unsigned primary key auto_increment,
	order_id int unsigned not null,
	goods_id int unsigned not null,
	buy_number int unsigned not null,
	created_at datetime,
	updated_at datetime
)engine=innoDB charset=utf8;

-------------------------------------------------------------------------

-- 学生表 序号、年级、班级、学号、姓名、性别、英文名

create table if not exists smxf_students(
	id int unsigned primary key auto_increment,
	stu_grade tinyint unsigned not null,
	stu_class tinyint unsigned not null,
	stu_num char(10) not null,
	stu_name_en varchar(20),
	stu_name varchar(10) not null,
	sex char(1) not null,
	schoo_id int unsigned,
	created_at datetime,
	updated_at datetime
)engine=innoDB charset=utf8;

alter table smxf_students change column schoo_id school_id int unsigned;

-- 创建一个唯一索引
-- create unique index stu_unique on smxf_students(`school_id`, `stu_grade`, `stu_class`, `stu_num`);

-- 在学生表增加一个状态字段 在用 还是 不用

alter table smxf_students add column status tinyint not null default 1; --1 在校 2 不在校

alter table smxf_students modify column status tinyint not null default 1 after school_id;

-- 创建商品表 
/*
种类（固定：梭织、针织）、商品名（文本输入）、价格（数字输入）、
库存（数字输入，-1为无限）、尺寸（文本输入，可多条，可删除）、图片（只有1张）
*/
create table smxf_goods(
	id int unsigned primary key auto_increment,
	type char(2) not null default '',
	goods_name varchar(100) not null default '',
	price decimal(10, 2) not null default 0,
	stock int not null default 0,
	image_src varchar(150) not null default '',
	sch_ids text not null default ''
)engine=innoDB charset=utf8;

-- 增加一个款式
alter table smxf_goods add column goods_style char(3) not null default '' after goods_name; 
-- 增加一个商品编号
alter table smxf_goods add column goods_sn varchar(30) not null default '' after goods_name;


create table smxf_goods_size(
	goods_id int unsigned not null,
	size varchar(255) not null default ''
)engine=innoDB charset=utf8;

drop table smxf_goods_size;

alter table smxf_goods add column size_str text not null default '' after stock;

alter table smxf_goods add column updated_at datetime;
alter table smxf_goods add column created_at datetime;

-- 订单

-- 生成一个订单号 11 位 
-- order_sn 收件人 recipients 地址 address 联系方式 contact 支付方式 order_type
-- 开票与否 invoices_type 税号 tax_number 公司名称 company_name 总计 total
-- 订单对应多条 -> 商品的goods_id 商品名称goods_name 商品的图片image_src  商品数量 number 价格price 尺码size  

create table smxf_orders(
	id int unsigned primary key auto_increment,
	order_sn char(61) not null default '',
	recipients char(30) not null default '',
	address varchar(255) not null default '',
	contact char(20) not null default '',
	order_type tinyint not null default 0,
	invoices_type tinyint not null default 0,
	tax_number char(30),
	company_name char(50),
	total decimal(10, 2) not null default 0.00,
	created_at datetime,
	updated_at datetime
)engine=innoDB charset=utf8;

-- 订单号 加上索引
create unique index order_sn_unique on smxf_orders(`order_sn`); 


-- 需要分表
create table smxf_order_details(
	id int unsigned primary key auto_increment,
	order_id int unsigned,
	order_sn char(61) not null default '',
	goods_id int not null default 0,
	goods_name varchar(100) not null default '',
	number int not null default 0,
	price decimal(10, 2) not null default 0.00,
	size varchar(255) not null default '',
	created_at datetime,
	updated_at datetime
)engine=innoDB charset=utf8;

-- created_at: "2018-11-05 09:00:01"
-- goods_id: "6"
-- goods_name: "afasd"
-- number: "1"
-- order_id: 2
-- order_sn: "ygxx18110500001"
-- price: "342.00"
-- size: "asd"
-- updated_at: "2018-11-05 09:00:01"







select * from smxf_students where school_id=7 and stu_grade=11 and stu_name='王五6' and stu_num=4; 




