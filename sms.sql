DROP TABLE IF EXISTS `questions`;
CREATE TABLE `questions` (
    `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
    `title` varchar(50) DEFAULT NULL,
    `body` text,
    `created` datetime DEFAULT NULL,
    `modified` datetime DEFAULT NULL,
    `level` int(4) unsigned NOT NULL,
    PRIMARY KEY (`id`)
);

DROP TABLE IF EXISTS `answers`;
CREATE TABLE `answers` (
    `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
    `title` varchar(50) DEFAULT NULL,
    `body` text,
    `created` datetime DEFAULT NULL,
    `modified` datetime DEFAULT NULL,
    `correct` int(1) NOT NULL DEFAULT 0,
    `question_id` int(10) unsigned NOT NULL,
    PRIMARY KEY (`id`)
    );
ALTER TABLE answers ADD ord VARCHAR(3) NOT NULL;

DROP TABLE IF EXISTS `results`;
CREATE TABLE `results` (
    `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
    `question_id` int(10) unsigned NOT NULL,
    `created` datetime DEFAULT NULL,
    PRIMARY KEY (`id`)
    );
create index results_question_id ON results (question_id);

DROP TABLE IF EXISTS `scoreboards`;
CREATE TABLE `scoreboards` (
    `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
    `initial` varchar(3) DEFAULT NULL,
    `score` int(10) unsigned NOT NULL,
    `created` datetime DEFAULT NULL,
    PRIMARY KEY (`id`)
    );
alter table scoreboards add level int(4) unsigned not null;
create index scoreboards_level_score ON scoreboards (level, score);

DROP TABLE IF EXISTS `bosses`;
CREATE TABLE `bosses` (
    `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
    `firstname` varchar(255) DEFAULT NULL,
    `lastname` varchar(255) DEFAULT NULL,
    `email` varchar(100) DEFAULT NULL,
    `level` int(4) unsigned NOT NULL,
    `score` int(10) unsigned NOT NULL,
    `created` datetime DEFAULT NULL,
    PRIMARY KEY (`id`)
    );

/* data */
INSERT INTO bosses (firstname, lastname, email, level, score) VALUES('William', 'Kuykendall', 'wkuykendall@infina.net', 1, 500);
INSERT INTO bosses (firstname, lastname, email, level, score) VALUES('Trieu', 'Tran', 'ttran@infina.net', 1, 501);

INSERT INTO questions (title, body, level) VALUES('Q1', 'The Top 5 are:', 1);
INSERT INTO answers(title, body, correct, question_id, ord) VALUES ('a', 'The top 5 controllers as determined by the Risk Analysis Process', 0, 1, 1);
INSERT INTO answers(title, body, correct, question_id, ord) VALUES ('b', 'The top 5 facilities as determined by the Risk Analysis Process', 0, 1, 2);
INSERT INTO answers(title, body, correct, question_id, ord) VALUES ('c', 'The top 5 safety hazards as determined by the Risk Analysis Process', 1, 1, 3);
INSERT INTO answers(title, body, correct, question_id, ord) VALUES ('d', 'The top 5 safety programs as determined by the Risk Analysis Process', 0, 1, 4);

INSERT INTO questions (title, body, level) VALUES('Q2', 'The SMS requires us to collect data, find problems and fix them.', 1);
INSERT INTO answers(title, body, correct, question_id, ord) VALUES ('a', 'True', 1, 2, 1);
INSERT INTO answers(title, body, correct, question_id, ord) VALUES ('b', 'False', 0, 2, 2);

INSERT INTO questions (title, body, level) VALUES('Q3', 'The SMS can be summarized into 5 steps - report, compile, analyze, identify and improve.', 1);
INSERT INTO answers(title, body, correct, question_id, ord) VALUES ('a', 'True', 1, 3, 1);
INSERT INTO answers(title, body, correct, question_id, ord) VALUES ('b', 'False', 0, 3, 2);

INSERT INTO questions (title, body, level) VALUES('Q4', 'The SMS is a stand-alone activity and is not related to other programs in AJI.', 1);
INSERT INTO answers(title, body, correct, question_id, ord) VALUES ('a', 'True', 0, 4, 1);
INSERT INTO answers(title, body, correct, question_id, ord) VALUES ('b', 'False', 1, 4, 2);

INSERT INTO questions (title, body, level) VALUES('Q5', 'Which is NOT True?', 1);
INSERT INTO answers(title, body, correct, question_id, ord) VALUES ('a', 'The SMS is a tool that allows us to be proactive', 0, 5, 1);
INSERT INTO answers(title, body, correct, question_id, ord) VALUES ('b', 'The SMS is a tool that is punitive in nature', 1, 5, 2);
INSERT INTO answers(title, body, correct, question_id, ord) VALUES ('c', 'The SMS is a tool that includes managers and controllers', 0, 5, 3);
INSERT INTO answers(title, body, correct, question_id, ord) VALUES ('d', 'The SMS is a tool that allows us to prioritize resources', 0, 5, 4);

INSERT INTO questions (title, body, level) VALUES('Q6', 'Because the SMS is being more fully integrated into the FAA', 1);
INSERT INTO answers(title, body, correct, question_id, ord) VALUES ('a', 'We will get better clarity into all operations', 1, 6, 1);
INSERT INTO answers(title, body, correct, question_id, ord) VALUES ('b', 'We will become more reliant on the opinions of upper management to make safety decisions', 0, 6, 2);
INSERT INTO answers(title, body, correct, question_id, ord) VALUES ('c', 'We will need to re-negotiate union contracts', 0, 6, 3);
INSERT INTO answers(title, body, correct, question_id, ord) VALUES ('d', 'We will hopefully decrease the number of flights using hub airports', 0, 6, 4);

INSERT INTO questions (title, body, level) VALUES('Q7', 'Multiple Safety Management Systems, worked together in complementary ways to enable Flight 1549 to "land safely" on the Hudson.', 1);
INSERT INTO answers(title, body, correct, question_id, ord) VALUES ('a', 'True', 1, 7, 1);
INSERT INTO answers(title, body, correct, question_id, ord) VALUES ('b', 'False', 0, 7, 2);

INSERT INTO questions (title, body, level) VALUES('Q8', 'Safety Management Systems are the global standard for managing and mitigating risk in aviation.', 1);
INSERT INTO answers(title, body, correct, question_id, ord) VALUES ('a', 'True', 1, 8, 1);
INSERT INTO answers(title, body, correct, question_id, ord) VALUES ('b', 'False', 0, 8, 2);

INSERT INTO questions (title, body, level) VALUES('Q9', 'If I submit an ATSAP to T-SAP report I am contributing to the SMS.', 1);
INSERT INTO answers(title, body, correct, question_id, ord) VALUES ('a', 'True', 1, 9, 1);
INSERT INTO answers(title, body, correct, question_id, ord) VALUES ('b', 'False', 0, 9, 2);

INSERT INTO questions (title, body, level) VALUES('Q10', 'The Safety Management System will not impact the content of Academy courses.', 1);
INSERT INTO answers(title, body, correct, question_id, ord) VALUES ('a', 'True', 0, 10, 1);
INSERT INTO answers(title, body, correct, question_id, ord) VALUES ('b', 'False', 1, 10, 2);