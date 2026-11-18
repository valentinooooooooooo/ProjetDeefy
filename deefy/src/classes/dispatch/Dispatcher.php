<?php

declare(strict_types=1);

namespace iutnc\deefy\dispatch;

class Dispatcher
{
    private string $action;
    private array $routes = [];

    public function __construct()
    {
        $action = $_GET['action'] ?? 'default';
        $this->action = is_string($action) ? $action : 'default';
    }

    public function addRoute(string $action, string $class): self
    {
        $this->routes[$action] = $class;
        return $this;
    }

    public function run(): void
    {
        try {
            if (!isset($this->routes[$this->action])) {
                http_response_code(404);
                $html = '<p>Page introuvable.</p>';
            } else {
                $class = $this->routes[$this->action];
                $html = (new $class())->execute();
            }
        } catch (\Throwable $e) {
            error_log($e->getMessage());
            http_response_code(500);
            $html = '<p>Une erreur est survenue, veuillez réessayer plus tard.</p>';
        }
        $this->renderPage($html);
    }

    private function renderPage(string $html): void
    {
        echo <<<HTML
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Deefy</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <header>
    <h1>Deefy</h1>
    <nav>
      <ul>
        <li><a href="?action=default">Accueil</a></li>
        <li><a href="?action=playlists">Mes playlists</a></li>
        <li><a href="?action=add-playlist">Créer une playlist</a></li>
        <li><a href="?action=playlist">Playlist courante</a></li>
      </ul>
    </nav>
  </header>
  <main>
{$html}
  </main>
</body>
</html>
HTML;
    }
}
