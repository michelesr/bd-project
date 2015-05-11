USE BancaDelTempo;

-- -------------------------------------------------
-- Dump dei dati per la tabella `Zone`
-- -------------------------------------------------
INSERT INTO `Zone` (`idZona`, `Zona`) VALUES
(1, 'Zona1'),
(2, 'Zona2'),
(3, 'Zona3'),
(4, 'Zona4'),
(5, 'Zona5');

-- -------------------------------------------------
-- Dump dei dati per la tabella `Indirizzi`
-- -------------------------------------------------
INSERT INTO `Indirizzi` (`idIndirizzo`, `Indirizzo`) VALUES
(1,  'Via Gramsci'),
(2,  'Via Valdirose'),
(3,  'Via delle Betulle'),
(4,  'Via dei Gerani'),
(5,  'Via delle Rose'),
(6,  'Via Aldo Moro'),
(7,  'Via Dante Alighieri'),
(8,  'Via Ugo Foscolo'),
(9,  'Via Giacomo Leopardi'),
(10, 'Via Garibaldi'),
(11, 'Via Fausto Coppi'),
(12, 'Via della Repubblica'),
(13, 'Via della Vittoria'),
(14, 'Via Salvatore Allende'),
(15, 'Via Kennedy'),
(16, 'Via della Liberazione'),
(17, 'Via S. Pietro'),
(18, 'Via Mamiani'),
(19, 'Via dell''Artigianato'),
(20, 'Via IV Novembre '),
(21, 'Via della Conciliazione'),
(22, 'Via Tagliamento'),
(23, 'Viale Cadore'),
(24, 'Via Montebello ');

-- -------------------------------------------------
-- Dump dei dati per la tabella `Categorie`
-- -------------------------------------------------
INSERT INTO `Categorie` (`idCategoria`, `Categoria`) VALUES
(1, 'Lavoro manuale'),
(2, 'Consulenza'),
(3, 'Assistenza'),
(4, 'Didattica'),
(5, 'Lavoro Creativo'),
(6, 'Ristorazione');

-- -------------------------------------------------
-- Dump dei dati per la tabella `Servizi`
-- -------------------------------------------------
INSERT INTO `Servizi` (`idServizio`, `Servizio`, `Categoria`) VALUES
(1,  'Assistenza anziani', 3),
(2,  'Assistenza disabili', 3),
(3,  'Dog sitting', 3),
(4,  'Ripetizioni matematica', 4),
(5,  'Ripetizioni fisica', 4),
(6,  'Cucito', 1),
(7,  'Pittura', 5),
(8,  'Consulenza nutrizionale', 2),
(9,  'Consulenza programmi europei', 2),
(10, 'Ripetizioni lettere', 4),
(11, 'Esecuzione musicale', 5),
(12, 'Edilizia', 1),
(13, 'Composizione musicale', 5),
(14, 'Consulenza informatica', 2),
(15, 'Baby sitting', 3),
(16, 'Pulizia domestica', 1),
(17, 'Lezioni di musica', 4),
(18, 'Cucina', 6),
(19, 'Servizio cameriere', 6),
(20, 'Servizio barista', 6);


-- -------------------------------------------------
-- Dump dei dati per la tabella `Persone`
-- -------------------------------------------------
INSERT INTO `Persone` (`idPersona`, `Mail`, `Password`, `Credito`, `Nome`, `Cognome`, `DataDiNascita`, `NumeroCivico`, `Indirizzo`, `Zona`, `Presentazione`,`Sesso`) VALUES
(1,  'claudio@hotmail.it', MD5('pass word'), NULL, 'Claudo', 'Principi', '1968-02-23', '3', 5, 1, NULL, 'M'),
(2,  'chiarietta@hotmail.it', MD5('PassWord'), NULL, 'Chiara', 'Nelli', '1988-05-25', '8', 17, 2, NULL, 'F'),
(3,  'agostini@libero.it', MD5('password03'), NULL, 'Francesco', 'Agostini', '1991-02-18', '4', 12, 3, NULL, 'M'),
(4,  'caterina@yahoo.it', MD5('miaPassworD'), NULL, 'Caterina', 'Ricci', '1955-08-02', '7', 3, 4, NULL, 'F'),
(5,  'roberto@libero.it', MD5('laMiaPassword'), NULL, 'Roberto', 'Visconti', '1970-12-04', '10', 9, 5, NULL, 'M'),
(6,  'anna@gmail.com', MD5('un\'altra password'), NULL, 'Anna', 'Dolci', '1987-11-12', '12', 18, 1, NULL, 'F'),
(7,  'franca@gmail.com', MD5('password segreta'), NULL, 'Franca', 'Valeri', '1989-03-06', '15', 2, 3, NULL, 'F'),
(8,  'giuseppe@yahoo.it', MD5('chiave segreta'), NULL, 'Giuseppe', 'Rinaldi', '1950-09-20', '19', 3, 1, NULL, 'M'),
(9,  'pinco@gmail.com', MD5('password sconosciuta'), NULL, 'Pinco', 'Pallino', '1993-09-01', '123', 18, 4, NULL, 'M'),
(10, 'pallino@gmail.com', MD5('password1'), NULL, 'Marco', 'Pallino', '1983-02-09', '123', 18, 4, NULL, 'M'),
(11, 'mario@gmail.com', MD5('password2'), NULL, 'Mario', 'Balotelli', '1973-02-09', '23', 20, 1, NULL, 'M'),
(12, 'buffon@hotmail.com', MD5('password3'), NULL, 'Gianluigi', 'Buffon', '1963-03-12', '1', 20, 2, NULL, 'M'),
(13, 'tom@gmail.com', MD5('password4'), NULL, 'Tom', 'Savini', '1972-03-09', '12', 18, 3, NULL, 'M'),
(14, 'poz@gmail.com', MD5('password5'), NULL, 'Anthony', 'Johnson', '1988-04-14', '13', 18, 4, NULL, 'M'),
(15, 'matteo@gmail.com', MD5('password6'), NULL, 'Matteo', 'Rossi', '1970-05-28', '31', 18, 5, NULL, 'M'),
(16, 'maria@gmail.com', MD5('password7'), NULL, 'Maria', 'Bianchi', '1980-06-19', '32', 21, 1, NULL, 'F'),
(17, 'luciana@gmail.com', MD5('password8'), NULL, 'Luciana', 'Verdi', '1990-07-29', '83', 6, 2, NULL, 'F'),
(18, 'francesca@gmail.com', MD5('password9'), NULL, 'Francesca', 'Gialli', '1978-08-02', '18', 3, 3, NULL, 'F'),
(19, 'eleonora@gmail.com', MD5('password10'), NULL, 'Eleonora', 'Marroni', '1982-02-01', '10', 8, 4, NULL, 'F'),
(20, 'francesco@gmail.com', MD5('password11'), NULL, 'Francesco', 'Micheletti', '1959-09-07', '14', 24, 5, NULL, 'M');

-- -------------------------------------------------
-- Dump dei dati per la tabella `Tesseramenti`
-- -------------------------------------------------

INSERT INTO `Tesseramenti` (`idTesseramento`, `Persona`, `Data`, `Importo`) VALUES
(NULL, 1, '2013-02-02', 10),
(NULL, 2, '2013-03-04', 15),
(NULL, 3, '2012-05-01', 10),
(NULL, 3, '2013-05-01', 20),
(NULL, 4, '2012-01-23', 10),
(NULL, 4, '2013-01-23', 10),
(NULL, 5, '2012-06-08', 20),
(NULL, 5, '2013-06-08', 10),
(NULL, 6, '2010-09-21', 15),
(NULL, 6, '2011-09-21', 30),
(NULL, 6, '2012-09-21', 50),
(NULL, 6, '2013-09-21', 10),
(NULL, 7, '2012-06-02', 15),
(NULL, 8, '2011-01-02', 10),
(NULL, 9, '2011-06-02', 30),
(NULL, 9, '2012-06-02', 40),
(NULL, 9, '2013-06-02', 10),
(NULL, 10, '2012-09-08', 10),
(NULL, 10, '2013-09-08', 15),
(NULL, 11, '2012-05-22', 20),
(NULL, 11, '2013-05-02', 10),
(NULL, 12, '2012-04-18', 40),
(NULL, 12, '2013-04-02', 15),
(NULL, 13, '2012-03-02', 10),
(NULL, 13, '2013-03-02', 20),
(NULL, 14, '2012-01-18', 15),
(NULL, 14, '2013-01-02', 30),
(NULL, 15, '2013-09-02', 10),
(NULL, 16, '2012-11-22', 25),
(NULL, 17, '2013-11-08', 10),
(NULL, 18, '2011-10-03', 15),
(NULL, 18, '2012-10-03', 20),
(NULL, 18, '2013-10-03', 15),
(NULL, 19, '2013-12-02', 20),
(NULL, 20, '2013-16-13', 10);


-- -------------------------------------------------
-- Dump dei dati per la tabella `Annunci`
-- -------------------------------------------------
INSERT INTO `Annunci` (`idAnnuncio`, `Persona`, `Servizio`, `Tipo`, `Professionale`) VALUES
(1,  1, 1, 'O', true),
(2,  1, 19, 'O', false),
(3,  2, 3, 'O', false),
(4,  7, 19, 'O', true),
(5,  7, 20, 'D', true),
(6,  7, 9, 'O', false),
(7,  8, 5, 'O', true),
(8,  8, 4, 'O', false),
(9,  17, 18, 'D', true),
(10, 9, 11, 'O', false),
(11, 9, 12, 'D', false),
(12, 9, 13, 'O', false),
(13, 9, 14, 'D', false),
(14, 1, 3, 'O', true),
(15, 1, 2, 'D', true),
(16, 1, 5, 'D', true),
(17, 1, 4, 'D', false),
(18, 5, 20, 'O', true),
(19, 5, 2, 'D', false),
(20, 5, 9, 'D', true),
(21, 5, 19, 'D', false),
(22, 5, 13, 'D', true),
(23, 5, 8, 'D', true),
(24, 9, 8, 'D', false),
(25, 3, 1, 'O', false),
(26, 8, 19, 'D', true),
(27, 9, 7, 'O', false),
(28, 7, 7, 'D',true),
(29, 6, 6, 'O', true),
(30, 3, 5, 'D', false),
(31, 2, 5, 'O', false),
(32, 8, 8, 'O', true),
(33, 7, 13, 'D', false),
(34, 6, 2, 'O',true),
(35, 6, 1, 'D', false),
(36, 6, 7, 'O', true),
(37, 6, 20, 'O', false),
(38, 6, 3, 'O', true),
(39, 11, 4, 'D', true),
(40, 11, 5, 'O', false),
(41, 13, 7, 'D', true),
(42, 13, 20, 'D', true),
(43, 15, 14, 'O', true),
(44, 15, 19, 'O', true),
(45, 16, 2, 'O', true),
(46, 16, 8, 'D', true),
(48, 17, 5, 'D', true),
(49, 17, 2, 'O', true),
(50, 18, 4, 'O', false),
(51, 17, 11, 'D', false),
(52, 19, 13, 'O', true),
(53, 10, 5, 'O', true),
(54, 11, 1, 'D', true),
(55, 18, 2, 'O', false),
(56, 17, 3, 'D', false),
(57, 19, 3, 'D', true),
(58, 7, 1, 'O', true),
(59, 9, 6, 'D', true),
(60, 12, 6, 'O', false),
(61, 16, 6, 'D', false),
(62, 4, 7, 'D', false),
(63, 18, 8, 'O', false),
(64, 15, 9, 'O', true),
(65, 16, 9, 'D', false),
(66, 20, 10, 'D', true),
(67, 1, 10, 'O', true),
(68, 3, 10, 'D', false),
(69, 7, 10, 'O', false),
(70, 17, 12, 'O', false),
(71, 16, 12, 'D', true),
(72, 15, 12, 'O', false),
(73, 14, 14, 'D', true),
(74, 13, 14, 'O', false),
(75, 12, 15, 'D', false),
(76, 10, 16, 'O', false),
(77, 9, 16, 'D', false), 
(78, 8, 17, 'D', true),
(79, 7, 17, 'O', true),
(80, 6, 18, 'O', true),
(81, 19, 11, 'D', true),
(82, 18, 11, 'O', true),
(83, 11, 15, 'O', false);



-- -------------------------------------------------
-- Dump dei dati per la tabella `Scambi`
-- -------------------------------------------------
INSERT INTO `Scambi` (`idScambio`, `Domanda`, `Offerta`, `Importo`, `Data`, `FeedbackProfessionalita`, `FeedbackSimpatia`, `Commenti`) VALUES
(1, 9, 80, 4, '2012-06-05', 5, 5, ''),
(2, 77, 76, 3.5, '2012-08-01', 3, 4, ''),
(3, 61, 60, 2.5, '2012-08-01', 2, 5, 'Non sapevo che Buffon fosse esperto di Cucito....'),
(4, 13, 74, 3.5, '2012-08-06', 5, 3, ''),
(5, 17, 50, 2.5, '2012-08-06', 2, 4, ''),
(6, 17, 50, 2.5, '2013-08-10', 3, 4, ''),
(7, 17, 50, 2.5, '2013-08-14', 1, 4, ''),
(8, 62, 27, 2.5, '2013-08-14', 4, 1, ''),
(9, 11, 72, 3.5, '2013-08-14', 4, 4, ''),
(10, 35, 25, 4, '2013-08-22', 5, 5, ''),
(11, 81, 82, 5, '2013-07-03', 5, 2, ''),
(12, 57, 38, 3, '2013-07-31', 2, 5, ''),
(13, 20, 64, 4, '2013-07-16', 2, 5, ''),
(14, 42, 18, 8.5, '2013-07-16', 5, 4, ''),
(15, 30, 31, 4, '2013-06-06', 2, 2, ''),
(16, 30, 31, 4, '2013-06-03', 2, 2, ''),
(17, 24, 63, 1, '2013-06-03', 3, 3, ''),
(18, 24, 63, 1, '2013-06-04', 3, 3, ''),
(19, 15, 49, 3, '2013-05-02', 3, 3, ''),
(20, 22, 52, 2.5, '2013-05-04', 3, 3, '');
-- -------------------------------------------------
-- Dump dei dati per la tabella `Conversazioni`
-- -------------------------------------------------
INSERT INTO Conversazioni (idConversazione, Mittente, Destinatario)  
VALUES (1, 6, 3), (2, 3, 6);

-- -------------------------------------------------
-- Dump dei dati per la tabella `Messaggi`
-- -------------------------------------------------
INSERT INTO Messaggi (idMessaggio, Conversazione, Contenuto, DataOra)
VALUES (1, 1, "Ciao Francesco, volevo chiederti se sei disponibile per assistere mia nonna... fammi sapere!", "2013-08-20 15:32:11"),
       (2, 2, "Si certo... mi piacerebbe aiutarti con tua nonna, se sei disposta a concludere lo scambio in maniera ufficiale", "2013-08-21 14:20:23"),
       (3, 1, "Perfetto... allora ci sentiamo presto! Bye!!", "2013-08-21 15:11:27"); 
