<?php
class BDD
{
    // Propriétés de la base de données
    private $host = "localhost";
    private $db_name = "boutique_mvc";
    private $username = "root";
    private $password = "";

    protected function getBdd()
    {
        try {
            return new PDO(
                "mysql:host=" . $this->host . ";dbname=" . $this->db_name . ";charset=UTF8",
                $this->username,
                $this->password,
                array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)
            );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    /* ------------------------------------- FONCTIONS GÉNÉRALES ------------------------------------- */
    public function redirectNow($url)
    {
        if (!headers_sent()) {
            header('Location: ' . $url);
            exit;
        } else {
            echo '<script type="text/javascript">';
            echo 'window.location.href="' . $url . '";';
            echo '</script>';
            echo '<noscript>';
            echo '<meta http-equiv="refresh" content="0; url=' . $url . '" />';
            echo '</noscript>';
            exit;
        }
    }
    public function isConnected()
    {
        if (!empty($_SESSION['pseudo'])) {
            return true;
        }
        return false;
    }
    public function isAdmin()
    {
        if (!empty($_SESSION)) {
            if ($_SESSION['idRole'] == '2') {
                return true;
            }
        }
        return false;
    }
    protected function saveLastUrl()
    {
        $last_url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $_SESSION['last_url'] = $last_url;
    }
}
