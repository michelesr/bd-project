USE BancaDelTempo;
DELIMITER //
CREATE PROCEDURE inserisciPersona(IN nMail VARCHAR(45), 
                                  IN nPassword VARCHAR(32),
				  IN nNome VARCHAR(30),
				  IN nCognome VARCHAR(30),
				  IN nTelefono CHAR(11),
				  IN nDataDiNascita DATE,
				  IN nNumeroCivico VARCHAR(10),
				  IN nPresentazione VARCHAR(200),
				  IN nZona INT(11),
				  IN nIndirizzo INT(11),
				  IN nSesso ENUM('M', 'F'))
    BEGIN
        Insert into Persone (Mail, Password, Nome, Cognome, Sesso, Telefono,
	                     DataDiNascita, Indirizzo, Zona, NumeroCivico, Presentazione)
	VALUES (nMail, MD5(nPassword), nNome, nCognome, nSesso, nTelefono, 
	        nDataDiNascita, nIndirizzo, nZona, nNumeroCivico, nPresentazione);
    END // 
DELIMITER ;

DELIMITER //
CREATE PROCEDURE inserisciTesseramento(IN nPersona INT(11), 
                                       IN nImporto INT(11),
				       IN nData DATE)
				       
    BEGIN
        Insert into Tesseramenti (Persona, Importo, Data)
	VALUES (nPersona, nImporto, nData);
    END // 
DELIMITER ;

DELIMITER //
CREATE PROCEDURE modificaPersona(IN nMail VARCHAR(45), 
                                 IN nPassword VARCHAR(32),
				 IN nNome VARCHAR(30),
				 IN nCognome VARCHAR(30),
		        	 IN nTelefono CHAR(11),
				 IN nDataDiNascita DATE,
				 IN nNumeroCivico VARCHAR(10),
				 IN nPresentazione VARCHAR(200),
				 IN nZona INT(11),
				 IN nIndirizzo INT(11),
				 IN nSesso ENUM('M', 'F'),
                                 IN nidPersona INT(11))
    BEGIN
        UPDATE Persone SET Mail=nMail, Password=MD5(nPassword), Nome=nNome,
	Cognome=nCognome, Telefono=nTelefono, DataDiNascita=nDataDiNascita,
	NumeroCivico=nNumeroCivico, Presentazione=nPresentazione, Zona=nZona,
	Indirizzo=nIndirizzo, Sesso=nSesso WHERE idPersona = nidPersona; 
    END // 
DELIMITER ;

DELIMITER //
CREATE PROCEDURE attivaAnnuncio(IN id INT(11)) 
				       
    BEGIN
        UPDATE Annunci SET Attivo = true WHERE idAnnuncio=id;
    END // 
DELIMITER ;

DELIMITER //
CREATE PROCEDURE disattivaAnnuncio(IN id INT(11)) 
				       
    BEGIN
        UPDATE Annunci SET Attivo = false WHERE idAnnuncio=id;
    END // 
DELIMITER ;
