<?php

class BDD
{
    // Propriétés de la base de données
    private $host = "localhost";
    private $db_name = "boutique";
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
    public function isAdmin() {
        if(!empty($_SESSION)) {
            if($_SESSION['idRole'] == '2') {
                return true;
            }   
        }
        return false;
    }
}
