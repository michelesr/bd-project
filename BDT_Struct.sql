DROP DATABASE IF EXISTS BancaDelTempo;
CREATE DATABASE BancaDelTempo DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE BancaDelTempo;

CREATE TABLE `Zone` (
  `idZona` INT(11) NOT NULL AUTO_INCREMENT,
  `Zona` VARCHAR(6) NOT NULL,
  PRIMARY KEY (`idZona`),
  UNIQUE `uk_Zona` (`Zona`) 
) ENGINE=INNODB; 

CREATE TABLE `Indirizzi` (
  `idIndirizzo` INT(11) NOT NULL AUTO_INCREMENT,
  `Indirizzo` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idIndirizzo`),
  UNIQUE `uk_Indirizzo` (`Indirizzo`)
) ENGINE=INNODB;

CREATE TABLE `Categorie` (
  `idCategoria` INT(11) NOT NULL AUTO_INCREMENT,
  `Categoria` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idCategoria`),
  UNIQUE `uk_Categoria` (`Categoria`)
) ENGINE=INNODB; 

CREATE TABLE `Servizi` (
  `idServizio` INT(11) NOT NULL AUTO_INCREMENT,
  `Servizio` VARCHAR(45) NOT NULL,
  `Categoria` INT(11) NOT NULL,
  PRIMARY KEY (`idServizio`),
  UNIQUE `uk_Servizio` (`Servizio`),
  CONSTRAINT `fk_Categoria` FOREIGN KEY (`Categoria`) REFERENCES `Categorie` (`idCategoria`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=INNODB; 

CREATE TABLE `Persone` (
  `idPersona` INT(11) NOT NULL AUTO_INCREMENT,
  `Mail` VARCHAR(45) NOT NULL,
  `Password` CHAR(32) NOT NULL,
  `Credito` FLOAT NOT NULL DEFAULT 0,
  `Nome` VARCHAR(30) NOT NULL,
  `Cognome` VARCHAR(30) NOT NULL,
  `Sesso` ENUM('M', 'F') NOT NULL,
  `Telefono` CHAR(11),
  `DataDiNascita` DATE NOT NULL,
  `Indirizzo` INT(11) NOT NULL,
  `Zona` INT(11) NOT NULL,
  `NumeroCivico` VARCHAR(10) DEFAULT NULL,
  `Presentazione` VARCHAR(200) DEFAULT NULL,
  PRIMARY KEY (`idPersona`),
  UNIQUE `uk_Mail` (`Mail`),
  UNIQUE `uk_NomeCognome` (`Nome`, `Cognome`),
  CONSTRAINT `fk_Indirizzo` FOREIGN KEY (`Indirizzo`) REFERENCES `Indirizzi` (`idIndirizzo`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `fk_Zona` FOREIGN KEY (`Zona`) REFERENCES `Zone` (`idZona`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=INNODB;

/* controlli da implementare
Credito: -20 < x < 20
DataDiNascita: eta >= 18 */

CREATE TABLE `Tesseramenti` (
    `idTesseramento` INT(11) NOT NULL AUTO_INCREMENT,
    `Persona` INT(11) NOT NULL,
    `Data` DATE NOT NULL,
    `Importo` INT(11) NOT NULL DEFAULT 10,
    PRIMARY KEY (`idTesseramento`),
    UNIQUE `fk_Persona_1` (`Persona`, `Data`),
    CONSTRAINT `fk_Persona_1` FOREIGN KEY (`Persona`) REFERENCES `Persone` (`idPersona`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=INNODB;

CREATE TABLE `Annunci` (
  `idAnnuncio` INT(11) NOT NULL AUTO_INCREMENT,
  `Persona` INT(11) NOT NULL,
  `Servizio` INT(11) NOT NULL,
  `Tipo` CHAR(1) NOT NULL,
  `Professionale` BOOL NOT NULL,
  `Attivo` BOOL NOT NULL DEFAULT true,
  PRIMARY KEY (`idAnnuncio`),
  UNIQUE `fk_Persona` (`Persona`, `Servizio`),
  CONSTRAINT `fk_Persona` FOREIGN KEY (`Persona`) REFERENCES `Persone` (`idPersona`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `fk_Servizio` FOREIGN KEY (`Servizio`) REFERENCES `Servizi` (`idServizio`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=INNODB;


CREATE TABLE `Scambi` (
  `idScambio` INT(11) NOT NULL AUTO_INCREMENT,
  `Domanda` INT(11) NOT NULL,
  `Offerta` INT(11) NOT NULL,
  `Importo` FLOAT NOT NULL DEFAULT 0,
  `Data` DATE NOT NULL,
  `FeedbackProfessionalita` INT(1),
  `FeedbackSimpatia` INT(1),
  `Commenti` VARCHAR(200),
  PRIMARY KEY (`idScambio`),
  UNIQUE `fk_Domanda` (`Domanda`, `Offerta`, `Data`),
  CONSTRAINT `fk_Domanda` FOREIGN KEY (`Domanda`) REFERENCES `Annunci` (`idAnnuncio`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `fk_Offerta` FOREIGN KEY (`Offerta`) REFERENCES `Annunci` (`idAnnuncio`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=INNODB;

/* controlli da implementare
Beneficiario != Abilita/Persona
Importo: -20 < x < 20 */ 

CREATE TABLE `Conversazioni` (
    `idConversazione` INT(11) NOT NULL AUTO_INCREMENT,
    `Mittente` INT(11) NOT NULL,
    `Destinatario` INT(11) NOT NULL,
    PRIMARY KEY (`idConversazione`),
    UNIQUE `fk_Mittente` (`Mittente`, `Destinatario`), CONSTRAINT `fk_Mittente` FOREIGN KEY (`Mittente`) REFERENCES `Persone` (`idPersona`) ON DELETE RESTRICT ON UPDATE CASCADE,
    CONSTRAINT `fk_Destinatario` FOREIGN KEY (`Destinatario`) REFERENCES `Persone` (`idPersona`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=INNODB;

CREATE TABLE `Messaggi` (
    `idMessaggio` INT(11) NOT NULL AUTO_INCREMENT,
    `Conversazione` INT(11) NOT NULL,
    `Contenuto` VARCHAR(200) NOT NULL,
    `DataOra` DATETIME NOT NULL, 
    PRIMARY KEY (`idMessaggio`),
    UNIQUE `fk_Conversazione` (`Conversazione`, `DataOra`),
    CONSTRAINT `fk_Conversazione` FOREIGN KEY (`Conversazione`) REFERENCES `Conversazioni` (`idConversazione`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=INNODB;
