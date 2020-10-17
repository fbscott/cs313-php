# create the database
# CREATE DATABASE fuel;

# delete public schema and all tables
# DROP SCHEMA public CASCADE;
# create public schema
# CREATE SCHEMA public;

DROP TABLE IF EXISTS public.ledger;
DROP TABLE IF EXISTS public.filler;
DROP TABLE IF EXISTS public.vehicle;
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
   model VARCHAR(80) NOT NULL
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

INSERT INTO filler (username, first, last) VALUES ('s_currell', 'Scott', 'Currell');
INSERT INTO filler (username, first, last) VALUES ('sarahc', 'Sarah', 'Currell');

INSERT INTO vehicle (year, make, model) VALUES (1981, 'Jeep', 'Renegade');
INSERT INTO vehicle (year, make, model) VALUES (2000, 'Toyota', 'Camry');
INSERT INTO vehicle (year, make, model) VALUES (2006, 'Toyota', 'Sienna');
INSERT INTO vehicle (year, make, model) VALUES (2015, 'Nissan', 'Sentra');

-- Jeep
INSERT INTO fillUp (f_date, mileage, gallons, pricepergallon) VALUES ('2020-10-13', 120062, 14.41, 2.28);
INSERT INTO fillUp (f_date, mileage, gallons, pricepergallon) VALUES ('2020-10-06', 119863, 14.68, 2.25);
INSERT INTO fillUp (f_date, mileage, gallons, pricepergallon) VALUES ('2020-09-30', 119662, 14.12, 2.23);
INSERT INTO fillUp (f_date, mileage, gallons, pricepergallon) VALUES ('2020-09-23', 119462, 14.49, 2.23);

-- Camry
INSERT INTO fillUp (f_date, mileage, gallons, pricepergallon) VALUES ('2020-10-14', 214088, 17.77, 2.28);
INSERT INTO fillUp (f_date, mileage, gallons, pricepergallon) VALUES ('2020-10-07', 213638, 17.82, 2.25);
INSERT INTO fillUp (f_date, mileage, gallons, pricepergallon) VALUES ('2020-10-01', 213143, 17.97, 2.23);
INSERT INTO fillUp (f_date, mileage, gallons, pricepergallon) VALUES ('2020-09-24', 212648, 17.46, 2.23);

-- Sienna
INSERT INTO fillUp (f_date, mileage, gallons, pricepergallon) VALUES ('2020-10-15', 137236, 19.06, 2.28);
INSERT INTO fillUp (f_date, mileage, gallons, pricepergallon) VALUES ('2020-10-08', 136786, 19.89, 2.25);
INSERT INTO fillUp (f_date, mileage, gallons, pricepergallon) VALUES ('2020-10-02', 136366, 19.43, 2.23);
INSERT INTO fillUp (f_date, mileage, gallons, pricepergallon) VALUES ('2020-09-25', 135886, 19.87, 2.23);

-- Sentra
INSERT INTO fillUp (f_date, mileage, gallons, pricepergallon) VALUES ('2020-10-16', 83704, 10.12, 2.28);
INSERT INTO fillUp (f_date, mileage, gallons, pricepergallon) VALUES ('2020-10-09', 83354, 10.08, 2.25);
INSERT INTO fillUp (f_date, mileage, gallons, pricepergallon) VALUES ('2020-10-03', 83004, 10.06, 2.23);
INSERT INTO fillUp (f_date, mileage, gallons, pricepergallon) VALUES ('2020-09-26', 82654, 10.23, 2.23);

INSERT INTO ledger VALUES (DEFAULT, 1, 1, 1);
INSERT INTO ledger VALUES (DEFAULT, 1, 1, 2);
INSERT INTO ledger VALUES (DEFAULT, 1, 1, 3);
INSERT INTO ledger VALUES (DEFAULT, 1, 1, 4);
INSERT INTO ledger VALUES (DEFAULT, 1, 2, 5);
INSERT INTO ledger VALUES (DEFAULT, 1, 2, 6);
INSERT INTO ledger VALUES (DEFAULT, 1, 2, 7);
INSERT INTO ledger VALUES (DEFAULT, 1, 2, 8);
INSERT INTO ledger VALUES (DEFAULT, 1, 3, 9);
INSERT INTO ledger VALUES (DEFAULT, 1, 3, 10);
INSERT INTO ledger VALUES (DEFAULT, 1, 3, 11);
INSERT INTO ledger VALUES (DEFAULT, 1, 3, 12);
INSERT INTO ledger VALUES (DEFAULT, 2, 4, 13);
INSERT INTO ledger VALUES (DEFAULT, 2, 4, 14);
INSERT INTO ledger VALUES (DEFAULT, 2, 4, 15);
INSERT INTO ledger VALUES (DEFAULT, 2, 4, 16);

SELECT * FROM filler;
SELECT * FROM vehicle;
SELECT * FROM fillUp;
SELECT * FROM ledger;

-- SELECT * FROM filler AS f
SELECT f_date, mileage, gallons, pricepergallon
FROM filler AS f
JOIN ledger AS l
ON f.id = l.filler_id
JOIN fillup as u
ON u.id = l.fillup_id
JOIN vehicle as v
ON v.id = l.vehicle_id
WHERE f.first = 'Sarah';
