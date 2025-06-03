<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Exercise;
use App\Models\ProgrammingLanguage;
use App\Models\LanguageLevel;

class ExerciseSeeder extends Seeder
{
    public function run(): void
    {
        // Usar IDs directos basados en tu estructura existente
        $javascriptId = 1; // JavaScript
        $basicLevelId = 1; // Básico
        $intermediateLevelId = 2; // Intermedio
        $advancedLevelId = 3; // Avanzado

        $exercises = [
            // Nivel Básico
            [
                'programming_language_id' => $javascriptId,
                'language_level_id' => $basicLevelId,
                'title' => 'Hello World',
                'slug' => 'javascript-basico-hello-world',
                'description' => 'Escribe un programa que imprima "Hello World" en la consola.',
                'code' => 'const greet = () => {
    console.log("Hello World!");
};

greet();',
                'is_active' => true
            ],
            [
                'programming_language_id' => $javascriptId,
                'language_level_id' => $basicLevelId,
                'title' => 'Variables y Operaciones',
                'slug' => 'javascript-basico-variables',
                'description' => 'Declara variables y realiza operaciones básicas.',
                'code' => 'const nombre = "Juan";
let edad = 25;
let esEstudiante = true;

console.log(`Mi nombre es ${nombre}`);
console.log(`Tengo ${edad} años`);
console.log(`¿Soy estudiante? ${esEstudiante}`);',
                'is_active' => true
            ],
            [
                'programming_language_id' => $javascriptId,
                'language_level_id' => $basicLevelId,
                'title' => 'Función Suma',
                'slug' => 'javascript-basico-suma',
                'description' => 'Crea una función que sume dos números.',
                'code' => 'function sumar(a, b) {
    return a + b;
}

const resultado = sumar(5, 3);
console.log(`La suma es: ${resultado}`);',
                'is_active' => true
            ],

            // Nivel Intermedio
            [
                'programming_language_id' => $javascriptId,
                'language_level_id' => $intermediateLevelId,
                'title' => 'Array Methods',
                'slug' => 'javascript-intermedio-array-methods',
                'description' => 'Utiliza métodos de arrays para manipular datos.',
                'code' => 'const numeros = [1, 2, 3, 4, 5];

const dobles = numeros.map(num => num * 2);
const pares = numeros.filter(num => num % 2 === 0);
const suma = numeros.reduce((acc, num) => acc + num, 0);

console.log("Números dobles:", dobles);
console.log("Números pares:", pares);
console.log("Suma total:", suma);',
                'is_active' => true
            ],
            [
                'programming_language_id' => $javascriptId,
                'language_level_id' => $intermediateLevelId,
                'title' => 'Objetos y Métodos',
                'slug' => 'javascript-intermedio-objetos',
                'description' => 'Trabaja con objetos y sus métodos.',
                'code' => 'const persona = {
    nombre: "Ana",
    edad: 30,
    ciudad: "Madrid",
    
    presentarse() {
        return `Hola, soy ${this.nombre} de ${this.ciudad}`;
    },
    
    cumplirAnios() {
        this.edad++;
        console.log(`¡Feliz cumpleaños! Ahora tengo ${this.edad} años`);
    }
};

console.log(persona.presentarse());
persona.cumplirAnios();',
                'is_active' => true
            ],
            [
                'programming_language_id' => $javascriptId,
                'language_level_id' => $intermediateLevelId,
                'title' => 'Async/Await',
                'slug' => 'javascript-intermedio-async-await',
                'description' => 'Implementa funciones asíncronas con async/await.',
                'code' => 'async function obtenerDatos() {
    try {
        console.log("Obteniendo datos...");
        
        const respuesta = await fetch("https://api.ejemplo.com/datos");
        const datos = await respuesta.json();
        
        console.log("Datos obtenidos:", datos);
        return datos;
    } catch (error) {
        console.error("Error al obtener datos:", error);
    }
}

obtenerDatos();',
                'is_active' => true
            ],

            // Nivel Avanzado
            [
                'programming_language_id' => $javascriptId,
                'language_level_id' => $advancedLevelId,
                'title' => 'Closures y Scope',
                'slug' => 'javascript-avanzado-closures',
                'description' => 'Implementa closures para encapsular datos.',
                'code' => 'function crearContador(inicial = 0) {
    let contador = inicial;
    
    return {
        incrementar() {
            contador++;
            return contador;
        },
        
        decrementar() {
            contador--;
            return contador;
        },
        
        obtenerValor() {
            return contador;
        },
        
        resetear() {
            contador = inicial;
            return contador;
        }
    };
}

const miContador = crearContador(5);
console.log(miContador.incrementar()); // 6
console.log(miContador.decrementar()); // 5
console.log(miContador.obtenerValor()); // 5',
                'is_active' => true
            ],
            [
                'programming_language_id' => $javascriptId,
                'language_level_id' => $advancedLevelId,
                'title' => 'Prototype Pattern',
                'slug' => 'javascript-avanzado-prototype',
                'description' => 'Utiliza prototipos para crear objetos reutilizables.',
                'code' => 'function Vehiculo(marca, modelo) {
    this.marca = marca;
    this.modelo = modelo;
    this.velocidad = 0;
}

Vehiculo.prototype.acelerar = function(incremento) {
    this.velocidad += incremento;
    console.log(`${this.marca} ${this.modelo} acelera a ${this.velocidad} km/h`);
};

Vehiculo.prototype.frenar = function() {
    this.velocidad = 0;
    console.log(`${this.marca} ${this.modelo} se ha detenido`);
};

const coche = new Vehiculo("Toyota", "Corolla");
coche.acelerar(50);
coche.acelerar(30);
coche.frenar();',
                'is_active' => true
            ],
            [
                'programming_language_id' => $javascriptId,
                'language_level_id' => $advancedLevelId,
                'title' => 'Generator Functions',
                'slug' => 'javascript-avanzado-generators',
                'description' => 'Implementa generadores para iteración controlada.',
                'code' => 'function* fibonacci() {
    let a = 0, b = 1;
    
    while (true) {
        yield a;
        [a, b] = [b, a + b];
    }
}

function* tomarNumeros(generador, cantidad) {
    let contador = 0;
    
    for (const valor of generador) {
        if (contador >= cantidad) break;
        
        yield valor;
        contador++;
    }
}

const fib = fibonacci();
const primeros10 = tomarNumeros(fib, 10);

for (const numero of primeros10) {
    console.log(numero);
}',
                'is_active' => true
            ]
        ];

        foreach ($exercises as $exercise) {
            Exercise::firstOrCreate(
                ['slug' => $exercise['slug']],
                $exercise
            );
        }
    }
}