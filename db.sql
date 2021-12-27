CREATE TABLE login(
	loginID INTEGER UNIQUE AUTO_INCREMENT,
	email VARCHAR(50) NULL,
	pass VARCHAR(257) NULL,
	primary key(loginID)
);

CREATE TABLE information(
	infoID INTEGER UNIQUE AUTO_INCREMENT
	loginID INTEGER NOT NULL,
	projectID INTEGER NULL,
	bugID INTEGER NULL,
	notes VARCHAR(700) NULL,
	primary key(infoID)
);

CREATE TABLE messages(
	messageID INTEGER UNIQUE AUTO_INCREMENT
	fromID INTEGER NOT NULL,
	toID INTEGER NOT NULL,
	messageSubject VARCHAR(200) NULL,
	message VARCHAR(700) NULL,
	primary key(messageID)
);

CREATE TABLE projects(
	projectID INTEGER UNIQUE AUTO_INCREMENT
	loginID INTEGER NOT NULL,
	projectDesc VARCHAR(100) NULL,
	tools VARCHAR(100) NULL,
	primary key(projectID) 
);
CREATE TABLE bugs(
	bugID INTEGER UNIQUE AUTO_INCREMENT
	loginID INTEGER NOT NULL,
	message VARCHAR(500)NULL,
	projectID INTEGER NULL,
	primary key(bugID)
);


