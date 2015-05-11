<?php
  $query_set[0] = array("Mostra gli iscritti in ordine alfabetico",
                        "SELECT Cognome, Nome, Mail ".
                        "FROM PersoneIscritte ".
                        "ORDER BY Cognome, Nome;");

  $query_set[1] = array("Mostra le categorie", 
                        "SELECT Categoria FROM Categorie ".
                        "ORDER BY Categoria;"); 

  $query_set[2] = array("Mostra servizi appartenenti alla categoria 'Lavoro Creativo'",
                        "SELECT S.Servizio FROM Servizi S, Categorie C ".
                        "WHERE S.Categoria = C.idCategoria ".
                        "AND C.Categoria = 'Lavoro Creativo';");

  $query_set[3] = array("Mostra le 5 persone piu' simpatiche",
                        "SELECT I.Nome, I.Cognome, I.Mail ".
                        "FROM PersoneIscritte I, Annunci A, Scambi S ".
                        "WHERE I.idPersona = A.Persona ".
                        "AND A.idAnnuncio = S.Offerta ".
                        "GROUP BY I.idPersona ".
                        "ORDER BY AVG(S.FeedbackSimpatia) DESC ".
                        "LIMIT 5;");

  $query_set[4] = array("Mostra le 10 persone con i feedback migliori",
                        "SELECT I.Nome, I.Cognome, I.Mail ".
                        "FROM PersoneIscritte I, Annunci A, Scambi S ".
                        "WHERE I.idPersona = A.Persona ".
                        "AND A.idAnnuncio = S.Offerta ".
                        "GROUP BY I.idPersona ".
                        "ORDER BY AVG(S.FeedbackSimpatia * S.FeedbackProfessionalita) DESC ".
                        "LIMIT 10;");

  $query_set[5] = array("Mostra le persone che abitano nella 'Zona3'",
                        "SELECT I.Nome, I.Cognome, I.Mail ".
                        "FROM PersoneIscritte I, Zone Z ".
                        "WHERE I.Zona = Z.idZona ".
                        "AND Z.Zona = 'Zona3';");

  $query_set[6] = array("Mostra il numero di richieste per 'Assistenza Anziani'",
                        "SELECT SV.Servizio, COUNT(SC.Domanda) AS Richieste ".
                        "FROM Scambi SC, Servizi SV, Annunci A ".
                        "WHERE SC.Domanda = A.idAnnuncio AND A.Servizio = SV.idServizio ".
                        "AND SV.Servizio = 'Assistenza anziani';");

  $query_set[7] = array("Mostra i 5 servizi piu' richiesti",
                        "SELECT SV.Servizio, COUNT(SV.idServizio) as Richieste ".
                        "FROM Scambi SC, Servizi SV, Annunci A ".
                        "WHERE SV.idServizio = A.Servizio AND A.idAnnuncio = SC.Domanda ".
                        "GROUP BY SV.idServizio ORDER BY Richieste DESC LIMIT 5;");

  $query_set[8] = array("Mostra le 5 categorie piu' offerte",
                        "SELECT C.Categoria, COUNT(C.idCategoria) as Offerte ".
                        "FROM Scambi SC, Annunci A, Servizi SV, Categorie C ".
                        "WHERE C.idCategoria = SV.Categoria AND SV.idServizio = A.Servizio ".
                        "AND A.idAnnuncio = SC.Offerta GROUP BY C.idCategoria ".
                        "ORDER By Offerte DESC LIMIT 5;");

  $query_set[9] = array("Mostra il numero di scambi e di ore scambiate complessivamente dagli utenti",
                        "SELECT P.Cognome, P.Nome, SUM(ABS(S.Importo)) as Ore, COUNT(S.idScambio) as Scambi ".
                        "FROM Persone P, Scambi S, Annunci A  WHERE P.idPersona = A.Persona ".
                        "AND (A.idAnnuncio = S.Offerta OR A.idAnnuncio = S.Domanda) ".
                        "GROUP BY P.idPersona ORDER BY Ore DESC, Scambi DESC;");

  $query_set[10] = array("Mostra il numero di persone per fascia di eta'",
                          "SELECT CASE WHEN Eta BETWEEN 18 AND 25 THEN 'Fascia 18-25'".
                          "WHEN Eta BETWEEN 26 AND 33 THEN 'Fascia 26-33' ".
                          "WHEN Eta BETWEEN 34 AND 41 THEN 'Fascia 34-41' ".
                          "WHEN Eta BETWEEN 42 AND 49 THEN 'Fascia 42-49' ".
                          "WHEN Eta BETWEEN 50 AND 57 THEN 'Fascia 50-57' ".
                          "WHEN Eta BETWEEN 58 AND 65 THEN 'Fascia 58-65' ".
                          "ELSE 'Fascia 65+' END AS Fascia, COUNT(*) AS Numero ".
                          "FROM PersoneIscritte GROUP BY Fascia ORDER BY Fascia;");

  $query_set[11] = array("Mostra la conversazione privata tra 'Anna Dolci' e 'Francesco Agostini'",
                         "SELECT M.Contenuto AS `Messaggio`, M.DataOra AS 'Data e ora', ".
                         "MC.Nome AS `Nome mittente`, MC.Cognome AS `Cognome mittente` ".
                         "FROM Messaggi M, MittentiConversazioni MC, DestinatariConversazioni DC ".
                         "WHERE MC.idConversazione = DC.idConversazione AND MC.idConversazione = M.Conversazione ".
                         "AND ((MC.Cognome = 'Dolci' AND MC.Nome = 'Anna') OR (MC.Cognome = 'Agostini' AND MC.Nome = 'Francesco')) ".
                         "AND ((DC.Cognome = 'Dolci' AND DC.Nome = 'Anna') OR (DC.Cognome = 'Agostini' AND DC.Nome = 'Francesco')) ".
                         "ORDER BY M.DataOra;");

  $query_set[12] = array("Mostra gli scambi avvenuti nel '2012'", 
                         "SELECT * FROM Scambi WHERE YEAR(Data) = '2012';");

  $query_set[13] = array("Mostra le offerte attive nella zona dell'utente con mail 'claudio@hotmail.it'",
                         "SELECT O.Servizio AS `Servizio offerto` ,O.Cognome ,O.Nome ".
                         "FROM OfferteAttive O, Persone P,  ZoneAnnunci ZA ".
                         "WHERE P.Mail = 'claudio@hotmail.it' AND P.Zona = ZA.idZona ".
                         "AND ZA.idAnnuncio = O.idAnnuncio ".
                         "AND (O.Nome != P.Nome OR O.Cognome != P.Cognome);");

  $query_set[14] = array("Mostra i possibili impieghi per l'utente 'agostini@libero.it'",
                         "SELECT DA.Servizio as `Servizio richiesto`, DA.Nome, DA.Cognome ".
                         "FROM DomandeAttive DA, OfferteAttive OA, Persone P ".
                         "WHERE P.Mail = 'agostini@libero.it' AND OA.Nome = P.Nome ".
                         "AND OA.Cognome = P.Cognome AND DA.Servizio = OA.Servizio ". 
                         "AND DA.Professionale = DA.Professionale;");
?>
