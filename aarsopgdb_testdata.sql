
-- Legge til kunde, passord 123 --
INSERT INTO kunde (fornavn, etternavn, email, passord, adresse, postnummer, poststed, admin)
VALUES ('Sofie', 'Hanset', 'sofie.hanset@gmail.com', '$2y$10$5LlzWSOw.4nBocvA2vRSYeWEzsWr711jn4n.mJBCQub7ji1MA2qG6', 'Midtoddveien 26D', '0494', 'Oslo', true),
('Vino', 'Heyerdahl', 'hvemervino@gmail.com', '$2y$10$5LlzWSOw.4nBocvA2vRSYeWEzsWr711jn4n.mJBCQub7ji1MA2qG6', 'Thorvald Meyers gate 11C', '5678', 'Stavanger', false );

-- Legge til liga --
INSERT INTO liga (navn, bilde_url)
VALUES ('La Liga', 'laliga.webp'),
 ('Premier League', 'premierleague.png'),
 ('Serie A', 'seriea.png');

-- Legge til klubb --
INSERT INTO klubb (navn, bilde_url, liga_id)
VALUES ('Barcelona', 'barcelona.png', 1),
 ('Atletico Madrid', 'atleticomadrid.webp', 1),
 ('Real Madrid', 'realmadrid.webp', 1),
 ('Arsenal', 'arsenal.webp', 2),
 ('Manchester City', 'manchestercity.webp', 2),
 ('Manchester United', 'manchesterunited.webp', 2),
 ('Juventus', 'juventus.png', 3),
 ('Roma', 'roma.png', 3),
 ('AC Milan', 'acmilan.png', 3);

-- Legge til produkt --
INSERT INTO produkt (storrelse, produktnavn, pris, bilde_url, klubb_id)
VALUES ('M', 'Barcelona 08/09', 599, 'barcelona_08.jpg', 1),
('S', 'Barcelona 14/15', 999, 'barcelona_14.jpg', 1),
('L', 'Barcelona 99/00', 599, 'barcelona_99.webp', 1),
('S', 'Atletico Madrid 08/09', 599, 'atleticomadrid_08.jpg', 2),
('M', 'Atletico Madrid 14/15', 599, 'atleticomadrid_14.jpg', 2),
('L', 'Atletico Madrid 17/18', 599, 'atleticomadrid_17.jpg', 2),
('S', 'Real Madrid 09/10', 599, 'realmadrid_09.webp', 3),
('M', 'Real Madrid 12/13', 599, 'realmadrid_12.jpg', 3),
('L', 'Real Madrid 17/18', 599, 'realmadrid_17.jpeg', 3),
('S', 'Arsenal 98/99', 599, 'arsenal_98.jpg', 4),
('L', 'Arsenal 04/05', 549, 'arsenal_04.jpg', 4),
('M', 'Arsenal 15/16', 599, 'arsenal_15.jpg', 4),
('S', 'Manchester City 07/08', 599, 'city_07.jpg', 5),
('M', 'Manchester City 16/17', 599, 'city_16.jpg', 5),
('L', 'Manchester City 22/23', 599, 'city_22.jpg', 5),
('S', 'Manchester United 98/99', 599, 'united_98.jpg', 6),
('M', 'Manchester United 06/07', 599, 'united_06.jpg', 6),
('L', 'Manchester United 17/18', 599, 'united_17.jpg', 6),
('XL', 'Juventus 99/00', 499, 'juventus_99.webp', 7),
('M', 'Juventus 14/15', 599, 'juventus_14.jpg', 7),
('L', 'Juventus 19/20', 599, 'juventus_19.jpg', 7),
('S', 'Roma 00/01', 599, 'roma_00.webp', 8),
('M', 'Roma 16/17', 599, 'roma_16.jpg', 8),
('L', 'Roma 19/20', 599, 'roma_19.jpg', 8),
('S', 'AC Milan 06/07', 599, 'acmilan_06.webp', 9),
('M', 'AC Milan 09/10', 599, 'acmilan_09.webp', 9),
('L', 'AC Milan 18/19', 599, 'acmilan_18.jpeg', 9);

-- Oppdatere størrelse --
UPDATE produkt
SET storrelse = 'S'
WHERE id = <id_for_produkt>; -- velg id`en til produktet du vil endre størrelsen til --

-- Oppdater produktnavn --
UPDATE produkt
SET produktnavn = 'nytt_produktnavn'
WHERE id = <id_for_produkt>;

-- Oppdater bilde url --
UPDATE produkt
SET bilde_url = 'ny_bilde_url'
WHERE id = <id_for_produkt>;

-- Til menyen -- 
select klubb.id id, klubb.navn navn, liga.navn liga from klubb, liga where klubb.liga_id = liga.id;
select klubb.id id, klubb.navn navn, liga.navn liga from klubb, liga where klubb.liga_id = liga.id order by liga,navn;
