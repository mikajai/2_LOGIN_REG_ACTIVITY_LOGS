CREATE TABLE accounts (
	user_id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR (255),
    user_firstname VARCHAR (255),
    user_lastname VARCHAR (255),
    password TEXT,
    date_added TIMESTAMP DEFAULT CURRENT_TIMESTAMP 
);

CREATE TABLE action_log (
    action_log_id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR (255),
    action_made VARCHAR (255),
    date_action_made TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE search_teacher_data (
    id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR (255),
    last_name VARCHAR (255),
    email VARCHAR (255),
    gender VARCHAR (255),
    date_of_birth DATE,
    phone_num VARCHAR (50), 
    highest_educational_attainment VARCHAR (255),
    institution VARCHAR (255),
    year_graduated VARCHAR (255),
    licensed VARCHAR (255),
    date_added TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO search_teacher_data (id, first_name, last_name, email, gender, date_of_birth, phone_num, highest_educational_attainment, institution, year_graduated, licensed, date_added) VALUES
(1, 'John', 'Doe', 'john.doe@example.com', 'Male', '1975-04-12', '09171234567', 'Master’s Degree', 'University of the Philippines', '1997', 'Yes', '2015-07-20 14:23:45'),
(2, 'Jane', 'Smith', 'jane.smith@example.com', 'Female', '1983-09-25', '09281234568', 'Bachelor’s Degree', 'Ateneo de Manila University', '2005', 'No', '2020-03-11 09:18:34'),
(3, 'Robert', 'Garcia', 'robert.garcia@example.com', 'Male', '1990-02-14', '09391234569', 'Doctorate', 'De La Salle University', '2014', 'Yes', '2023-01-15 11:56:28'),
(4, 'Maria', 'Cruz', 'maria.cruz@example.com', 'Female', '1987-05-03', '09491234560', 'Master’s Degree', 'University of Santo Tomas', '2010', 'Yes', '2008-06-22 08:45:12'),
(5, 'Carlos', 'Reyes', 'carlos.reyes@example.com', 'Male', '1995-11-19', '09501234561', 'Bachelor’s Degree', 'Polytechnic University of the Philippines', '2017', 'No', '2019-04-17 17:35:07'),
(6, 'Anna', 'Lopez', 'anna.lopez@example.com', 'Female', '1972-08-30', '09181234562', 'Doctorate', 'University of the Philippines', '1993', 'Yes', '2005-11-30 21:12:53'),
(7, 'Mark', 'Santos', 'mark.santos@example.com', 'Male', '1980-07-22', '09291234563', 'Master’s Degree', 'Ateneo de Manila University', '2002', 'No', '2021-08-03 15:09:23'),
(8, 'Sofia', 'Castro', 'sofia.castro@example.com', 'Female', '1993-01-15', '09301234564', 'Bachelor’s Degree', 'University of Santo Tomas', '2014', 'Yes', '2018-02-13 10:30:47'),
(9, 'Luis', 'Torres', 'luis.torres@example.com', 'Male', '1978-03-10', '09401234565', 'Doctorate', 'De La Salle University', '2001', 'Yes', '2012-05-20 16:47:58'),
(10, 'Elena', 'Mendoza', 'elena.mendoza@example.com', 'Female', '1985-06-27', '09511234566', 'Master’s Degree', 'Polytechnic University of the Philippines', '2008', 'No', '2024-06-29 13:42:30'),
(11, 'Francis', 'Aquino', 'francis.aquino@example.com', 'Male', '1992-10-01', '09191234567', 'Bachelor’s Degree', 'University of the Philippines', '2015', 'Yes', '2016-01-05 09:27:15'),
(12, 'Isabella', 'Velasco', 'isabella.velasco@example.com', 'Female', '1979-12-18', '09201234568', 'Doctorate', 'Ateneo de Manila University', '2002', 'Yes', '2009-07-15 22:19:39'),
(13, 'Miguel', 'Domingo', 'miguel.domingo@example.com', 'Male', '1998-04-05', '09311234569', 'Master’s Degree', 'De La Salle University', '2020', 'No', '2022-05-14 11:05:08'),
(14, 'Carmen', 'Navarro', 'carmen.navarro@example.com', 'Female', '1971-11-11', '09421234560', 'Bachelor’s Degree', 'University of Santo Tomas', '1992', 'Yes', '2003-04-18 18:32:51'),
(15, 'Eduardo', 'Hernandez', 'eduardo.hernandez@example.com', 'Male', '1984-09-06', '09531234561', 'Master’s Degree', 'Polytechnic University of the Philippines', '2006', 'No', '2017-12-09 14:08:33'),
(16, 'Patricia', 'Ramos', 'patricia.ramos@example.com', 'Female', '1996-02-23', '09101234562', 'Bachelor’s Degree', 'University of the Philippines', '2018', 'Yes', '2021-09-04 12:15:44'),
(17, 'Joseph', 'Rivera', 'joseph.rivera@example.com', 'Male', '1977-05-16', '09211234563', 'Doctorate', 'Ateneo de Manila University', '2000', 'Yes', '2014-03-26 10:25:59'),
(18, 'Angelica', 'Ortiz', 'angelica.ortiz@example.com', 'Female', '1991-01-20', '09321234564', 'Master’s Degree', 'De La Salle University', '2013', 'No', '2010-06-07 16:51:25'),
(19, 'Daniel', 'Bautista', 'daniel.bautista@example.com', 'Male', '1988-07-14', '09431234565', 'Bachelor’s Degree', 'University of Santo Tomas', '2011', 'Yes', '2020-08-01 07:29:16'),
(20, 'Lucia', 'Gutierrez', 'lucia.gutierrez@example.com', 'Female', '1976-02-07', '09541234566', 'Doctorate', 'Polytechnic University of the Philippines', '1999', 'Yes', '2013-01-18 13:17:02'),
(21, 'Fernando', 'Salazar', 'fernando.salazar@example.com', 'Male', '1982-06-24', '09111234567', 'Master’s Degree', 'University of the Philippines', '2004', 'No', '2007-10-29 20:59:37'),
(22,'Mariana', 'Santiago', 'mariana.santiago@example.com', 'Female', '1973-08-08', '09221234568', 'Doctorate', 'Ateneo de Manila University', '1995', 'Yes', '2011-11-22 09:46:11'),
(23, 'Javier', 'Flores', 'javier.flores@example.com', 'Male', '1994-10-30', '09331234569', 'Bachelor’s Degree', 'De La Salle University', '2016', 'No', '2023-02-11 18:14:28'),
(24, 'Andrea', 'Pascual', 'andrea.pascual@example.com', 'Female', '1986-12-05', '09451234560', 'Master’s Degree', 'University of Santo Tomas', '2009', 'Yes', '2019-05-21 08:33:56'),
(25, 'Ricardo', 'Nunez', 'ricardo.nunez@example.com', 'Male', '1970-04-02', '09561234561', 'Doctorate', 'Polytechnic University of the Philippines', '1991', 'Yes', '2002-12-05 19:22:44');
