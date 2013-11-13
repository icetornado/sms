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
TRUNCATE TABLE bosses;
INSERT INTO bosses (firstname, lastname, email, level, score) VALUES('Joseph', 'Teixeira', 'joseph.teixeira@faa.gov', 1, 4340);
INSERT INTO bosses (firstname, lastname, email, level, score) VALUES('Stephen', 'Lloyd', 'stephen.lloyd@faa.gov', 1, 3660);
INSERT INTO bosses (firstname, lastname, email, level, score) VALUES('Lisbeth', 'Mack', 'lisbeth.mack@faa.gov', 1, 3480);
INSERT INTO bosses (firstname, lastname, email, level, score) VALUES('David', 'Boone', 'david.m.boone@faa.gov', 1, 3840);
INSERT INTO bosses (firstname, lastname, email, level, score) VALUES('Tim', 'Arel', 'timothy.arel@faa.gov', 1, 4280);

INSERT INTO bosses (firstname, lastname, email, level, score) VALUES('Joseph', 'Teixeira', 'joseph.teixeira@faa.gov', 2, 4240);
INSERT INTO bosses (firstname, lastname, email, level, score) VALUES('Stephen', 'Lloyd', 'stephen.lloyd@faa.gov', 2, 4260);
INSERT INTO bosses (firstname, lastname, email, level, score) VALUES('Lisbeth', 'Mack', 'lisbeth.mack@faa.gov', 2, 4280);
INSERT INTO bosses (firstname, lastname, email, level, score) VALUES('David', 'Boone', 'david.m.boone@faa.gov', 2, 4460);
INSERT INTO bosses (firstname, lastname, email, level, score) VALUES('Tim', 'Arel', 'timothy.arel@faa.gov', 2, 3860);

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

INSERT INTO questions (title, body, level) VALUES('Q11', 'Each year ATO Vice Presidents sign', 1);
INSERT INTO answers(title, body, correct, question_id, ord) VALUES ('a', 'A letter giving ATO Safety control over Recurrent Training decisions', 0, 21, 1);
INSERT INTO answers(title, body, correct, question_id, ord) VALUES ('b', 'A commitment statement to fix the Top 5', 1, 21, 2);
INSERT INTO answers(title, body, correct, question_id, ord) VALUES ('c', 'A recognition letter to the top 5 controllers in the NAS', 0, 21, 3);
INSERT INTO answers(title, body, correct, question_id, ord) VALUES ('d', 'None of the above', 0, 21, 4);

INSERT INTO questions (title, body, level) VALUES('Q12', 'Everyone in AJI will contribute to reducing risk in the NAS.', 1);
INSERT INTO answers(title, body, correct, question_id, ord) VALUES ('a', 'True', 1, 22, 1);
INSERT INTO answers(title, body, correct, question_id, ord) VALUES ('b', 'False', 0, 22, 2);

INSERT INTO questions (title, body, level) VALUES('Q13', 'If we follow the SMS we will need a larger budget to maintain the safety of the NAS.', 1);
INSERT INTO answers(title, body, correct, question_id, ord) VALUES ('a', 'True', 0, 23, 1);
INSERT INTO answers(title, body, correct, question_id, ord) VALUES ('b', 'False', 1, 23, 2);

INSERT INTO questions (title, body, level) VALUES('Q14', 'The Academy in Oklahoma City is not related to ATO Safety except that we share the same Vice President under our new organizations structure.', 1);
INSERT INTO answers(title, body, correct, question_id, ord) VALUES ('a', 'True', 0, 24, 1);
INSERT INTO answers(title, body, correct, question_id, ord) VALUES ('b', 'False', 1, 24, 2);

INSERT INTO questions (title, body, level) VALUES('Q15', 'Fully integrating the SMS into the FAA means we will begin to look for risk as early as the acquisition process.', 1);
INSERT INTO answers(title, body, correct, question_id, ord) VALUES ('a', 'True', 1, 25, 1);
INSERT INTO answers(title, body, correct, question_id, ord) VALUES ('b', 'False', 0, 25, 2);

INSERT INTO questions (title, body, level) VALUES('Q16', 'Using the SMS in a proactive way to look for precursors of risk means we do not need to study safety events after they happen.', 1);
INSERT INTO answers(title, body, correct, question_id, ord) VALUES ('a', 'True', 0, 26, 1);
INSERT INTO answers(title, body, correct, question_id, ord) VALUES ('b', 'False', 1, 26, 2);

INSERT INTO questions (title, body, level) VALUES('Q17', 'I work on the Safety side of AJI so I do not need to participate in the SMS because I am already doing safety as my full-time job.', 1);
INSERT INTO answers(title, body, correct, question_id, ord) VALUES ('a', 'True', 0, 27, 1);
INSERT INTO answers(title, body, correct, question_id, ord) VALUES ('b', 'False', 1, 27, 2);

INSERT INTO questions (title, body, level) VALUES('Q18', 'I work on the Technical Training side of AJI so I am not involved in the SMS.', 1);
INSERT INTO answers(title, body, correct, question_id, ord) VALUES ('a', 'True', 0, 28, 1);
INSERT INTO answers(title, body, correct, question_id, ord) VALUES ('b', 'False', 1, 28, 2);

INSERT INTO questions (title, body, level) VALUES('Q19', 'Potential hazards that might introduce risk into the NAS include:', 1);
INSERT INTO answers(title, body, correct, question_id, ord) VALUES ('a', 'New technology', 0, 29, 1);
INSERT INTO answers(title, body, correct, question_id, ord) VALUES ('b', 'Poor training', 0, 29, 2);
INSERT INTO answers(title, body, correct, question_id, ord) VALUES ('c', 'Inexperienced pilots', 0, 29, 3);
INSERT INTO answers(title, body, correct, question_id, ord) VALUES ('d', 'All of the above', 1, 29, 4);

INSERT INTO questions (title, body, level) VALUES('Q20', 'Most of what Technical Training does is proactive in nature.', 1);
INSERT INTO answers(title, body, correct, question_id, ord) VALUES ('a', 'True', 1, 30, 1);
INSERT INTO answers(title, body, correct, question_id, ord) VALUES ('b', 'False', 0, 30, 2);

INSERT INTO questions (title, body, level) VALUES('Q21', 'The SMS has structure, processes, rational, and purpose.', 1);
INSERT INTO answers(title, body, correct, question_id, ord) VALUES ('a', 'True', 1, 31, 1);
INSERT INTO answers(title, body, correct, question_id, ord) VALUES ('b', 'False', 0, 31, 2);

INSERT INTO questions (title, body, level) VALUES('Q22', 'Which is not a foundational pillar of the SMS?', 1);
INSERT INTO answers(title, body, correct, question_id, ord) VALUES ('a', 'Safety Structure', 1, 32, 1);
INSERT INTO answers(title, body, correct, question_id, ord) VALUES ('b', 'Safety Assurance', 0, 32, 2);
INSERT INTO answers(title, body, correct, question_id, ord) VALUES ('c', 'Safety Promotion', 0, 29, 3);
INSERT INTO answers(title, body, correct, question_id, ord) VALUES ('d', 'Safety Policy', 0, 32, 4);

INSERT INTO questions (title, body, level) VALUES('Q23', 'Quality Control ensures that we', 1);
INSERT INTO answers(title, body, correct, question_id, ord) VALUES ('a', 'Have the best data collection system', 0, 33, 1);
INSERT INTO answers(title, body, correct, question_id, ord) VALUES ('b', 'Have the highest quality Mitigation Plans (MPs)', 0, 33, 2);
INSERT INTO answers(title, body, correct, question_id, ord) VALUES ('c', 'Close performance gaps and perform up to operational standards', 1, 33, 3);
INSERT INTO answers(title, body, correct, question_id, ord) VALUES ('d', 'Develop Mitigation Plans (MPs) as determined by the Risk Analysis Process', 0, 33, 4);

INSERT INTO questions (title, body, level) VALUES('Q24', 'Voluntary reporting programs are important to the SMS because they provide first-hand knowledge from front-line employees that is critical to understanding the context surrounding a safety incident.', 1);
INSERT INTO answers(title, body, correct, question_id, ord) VALUES ('a', 'True', 1, 34, 1);
INSERT INTO answers(title, body, correct, question_id, ord) VALUES ('b', 'False', 0, 34, 2);

INSERT INTO questions (title, body, level) VALUES('Q25', 'The Runway Safety program office provides commercial pilot training for runway mitigations.', 1);
INSERT INTO answers(title, body, correct, question_id, ord) VALUES ('a', 'True', 0, 35, 1);
INSERT INTO answers(title, body, correct, question_id, ord) VALUES ('b', 'False', 1, 35, 2);

INSERT INTO questions (title, body, level) VALUES('Q11', 'Heinrich&apos;s Triangle is analogous to Maslow&apos;s Hierarchy of Needs because it:', 2);
INSERT INTO answers(title, body, correct, question_id, ord) VALUES ('a', 'Clearly states, in ascending order, the basic psychological profiles pilots need to maintain on final approach BEFORE they reach the runway threshold.', 0, 36, 1);
INSERT INTO answers(title, body, correct, question_id, ord) VALUES ('b', 'Clearly states, in ascending order, the psychological profiles pilots need to maintain AFTER initial decent and BEFORE they begin final approach.', 0, 36, 2);
INSERT INTO answers(title, body, correct, question_id, ord) VALUES ('c', 'Clearly states the psychological safety risks profiles, in ascending order, controllers must account for when vectoring pilots for final approach.', 0, 36, 3);
INSERT INTO answers(title, body, correct, question_id, ord) VALUES ('d', 'The statement is false they are not analogous', 1, 36, 4);

INSERT INTO questions (title, body, level) VALUES('Q12', 'The 4 pillars of our SMS are:', 2);
INSERT INTO answers(title, body, correct, question_id, ord) VALUES ('a', 'Safety Culture, Safety Risk Management, Safety Policy, Safety Communication', 0, 37, 1);
INSERT INTO answers(title, body, correct, question_id, ord) VALUES ('b', 'Safety Promotion, Safety Risk Management, Safety Analysis, Safety Programs', 0, 37, 2);
INSERT INTO answers(title, body, correct, question_id, ord) VALUES ('c', 'Safety Risk Management, Safety Assurance, Safety Promotion, Safety Policy', 1, 37, 3);
INSERT INTO answers(title, body, correct, question_id, ord) VALUES ('d', 'd. Safety Guidance, Just Culture, Safety Risk Management, Safety Promotion', 0, 37, 4);

INSERT INTO questions (title, body, level) VALUES('Q13', 'DIAAT stands for:', 2);
INSERT INTO answers(title, body, correct, question_id, ord) VALUES ('a', 'Describe the System; Identify the Hazards; Analyze Risk; Assess Risk; Treat Risk', 1, 38, 1);
INSERT INTO answers(title, body, correct, question_id, ord) VALUES ('b', 'Describe the Error; Identify the Fault; Analyze the Event; Assess the Frequency; Treat Risk', 0, 38, 2);
INSERT INTO answers(title, body, correct, question_id, ord) VALUES ('c', 'Discover Risk; Identify Cause; Accept Responsibility; Assess Threat; Treat Risk', 0, 38, 3);
INSERT INTO answers(title, body, correct, question_id, ord) VALUES ('d', 'Describe the Risk; Identify the Cause, Analyze Risk; Analyze Cause, Treat Risk', 0, 38, 4);

INSERT INTO questions (title, body, level) VALUES('Q14', 'Which is NOT part of a Positive Safety Culture?', 2);
INSERT INTO answers(title, body, correct, question_id, ord) VALUES ('a', 'Reporting Culture', 0, 39, 1);
INSERT INTO answers(title, body, correct, question_id, ord) VALUES ('b', 'Learning Culture', 0, 39, 2);
INSERT INTO answers(title, body, correct, question_id, ord) VALUES ('c', 'Diverse Culture', 1, 39, 3);
INSERT INTO answers(title, body, correct, question_id, ord) VALUES ('d', 'Just Culture', 0, 39, 4);

INSERT INTO questions (title, body, level) VALUES('Q15', 'Which of the following is a result or benefit of SMS?', 2);
INSERT INTO answers(title, body, correct, question_id, ord) VALUES ('a', 'No Accidents', 0, 40, 1);
INSERT INTO answers(title, body, correct, question_id, ord) VALUES ('b', 'Proactive Risk Mitigation', 1, 40, 2);
INSERT INTO answers(title, body, correct, question_id, ord) VALUES ('c', 'Traffic Flow Management', 0, 40, 3);
INSERT INTO answers(title, body, correct, question_id, ord) VALUES ('d', 'Effective Time-Based Metering', 0, 40, 4);