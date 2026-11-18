-- Correction des pistes 1 a 9 pour correspondre exactement aux morceaux reels
SET NAMES utf8mb4;

UPDATE `track` SET 
  `titre` = 'A Sky Full Of Stars',
  `genre` = 'Pop Rock',
  `duree` = 274,
  `filename` = 'Coldplay_A_Sky_Full_Of_Stars.mp3',
  `artiste_album` = 'Coldplay',
  `titre_album` = 'Ghost Stories',
  `annee_album` = 2014
WHERE `id` = 1;

UPDATE `track` SET 
  `titre` = 'Hymn For The Weekend',
  `genre` = 'Pop Rock',
  `duree` = 260,
  `filename` = 'Coldplay_Hymn_For_The_Weekend.mp3',
  `artiste_album` = 'Coldplay',
  `titre_album` = 'A Head Full of Dreams',
  `annee_album` = 2015
WHERE `id` = 2;

UPDATE `track` SET 
  `titre` = 'Rolling in the Deep',
  `genre` = 'Pop / Soul',
  `duree` = 233,
  `filename` = 'Adele_Rolling_in_the_Deep.mp3',
  `artiste_album` = 'Adele',
  `titre_album` = '21',
  `annee_album` = 2011
WHERE `id` = 3;

UPDATE `track` SET 
  `titre` = 'Set Fire to the Rain',
  `genre` = 'Pop / Soul',
  `duree` = 243,
  `filename` = 'Adele_Set_Fire_to_the_Rain.mp3',
  `artiste_album` = 'Adele',
  `titre_album` = '21',
  `annee_album` = 2011
WHERE `id` = 4;

UPDATE `track` SET 
  `titre` = 'My Sweet Summer',
  `genre` = 'Reggae Rock',
  `duree` = 220,
  `filename` = 'Dirty_Heads_My_Sweet_Summer.mp3',
  `artiste_album` = 'Dirty Heads',
  `titre_album` = 'Sound of Change',
  `annee_album` = 2014
WHERE `id` = 5;

UPDATE `track` SET 
  `titre` = 'That\'s All I Need',
  `genre` = 'Reggae Rock',
  `duree` = 215,
  `filename` = 'Dirty_Heads_That_s_All_I_Need.mp3',
  `artiste_album` = 'Dirty Heads',
  `titre_album` = 'Dirty Heads',
  `annee_album` = 2016
WHERE `id` = 6;

UPDATE `track` SET 
  `titre` = 'Emmenez-moi',
  `genre` = 'Chanson Française',
  `duree` = 213,
  `filename` = 'Charles_Aznavour_Emmenez-moi.mp3',
  `artiste_album` = 'Charles Aznavour',
  `titre_album` = 'Entre deux rêves',
  `annee_album` = 1967
WHERE `id` = 7;

UPDATE `track` SET 
  `titre` = 'La bohème',
  `genre` = 'Chanson Française',
  `duree` = 244,
  `filename` = 'Charles_Aznavour_La_boheme.mp3',
  `artiste_album` = 'Charles Aznavour',
  `titre_album` = 'La bohème',
  `annee_album` = 1965
WHERE `id` = 8;

UPDATE `track` SET 
  `titre` = 'Adulescent',
  `genre` = 'Chanson Française',
  `duree` = 176,
  `filename` = 'Aldebert_Adulescent.mp3',
  `artiste_album` = 'Aldebert',
  `titre_album` = 'Enfantillages',
  `annee_album` = 2008
WHERE `id` = 9;

-- Mise a jour des noms des 4 premieres playlists pour correspondre
UPDATE `playlist` SET `nom` = 'Sélection Pop Rock (Coldplay)' WHERE `id` = 1;
UPDATE `playlist` SET `nom` = 'Sélection Soul & Voice (Adele)' WHERE `id` = 2;
UPDATE `playlist` SET `nom` = 'Sélection Reggae Rock (Dirty Heads)' WHERE `id` = 3;
UPDATE `playlist` SET `nom` = 'Classiques Français (Aznavour & Aldebert)' WHERE `id` = 4;
