<?php 
session_start();
require_once('DB.php');
/**
 * Classe responsádvel por gerenciar o login do usuário.
 */
class Login { 
    private $name = 'admin'; 
    private $password = 'admin'; 
    
    public function verificar_credenciais($name, $password) { 
        if ($name == $this->name) {
            if ($password == $this->password) {
                $_SESSION["logged_in"] = TRUE;
                return TRUE;
            }
        }
        return FALSE;
    } 

    public function verificar_logado() { 
        if (isset($_SESSION["logged_in"]) && $_SESSION["logged_in"] === TRUE) {
            return TRUE;
        }
        $this->logout();
    } 

    public function logout() { 
        session_destroy();
        header("Location: index.php");
        exit();
    } 
} 
?>
