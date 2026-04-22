<?php

class DatosPersonales
{
    // 1. Atributos privados (Encapsulamiento)
    private $nombre;
    private $apellido;
    private $edad;

    // 2. Método Constructor
    public function __construct()
    {
        $this->nombre = "";
        $this->apellido = "";
        $this->edad = 0;
    }

    // 3. Getters y Setters
    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function getApellido()
    {
        return $this->apellido;
    }

    public function setApellido($apellido)
    {
        $this->apellido = $apellido;
    }

    public function getEdad()
    {
        return $this->edad;
    }

    public function setEdad($edad)
    {
        $this->edad = $edad;
    }

    // 4. Métodos de comportamiento de la clase

    /**
     * Valida que los datos obligatorios no estén vacíos y cumplan con el formato seguro.
     * Obtiene los datos directamente del arreglo $datos en lugar de los atributos de la clase.
     * @param array $datos Arreglo asociativo con los datos a validar
     * @return bool Retorna true si todo es válido y seguro.
     */
    public function sonDatosValidos($datos)
    {
        $esValido = true;

        // 1. Definimos los mismos patrones que usamos en JS
        // Importante: los patrones en PHP van entre delimitadores, como / /
        $regexTexto = "/^[a-záéíóúñ\s]+$/i";
        $regexApellido = "/^[a-záéíóúñ\s]+$/i";

        // 2. Validación de existencia de claves y vacíos (Presencia)
        // array_key_exists -> Comprueba si la clave existe en el array.
        // empty -> Determinar si una variable está vacía.
        if (
            !array_key_exists('nombre', $datos) || empty($datos['nombre']) ||
            !array_key_exists('apellido', $datos) || empty($datos['apellido'])
        ) {
            $esValido = false;
        }

        // 3. Validación de Edad (Tipo y Rango)
        // is_numeric -> Determina si una variable es un número o una cadena numérica.
        if ($esValido && (!array_key_exists('edad', $datos) || !is_numeric($datos['edad']) ||
            $datos['edad'] <= 0 || $datos['edad'] > 120)) {
            $esValido = false;
        }

        // 4. VALIDACIÓN DE FORMATO (Seguridad contra inyección por restricción)
        // preg_match -> Busca coincidencias con una expresión regular 
        // Las regex, son expresiones regulares.
        // preg_match retorna 1 si coincide, 0 si no.

        // Validar Nombre
        if ($esValido && !preg_match($regexTexto, $datos['nombre'])) {
            $esValido = false;
        }

        // Validar Apellido
        if ($esValido && !preg_match($regexApellido, $datos['apellido'])) {
            $esValido = false;
        }

        return $esValido;
    }

    /**
     * Carga los atributos del objeto a partir de un arreglo asociativo.
     * Solo carga si los datos son válidos (validados por sonDatosValidos).
     * @param array $datos Arreglo asociativo con los datos a validar y cargar
     * @return bool Retorna true si se cargaron los datos, false si son inválidos.
     */
    public function cargarObjeto($datos)
    {
        $esCargado = false;
        if ($this->sonDatosValidos($datos)) {
            $this->setNombre($datos['nombre']);
            $this->setApellido($datos['apellido']);
            $this->setEdad($datos['edad']);
            $esCargado = true;
        }
        return $esCargado;
    }

    /**
     * Evalúa si la persona es mayor de edad (18 años o más).
     * @return bool Retorna true si es mayor, false si es menor.
     */
    public function esMayorDeEdad($datos)
    {
        $esMayorEdad = false;
        if ($this->cargarObjeto($datos)) {
            if ($this->getEdad() >= 18) {
                $esMayorEdad = true;
            }
        }
        return $esMayorEdad;
    }
}
