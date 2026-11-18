<?php

declare(strict_types=1);

namespace iutnc\deefy\action;

use iutnc\deefy\audio\lists\PlayList;
use iutnc\deefy\render\AudioListRenderer;
use iutnc\deefy\repository\DeefyRepository;

class AddPlaylistAction extends Action
{
    public function execute(): string
    {
        if ($this->http_method !== 'POST') {
            return $this->form();
        }
        $nom = trim((string) ($_POST['nom'] ?? ''));
        if ($nom === '' || $this->length($nom) > 100) {
            return $this->form('Le nom est obligatoire (100 caractères maximum).');
        }
        $pl = DeefyRepository::getInstance()->saveEmptyPlaylist(new PlayList($nom));
        $_SESSION['playlist'] = $pl;
        return (new AudioListRenderer($pl))->render()
            . '<p><a href="?action=add-track">Ajouter une piste</a></p>';
    }

    private function form(string $error = ''): string
    {
        $msg = $error === '' ? '' : '<p class="error">' . htmlspecialchars($error, ENT_QUOTES, 'UTF-8') . '</p>';
        return <<<HTML
<h2>Créer une playlist</h2>
{$msg}
<form method="post" action="?action=add-playlist">
  <p><label for="nom">Nom de la playlist</label>
  <input type="text" id="nom" name="nom" maxlength="100" required></p>
  <p><button type="submit">Créer</button></p>
</form>
HTML;
    }
}
