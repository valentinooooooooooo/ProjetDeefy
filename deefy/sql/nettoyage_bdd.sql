-- ============================================================================
-- Nettoyage de la base de données Deefy
-- Suppression des 9 pistes fictives du sujet (Pink Floyd, Beethoven, Denver...)
-- et des 4 playlists de test obsolètes (Playlists 1 à 4)
-- ============================================================================
SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- 1. Suppression des liaisons des anciennes pistes
DELETE FROM `playlist2track` WHERE `id_track` BETWEEN 1 AND 9;
DELETE FROM `playlist2track` WHERE `id_pl` BETWEEN 1 AND 4;

-- 2. Suppression des liaisons des anciennes playlists pour les utilisateurs
DELETE FROM `user2playlist` WHERE `id_pl` BETWEEN 1 AND 4;

-- 3. Suppression des 4 anciennes playlists
DELETE FROM `playlist` WHERE `id` BETWEEN 1 AND 4;

-- 4. Suppression des 9 morceaux fictifs
DELETE FROM `track` WHERE `id` BETWEEN 1 AND 9;

SET FOREIGN_KEY_CHECKS = 1;
