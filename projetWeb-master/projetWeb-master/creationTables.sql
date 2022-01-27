CREATE TABLE CATEGORIE (
    idCategorie INT NOT NULL AUTO_INCREMENT, 
    nomCategorie VARCHAR(30) NOT NULL,
    CONSTRAINT pk_idCategorie PRIMARY KEY (idCategorie)
);

CREATE TABLE INGREDIENT (
    idIngredient INT NOT NULL AUTO_INCREMENT, 
    nomIngredient VARCHAR(255) NOT NULL,
    mesureIngredient VARCHAR(30),
    CONSTRAINT pk_idIngredient PRIMARY KEY (idIngredient) 
);

CREATE TABLE MEMBRE(
    pseudo VARCHAR(255) NOT NULL, 
    mdp VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    token VARCHAR(255),
    CONSTRAINT pk_pseudo PRIMARY KEY (pseudo)
);

CREATE TABLE RECETTE (
    idRecette INT NOT NULL AUTO_INCREMENT, 
    nomRecette VARCHAR(255) NOT NULL,
    imageRecette VARCHAR(255),
    descriptif VARCHAR(20000) NOT NULL,
    tempsPreparation INT NOT NULL,
    tempsCuisson INT NOT NULL,
    nbPersonnes INT NOT NULL,
    noteGlobale FLOAT,
    idCategorie INT NOT NULL,
    pseudo VARCHAR(255) NOT NULL,
    CONSTRAINT pk_idRecette PRIMARY KEY (idRecette),
    CONSTRAINT fk_idCategorie_RECETTE FOREIGN KEY (idCategorie) REFERENCES CATEGORIE(idCategorie) ON DELETE CASCADE,
    CONSTRAINT fk_pseudo_RECETTE FOREIGN KEY (pseudo) REFERENCES MEMBRE(pseudo) ON UPDATE CASCADE
);

CREATE TABLE COMPOSER (
    idRecette INT NOT NULL, 
    idIngredient INT NOT NULL,
    quantite INT,     
    CONSTRAINT pk_idRecette_idIngredient PRIMARY KEY (idRecette,idIngredient),
    CONSTRAINT fk_idRecette_COMPOSER FOREIGN KEY (idRecette) REFERENCES RECETTE(idRecette) ON DELETE CASCADE,
    CONSTRAINT fk_idIngredient_COMPOSER FOREIGN KEY (idIngredient) REFERENCES INGREDIENT(idIngredient) ON DELETE CASCADE
);


CREATE TABLE NOTATION (
    idRecette INT NOT NULL, 
    pseudo VARCHAR(255) NOT NULL,
    dateNote DATE NOT NULL,
    noteDonnee FLOAT NOT NULL CHECK (noteDonnee BETWEEN 0 AND 5),
    commentaireNote VARCHAR(10000) NOT NULL,
    CONSTRAINT pk_idRecette_pseudo PRIMARY KEY (idRecette,pseudo),
    CONSTRAINT fk_idRecette_NOTATION FOREIGN KEY (idRecette) REFERENCES RECETTE(idRecette) ON DELETE CASCADE,
    CONSTRAINT fk_pseudo_NOTATION FOREIGN KEY (pseudo) REFERENCES MEMBRE(pseudo) ON UPDATE CASCADE
);