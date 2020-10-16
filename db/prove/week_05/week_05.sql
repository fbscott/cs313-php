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

INSERT INTO filler (username, first, last) VALUES ('doe_boy_12', 'John', 'Doe');
INSERT INTO filler (username, first, last) VALUES ('j_doe', 'Jane', 'Doe');

INSERT INTO vehicle (year, make, model) VALUES (2010, 'Jeep', 'Wrangler');
INSERT INTO vehicle (year, make, model) VALUES (1980, 'Datsun', '510');

INSERT INTO fillUp (f_date, mileage, gallons, pricepergallon) VALUES ('2020-10-13', 212862, 15.25, 2.14);
INSERT INTO fillUp (f_date, mileage, gallons, pricepergallon) VALUES ('2020-10-06', 212430, 15.17, 2.12);
INSERT INTO fillUp (f_date, mileage, gallons, pricepergallon) VALUES ('2020-09-30', 212011, 15.26, 2.10);

INSERT INTO ledger VALUES (DEFAULT, 1, 1, 1);
INSERT INTO ledger VALUES (DEFAULT, 2, 2, 2);

SELECT * FROM filler;
SELECT * FROM vehicle;
SELECT * FROM fillUp;
SELECT * FROM ledger;