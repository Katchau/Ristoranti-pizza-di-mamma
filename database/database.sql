DROP TABLE IF EXISTS User;
CREATE TABLE User(
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        firstName VARCHAR,
        lastName VARCHAR,
        birthday DATE,
        password VARCHAR,
        email VARCHAR UNIQUE,
        picture TEXT
);

DROP TABLE IF EXISTS Restaurant;
CREATE TABLE Restaurant(
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        name VARCHAR,
        adress VARCHAR,
        contacts VARCHAR,
        schedule VARCHAR,
        score FLOAT,
        numReviews INTEGER,
        sumScores INTEGER,
        owner_id INTEGER REFERENCES User
);

DROP TABLE IF EXISTS Review;
CREATE TABLE Review(
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        text VARCHAR,
        score REAL,
        id_restaurant INTEGER REFERENCES Restaurant,
        id_user INTEGER REFERENCES User,
        date DATE
);

DROP TABLE IF EXISTS Replie;
CREATE TABLE Replie(
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        text VARCHAR,
        id_user INTEGER REFERENCES User,
        id_rev INTEGER REFERENCES Review,
        date DATE
)

CREATE TRIGGER ScoreUpdate
AFTER INSERT ON Review
FOR EACH ROW
BEGIN
UPDATE Restaurant
SET sumScores=sumScores+NEW.score
WHERE id IN (SELECT Restaurant.id FROM Restaurant
						WHERE (Restaurant.id = NEW.id_restaurant)
						);
UPDATE Restaurant
SET numReviews = numReviews+1
WHERE id IN (SELECT Restaurant.id FROM Restaurant
						WHERE (Restaurant.id = NEW.id_restaurant)
						);
UPDATE Restaurant
SET score = sumScores*1.0/numReviews
WHERE id IN (SELECT Restaurant.id FROM Restaurant
						WHERE (Restaurant.id = NEW.id_restaurant)
						);
END;
