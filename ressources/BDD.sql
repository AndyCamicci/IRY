ALTER TABLE Helicopter AUTO_INCREMENT = 0;
ALTER TABLE SubTheme AUTO_INCREMENT = 0;
ALTER TABLE TypeCourse AUTO_INCREMENT = 0;
ALTER TABLE Course AUTO_INCREMENT = 0;
ALTER TABLE Theme AUTO_INCREMENT = 0;
ALTER TABLE Pilot AUTO_INCREMENT = 0;
ALTER TABLE Result AUTO_INCREMENT = 0;
ALTER TABLE Trial AUTO_INCREMENT = 0;
ALTER TABLE Step AUTO_INCREMENT = 0;

SET foreign_key_checks = 0;

INSERT INTO iry.Helicopter (id, name, type, imgHelico) VALUES
	(NULL, "EC120B", "Civil", "EC120B.png"),
	(NULL, "Ecureuil AS350B3e", "Civil", "AS350B3e.png"),
	(NULL, "Ecureuil AS350B2", "Civil", "AS350B2.png"),
	(NULL, "EC135", "Civil", "EC135.png"),
	(NULL, "EC145", "Civil", "EC145.png"),
	(NULL, "Dauphin", "Civil", "Dauphin.png"),
	(NULL, "Super Puma", "Civil", "SuperPuma.png"),
	(NULL, "EC175", "Civil", "EC175.png"),
	(NULL, "Fennec", "Military", "Fennec.png"),
	(NULL, "Panther", "Military", "Panther.png"),
	(NULL, "Cougar", "Military", "Cougar.png");

INSERT INTO iry.Theme (id, helicopter_id, name) VALUES
	(NULL, "2", "Hydrolic system"),
	(NULL, "2", "Startup"),
	(NULL, "2", "Full");

INSERT INTO iry.SubTheme (id, theme_id, name) VALUES
	(NULL, "1", "Servo control"),
	(NULL, "1", "Main rotor servocontrols"),
	(NULL, "1", "Tail rotor servocontrol"),
	(NULL, "1", "Hydraulic system"),
	(NULL, "1", "Limitations"),
	(NULL, "1", "MMEL"),
	(NULL, "1", "Emergency procedures"),
	(NULL, "3", "Full");

INSERT INTO iry.Pilot (id, name) VALUES
    (NULL, 'Tarek'),
    (NULL, 'Andy'),
    (NULL, 'Warso'),
    (NULL, 'Yassine'),
    (NULL, 'Florent');	

INSERT INTO iry.TypeCourse (id, name) VALUES
	(NULL, "Theorical Course"),
	(NULL, "Demonstrative Course"),
	(NULL, "Immersive Movie"),
	(NULL, "Practical Training");

INSERT INTO iry.Course (id, subTheme_id, name, typeCourse_id) VALUES
	(NULL, "1", "Introduction",                                   "1"),
	(NULL, "2", "SAMM servo actuators",                           "2"),
	(NULL, "3", "General description",                            "3"),
	(NULL, "3", "Load compensator",                               "3"),
	(NULL, "4", "Overview of principles of hydraulic system",     "4"),
	(NULL, "4", "Hydraulic system components and their functions","4"),
	(NULL, "4", "Location of hydraulic system components",        "4"),
	(NULL, "5", "List/Fluide",                                    "1"),
	(NULL, "6", "List",                                           "3"),
	(NULL, "7", "List",                                           "2"),
	(NULL, "7", "Filter clogging",                                "4"),
	(NULL, "7", "Load factor",                                    "3"),
	(NULL, "8", "Full", 	                                      "1");

INSERT INTO iry.serie (id, helicopter_id, name) VALUES 
	(NULL, 2, "FirstTeam");

INSERT INTO iry.series_courses (course_id, serie_id) VALUES 
	( 1,1),
	( 2,1),
	( 3,1),
	( 4,1),
	( 5,1),
	( 6,1),
	( 7,1),
	( 8,1),
	( 9,1),
	(10,1),
	(11,1),
	(12,1);

INSERT INTO iry.Step (id, course_id, name, theOrder) VALUES
	(NULL, 1, 'Main servo control', 1),
	(NULL, 1, 'tail servo control', 2),
	(NULL, 2, 'SAMM servo actuators', 1),
	(NULL, 2, 'Normal operation', 2),
	(NULL, 2, 'Loss of hydraulic pressure', 3),
	(NULL, 2, 'servo controls components', 4),
	(NULL, 3, 'General description', 1),
	(NULL, 3, 'Tail servo control components', 2),
	(NULL, 4, 'Load compensator components', 1),
	(NULL, 5, 'Hydraulic system principle', 1),
	(NULL, 6, 'servo actuator hydraulic system', 1),
	(NULL, 7, 'Location of hydraulic system components', 1),
	(NULL, 8, 'Servo control Fluid', 1),
	(NULL, 9, 'List', 1),
	(NULL, 10, 'Emergency procedures', 1),
	(NULL, 11, 'Hydraulic Filter with clogging indicator', 1),
	(NULL, 12, 'Load factor', 1);

INSERT INTO iry.Result (id, trial_id, pilot_id, step_id, isError, isFavorite, isGlobal) VALUES
	(NULL,  1, 1, 1, 1, 0, 0),
	(NULL,  2, 2, 1, 1, 0, 0),
	(NULL,  3, 3, 1, 0, 0, 0),
	(NULL,  4, 4, 1, 1, 0, 1),
	(NULL,  5, 3, 1, 0, 0, 0),
	(NULL,  6, 4, 1, 0, 0, 0),
	(NULL,  7, 1, 1, 1, 0, 1),
	(NULL,  8, 2, 1, 0, 0, 0),
	(NULL,  9, 2, 1, 1, 0, 0),
	(NULL, 10, 1, 1, 0, 0, 0),

	(NULL, 11, 1, 2, 0, 0, 0),
	(NULL, 12, 2, 2, 0, 0, 0),
	(NULL, 13, 3, 2, 1, 0, 1),
	(NULL, 14, 4, 2, 1, 0, 0),
	(NULL, 15, 3, 2, 1, 0, 1),
	(NULL, 16, 4, 2, 0, 0, 0),
	(NULL, 17, 2, 2, 1, 0, 0),
	(NULL, 18, 1, 2, 0, 0, 0),
	(NULL, 19, 4, 2, 0, 0, 0),
	(NULL, 20, 3, 2, 1, 0, 1),



	(NULL, 21, 1, 3, 1, 0, 1),
	(NULL, 22, 2, 3, 1, 0, 0),
	(NULL, 23, 3, 3, 0, 0, 0),
	(NULL, 24, 4, 3, 0, 0, 0),
	(NULL, 25, 3, 3, 1, 0, 1),
	(NULL, 26, 4, 3, 1, 0, 0),
	(NULL, 27, 1, 3, 0, 0, 0),
	(NULL, 28, 2, 3, 0, 0, 0),
	(NULL, 29, 1, 3, 1, 0, 0),
	(NULL, 30, 2, 3, 0, 0, 0),

	(NULL, 31, 1, 4, 1, 0, 0),
	(NULL, 32, 2, 4, 1, 0, 0),
	(NULL, 33, 3, 4, 1, 0, 1),
	(NULL, 34, 4, 4, 1, 0, 1),
	(NULL, 35, 3, 4, 0, 0, 0),
	(NULL, 36, 4, 4, 0, 0, 0),
	(NULL, 37, 2, 4, 1, 0, 1),
	(NULL, 38, 1, 4, 0, 0, 0),
	(NULL, 39, 4, 4, 0, 0, 0),
	(NULL, 40, 3, 4, 1, 0, 1),



	(NULL, 41, 1, 5, 0, 0, 0),
	(NULL, 42, 4, 5, 0, 0, 0),
	(NULL, 43, 2, 5, 1, 0, 0),
	(NULL, 44, 3, 5, 1, 0, 1),
	(NULL, 45, 4, 5, 1, 0, 1),
	(NULL, 46, 2, 5, 0, 0, 0),
	(NULL, 47, 3, 5, 0, 0, 1),
	(NULL, 48, 1, 5, 0, 0, 1),
	(NULL, 49, 4, 5, 1, 0, 1),
	(NULL, 50, 2, 5, 0, 0, 0),

	(NULL, 51, 4, 6, 0, 0, 0),
	(NULL, 52, 3, 6, 1, 0, 0),
	(NULL, 53, 2, 6, 1, 0, 0),
	(NULL, 54, 1, 6, 1, 0, 0),
	(NULL, 55, 5, 6, 1, 0, 1),
	(NULL, 56, 1, 6, 0, 0, 0),
	(NULL, 57, 3, 6, 0, 0, 0),
	(NULL, 58, 4, 6, 1, 0, 1),
	(NULL, 59, 2, 6, 0, 0, 0),
	(NULL, 60, 5, 6, 1, 0, 1),



	(NULL, 61, 1, 7, 1, 0, 1),
	(NULL, 62, 2, 7, 0, 0, 0),
	(NULL, 63, 3, 7, 1, 0, 0),
	(NULL, 64, 4, 7, 1, 0, 1),
	(NULL, 65, 5, 7, 1, 0, 1),
	(NULL, 66, 1, 7, 0, 0, 0),
	(NULL, 67, 2, 7, 1, 1, 1),
	(NULL, 68, 3, 7, 0, 1, 0),
	(NULL, 69, 4, 7, 1, 0, 0),
	(NULL, 70, 5, 7, 0, 1, 0),

	(NULL, 71, 1, 8, 0, 1, 0),
	(NULL, 72, 2, 8, 1, 1, 1),
	(NULL, 73, 3, 8, 0, 1, 0),
	(NULL, 74, 4, 8, 0, 0, 0),
	(NULL, 75, 5, 8, 1, 0, 0),
	(NULL, 76, 1, 8, 1, 0, 0),
	(NULL, 77, 2, 8, 0, 1, 0),
	(NULL, 78, 3, 8, 0, 0, 0),
	(NULL, 79, 4, 8, 0, 0, 0),
	(NULL, 80, 5, 8, 1, 0, 1);




INSERT INTO iry.Trial (id, video) VALUES
	(NULL, 'video1'),
	(NULL, 'video2'),
	(NULL, 'video3'),
	(NULL, 'video4'),
	(NULL, 'video5'),
	(NULL, 'video6'),
	(NULL, 'video7'),
	(NULL, 'video8'),
	(NULL, 'video9'),
	(NULL, 'video10'),
	(NULL, 'video11'),
	(NULL, 'video12'),
	(NULL, 'video13'),
	(NULL, 'video14'),
	(NULL, 'video15'),
	(NULL, 'video16'),
	(NULL, 'video17'),
	(NULL, 'video18'),
	(NULL, 'video19'),
	(NULL, 'video20');

INSERT INTO iry.image (id, course_id, `path`, name, theOrder) VALUES
	(NULL, 1, "cm/cm.swf",  "Logo", 1),                      
	(NULL, 1, "cm/cdvi.swf", "Logo", 2),                   
	(NULL, 3, "schema/schema1.png",  "Panne Hydraulique", 1),                        
	(NULL, 3, "schema/schema2.png", "Panne Hydraulique", 2),                    
	(NULL, 3, "schema/schema3.png", "Panne Hydraulique", 3);


INSERT INTO `iry`.`step` (`id`, `course_id`, `name`, theOrder, `btn_name`, `btn_state`) VALUES (NULL, '2', 'Set Scroll to on', '1', 'btn_SCROLL', '1');
INSERT INTO `iry`.`step` (`id`, `course_id`, `name`, theOrder, `btn_name`, `btn_state`) VALUES (NULL, '2', 'Set Off1 to on', '2', 'btn_OFF1', '1');
INSERT INTO `iry`.`step` (`id`, `course_id`, `name`, theOrder, `btn_name`, `btn_state`) VALUES (NULL, '2', 'Turn Gene to on', '3', 'btn_GENE', '1');
INSERT INTO `iry`.`step` (`id`, `course_id`, `name`, theOrder, `btn_name`, `btn_state`) VALUES (NULL, '2', 'Push Pitot to on', '4', 'btn_PITOT', '1');
INSERT INTO `iry`.`step` (`id`, `course_id`, `name`, theOrder, `btn_name`, `btn_state`) VALUES (NULL, '2', 'Active Accu tests', '5', 'btn_ACCU TST', '1');

