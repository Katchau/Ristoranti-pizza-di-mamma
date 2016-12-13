DROP TABLE IF EXISTS User;
CREATE TABLE User(
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        firstName VARCHAR,
        lastName VARCHAR,
        birthday DATE,
        password VARCHAR,
        picture VARCHAR,
        email VARCHAR UNIQUE
);

DROP TABLE IF EXISTS Restaurant;
CREATE TABLE Restaurant(
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        name VARCHAR,
        description VARCHAR,
        address VARCHAR,
        contacts VARCHAR,
        schedule VARCHAR,
        score FLOAT,
        numReviews INTEGER,
        sumScores INTEGER,
        owner_id INTEGER REFERENCES User,
        type VARCHAR
);

INSERT INTO Restaurant VALUES(NULL,'Zé do Pipo',"description",'Rua do FCP','123456789','10h-00h',0,0,0,1,'cafe');
INSERT INTO Restaurant VALUES(NULL,'Café Piolho',"description",'Rua do Piolho','9124192412','12h-02h',0,0,0,1,'cafe');
INSERT INTO Restaurant VALUES(NULL,'Zé do Manuel','BOAS','Rua do FCP','123456789','10h-00h',0,0,0,1,'cafe');
-- so pus isto assim que é para as linhas de cima não ficarem enormes
UPDATE Restaurant
SET description = 'An entire fraternity of strapping Wall-Street-bound youth. Hell - this is going to be a blood bath!'
WHERE name = 'Zé do Pipo';

UPDATE Restaurant
SET description = 'How to make a million dollars: First, get a million dollars.'
WHERE name = 'Café Piolho';

DROP TABLE IF EXISTS Review;
CREATE TABLE Review(
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        text VARCHAR,
        score REAL,
        id_restaurant INTEGER REFERENCES Restaurant,
        id_user INTEGER REFERENCES User,
        date DATE
);

DROP TABLE IF EXISTS Picture;
CREATE TABLE Picture(
		id INTEGER PRIMARY KEY AUTOINCREMENT,
		name VARCHAR,
		id_restaurant INTEGER REFERENCES Restaurant
);


INSERT INTO Picture VALUES(NULL,'zedopipo.jpg',1);
INSERT INTO Picture VALUES(NULL,'cafepiolho.jpg',1);
INSERT INTO Picture VALUES(NULL,'cafepiolho.jpg',2);

DROP TABLE IF EXISTS Replie;
CREATE TABLE Replie(
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        text VARCHAR,
        id_user INTEGER REFERENCES User,
        id_rev INTEGER REFERENCES Review,
        date DATE
);

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
