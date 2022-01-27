CREATE TRIGGER trigger_noteGlobale
AFTER INSERT ON notation
FOR EACH ROW UPDATE recette
SET noteGlobale = (SELECT AVG(noteDonnee) FROM notation WHERE notation.idRecette = recette.idRecette)
WHERE recette.idRecette = NEW.idRecette



DELIMITER //
CREATE TRIGGER trigger_verifTempsRecette
BEFORE INSERT ON recette
FOR EACH ROW
BEGIN
	IF NEW.tempsPreparation = 0 AND NEW.tempsCuisson = 0 THEN 
   		UPDATE recette SET tempsPreparation = NULL AND tempsCuisson = NULL WHERE idRecette = NEW.idRecette;
    END IF;
END; //
DELIMITER ;