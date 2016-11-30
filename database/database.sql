DROP TABLE IF EXISTS User;
CREATE TABLE User(
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        firstName VARCHAR,
        lastName VARCHAR,
        password VARCHAR,
        email VARCHAR UNIQUE
);

INSERT INTO User VALUES(NULL,'José','Monteiro','ola123','j.pedroteixeira.monteiro@gmail.com');
INSERT INTO User VALUES(NULL,'Jonas','Loureiro','adeus123','jonas_loureiro@outlook.com');
INSERT INTO User VALUES(NULL,'Bruno','Barros','epa123','brunobarros@gmail.com');

DROP TABLE IF EXISTS Restaurant;
CREATE TABLE Restaurant(
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        name VARCHAR,
        adress VARCHAR,
        contacts VARCHAR,
        schedule VARCHAR,
        score FLOAT,
        numReviews INTEGER,
        sumScores INTEGER
);

INSERT INTO Restaurant VALUES(NULL,'Zé do Pipo','Rua do FCP','123456789','10h-00h',0,0,0);
INSERT INTO Restaurant VALUES(NULL,'Café Piolho','Rua do Piolho','9124192412','12h-02h',0,0,0);
INSERT INTO Restaurant VALUES(NULL,'Albufeira','Rua do Tamega','1241353541','12h-22h',0,0,0);

DROP TABLE IF EXISTS Review;
CREATE TABLE Review(
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        text VARCHAR,
        score REAL,
        id_restaurant INTEGER REFERENCES Restaurant,
        id_user INTEGER REFERENCES User
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



INSERT INTO Review VALUES(NULL,'orem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas et volutpat enim. Quisque placerat orci eu quam eleifend facilisis. Ut finibus id eros feugiat sodales. ' ||
                    'Cras rhoncus imperdiet tempus. Mauris a accumsan dui, in pretium elit. Ut ultrices nulla at mauris egestas, vel eleifend nisl mattis. Vivamus in erat vel lacus aliquam facil' ||
                    'isis vel in lectus. Aliquam malesuada magna eget augue eleifend porta. Morbi eu cursus ex, vel rutrum nulla. Aenean ut ante at libero maximus tempor.',4,1,2);
INSERT INTO Review VALUES(NULL,'orem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas et volutpat enim. Quisque placerat orci eu quam eleifend facilisis. Ut finibus id eros feugiat sodales. ' ||
                    'Cras rhoncus imperdiet tempus. Mauris a accumsan dui, in pretium elit. Ut ultrices nulla at mauris egestas, vel eleifend nisl mattis. Vivamus in erat vel lacus aliquam facil' ||
                    'isis vel in lectus. Aliquam malesuada magna eget augue eleifend porta. Morbi eu cursus ex, vel rutrum nulla. Aenean ut ante at libero maximus tempor.',5,1,1);
INSERT INTO Review VALUES(NULL,'orem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas et volutpat enim. Quisque placerat orci eu quam eleifend facilisis. Ut finibus id eros feugiat sodales. ' ||
                    'Cras rhoncus imperdiet tempus. Mauris a accumsan dui, in pretium elit. Ut ultrices nulla at mauris egestas, vel eleifend nisl mattis. Vivamus in erat vel lacus aliquam facil' ||
                    'isis vel in lectus. Aliquam malesuada magna eget augue eleifend porta. Morbi eu cursus ex, vel rutrum nulla. Aenean ut ante at libero maximus tempor.',3,2,1);
INSERT INTO Review VALUES(NULL,'orem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas et volutpat enim. Quisque placerat orci eu quam eleifend facilisis. Ut finibus id eros feugiat sodales. ' ||
                    'Cras rhoncus imperdiet tempus. Mauris a accumsan dui, in pretium elit. Ut ultrices nulla at mauris egestas, vel eleifend nisl mattis. Vivamus in erat vel lacus aliquam facil' ||
                    'isis vel in lectus. Aliquam malesuada magna eget augue eleifend porta. Morbi eu cursus ex, vel rutrum nulla. Aenean ut ante at libero maximus tempor.',4,3,3);
INSERT INTO Review VALUES(NULL,'orem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas et volutpat enim. Quisque placerat orci eu quam eleifend facilisis. Ut finibus id eros feugiat sodales. ' ||
                    'Cras rhoncus imperdiet tempus. Mauris a accumsan dui, in pretium elit. Ut ultrices nulla at mauris egestas, vel eleifend nisl mattis. Vivamus in erat vel lacus aliquam facil' ||
                    'isis vel in lectus. Aliquam malesuada magna eget augue eleifend porta. Morbi eu cursus ex, vel rutrum nulla. Aenean ut ante at libero maximus tempor.',5,2,1);