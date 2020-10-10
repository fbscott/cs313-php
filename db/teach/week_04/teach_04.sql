CREATE TABLE conference (
	conf_id		int PRIMARY KEY,
	month		int,
	year		int
);

CREATE TABLE speaker (
	speaker_id	int PRIMARY KEY,
	first		varchar(80),
	last		varchar(80),
	title		varchar(80)
);

CREATE TABLE member (
	user_id		int PRIMARY KEY,
	first		varchar(80),
	last		varchar(80),
	user_name	varchar(80),
	password	varchar(80)
);

CREATE TABLE session (
	session_id	int PRIMARY KEY,
	name		varchar(80)
);

CREATE TABLE note (
	note_id		int PRIMARY KEY,
	user_id		int REFERENCES member (user_id),
	conf_id		int REFERENCES conference (conf_id),
	speaker_id	int REFERENCES speaker (speaker_id),
	session_id	int REFERENCES session (session_id)
);

INSERT INTO conference VALUES (1, 10, 2020);
INSERT INTO speaker VALUES (1, 'Russell', 'Nelson', 'President');
INSERT INTO speaker VALUES (2, 'Dallin', 'Oaks', 'First Counselor');
INSERT INTO speaker VALUES (3, 'Jeffery', 'Holland', 'Apostle');
INSERT INTO member VALUES (1, 'John', 'Doe', 'johnDoe', '12345');
INSERT INTO session VALUES (1, 'Saturday Afternoon');
INSERT INTO note VALUES (1, 1, 1, 1, 1);
