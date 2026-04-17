<?php

class DatosPersonales {
    // 1. Atributos privados (Encapsulamiento)
    private $nombre;
    private $apellido;
    private $edad;

    // 2. Método Constructor
    public function __construct() {
        $this->nombre = "";
        $this->apellido = "";
        $this->edad = 0;
    }

    // 3. Getters y Setters
    public function getNombre() {
        return $this->nombre;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function getApellido() {
        return $this->apellido;
    }

    public function setApellido($apellido) {
        $this->apellido = $apellido;
    }

    public function getEdad() {
        return $this->edad;
    }

    public function setEdad($edad) {
        $this->edad = $edad;
    }

    // 4. Métodos de comportamiento de la clase

    /**
     * Carga los atributos del objeto a partir de un arreglo asociativo.
     * Es ideal para usar con el array que retorna data_submitted().
     */
    public function cargarObjeto($datos) {
        // Validamos que las claves existan en el arreglo antes de setearlas
        if (array_key_exists('nombre', $datos)) {
            $this->setNombre($datos['nombre']);
        }
        if (array_key_exists('apellido', $datos)) {
            $this->setApellido($datos['apellido']);
        }
        if (array_key_exists('edad', $datos)) {
            $this->setEdad($datos['edad']);
        }
    }

    /**
     * Evalúa si la persona es mayor de edad (18 años o más).
     * @return bool Retorna true si es mayor, false si es menor.
     */
    public function esMayorDeEdad($datos) {
        $this->cargarObjeto($datos);
        
        $esMayorEdad = false;
        if ($this->getEdad() >= 18) {
            $esMayorEdad = true;
        }
    return $esMayorEdad;
    }
}
?>