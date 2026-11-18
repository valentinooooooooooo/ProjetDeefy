# Deefy – mini-projet BUT Informatique S3 (Développement Web)

## Installation
1. Créer la base et la remplir : `mysql -u <login> -p <base> < sql/deefy.sql`
2. Adapter `config/deefy.db.ini` (driver, host, database, username, password).
3. (Optionnel) `composer install` pour générer `vendor/autoload.php` ; sans cela, l'autoloader PSR-4 maison (`src/loader/Psr4ClassLoader.php`) est utilisé automatiquement.
4. Le dossier `audio/` doit être accessible en écriture par le serveur web (uploads). Y décompresser `audio.zip` pour les pistes d'exemple.
5. Point d'entrée : `index.php`.

## Tableau de bord des fonctionnalités

| # | Fonctionnalité | URL | État |
|---|----------------|-----|------|
| 1 | Mes playlists (liste depuis la BD) | `?action=playlists` | fait |
| 2 | Clic sur une playlist : affichage + devient la playlist courante (session) | `?action=playlist&id=N` | fait |
| 3 | Ajouter une piste (formulaire + upload mp3) à la playlist courante | `?action=add-track` | fait |
| 4 | Créer une playlist vide (enregistrée en BD, devient courante) | `?action=add-playlist` | fait |
| 5 | Afficher la playlist courante (session) | `?action=playlist` | fait |
| 6 | S'inscrire | – | non réalisé (hors périmètre) |
| 7 | S'authentifier | – | non réalisé (hors périmètre) |
| – | Politique d'autorisations | – | non réalisé (hors périmètre) |

Sans authentification, « mes playlists » liste toutes les playlists de la base.

## Sécurité
- Requêtes SQL préparées (PDO, émulation désactivée) : pas d'injection SQL.
- Toutes les données affichées passent par `htmlspecialchars` : pas de XSS.
- Upload : extension `.mp3`, type client `audio/mpeg` et signature du contenu (ID3 / trame MPEG) vérifiés ; fichier renommé aléatoirement avec extension `.mp3` imposée.
- `config/` protégé par `.htaccess` (idéalement, à placer hors du dossier web).

## Comptes de test
Aucun : l'authentification n'est pas implémentée. Le script SQL conserve néanmoins les tables `User` et `user2playlist` du script fourni.

## Structure
`index.php` (routes + dispatcher) · `src/classes/{action,audio,dispatch,exception,render,repository}` (PSR-4 `iutnc\deefy\` → `src/classes`) · `css/` · `sql/` · `config/` · `audio/`
