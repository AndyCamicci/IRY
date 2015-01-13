ALTER TABLE db555786140.Helicopter AUTO_INCREMENT = 0;
ALTER TABLE db555786140.SubTheme AUTO_INCREMENT = 0;
ALTER TABLE db555786140.TypeCourse AUTO_INCREMENT = 0;
ALTER TABLE db555786140.Course AUTO_INCREMENT = 0;
ALTER TABLE db555786140.Theme AUTO_INCREMENT = 0;
ALTER TABLE db555786140.Pilot AUTO_INCREMENT = 0;
ALTER TABLE db555786140.Result AUTO_INCREMENT = 0;


SET foreign_key_checks = 0;

INSERT INTO db555786140.Helicopter (id, name, type, imgHelico) VALUES
	(NULL, "EC120B", "Civil", "imgHelico1"),
	(NULL, "Ecureuil AS350B3e", "Civil", "imgHelico2"),
	(NULL, "Ecureuil AS350B2", "Civil", "imgHelico3"),
	(NULL, "EC135", "Civil", "imgHelico4"),
	(NULL, "EC145", "Civil", "imgHelico5"),
	(NULL, "Dauphin", "Civil", "imgHelico6"),
	(NULL, "Super Puma", "Civil", "imgHelico7"),
	(NULL, "EC175", "Civil", "imgHelico8"),
	(NULL, "Fennec", "Military", "imgHelico9"),
	(NULL, "Panther", "Military", "imgHelico10"),
	(NULL, "Cougar", "Military", "imgHelico11");

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




INSERT INTO db555786140.Result (id, trial_id, pilot_id, step_id, isError, isFavorite, isGlobal) VALUES
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




INSERT INTO db555786140.Trial (id, video) VALUES
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



INSERT INTO db555786140.Schema (id, img) VALUES
	(NULL, 'img1'),
	(NULL, 'img2'),
	(NULL, 'img3'),
	(NULL, 'img4'),
	(NULL, 'img5'),
	(NULL, 'img6'),
	(NULL, 'img7'),
	(NULL, 'img8'),
	(NULL, 'img9'),
	(NULL, 'img10'),
	(NULL, 'img11'),
	(NULL, 'img12'),
	(NULL, 'img13'),
	(NULL, 'img14'),
	(NULL, 'img15'),
	(NULL, 'img16'),
	(NULL, 'img17'),
	(NULL, 'img18'),
	(NULL, 'img19'),
	(NULL, 'img20');







	SET foreign_key_checks = 1;