ALTER TABLE db555786140.Helicopter AUTO_INCREMENT = 0;
ALTER TABLE db555786140.SubTheme AUTO_INCREMENT = 0;
ALTER TABLE db555786140.TypeCourse AUTO_INCREMENT = 0;
ALTER TABLE db555786140.Course AUTO_INCREMENT = 0;
ALTER TABLE db555786140.Theme AUTO_INCREMENT = 0;
ALTER TABLE db555786140.Pilot AUTO_INCREMENT = 0;
ALTER TABLE db555786140.Result AUTO_INCREMENT = 0;


SET foreign_key_checks = 0;

INSERT INTO db555786140.Helicopter (id, name, type) VALUES
	(NULL, "EC120B", "Civil"),
	(NULL, "Ecureuil AS350B3e", "Civil"),
	(NULL, "Ecureuil AS350B2", "Civil"),
	(NULL, "EC135", "Civil"),
	(NULL, "EC145", "Civil"),
	(NULL, "Dauphin", "Civil"),
	(NULL, "Super Puma", "Civil"),
	(NULL, "EC175", "Civil"),
	(NULL, "Fennec", "Military"),
	(NULL, "Panther", "Military"),
	(NULL, "Cougar", "Military");

INSERT INTO db555786140.Theme (id, helicopter_id, name) VALUES
	(NULL, "2", "Hydrolic system"),
	(NULL, "2", "Startup");

INSERT INTO db555786140.SubTheme (id, theme_id, name) VALUES
	(NULL, "1", "Servo control"),
	(NULL, "1", "Main rotor servocontrols"),
	(NULL, "1", "Tail rotor servocontrol"),
	(NULL, "1", "Hydraulic system"),
	(NULL, "1", "Limitations"),
	(NULL, "1", "MMEL"),
	(NULL, "1", "Emergency procedures");

INSERT INTO db555786140.Pilot (id, name) VALUES
    (NULL, 'Tarek'),
    (NULL, 'Andy'),
    (NULL, 'Warso'),
    (NULL, 'Yassine'),
    (NULL, 'Florent');	

INSERT INTO db555786140.TypeCourse (id, name) VALUES
	(NULL, "Theorical Course"),
	(NULL, "Demonstrative Course"),
	(NULL, "Immersive Movie"),
	(NULL, "Practical Training");

INSERT INTO db555786140.Course (id, subTheme_id, name, typeCourse_id) VALUES
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
	(NULL, "7", "Load factor",                                    "3");

INSERT INTO db555786140.Step (id, course_id, name, `order`) VALUES
	(NULL, 1, 'demarage', 1),
	(NULL, 1, 'stabilisation', 2),
	(NULL, 1, 'tests', 3),
	(NULL, 1, 'decollage', 4),
	(NULL, 2, 'demarage', 1),
	(NULL, 2, 'stabilisation', 2),
	(NULL, 2, 'tests', 3),
	(NULL, 2, 'decollage', 4);



INSERT INTO db555786140.Result (id, trial_id, pilot_id, step_id, isError, isFavorite, isGlobal) VALUES
	(NULL,  1, 1, 1, 0, 0, 1),
	(NULL,  2, 1, 1, 0, 0, 1),
	(NULL,  3, 1, 1, 0, 0, 1),
	(NULL,  4, 1, 1, 1, 0, 1),
	(NULL,  5, 1, 1, 0, 0, 1),
	(NULL,  6, 1, 1, 0, 0, 1),
	(NULL,  7, 1, 1, 1, 0, 1),
	(NULL,  8, 1, 1, 0, 0, 1),
	(NULL,  9, 1, 1, 1, 0, 1),
	(NULL, 10, 1 , 1, 0, 0, 1),

	(NULL, 11, 1, 1, 1, 0, 0),
	(NULL, 12, 1, 1, 1, 0, 0),
	(NULL, 13, 1, 1, 0, 0, 0),
	(NULL, 14, 1, 1, 0, 0, 0),
	(NULL, 15, 1, 1, 1, 0, 0),
	(NULL, 16, 1, 1, 0, 0, 0),
	(NULL, 17, 1, 1, 1, 0, 0),
	(NULL, 18, 1, 1, 0, 0, 0),
	(NULL, 19, 1, 1, 0, 0, 0),
	(NULL, 20, 1, 1, 0, 0, 0),



	(NULL, 21, 1, 2, 0, 0, 1),
	(NULL, 22, 1, 2, 0, 0, 1),
	(NULL, 23, 1, 2, 0, 0, 1),
	(NULL, 24, 1, 2, 0, 0, 1),
	(NULL, 25, 1, 2, 0, 0, 1),
	(NULL, 26, 1, 2, 0, 0, 1),
	(NULL, 27, 1, 2, 0, 0, 1),
	(NULL, 28, 1, 2, 0, 0, 1),
	(NULL, 29, 1, 2, 1, 0, 1),
	(NULL, 30, 1, 2, 0, 0, 1),

	(NULL, 31, 1, 2, 0, 0, 0),
	(NULL, 32, 1, 2, 1, 0, 0),
	(NULL, 33, 1, 2, 1, 0, 0),
	(NULL, 34, 1, 2, 1, 0, 0),
	(NULL, 35, 1, 2, 0, 0, 0),
	(NULL, 36, 1, 2, 0, 0, 0),
	(NULL, 37, 1, 2, 1, 0, 0),
	(NULL, 38, 1, 2, 0, 0, 0),
	(NULL, 39, 1, 2, 0, 0, 0),
	(NULL, 40, 1, 2, 1, 0, 0),



	(NULL, 41, 1, 3, 0, 0, 1),
	(NULL, 42, 1, 3, 0, 0, 1),
	(NULL, 43, 1, 3, 0, 0, 1),
	(NULL, 44, 1, 3, 1, 0, 1),
	(NULL, 45, 1, 3, 1, 0, 1),
	(NULL, 46, 1, 3, 0, 0, 1),
	(NULL, 47, 1, 3, 0, 0, 1),
	(NULL, 48, 1, 3, 0, 0, 1),
	(NULL, 49, 1, 3, 1, 0, 1),
	(NULL, 50, 1, 3, 0, 0, 1),

	(NULL, 51, 1, 3, 0, 0, 0),
	(NULL, 52, 1, 3, 1, 0, 0),
	(NULL, 53, 1, 3, 0, 0, 0),
	(NULL, 54, 1, 3, 0, 0, 0),
	(NULL, 55, 1, 3, 0, 0, 0),
	(NULL, 56, 1, 3, 0, 0, 0),
	(NULL, 57, 1, 3, 0, 0, 0),
	(NULL, 58, 1, 3, 0, 0, 0),
	(NULL, 59, 1, 3, 0, 0, 0),
	(NULL, 60, 1, 3, 1, 0, 0),



	(NULL, 61, 1, 4, 0, 0, 1),
	(NULL, 62, 1, 4, 0, 0, 1),
	(NULL, 63, 1, 4, 0, 0, 1),
	(NULL, 64, 1, 4, 1, 0, 1),
	(NULL, 65, 1, 4, 1, 0, 1),
	(NULL, 66, 1, 4, 0, 0, 1),
	(NULL, 67, 1, 4, 0, 1, 1),
	(NULL, 68, 1, 4, 0, 1, 1),
	(NULL, 69, 1, 4, 1, 0, 1),
	(NULL, 70, 1, 4, 0, 1, 1),

	(NULL, 71, 1, 4, 0, 1, 0),
	(NULL, 72, 1, 4, 1, 1, 0),
	(NULL, 73, 1, 4, 0, 1, 0),
	(NULL, 74, 1, 4, 0, 0, 0),
	(NULL, 75, 1, 4, 0, 0, 0),
	(NULL, 76, 1, 4, 0, 0, 0),
	(NULL, 77, 1, 4, 0, 1, 0),
	(NULL, 78, 1, 4, 0, 0, 0),
	(NULL, 79, 1, 4, 0, 0, 0),
	(NULL, 80, 1, 4, 1, 0, 0);







	SET foreign_key_checks = 1;