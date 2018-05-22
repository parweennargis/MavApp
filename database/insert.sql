INSERT INTO `answers` (`id`,`question_id`,`question_option_id`,`created_at`,`updated_at`) VALUES (1,12,4,'2018-05-21 16:55:46','2018-05-21 17:11:46');
INSERT INTO `answers` (`id`,`question_id`,`question_option_id`,`created_at`,`updated_at`) VALUES (2,15,2,'2018-05-21 17:12:09','2018-05-21 17:12:09');

INSERT INTO `categories` (`id`,`name`,`status`,`created_at`,`updated_at`) VALUES (22,'Aptitude',1,'2018-05-21 06:49:27','2018-05-21 06:49:27');
INSERT INTO `categories` (`id`,`name`,`status`,`created_at`,`updated_at`) VALUES (23,'Bank',0,'2018-05-21 06:50:29','2018-05-21 06:50:29');
INSERT INTO `categories` (`id`,`name`,`status`,`created_at`,`updated_at`) VALUES (24,'Engineering',1,'2018-05-21 06:51:07','2018-05-21 06:51:07');
INSERT INTO `categories` (`id`,`name`,`status`,`created_at`,`updated_at`) VALUES (25,'GK',1,'2018-05-21 06:51:23','2018-05-21 06:51:23');
INSERT INTO `categories` (`id`,`name`,`status`,`created_at`,`updated_at`) VALUES (26,'Interview',1,'2018-05-21 06:51:31','2018-05-21 06:51:31');

INSERT INTO `question_options` (`id`,`question_id`,`option`,`status`,`created_at`,`updated_at`) VALUES (38,13,'3 kmph',1,'2018-05-21 18:33:12','2018-05-21 18:33:12');
INSERT INTO `question_options` (`id`,`question_id`,`option`,`status`,`created_at`,`updated_at`) VALUES (39,13,'31 kmph',1,'2018-05-21 18:33:12','2018-05-21 18:33:12');
INSERT INTO `question_options` (`id`,`question_id`,`option`,`status`,`created_at`,`updated_at`) VALUES (40,13,'5 kmph',1,'2018-05-21 18:33:12','2018-05-21 18:33:12');
INSERT INTO `question_options` (`id`,`question_id`,`option`,`status`,`created_at`,`updated_at`) VALUES (41,13,'7 kmph',1,'2018-05-21 18:33:12','2018-05-21 18:33:12');
INSERT INTO `question_options` (`id`,`question_id`,`option`,`status`,`created_at`,`updated_at`) VALUES (42,14,'Rs.150',1,'2018-05-21 18:35:21','2018-05-21 18:35:21');
INSERT INTO `question_options` (`id`,`question_id`,`option`,`status`,`created_at`,`updated_at`) VALUES (43,14,'Rs.550',1,'2018-05-21 18:35:21','2018-05-21 18:35:21');
INSERT INTO `question_options` (`id`,`question_id`,`option`,`status`,`created_at`,`updated_at`) VALUES (44,14,'Rs.777',1,'2018-05-21 18:35:21','2018-05-21 18:35:21');
INSERT INTO `question_options` (`id`,`question_id`,`option`,`status`,`created_at`,`updated_at`) VALUES (45,14,'none',1,'2018-05-21 18:35:21','2018-05-21 18:35:21');
INSERT INTO `question_options` (`id`,`question_id`,`option`,`status`,`created_at`,`updated_at`) VALUES (82,12,'8 a.m.',1,'2018-05-21 22:41:46','2018-05-21 22:41:46');
INSERT INTO `question_options` (`id`,`question_id`,`option`,`status`,`created_at`,`updated_at`) VALUES (83,12,'8 p.m.',1,'2018-05-21 22:41:46','2018-05-21 22:41:46');
INSERT INTO `question_options` (`id`,`question_id`,`option`,`status`,`created_at`,`updated_at`) VALUES (84,12,'9 a.m.',1,'2018-05-21 22:41:46','2018-05-21 22:41:46');
INSERT INTO `question_options` (`id`,`question_id`,`option`,`status`,`created_at`,`updated_at`) VALUES (85,12,'9 p.m.',1,'2018-05-21 22:41:46','2018-05-21 22:41:46');
INSERT INTO `question_options` (`id`,`question_id`,`option`,`status`,`created_at`,`updated_at`) VALUES (86,15,'test',1,'2018-05-21 22:42:09','2018-05-21 22:42:09');
INSERT INTO `question_options` (`id`,`question_id`,`option`,`status`,`created_at`,`updated_at`) VALUES (87,15,'test',1,'2018-05-21 22:42:09','2018-05-21 22:42:09');
INSERT INTO `question_options` (`id`,`question_id`,`option`,`status`,`created_at`,`updated_at`) VALUES (88,15,'test',1,'2018-05-21 22:42:09','2018-05-21 22:42:09');
INSERT INTO `question_options` (`id`,`question_id`,`option`,`status`,`created_at`,`updated_at`) VALUES (89,15,'tst',1,'2018-05-21 22:42:09','2018-05-21 22:42:09');

INSERT INTO `questions` (`id`,`sub_category_id`,`question`,`hint`,`status`,`created_at`,`updated_at`) VALUES (12,1,'A man leaves a point P at 6 a.m. and reaches the point Q at 10 a.m. another man leaves the point give at 8 a.m. and reaches the point P at 12 noon. At what time do they meet?test',NULL,1,'2018-05-21 18:32:35','2018-05-21 14:53:49');
INSERT INTO `questions` (`id`,`sub_category_id`,`question`,`hint`,`status`,`created_at`,`updated_at`) VALUES (13,1,'A man swims downstream 72 km and upstream 45 km taking 9 hours each time; what is the speed of the current?',NULL,1,'2018-05-21 18:33:12','2018-05-21 18:33:12');
INSERT INTO `questions` (`id`,`sub_category_id`,`question`,`hint`,`status`,`created_at`,`updated_at`) VALUES (14,1,'A man purchased 3 blankets @ Rs.100 each, 5 blankets @ Rs.150 each and two blankets at a certain rate which is now slipped off from his memory. But he remembers that the average price of the blankets was Rs.150. Find the unknown rate of two blankets?',NULL,1,'2018-05-21 18:35:21','2018-05-21 18:35:21');
INSERT INTO `questions` (`id`,`sub_category_id`,`question`,`hint`,`status`,`created_at`,`updated_at`) VALUES (15,3,'tetst',NULL,1,'2018-05-21 22:42:09','2018-05-21 22:42:09');

INSERT INTO `sub_categories` (`id`,`category_id`,`name`,`status`,`created_at`,`updated_at`) VALUES (1,22,'test Online Aptitude Test 1 (Random Questions)',1,'2018-05-21 18:30:35','2018-05-21 18:30:35');
INSERT INTO `sub_categories` (`id`,`category_id`,`name`,`status`,`created_at`,`updated_at`) VALUES (2,22,'Online Aptitude Test 4',1,'2018-05-21 18:30:35','2018-05-21 18:30:35');
INSERT INTO `sub_categories` (`id`,`category_id`,`name`,`status`,`created_at`,`updated_at`) VALUES (3,22,'Online Aptitude Test 40',1,'2018-05-21 18:30:35','2018-05-21 18:30:35');
INSERT INTO `sub_categories` (`id`,`category_id`,`name`,`status`,`created_at`,`updated_at`) VALUES (4,23,'Bank Exam Practice Test 2',1,'2018-05-21 18:30:35','2018-05-21 18:30:35');
INSERT INTO `sub_categories` (`id`,`category_id`,`name`,`status`,`created_at`,`updated_at`) VALUES (5,23,'Bank Exam Practice Test 9',1,'2018-05-21 18:30:35','2018-05-21 18:30:35');
INSERT INTO `sub_categories` (`id`,`category_id`,`name`,`status`,`created_at`,`updated_at`) VALUES (6,24,'Computer Science & Engineering',1,'2018-05-21 18:30:36','2018-05-21 18:30:36');
INSERT INTO `sub_categories` (`id`,`category_id`,`name`,`status`,`created_at`,`updated_at`) VALUES (7,24,'Mechanical Engineering',1,'2018-05-21 18:30:36','2018-05-21 18:30:36');
INSERT INTO `sub_categories` (`id`,`category_id`,`name`,`status`,`created_at`,`updated_at`) VALUES (8,24,'AMCAT Mock Test Sample Papers',1,'2018-05-21 18:30:36','2018-05-21 18:30:36');
INSERT INTO `sub_categories` (`id`,`category_id`,`name`,`status`,`created_at`,`updated_at`) VALUES (9,25,'Indian Culture Quiz',1,'2018-05-21 18:30:36','2018-05-21 18:30:36');
INSERT INTO `sub_categories` (`id`,`category_id`,`name`,`status`,`created_at`,`updated_at`) VALUES (10,25,'Marketing Awareness',1,'2018-05-21 18:30:36','2018-05-21 18:30:36');
INSERT INTO `sub_categories` (`id`,`category_id`,`name`,`status`,`created_at`,`updated_at`) VALUES (11,25,'Famous Books & Authors',1,'2018-05-21 18:30:36','2018-05-21 18:30:36');
INSERT INTO `sub_categories` (`id`,`category_id`,`name`,`status`,`created_at`,`updated_at`) VALUES (12,26,'Placement Papers with Answers',1,'2018-05-21 18:30:36','2018-05-21 18:30:36');
INSERT INTO `sub_categories` (`id`,`category_id`,`name`,`status`,`created_at`,`updated_at`) VALUES (13,26,'Group Discussion Topics with Answers',1,'2018-05-21 18:30:36','2018-05-21 18:30:36');
INSERT INTO `sub_categories` (`id`,`category_id`,`name`,`status`,`created_at`,`updated_at`) VALUES (14,26,'Technical Interview Questions and Answers',1,'2018-05-21 18:30:36','2018-05-21 18:30:36');

INSERT INTO `user_question_answers` (`id`,`user_id`,`question_id`,`option_id`,`created_at`,`updated_at`) VALUES (28,1,14,45,'2018-05-21 18:29:14','2018-05-21 18:29:14');
INSERT INTO `user_question_answers` (`id`,`user_id`,`question_id`,`option_id`,`created_at`,`updated_at`) VALUES (29,1,14,45,'2018-05-21 18:29:52','2018-05-21 18:29:52');
INSERT INTO `user_question_answers` (`id`,`user_id`,`question_id`,`option_id`,`created_at`,`updated_at`) VALUES (30,1,14,45,'2018-05-21 18:30:25','2018-05-21 18:30:25');
INSERT INTO `user_question_answers` (`id`,`user_id`,`question_id`,`option_id`,`created_at`,`updated_at`) VALUES (31,1,14,40,'2018-05-21 18:30:30','2018-05-21 18:30:30');
INSERT INTO `user_question_answers` (`id`,`user_id`,`question_id`,`option_id`,`created_at`,`updated_at`) VALUES (32,1,14,84,'2018-05-21 18:30:35','2018-05-21 18:30:35');
INSERT INTO `user_question_answers` (`id`,`user_id`,`question_id`,`option_id`,`created_at`,`updated_at`) VALUES (33,1,14,43,'2018-05-21 18:32:39','2018-05-21 18:32:39');
INSERT INTO `user_question_answers` (`id`,`user_id`,`question_id`,`option_id`,`created_at`,`updated_at`) VALUES (34,1,14,40,'2018-05-21 18:32:51','2018-05-21 18:32:51');
INSERT INTO `user_question_answers` (`id`,`user_id`,`question_id`,`option_id`,`created_at`,`updated_at`) VALUES (35,1,14,40,'2018-05-21 18:32:58','2018-05-21 18:32:58');
INSERT INTO `user_question_answers` (`id`,`user_id`,`question_id`,`option_id`,`created_at`,`updated_at`) VALUES (36,1,14,85,'2018-05-21 18:33:03','2018-05-21 18:33:03');
INSERT INTO `user_question_answers` (`id`,`user_id`,`question_id`,`option_id`,`created_at`,`updated_at`) VALUES (37,1,14,44,'2018-05-21 18:39:21','2018-05-21 18:39:21');
INSERT INTO `user_question_answers` (`id`,`user_id`,`question_id`,`option_id`,`created_at`,`updated_at`) VALUES (38,1,14,40,'2018-05-21 18:39:23','2018-05-21 18:39:23');
INSERT INTO `user_question_answers` (`id`,`user_id`,`question_id`,`option_id`,`created_at`,`updated_at`) VALUES (39,1,14,84,'2018-05-21 18:39:25','2018-05-21 18:39:25');
INSERT INTO `user_question_answers` (`id`,`user_id`,`question_id`,`option_id`,`created_at`,`updated_at`) VALUES (40,1,14,45,'2018-05-21 18:58:06','2018-05-21 18:58:06');
INSERT INTO `user_question_answers` (`id`,`user_id`,`question_id`,`option_id`,`created_at`,`updated_at`) VALUES (41,1,14,44,'2018-05-21 18:58:19','2018-05-21 18:58:19');
INSERT INTO `user_question_answers` (`id`,`user_id`,`question_id`,`option_id`,`created_at`,`updated_at`) VALUES (42,1,14,45,'2018-05-21 18:59:18','2018-05-21 18:59:18');
INSERT INTO `user_question_answers` (`id`,`user_id`,`question_id`,`option_id`,`created_at`,`updated_at`) VALUES (43,1,14,44,'2018-05-21 18:59:48','2018-05-21 18:59:48');
INSERT INTO `user_question_answers` (`id`,`user_id`,`question_id`,`option_id`,`created_at`,`updated_at`) VALUES (44,1,14,44,'2018-05-21 19:00:17','2018-05-21 19:00:17');
INSERT INTO `user_question_answers` (`id`,`user_id`,`question_id`,`option_id`,`created_at`,`updated_at`) VALUES (45,1,14,45,'2018-05-21 19:00:58','2018-05-21 19:00:58');
INSERT INTO `user_question_answers` (`id`,`user_id`,`question_id`,`option_id`,`created_at`,`updated_at`) VALUES (46,1,14,45,'2018-05-21 19:02:07','2018-05-21 19:02:07');
INSERT INTO `user_question_answers` (`id`,`user_id`,`question_id`,`option_id`,`created_at`,`updated_at`) VALUES (47,1,14,40,'2018-05-21 19:02:11','2018-05-21 19:02:11');
