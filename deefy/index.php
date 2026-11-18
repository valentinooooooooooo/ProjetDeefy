<?php

declare(strict_types=1);

// Autoloader généré par composer si présent, sinon autoloader PSR-4 maison (TD6)
if (is_file(__DIR__ . '/vendor/autoload.php')) {
    require_once __DIR__ . '/vendor/autoload.php';
} else {
    require_once __DIR__ . '/src/loader/Psr4ClassLoader.php';
    (new \loader\Psr4ClassLoader('iutnc\\deefy\\', __DIR__ . '/src/classes'))->register();
}

use iutnc\deefy\action\AddPlaylistAction;
use iutnc\deefy\action\AddPodcastTrackAction;
use iutnc\deefy\action\DefaultAction;
use iutnc\deefy\action\DisplayPlaylistAction;
use iutnc\deefy\action\ListPlaylistsAction;
use iutnc\deefy\dispatch\Dispatcher;
use iutnc\deefy\repository\DeefyRepository;

session_start();

DeefyRepository::setConfig(__DIR__ . '/config/deefy.db.ini');

$dispatcher = new Dispatcher();
$dispatcher->addRoute('default', DefaultAction::class)
    ->addRoute('playlists', ListPlaylistsAction::class)
    ->addRoute('playlist', DisplayPlaylistAction::class)
    ->addRoute('add-playlist', AddPlaylistAction::class)
    ->addRoute('add-track', AddPodcastTrackAction::class);
$dispatcher->run();
