USE BancaDelTempo;

DELIMITER //
CREATE TRIGGER prima_inserimento_scambio
    BEFORE INSERT ON Scambi
    FOR EACH ROW BEGIN

    DECLARE persona_domanda INT(11);
    DECLARE persona_offerta INT(11);
    DECLARE credito_domanda FLOAT;
    DECLARE credito_offerta FLOAT;
    DECLARE importo FLOAT;

    SET importo = NEW.Importo;

    SELECT I.idPersona, I.Credito INTO persona_domanda, credito_domanda
    FROM PersoneIscritte I, Annunci A
    WHERE I.idPersona = A.Persona
        AND A.idAnnuncio = NEW.Domanda;

    SELECT I.idPersona, I.Credito INTO persona_offerta, credito_offerta
    FROM PersoneIscritte I, Annunci A
    WHERE I.idPersona = A.Persona
        AND A.idAnnuncio = NEW.Offerta;

    IF (credito_offerta + importo > +20)
        OR (credito_domanda - importo < -20)
    THEN
        SIGNAL SQLSTATE '45000';
        SET NEW.Importo = NULL;
    ELSE
        UPDATE Persone
            SET Credito = Credito + importo WHERE idPersona = persona_offerta;
        UPDATE Persone
            SET Credito = Credito - importo WHERE idPersona = persona_domanda;
    END IF;

END//
DELIMITER ;


DELIMITER //
CREATE TRIGGER dopo_inserimento_scambio
    AFTER INSERT ON Scambi
    FOR EACH ROW BEGIN

    IF NEW.Importo = NULL
    THEN
        DELETE
        FROM Scambi
        WHERE Scambi.idScambio = New.idScambio;
    END IF;

END//
DELIMITER ;


DELIMITER //
CREATE TRIGGER prima_cancellazione_scambio
    BEFORE DELETE ON Scambi
    FOR EACH ROW BEGIN

    DECLARE persona_domanda INT(11);
    DECLARE persona_offerta INT(11);
    DECLARE credito_domanda FLOAT;
    DECLARE credito_offerta FLOAT;
    DECLARE importo FLOAT;

    SET importo = OLD.Importo;

    SELECT I.idPersona INTO persona_domanda
    FROM PersoneIscritte I, Annunci A
    WHERE I.idPersona = A.Persona
        AND A.idAnnuncio = OLD.Domanda;

    SELECT I.idPersona INTO persona_offerta
    FROM PersoneIscritte I, Annunci A
    WHERE I.idPersona = A.Persona
        AND A.idAnnuncio = OLD.Offerta;

    UPDATE Persone
        SET Credito = Credito - importo WHERE idPersona = persona_offerta;
    UPDATE Persone
        SET Credito = Credito + importo WHERE idPersona = persona_domanda;

END//
DELIMITER ;
