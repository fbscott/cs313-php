-- create the database
-- CREATE DATABASE fuel;

-- delete public schema and all tables
-- DROP SCHEMA public CASCADE;
-- create public schema
-- CREATE SCHEMA public;

DROP TABLE IF EXISTS public.ledger;
DROP TABLE IF EXISTS public.vehicle;
DROP TABLE IF EXISTS public.filler;
DROP TABLE IF EXISTS public.fillUp;

CREATE TABLE public.filler (
   id SERIAL NOT NULL PRIMARY KEY,
   username VARCHAR(80) NOT NULL UNIQUE,
   first VARCHAR(80) NOT NULL,
   last VARCHAR(80) NOT NULL
);

CREATE TABLE public.vehicle (
   id SERIAL NOT NULL PRIMARY KEY,
   year SMALLINT NOT NULL,
   make VARCHAR(80) NOT NULL,
   model VARCHAR(80) NOT NULL,
   filler_id SMALLINT NOT NULL,
   CONSTRAINT fk_filler
      FOREIGN KEY(filler_id) 
         REFERENCES public.filler(id)
);

CREATE TABLE public.fillUp (
   id SERIAL NOT NULL PRIMARY KEY,
   f_date DATE NOT NULL,
   mileage INT NOT NULL,
   gallons DECIMAL(5, 2) NOT NULL,
   pricepergallon DECIMAL(5, 2) NOT NULL
);

CREATE TABLE public.ledger (
   id SERIAL NOT NULL PRIMARY KEY,
   filler_id SMALLINT NOT NULL,
   vehicle_id SMALLINT NOT NULL,
   fillUp_id SMALLINT NOT NULL,
   CONSTRAINT fk_filler
      FOREIGN KEY(filler_id) 
         REFERENCES public.filler(id),
   CONSTRAINT fk_vehicle
      FOREIGN KEY(vehicle_id) 
         REFERENCES public.vehicle(id),
   CONSTRAINT fk_fillUp
      FOREIGN KEY(fillUp_id) 
         REFERENCES public.fillUp(id)
);

INSERT INTO filler (username, first, last) VALUES ('doe_boi', 'John', 'Doe');
INSERT INTO filler (username, first, last) VALUES ('j@ned03', 'Jane', 'Doe');

INSERT INTO vehicle (year, make, model, filler_id) VALUES (1981, 'Jeep', 'Renegade', 1);
INSERT INTO vehicle (year, make, model, filler_id) VALUES (2000, 'Toyota', 'Camry', 1);
INSERT INTO vehicle (year, make, model, filler_id) VALUES (2006, 'Toyota', 'Sienna', 2);
INSERT INTO vehicle (year, make, model, filler_id) VALUES (2015, 'Nissan', 'Sentra', 2);

INSERT INTO fillUp (f_date, mileage, gallons, pricepergallon) VALUES ('2020-10-06', 119863, 14.68, 2.25);
INSERT INTO fillUp (f_date, mileage, gallons, pricepergallon) VALUES ('2020-10-13', 120062, 14.41, 2.28);
INSERT INTO fillUp (f_date, mileage, gallons, pricepergallon) VALUES ('2020-10-07', 213638, 17.82, 2.25);
INSERT INTO fillUp (f_date, mileage, gallons, pricepergallon) VALUES ('2020-10-14', 214088, 17.77, 2.28);
INSERT INTO fillUp (f_date, mileage, gallons, pricepergallon) VALUES ('2020-10-08', 136786, 19.89, 2.25);
INSERT INTO fillUp (f_date, mileage, gallons, pricepergallon) VALUES ('2020-10-15', 137236, 19.06, 2.28);
INSERT INTO fillUp (f_date, mileage, gallons, pricepergallon) VALUES ('2020-10-09', 83354, 10.08, 2.25);
INSERT INTO fillUp (f_date, mileage, gallons, pricepergallon) VALUES ('2020-10-16', 83704, 10.12, 2.28);

INSERT INTO ledger VALUES (DEFAULT, 1, 1, 1);
INSERT INTO ledger VALUES (DEFAULT, 1, 1, 2);
INSERT INTO ledger VALUES (DEFAULT, 1, 2, 3);
INSERT INTO ledger VALUES (DEFAULT, 1, 2, 4);
INSERT INTO ledger VALUES (DEFAULT, 2, 3, 5);
INSERT INTO ledger VALUES (DEFAULT, 2, 3, 6);
INSERT INTO ledger VALUES (DEFAULT, 2, 4, 7);
INSERT INTO ledger VALUES (DEFAULT, 2, 4, 8);

SELECT * FROM filler;
SELECT * FROM vehicle;
SELECT * FROM fillUp;
SELECT * FROM ledger;

SELECT f_date, mileage, gallons, pricepergallon
FROM filler AS f
JOIN ledger AS l
ON f.id = l.filler_id
JOIN fillup as u
ON u.id = l.fillup_id
JOIN vehicle as v
ON v.id = l.vehicle_id
WHERE f.first = 'Sarah'
AND v.year = 2015
AND v.make = 'Nissan'
AND v.model = 'Sentra';

-- SELECT DISTINCT username, first, last, year, make, model, f_date, mileage, gallons, pricepergallon, filler_id, vehicle_id, fillUp_id
SELECT DISTINCT username, first, last, filler_id
FROM filler AS f
JOIN ledger AS l
ON f.id = l.filler_id
WHERE f.id = 1;

/*
DELETE
FROM ledger as l
WHERE l.fillup_id = 11;
*/

/*
SELECT
FROM fillup
USING ledger
WHERE fillup.id = ledger.fillup_id;
*/

SELECT *
FROM fillup
WHERE id = 11;

DELETE
FROM ledger
WHERE fillup_id = 11;

DELETE
FROM fillup
WHERE id = 11;
