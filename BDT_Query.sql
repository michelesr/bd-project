-- -------------------------------------------------
-- Query SEMPLICI/BANALI
-- -------------------------------------------------

-- -------------------------------------------------
-- Query: Tutti gli iscritti in ordine alfabetico
-- -------------------------------------------------
SELECT I.Cognome, I.Nome, I.Mail
FROM PersoneIscritte I
ORDER BY I.Cognome, I.Nome;

-- -------------------------------------------------
-- Query: Elenca tutte le categorie
-- -------------------------------------------------
SELECT C.Categoria
FROM Categorie C
ORDER BY C.Categoria;

-- -------------------------------------------------
-- Query: mostra gli scambi avvenuti nel 2012 
-- -------------------------------------------------
SELECT * FROM Scambi WHERE YEAR(Data) = '2012';

-- -------------------------------------------------
-- Query PIU' COMPLESSE
-- -------------------------------------------------

-- -------------------------------------------------
-- Query: Quali sono i servizi della categoria "Lavoro creativo"?
-- -------------------------------------------------
SELECT S.Servizio
FROM Servizi S, Categorie C
WHERE S.Categoria = C.idCategoria
      AND C.Categoria = "Lavoro Creativo";

-- -------------------------------------------------
-- Query: Quali sono le 5 persone piu' simpatiche?
-- -------------------------------------------------
SELECT I.Nome, I.Cognome, I.Mail
FROM PersoneIscritte I, Annunci A, Scambi S
WHERE I.idPersona = A.Persona
      AND A.idAnnuncio = S.Offerta
GROUP BY I.idPersona
ORDER BY AVG(S.FeedbackSimpatia) DESC
LIMIT 5;

-- -------------------------------------------------
-- Query: Top 10 feedback
-- -------------------------------------------------
SELECT I.Nome, I.Cognome, I.Mail
FROM PersoneIscritte I, Annunci A, Scambi S
WHERE I.idPersona = A.Persona
      AND A.idAnnuncio = S.Offerta
GROUP BY I.idPersona
ORDER BY AVG(S.FeedbackSimpatia * S.FeedbackProfessionalita) DESC
LIMIT 10;

-- -------------------------------------------------
-- Query: Persone che abitano nella "Zona3"
-- -------------------------------------------------
SELECT I.Nome, I.Cognome, I.Mail
FROM PersoneIscritte I, Zone Z
WHERE I.Zona = Z.idZona
      AND Z.Zona = "Zona3";

-- -------------------------------------------------
-- Query: Scambiatori piu' attivi (ore scambiate? numero di servizi scambiati?)
-- -------------------------------------------------
SELECT P.Cognome, P.Nome, SUM(ABS(S.Importo)) as Ore,  COUNT(S.idScambio) as Scambi  FROM Persone P, Scambi S, Annunci A  WHERE P.idPersona = A.Persona AND (A.idAnnuncio = S.Offerta OR A.idAnnuncio = S.Domanda)  GROUP BY P.idPersona ORDER BY Ore DESC, Scambi DESC;

-- -------------------------------------------------
-- Query: 5 Servizi piu' richiesti
-- -------------------------------------------------
-SELECT SV.Servizio, COUNT(SV.idServizio) as Richieste FROM Scambi SC, Servizi SV, Annunci A WHERE SV.idServizio = A.Servizio AND A.idAnnuncio = SC.Domanda GROUP BY SV.idServizio ORDER BY Richieste DESC LIMIT 5;

- -------------------------------------------------
-- Query: 5 Categorie piu' offerte
-- -------------------------------------------------
SELECT C.Categoria, COUNT(C.idCategoria) as Offerte FROM Scambi SC, Annunci A, Servizi SV, Categorie C WHERE C.idCategoria = SV.Categoria AND SV.idServizio = A.Servizio AND A.idAnnuncio = SC.Offerta GROUP BY C.idCategoria ORDER By Offerte DESC LIMIT 5;
-- -------------------------------------------------
-- Query: Quante persone delle rispettive fasce d'eta?
-- (18-25, 26-33, 34-41, 42-49, 50-57, 58-65, 65+)
-- -------------------------------------------------
SELECT 
CASE
WHEN Eta BETWEEN 18 AND 25 THEN "Fascia 18-25" 
WHEN Eta BETWEEN 26 AND 33 THEN "Fascia 26-33" 
WHEN Eta BETWEEN 34 AND 41 THEN "Fascia 34-41" 
WHEN Eta BETWEEN 42 AND 49 THEN "Fascia 42-49" 
WHEN Eta BETWEEN 50 AND 57 THEN "Fascia 50-57" 
WHEN Eta BETWEEN 58 AND 65 THEN "Fascia 58-65"
ELSE "Fascia 65+" 
END AS Fascia, COUNT(*) AS Numero 
FROM PersoneIscritte 
GROUP BY Fascia 
ORDER BY Fascia;

-- -------------------------------------------------
-- Query: Quante richieste del servizio 'Assistenza Anziani'?  
-- -------------------------------------------------
SELECT SV.Servizio, COUNT(SC.Domanda) AS Richieste 
FROM Scambi SC, Servizi SV, Annunci A 
WHERE SC.Domanda = A.idAnnuncio 
AND A.Servizio = SV.idServizio 
AND SV.Servizio = 'Assistenza anziani' ;

-- -------------------------------------------------
-- Query: Mostra la conversazione privata tra 'Anna Dolci' e 'Francesco Agostini' 
-- -------------------------------------------------
SELECT M.Contenuto AS `Messaggio`, M.DataOra AS 'Data e ora', MC.Nome AS `Nome mittente`, MC.Cognome AS `Cognome mittente` 
FROM Messaggi M, MittentiConversazioni MC, DestinatariConversazioni DC 
WHERE MC.idConversazione = DC.idConversazione 
AND MC.idConversazione = M.Conversazione 
AND ((MC.Cognome = 'Dolci' AND MC.Nome = 'Anna') OR (MC.Cognome = 'Agostini' AND MC.Nome = 'Francesco'))
AND ((DC.Cognome = 'Dolci' AND DC.Nome = 'Anna') OR (DC.Cognome = 'Agostini' AND DC.Nome = 'Francesco')) 
ORDER BY M.DataOra;

-- -------------------------------------------------
-- Query: Seleziona le offerte attive nella zona dell'utente 'claudio@hotmail.it' 
-- -------------------------------------------------
SELECT O.Servizio AS `Servizio offerto` ,O.Cognome ,O.Nome 
FROM OfferteAttive O, Persone P, ZoneAnnunci ZA 
WHERE P.Mail = 'claudio@hotmail.it' 
AND P.Zona = ZA.idZona AND ZA.idAnnuncio = O.idAnnuncio 
AND (O.Nome != P.Nome OR O.Cognome != P.Cognome);
-- -------------------------------------------------
-- Query: Mostra i possibili impieghi per l'utente 'agostini@libero.it'  
-- -------------------------------------------------
SELECT DA.Servizio as `Servizio richiesto`, DA.Nome, DA.Cognome FROM DomandeAttive DA, OfferteAttive OA, Persone P WHERE P.Mail = 'agostini@libero.it' AND OA.Nome = P.Nome AND OA.Cognome = P.Cognome AND DA.Servizio = OA.Servizio AND DA.Professionale = DA.Professionale;
-- -------------------------------------------------
-- Query: 
-- -------------------------------------------------

-- -------------------------------------------------
-- Query: 
-- -------------------------------------------------

-- -------------------------------------------------
-- Query: 
-- -------------------------------------------------

-- -------------------------------------------------
-- Query: 
-- -------------------------------------------------

-- -------------------------------------------------
-- Query: 
-- -------------------------------------------------


-- -------------------------------------------------
-- Query: 
-- -------------------------------------------------


