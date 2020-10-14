# 05 Prepare : Basic Queries
# Source: https://content.byui.edu/file/14882098-ce1f-44ba-a196-a7aebcb3d5ce/1/week05/prepare-basic-query.html

# Create table(s)
CREATE TABLE note_user (
   id SERIAL,
   username VARCHAR(255),
   password VARCHAR(255),
   PRIMARY KEY (id)
);

CREATE TABLE note (
   id SERIAL,
   userId INT NOT NULL,
   content TEXT,
   PRIMARY KEY (id),
   FOREIGN KEY (userId) REFERENCES note_user (id)
);

# INSERT INTO tableName (column1, column2, etc.) VALUES (value1, value2, etc.);
# Specifying column names is not required

# Add users
INSERT INTO note_user (username, password) VALUES ('john', 'pass');
INSERT INTO note_user (username, password) VALUES ('jane', 'byui');

# Add notes
INSERT INTO note (userId, content) VALUES (1, 'A note for John');
INSERT INTO note (userId, content) VALUES (1, 'Another note for John');
INSERT INTO note (userId, content) VALUES (2, 'And this is a note for Jane');

# Query (retrieve) data
# SELECT columnNames FROM tableName;
SELECT * FROM note_user;

# Query from specific columns
SELECT password, username FROM note_user;

# Restricted queries
# SELECT columnNames FROM tableName WHERE conditions;
SELECT * FROM note_user WHERE username = 'john';
SELECT * FROM note_user WHERE id > 1;

# SELECT with ORDER BY clause
SELECT * FROM note_user ORDER BY username;
SELECT * FROM note_user ORDER BY username DESC; # DESC === descending

# SELECT from one user
# Only works if you know the id
SELECT * FROM note where userID = 1;

# Better way is to use JOIN
# > SELECT columns FROM table1 AS t1
# > JOIN table2 AS t2
# > ON t1.column = t2.column
# > [plus additional clauses as needed. I.e., WHERE];
SELECT * FROM note_user AS u
JOIN note AS n
ON u.id = n.userId
WHERE u.username = 'john';

# Or to get just the contents
SELECT n.content FROM note_user AS u
JOIN note AS n
ON u.id = n.userId
WHERE u.username = 'john';
