CREATE TABLE scriptures (
   id SERIAL PRIMARY KEY,
   book VARCHAR(80) NOT NULL,
   chapter INT NOT NULL,
   verse INT NOT NULL,
   content TEXT NOT NULL
);

INSERT INTO scriptures VALUES (
   DEFAULT,
   'John',
   1,
   5,
   'And the light shineth in darkness; and the darkness comprehended it not.'
);

INSERT INTO scriptures VALUES (
   DEFAULT,
   'Doctrine and Covenants',
   88,
   49,
   'The light shineth in darkness, and the darkness comprehendeth it not; nevertheless, the day shall come when you shall comprehend even God, being quickened in him and by him.'
);

INSERT INTO scriptures VALUES (
   DEFAULT,
   'Doctrine and Covenants',
   93,
   28,
       'He that keepeth his commandments receiveth truth and light, until he is glorified in truth and knoweth all things.'
);

INSERT INTO scriptures VALUES (
   DEFAULT,
   'Mosiah',
   16,
   9,
      'He is the light and the life of the world; yea, a light that is endless, that can never be darkened; yea, and also a life which is endless, that there can be no more death.'
);
