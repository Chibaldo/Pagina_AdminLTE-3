<?php
session_start();  // Solo se llama una vez, al principio de la ejecución de la aplicación.

class Conectar{
    protected $bdh;

    // Método de conexión con PDO
    protected function Conexion(){
        try{
            // Conexión a la base de datos con PDO
            $this->bdh = new PDO("mysql:host=localhost;dbname=pagina", "root", "");
            // Establecer el modo de error de PDO para excepciones
            $this->bdh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->bdh;
        }catch(Exception $e){
            // En caso de error, mostrar el mensaje y terminar el script
            print "Error BD: ".$e->getMessage()."</br>";
            die();
        }
    }

    // Método para establecer la codificación de caracteres
    public function set_names(){
        return $this->bdh->query("SET NAMES 'utf8'");  
    }

    // Ruta de la página
    public static function ruta() {
        // Ruta local
        return "http://localhost/Pagina/";
        // Para la web, descomentar la siguiente línea
        // return "https://www.sudominio.com/Pagina/";
    }
}
?>
