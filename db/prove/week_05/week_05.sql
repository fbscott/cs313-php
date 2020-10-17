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

INSERT INTO fillUp (f_date, mileage, gallons, pricepergallon) VALUES ('2020-10-13', 1900, 15.00, 1.01);
INSERT INTO fillUp (f_date, mileage, gallons, pricepergallon) VALUES ('2020-10-06', 1600, 15.00, 1.02);
INSERT INTO fillUp (f_date, mileage, gallons, pricepergallon) VALUES ('2020-09-30', 1300, 15.00, 1.03);
INSERT INTO fillUp (f_date, mileage, gallons, pricepergallon) VALUES ('2020-09-23', 1000, 15.00, 1.04);
INSERT INTO fillUp (f_date, mileage, gallons, pricepergallon) VALUES ('2020-10-14', 2900, 16.00, 2.01);
INSERT INTO fillUp (f_date, mileage, gallons, pricepergallon) VALUES ('2020-10-07', 2600, 16.00, 2.02);
INSERT INTO fillUp (f_date, mileage, gallons, pricepergallon) VALUES ('2020-10-01', 2300, 16.00, 2.03);
INSERT INTO fillUp (f_date, mileage, gallons, pricepergallon) VALUES ('2020-09-24', 2000, 16.00, 2.04);
INSERT INTO fillUp (f_date, mileage, gallons, pricepergallon) VALUES ('2020-10-15', 3900, 17.00, 3.01);
INSERT INTO fillUp (f_date, mileage, gallons, pricepergallon) VALUES ('2020-10-08', 3600, 17.00, 3.02);
INSERT INTO fillUp (f_date, mileage, gallons, pricepergallon) VALUES ('2020-10-02', 3300, 17.00, 3.03);
INSERT INTO fillUp (f_date, mileage, gallons, pricepergallon) VALUES ('2020-09-25', 3000, 17.00, 3.04);
INSERT INTO fillUp (f_date, mileage, gallons, pricepergallon) VALUES ('2020-10-16', 4900, 18.00, 4.01);
INSERT INTO fillUp (f_date, mileage, gallons, pricepergallon) VALUES ('2020-10-09', 4600, 18.00, 4.02);
INSERT INTO fillUp (f_date, mileage, gallons, pricepergallon) VALUES ('2020-10-03', 4300, 18.00, 4.03);
INSERT INTO fillUp (f_date, mileage, gallons, pricepergallon) VALUES ('2020-09-26', 4000, 18.00, 4.04);

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
