/*db*/
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

/*level 2*/
INSERT INTO questions (title, body, level) VALUES('Q1', 'Safety experts have long studied Heinrich&#39;s Triangle because it is analogous to the Bermuda Triangle except it is:', 2);
INSERT INTO answers(title, body, correct, question_id, ord) VALUES ('a', 'In the Bering Sea between the Aleutian Islands and Kamchatsky, Russia', 0, 11, 1);
INSERT INTO answers(title, body, correct, question_id, ord) VALUES ('b', 'Off the coasts of Venezuela, Aruba and Grenada', 0, 11, 2);
INSERT INTO answers(title, body, correct, question_id, ord) VALUES ('c', 'A magnetic dead zone in the Sea of Cortez', 0, 11, 3);
INSERT INTO answers(title, body, correct, question_id, ord) VALUES ('d', 'The statement is false they are not analogous', 1, 11, 4);

INSERT INTO questions (title, body, level) VALUES('Q2', 'Technical Operations Safety Action Program is:', 2);
INSERT INTO answers(title, body, correct, question_id, ord) VALUES ('a', 'A proactive safety life-cycle replacement plan for VORs', 0, 12, 1);
INSERT INTO answers(title, body, correct, question_id, ord) VALUES ('b', 'A proactive, non-punitive evaluation action plan for SupCom', 0, 12, 2);
INSERT INTO answers(title, body, correct, question_id, ord) VALUES ('c', 'A non-punitive, voluntary reporting program for Tech Ops', 1, 12, 3);
INSERT INTO answers(title, body, correct, question_id, ord) VALUES ('d', 'A proactive safety plan to improve pilot - Tech Ops communications', 0, 12, 4);

INSERT INTO questions (title, body, level) VALUES('Q3', 'Which one does not belong?', 2);
INSERT INTO answers(title, body, correct, question_id, ord) VALUES ('a', 'Safety Quality Reporting', 1, 13, 1);
INSERT INTO answers(title, body, correct, question_id, ord) VALUES ('b', 'Safety Assurance', 0, 13, 2);
INSERT INTO answers(title, body, correct, question_id, ord) VALUES ('c', 'Safety Risk Management', 0, 13, 3);
INSERT INTO answers(title, body, correct, question_id, ord) VALUES ('d', 'Safety Promotion', 0, 13, 4);

INSERT INTO questions (title, body, level) VALUES('Q4', 'A Safety Management System does the following:', 2);
INSERT INTO answers(title, body, correct, question_id, ord) VALUES ('a', 'Provides visibility into complex systems', 1, 14, 1);
INSERT INTO answers(title, body, correct, question_id, ord) VALUES ('b', 'Give safety experts definitions for aviation hazards', 0, 14, 2);
INSERT INTO answers(title, body, correct, question_id, ord) VALUES ('c', 'Allows global air traffic to navigate with ADS-B', 0, 14, 3);
INSERT INTO answers(title, body, correct, question_id, ord) VALUES ('d', 'Allows pilots to manage communication with controllers from the cockpit', 0, 14, 4);

INSERT INTO questions (title, body, level) VALUES('Q5', 'Partnership for Safety requires:', 2);
INSERT INTO answers(title, body, correct, question_id, ord) VALUES ('a', 'At least one controller and one management representative to form a safety committee at a facility', 1, 15, 1);
INSERT INTO answers(title, body, correct, question_id, ord) VALUES ('b', 'Monthly meetings with the Director of Safety and the Director of Technical Training', 0, 15, 2);
INSERT INTO answers(title, body, correct, question_id, ord) VALUES ('c', 'An ATSAP form be completed before a safety meeting can take place', 0, 15, 3);
INSERT INTO answers(title, body, correct, question_id, ord) VALUES ('d', 'Controllers to take part in Flight Deck Training', 0, 15, 4);

INSERT INTO questions (title, body, level) VALUES('Q6', 'RAP or Risk Analysis Process does the following:', 2);
INSERT INTO answers(title, body, correct, question_id, ord) VALUES ('a', 'Meets 2 times each month to review all ATSAP reports', 0, 16, 1);
INSERT INTO answers(title, body, correct, question_id, ord) VALUES ('b', 'Analyzes safety data to determine the most serious hazards in the NAS and develops the Top 5', 1, 16, 2);
INSERT INTO answers(title, body, correct, question_id, ord) VALUES ('c', 'Makes risk-to-costs recommendations to the FAA Airports office for runway construction projects', 0, 16, 3);
INSERT INTO answers(title, body, correct, question_id, ord) VALUES ('d', 'Determines the risks associated with deploying NextGen technology', 0, 16, 4);

INSERT INTO questions (title, body, level) VALUES('Q7', 'The Safety Management System or SMS is', 2);
INSERT INTO answers(title, body, correct, question_id, ord) VALUES ('a', 'A global standard for managing aviation risks', 1, 17, 1);
INSERT INTO answers(title, body, correct, question_id, ord) VALUES ('b', 'A global system for coordinating aircraft hand-offs between international controllers', 0, 17, 2);
INSERT INTO answers(title, body, correct, question_id, ord) VALUES ('c', 'A aviation management system used by the U.S. to share data with Euro-Control and NAV Canada', 0, 17, 3);
INSERT INTO answers(title, body, correct, question_id, ord) VALUES ('d', 'A global safety system that requires aircraft to digitally communicate with ground Radar and GPS satellites', 0, 17, 4);

INSERT INTO questions (title, body, level) VALUES('Q8', 'According to the NTSB which factor DID NOT contributed to the safe outcome of US Airways Flight 1549?', 2);
INSERT INTO answers(title, body, correct, question_id, ord) VALUES ('a', 'Airbus&#39; Safety Management System had the airplane properly equipped for a water ditching', 0, 18, 1);
INSERT INTO answers(title, body, correct, question_id, ord) VALUES ('b', 'The decisions and performance of the flight and cabin crews reflected a proactive Safety Management System within U.S. Airways', 0, 18, 2);
INSERT INTO answers(title, body, correct, question_id, ord) VALUES ('c', 'The decisions and crew resource management of the flight crew', 0, 18, 3);
INSERT INTO answers(title, body, correct, question_id, ord) VALUES ('d', 'The FAA&#39;s Safety Management System has pre-identified the Hudson River as a ditching zone', 1, 18, 4);

INSERT INTO questions (title, body, level) VALUES('Q9', 'The Confidential Information Share Program or CISP does the following:', 2);
INSERT INTO answers(title, body, correct, question_id, ord) VALUES ('a', 'Allows controllers to anonymously report safety problems', 0, 19, 1);
INSERT INTO answers(title, body, correct, question_id, ord) VALUES ('b', 'Allows the FAA and commercial carriers share safety data', 1, 19, 2);
INSERT INTO answers(title, body, correct, question_id, ord) VALUES ('c', 'Allows pilots to meet with the NTSB with no fear reprisals', 0, 19, 3);
INSERT INTO answers(title, body, correct, question_id, ord) VALUES ('d', 'Allows controllers and managers meet in a confidential forum', 0, 19, 4);

INSERT INTO questions (title, body, level) VALUES('Q10', 'ATO leadership committed to the following to enable the SMS process to work', 2);
INSERT INTO answers(title, body, correct, question_id, ord) VALUES ('a', 'Value the contributions and expertise of employees', 0, 20, 1);
INSERT INTO answers(title, body, correct, question_id, ord) VALUES ('b', 'Invest in technology and processes to better gather and analyze data', 0, 20, 2);
INSERT INTO answers(title, body, correct, question_id, ord) VALUES ('c', 'Embrace change to mitigate risk', 0, 20, 3);
INSERT INTO answers(title, body, correct, question_id, ord) VALUES ('d', 'All of the above', 1, 20, 4);