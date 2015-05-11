USE BancaDelTempo;

CREATE VIEW PersoneIscritte AS
SELECT DISTINCT P.*, (YEAR(NOW()) - YEAR(P.DataDiNascita) - (DATE_FORMAT(NOW(), '%m%d') < DATE_FORMAT(P.DataDiNascita, '%m%d'))) AS Eta
FROM Persone P, Tesseramenti T
WHERE P.idPersona = T.Persona
      AND DATEDIFF(current_date(), T.Data) < 365;

CREATE VIEW OfferteAttive AS 
SELECT A.idAnnuncio, P.Nome, P.Cognome, S.Servizio, A.Professionale
FROM PersoneIscritte P, Annunci A, Servizi S
WHERE A.Tipo = 'O' AND A.Attivo = true 
AND A.Persona = P.idPersona AND A.Servizio = S.idServizio
ORDER by P.Cognome;

CREATE VIEW DomandeAttive AS
SELECT  A.idAnnuncio, P.Nome, P.Cognome, S.Servizio, A.Professionale
FROM PersoneIscritte P, Annunci A, Servizi S
WHERE A.Tipo = 'D' AND A.Attivo = true 
AND A.Persona = P.idPersona AND A.Servizio = S.idServizio
ORDER by P.Cognome;

CREATE VIEW Tessere AS 
SELECT T.idTesseramento, P.Nome, P.Cognome, T.Data, T.Importo 
FROM Persone P, Tesseramenti T 
WHERE P.idPersona = T.Persona;

CREATE VIEW MittentiConversazioni AS
SELECT Conversazioni.idConversazione, Persone.idPersona, Persone.Cognome, Persone.Nome 
FROM Persone, Conversazioni WHERE Persone.idPersona = Conversazioni.Mittente 
ORDER BY Conversazioni.idConversazione ; 

CREATE VIEW DestinatariConversazioni AS
SELECT Conversazioni.idConversazione, Persone.idPersona, Persone.Cognome, Persone.Nome 
FROM Persone, Conversazioni WHERE Persone.idPersona = Conversazioni.Destinatario 
ORDER BY Conversazioni.idConversazione ; 

CREATE VIEW OfferteInattive AS 
SELECT A.idAnnuncio, P.Nome, P.Cognome, S.Servizio, A.Professionale
FROM PersoneIscritte P, Annunci A, Servizi S
WHERE A.Tipo = 'O' AND A.Attivo = false 
AND A.Persona = P.idPersona AND A.Servizio = S.idServizio
ORDER by P.Cognome;

CREATE VIEW DomandeInattive AS
SELECT  A.idAnnuncio, P.Nome, P.Cognome, S.Servizio, A.Professionale
FROM PersoneIscritte P, Annunci A, Servizi S
WHERE A.Tipo = 'D' AND A.Attivo = false 
AND A.Persona = P.idPersona AND A.Servizio = S.idServizio
ORDER by P.Cognome;

CREATE VIEW ZoneAnnunci AS
SELECT Z.idZona, A.idAnnuncio  
FROM Zone Z, Annunci A, Persone P 
WHERE A.Persona = P.idPersona 
AND P.Zona = Z.idZona; 
