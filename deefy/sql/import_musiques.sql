-- ============================================================================
-- Script d'importation des musiques et création des playlists Deefy
-- Généré automatiquement avec métadonnées ID3
-- ============================================================================
SET NAMES utf8mb4;

-- 1. Insertion des 48 pistes réelles dans la table track
INSERT INTO `track` (`titre`, `genre`, `duree`, `filename`, `type`, `artiste_album`, `titre_album`, `annee_album`, `numero_album`) VALUES
('Rolling in the Deep', 'Pop / Soul', 233, 'Adele_Rolling_in_the_Deep.mp3', 'A', 'Adele', 'Adele', 2011, 1),
('Set Fire to the Rain', 'Pop / Soul', 243, 'Adele_Set_Fire_to_the_Rain.mp3', 'A', 'Adele', 'Adele', 2011, 2),
('Adulescent', 'Chanson Française', 176, 'Aldebert_Adulescent.mp3', 'A', 'Aldebert', 'Aldebert', 2013, 1),
('Amoureuse', 'Chanson Française', 214, 'Aldebert_Amoureuse.mp3', 'A', 'Aldebert', 'Aldebert', 2013, 2),
('Etats d''amour', 'Pop Française', 226, 'Amir_Etats_d_amour.mp3', 'A', 'Amir', 'Amir', 2017, 1),
('Higher', 'Pop Française', 188, 'Amir_Higher.mp3', 'A', 'Amir', 'Amir', 2017, 2),
('Bruxelles je t''aime', 'Pop Française', 241, 'Angele_Bruxelles_je_t_aime.mp3', 'A', 'Angele', 'Angele', 2021, 1),
('Flou', 'Pop Française', 197, 'Angele_Flou.mp3', 'A', 'Angele', 'Angele', 2021, 2),
('Bad dreams', 'Electro / Deep House', 172, 'Bakermat_Bad_dreams.mp3', 'A', 'Bakermat', 'Bakermat', 2019, 1),
('Baianá', 'Electro / Deep House', 200, 'Bakermat_Baiana.mp3', 'A', 'Bakermat', 'Bakermat', 2019, 2),
('Halo', 'R&B / Pop', 261, 'Beyonce_Halo.mp3', 'A', 'Beyoncé', 'Beyoncé', 2008, 1),
('Listen', 'R&B / Pop', 219, 'Beyonce_Listen.mp3', 'A', 'Beyoncé', 'Beyoncé', 2008, 2),
('1987', 'Variété / Pop Rock', 185, 'Calogero_1987.mp3', 'A', 'Calogero', 'Calogero', 2017, 1),
('Le portrait', 'Variété / Pop Rock', 177, 'Calogero_Le_portrait.mp3', 'A', 'Calogero', 'Calogero', 2017, 2),
('Feel So Close', 'Electro / Dance', 246, 'Calvin_Harris_Feel_So_Close.mp3', 'A', 'Calvin Harris', 'Calvin Harris', 2014, 1),
('Summer', 'Electro / Dance', 234, 'Calvin_Harris_Summer.mp3', 'A', 'Calvin Harris', 'Calvin Harris', 2014, 2),
('Emmenez-moi', 'Chanson Française', 213, 'Charles_Aznavour_Emmenez-moi.mp3', 'A', 'Charles Aznavour', 'Charles Aznavour', 1967, 1),
('La bohème', 'Chanson Française', 244, 'Charles_Aznavour_La_boheme.mp3', 'A', 'Charles Aznavour', 'Charles Aznavour', 1967, 2),
('A Sky Full Of Stars', 'Pop Rock', 274, 'Coldplay_A_Sky_Full_Of_Stars.mp3', 'A', 'Coldplay', 'Coldplay', 2014, 1),
('Hymn For The Weekend', 'Pop Rock', 260, 'Coldplay_Hymn_For_The_Weekend.mp3', 'A', 'Coldplay', 'Coldplay', 2014, 2),
('Stone Cold', 'Pop', 191, 'Demi_Lovato_Stone_Cold.mp3', 'A', 'Demi Lovato', 'Demi Lovato', 2015, 1),
('Warrior', 'Pop', 231, 'Demi_Lovato_Warrior.mp3', 'A', 'Demi Lovato', 'Demi Lovato', 2015, 2),
('My Sweet Summer', 'Reggae Rock', 220, 'Dirty_Heads_My_Sweet_Summer.mp3', 'A', 'Dirty Heads', 'Dirty Heads', 2014, 1),
('That''s All I Need', 'Reggae Rock', 215, 'Dirty_Heads_That_s_All_I_Need.mp3', 'A', 'Dirty Heads', 'Dirty Heads', 2014, 2),
('All of the stars', 'Pop', 237, 'Ed_Sheeran_All_of_the_stars.mp3', 'A', 'Ed Sheeran', 'Ed Sheeran', 2021, 1),
('Bad habits', 'Pop', 241, 'Ed_Sheeran_Bad_habits.mp3', 'A', 'Ed Sheeran', 'Ed Sheeran', 2021, 2),
('Je l''aime à mourir', 'Chanson Française', 164, 'Francis_Cabrel_Je_l_aime_a_mourir.mp3', 'A', 'Francis Cabrel', 'Francis Cabrel', 1979, 1),
('La cabane du pêcheur', 'Chanson Française', 306, 'Francis_Cabrel_La_cabane_du_pecheur.mp3', 'A', 'Francis Cabrel', 'Francis Cabrel', 1979, 2),
('Le Chant Des Sirènes', 'Pop Acoustique', 174, 'Frero_Delavega_Le_Chant_Des_Sirenes.mp3', 'A', 'Frero Delavega', 'Frero Delavega', 2014, 1),
('Mon petit pays', 'Pop Acoustique', 202, 'Frero_Delavega_Mon_petit_pays.mp3', 'A', 'Frero Delavega', 'Frero Delavega', 2014, 2),
('Monster', 'Electro / Dance', 167, 'Gabry_Ponte_Monster.mp3', 'A', 'Gabry Ponte', 'Gabry Ponte', 2021, 1),
('Thunder', 'Electro / Dance', 160, 'Gabry_Ponte_Thunder.mp3', 'A', 'Gabry Ponte', 'Gabry Ponte', 2021, 2),
('Anyone For You', 'Folk Pop', 235, 'George_Ezra_Anyone_For_You.mp3', 'A', 'George Ezra', 'George Ezra', 2022, 1),
('Budapest', 'Folk Pop', 216, 'George_Ezra_Budapest.mp3', 'A', 'George Ezra', 'George Ezra', 2022, 2),
('Derriere le brouillard', 'Slam / Chanson', 253, 'Grand_Corps_Malade_Derriere_le_brouillard.mp3', 'A', 'Grand Corps Malade', 'Grand Corps Malade', 2020, 1),
('Des mots', 'Slam / Chanson', 208, 'Grand_Corps_Malade_Des_mots.mp3', 'A', 'Grand Corps Malade', 'Grand Corps Malade', 2020, 2),
('As is was', 'Pop Rock', 165, 'Harry_styles_As_is_was.mp3', 'A', 'Harry styles', 'Harry styles', 2022, 1),
('Sign of the Times', 'Pop Rock', 335, 'Harry_Styles_Sign_of_the_Times.mp3', 'A', 'Harry Styles', 'Harry Styles', 2022, 2),
('Puis t''as dansé avec moi', 'Pop Française', 218, 'Hoshi_Puis_t_as_danse_avec_moi.mp3', 'A', 'Hoshi', 'Hoshi', 2018, 1),
('Ta Marinière', 'Pop Française', 224, 'Hoshi_Ta_Mariniere.mp3', 'A', 'Hoshi', 'Hoshi', 2018, 2),
('Bad Liar', 'Alternative Rock', 260, 'Imagine_Dragons_Bad_Liar.mp3', 'A', 'Imagine Dragons', 'Imagine Dragons', 2017, 1),
('Believer', 'Alternative Rock', 202, 'Imagine_Dragons_Believer.mp3', 'A', 'Imagine Dragons', 'Imagine Dragons', 2017, 2),
('Canary Bay', 'Pop Rock Français', 323, 'Indochine_Canary_Bay.mp3', 'A', 'Indochine', 'Indochine', 1982, 1),
('L''aventurier', 'Pop Rock Français', 233, 'Indochine_L_aventurier.mp3', 'A', 'Indochine', 'Indochine', 1982, 2),
('Au bout de mes Rêves', 'Chanson / Pop Rock', 234, 'Jean-Jacques_Goldman_Au_bout_de_mes_Reves.mp3', 'A', 'Jean-Jacques Goldman', 'Jean-Jacques Goldman', 1987, 1),
('C''est Pas Vrai', 'Chanson / Pop Rock', 296, 'Jean-Jacques_Goldman_C_est_Pas_Vrai.mp3', 'A', 'Jean-Jacques Goldman', 'Jean-Jacques Goldman', 1987, 2),
('Contact', 'Pop Rock Français', 219, 'Kyo_Contact.mp3', 'A', 'Kyo', 'Kyo', 2003, 1),
('Dernière danse', 'Pop Rock Français', 210, 'Kyo_Derniere_danse.mp3', 'A', 'Kyo', 'Kyo', 2003, 2);

-- 2. Création des playlists thématiques
INSERT INTO `playlist` (`id`, `nom`) VALUES (10, 'Variété & Chanson Française') ON DUPLICATE KEY UPDATE `nom` = VALUES(`nom`);
INSERT INTO `playlist` (`id`, `nom`) VALUES (11, 'Pop & Rock International') ON DUPLICATE KEY UPDATE `nom` = VALUES(`nom`);
INSERT INTO `playlist` (`id`, `nom`) VALUES (12, 'Electro & Dance Club') ON DUPLICATE KEY UPDATE `nom` = VALUES(`nom`);
INSERT INTO `playlist` (`id`, `nom`) VALUES (13, 'Top Hits 2026 - Sélection Complète') ON DUPLICATE KEY UPDATE `nom` = VALUES(`nom`);

-- 3. Association des pistes aux playlists

-- Top Hits (tous les morceaux)
INSERT IGNORE INTO `playlist2track` (`id_pl`, `id_track`, `no_piste_dans_liste`)
SELECT 13, id, ROW_NUMBER() OVER (ORDER BY id) FROM `track` WHERE `filename` LIKE '%.mp3';


-- Variété & Chanson Française
INSERT IGNORE INTO `playlist2track` (`id_pl`, `id_track`, `no_piste_dans_liste`)
SELECT 10, id, ROW_NUMBER() OVER (ORDER BY id) FROM `track` WHERE `filename` IN ('Aldebert_Adulescent.mp3', 'Aldebert_Amoureuse.mp3', 'Amir_Etats_d_amour.mp3', 'Amir_Higher.mp3', 'Angele_Bruxelles_je_t_aime.mp3', 'Angele_Flou.mp3', 'Calogero_1987.mp3', 'Calogero_Le_portrait.mp3', 'Charles_Aznavour_Emmenez-moi.mp3', 'Charles_Aznavour_La_boheme.mp3', 'Francis_Cabrel_Je_l_aime_a_mourir.mp3', 'Francis_Cabrel_La_cabane_du_pecheur.mp3', 'Frero_Delavega_Le_Chant_Des_Sirenes.mp3', 'Frero_Delavega_Mon_petit_pays.mp3', 'Grand_Corps_Malade_Derriere_le_brouillard.mp3', 'Grand_Corps_Malade_Des_mots.mp3', 'Hoshi_Puis_t_as_danse_avec_moi.mp3', 'Hoshi_Ta_Mariniere.mp3', 'Indochine_Canary_Bay.mp3', 'Indochine_L_aventurier.mp3', 'Jean-Jacques_Goldman_Au_bout_de_mes_Reves.mp3', 'Jean-Jacques_Goldman_C_est_Pas_Vrai.mp3', 'Kyo_Contact.mp3', 'Kyo_Derniere_danse.mp3');


-- Pop & Rock International
INSERT IGNORE INTO `playlist2track` (`id_pl`, `id_track`, `no_piste_dans_liste`)
SELECT 11, id, ROW_NUMBER() OVER (ORDER BY id) FROM `track` WHERE `filename` IN ('Adele_Rolling_in_the_Deep.mp3', 'Adele_Set_Fire_to_the_Rain.mp3', 'Beyonce_Halo.mp3', 'Beyonce_Listen.mp3', 'Coldplay_A_Sky_Full_Of_Stars.mp3', 'Coldplay_Hymn_For_The_Weekend.mp3', 'Demi_Lovato_Stone_Cold.mp3', 'Demi_Lovato_Warrior.mp3', 'Dirty_Heads_My_Sweet_Summer.mp3', 'Dirty_Heads_That_s_All_I_Need.mp3', 'Ed_Sheeran_All_of_the_stars.mp3', 'Ed_Sheeran_Bad_habits.mp3', 'George_Ezra_Anyone_For_You.mp3', 'George_Ezra_Budapest.mp3', 'Harry_styles_As_is_was.mp3', 'Harry_Styles_Sign_of_the_Times.mp3', 'Imagine_Dragons_Bad_Liar.mp3', 'Imagine_Dragons_Believer.mp3');


-- Electro & Dance Club
INSERT IGNORE INTO `playlist2track` (`id_pl`, `id_track`, `no_piste_dans_liste`)
SELECT 12, id, ROW_NUMBER() OVER (ORDER BY id) FROM `track` WHERE `filename` IN ('Bakermat_Bad_dreams.mp3', 'Bakermat_Baiana.mp3', 'Calvin_Harris_Feel_So_Close.mp3', 'Calvin_Harris_Summer.mp3', 'Gabry_Ponte_Monster.mp3', 'Gabry_Ponte_Thunder.mp3');


-- 4. Attribution des playlists aux utilisateurs
INSERT IGNORE INTO `user2playlist` (`id_user`, `id_pl`) VALUES
(1, 10), (1, 11), (1, 12), (1, 13),
(2, 10), (2, 11), (2, 13),
(3, 11), (3, 12), (3, 13),
(5, 10), (5, 11), (5, 12), (5, 13);
