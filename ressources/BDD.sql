ALTER TABLE helicopter AUTO_INCREMENT = 0;
ALTER TABLE subtheme AUTO_INCREMENT = 0;
ALTER TABLE typecourse AUTO_INCREMENT = 0;
ALTER TABLE course AUTO_INCREMENT = 0;
ALTER TABLE theme AUTO_INCREMENT = 0;


SET foreign_key_checks = 0;

INSERT INTO iry.helicopter (id, name, type) VALUES
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

INSERT INTO iry.theme (id, helicopter_id, subtheme_id, name) VALUES
	(NULL, "2", "4", "Hydrolic system"),
	(NULL, "2", "1", "Startup");

INSERT INTO iry.subtheme (id, theme_id, name) VALUES
	(NULL, "2", "Servo control"),
	(NULL, "2", "Main rotor servocontrols"),
	(NULL, "2", "Tail rotor servocontrol"),
	(NULL, "2", "Hydraulic system"),
	(NULL, "2", "Limitations"),
	(NULL, "2", "MMEL"),
	(NULL, "2", "Emergency procedures");

INSERT INTO iry.typecourse (id, name) VALUES
	(NULL, "Theorical Course"),
	(NULL, "Demonstrative Course"),
	(NULL, "Immersive Movie"),
	(NULL, "Practical Training");

INSERT INTO iry.course (id, theme_id, name, typeCourse_id) VALUES
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

	SET foreign_key_checks = 1;