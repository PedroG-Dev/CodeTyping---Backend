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

        // IDs para otros lenguajes
        $pythonId = 2;
        $javaId = 3;
        $cppId = 4;
        $phpId = 5;
        $rubyId = 6;

        // IDs de niveles corregidos (12 y 13 no existen)
        $pyBasicId = 4;
        $pyIntermediateId = 5;
        $pyAdvancedId = 6;

        $javaBasicId = 7;
        $javaIntermediateId = 8;
        $javaAdvancedId = 9;

        $cppBasicId = 10;
        $cppIntermediateId = 11;
        $cppAdvancedId = 14; // Era 12, pero no existe, ahora es 14

        $phpBasicId = 15;     // Era 13, pero no existe, ahora es 15
        $phpIntermediateId = 16; // Era 14, ahora es 16
        $phpAdvancedId = 17;     // Era 15, ahora es 17

        $rubyBasicId = 18;       // Era 16, ahora es 18
        $rubyIntermediateId = 19; // Era 17, ahora es 19
        $rubyAdvancedId = 20;     // Era 18, ahora es 20

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
            ],

            // === PYTHON EXERCISES ===
            // Nivel Básico
            [
                'programming_language_id' => $pythonId,
                'language_level_id' => $pyBasicId,
                'title' => 'Hello World Python',
                'slug' => 'python-basico-hello-world',
                'description' => 'Escribe un programa que imprima "Hello World" en Python.',
                'code' => 'def greet():
    print("Hello World!")

greet()',
                'is_active' => true
            ],
            [
                'programming_language_id' => $pythonId,
                'language_level_id' => $pyBasicId,
                'title' => 'Variables y Tipos',
                'slug' => 'python-basico-variables',
                'description' => 'Declara variables de diferentes tipos en Python.',
                'code' => 'nombre = "Juan"
edad = 25
es_estudiante = True

print(f"Mi nombre es {nombre}")
print(f"Tengo {edad} años")
print(f"¿Soy estudiante? {es_estudiante}")',
                'is_active' => true
            ],
            [
                'programming_language_id' => $pythonId,
                'language_level_id' => $pyBasicId,
                'title' => 'Función Suma',
                'slug' => 'python-basico-suma',
                'description' => 'Crea una función que sume dos números en Python.',
                'code' => 'def sumar(a, b):
    return a + b

resultado = sumar(5, 3)
print(f"La suma es: {resultado}")',
                'is_active' => true
            ],

            // Nivel Intermedio
            [
                'programming_language_id' => $pythonId,
                'language_level_id' => $pyIntermediateId,
                'title' => 'Listas y Comprensiones',
                'slug' => 'python-intermedio-listas',
                'description' => 'Trabaja con listas y list comprehensions.',
                'code' => 'numeros = [1, 2, 3, 4, 5]

dobles = [num * 2 for num in numeros]
pares = [num for num in numeros if num % 2 == 0]
suma_total = sum(numeros)

print(f"Números dobles: {dobles}")
print(f"Números pares: {pares}")
print(f"Suma total: {suma_total}")',
                'is_active' => true
            ],
            [
                'programming_language_id' => $pythonId,
                'language_level_id' => $pyIntermediateId,
                'title' => 'Clases y Objetos',
                'slug' => 'python-intermedio-clases',
                'description' => 'Implementa clases con métodos y propiedades.',
                'code' => 'class Persona:
    def __init__(self, nombre, edad):
        self.nombre = nombre
        self.edad = edad
    
    def presentarse(self):
        return f"Hola, soy {self.nombre}"
    
    def cumplir_anos(self):
        self.edad += 1
        print(f"¡Feliz cumpleaños! Ahora tengo {self.edad} años")

persona = Persona("Ana", 30)
print(persona.presentarse())
persona.cumplir_anos()',
                'is_active' => true
            ],
            [
                'programming_language_id' => $pythonId,
                'language_level_id' => $pyIntermediateId,
                'title' => 'Diccionarios y Bucles',
                'slug' => 'python-intermedio-diccionarios',
                'description' => 'Trabaja con diccionarios y métodos de iteración.',
                'code' => 'estudiante = {
    "nombre": "Pedro",
    "edad": 22,
    "materias": ["Python", "JavaScript", "SQL"]
}

for clave, valor in estudiante.items():
    if isinstance(valor, list):
        print(f"{clave}: {", ".join(valor)}")
    else:
        print(f"{clave}: {valor}")',
                'is_active' => true
            ],

            // Nivel Avanzado
            [
                'programming_language_id' => $pythonId,
                'language_level_id' => $pyAdvancedId,
                'title' => 'Decoradores',
                'slug' => 'python-avanzado-decoradores',
                'description' => 'Implementa y utiliza decoradores.',
                'code' => 'def cronometrar(func):
    import time
    def wrapper(*args, **kwargs):
        inicio = time.time()
        resultado = func(*args, **kwargs)
        fin = time.time()
        print(f"{func.__name__} tardó {fin - inicio:.4f} segundos")
        return resultado
    return wrapper

@cronometrar
def calcular_fibonacci(n):
    if n <= 1:
        return n
    return calcular_fibonacci(n-1) + calcular_fibonacci(n-2)

print(calcular_fibonacci(10))',
                'is_active' => true
            ],
            [
                'programming_language_id' => $pythonId,
                'language_level_id' => $pyAdvancedId,
                'title' => 'Context Managers',
                'slug' => 'python-avanzado-context-managers',
                'description' => 'Crea context managers personalizados.',
                'code' => 'class MiArchivo:
    def __init__(self, archivo, modo):
        self.archivo = archivo
        self.modo = modo
    
    def __enter__(self):
        print(f"Abriendo {self.archivo}")
        self.file = open(self.archivo, self.modo)
        return self.file
    
    def __exit__(self, exc_type, exc_val, exc_tb):
        print(f"Cerrando {self.archivo}")
        self.file.close()

with MiArchivo("test.txt", "w") as f:
    f.write("Hola desde Python!")',
                'is_active' => true
            ],
            [
                'programming_language_id' => $pythonId,
                'language_level_id' => $pyAdvancedId,
                'title' => 'Generadores',
                'slug' => 'python-avanzado-generadores',
                'description' => 'Implementa generadores para iteración controlada.',
                'code' => 'def fibonacci_generator():
    a, b = 0, 1
    while True:
        yield a
        a, b = b, a + b

def tomar_numeros(generador, cantidad):
    for i, valor in enumerate(generador):
        if i >= cantidad:
            break
        yield valor

fib = fibonacci_generator()
primeros_10 = list(tomar_numeros(fib, 10))

for numero in primeros_10:
    print(numero)',
                'is_active' => true
            ],

            // === JAVA EXERCISES ===
            // Nivel Básico
            [
                'programming_language_id' => $javaId,
                'language_level_id' => $javaBasicId,
                'title' => 'Hello World Java',
                'slug' => 'java-basico-hello-world',
                'description' => 'Escribe un programa que imprima "Hello World" en Java.',
                'code' => 'public class HelloWorld {
    public static void main(String[] args) {
        System.out.println("Hello World!");
    }
}',
                'is_active' => true
            ],
            [
                'programming_language_id' => $javaId,
                'language_level_id' => $javaBasicId,
                'title' => 'Variables y Tipos',
                'slug' => 'java-basico-variables',
                'description' => 'Declara variables de diferentes tipos en Java.',
                'code' => 'public class Variables {
    public static void main(String[] args) {
        String nombre = "Juan";
        int edad = 25;
        boolean esEstudiante = true;
        
        System.out.println("Mi nombre es " + nombre);
        System.out.println("Tengo " + edad + " años");
        System.out.println("¿Soy estudiante? " + esEstudiante);
    }
}',
                'is_active' => true
            ],
            [
                'programming_language_id' => $javaId,
                'language_level_id' => $javaBasicId,
                'title' => 'Métodos y Funciones',
                'slug' => 'java-basico-metodos',
                'description' => 'Crea métodos que realicen operaciones básicas.',
                'code' => 'public class Calculadora {
    public static int sumar(int a, int b) {
        return a + b;
    }
    
    public static void main(String[] args) {
        int resultado = sumar(5, 3);
        System.out.println("La suma es: " + resultado);
    }
}',
                'is_active' => true
            ],

            // Nivel Intermedio
            [
                'programming_language_id' => $javaId,
                'language_level_id' => $javaIntermediateId,
                'title' => 'Clases y Objetos',
                'slug' => 'java-intermedio-clases',
                'description' => 'Implementa clases con constructores y métodos.',
                'code' => 'public class Persona {
    private String nombre;
    private int edad;
    
    public Persona(String nombre, int edad) {
        this.nombre = nombre;
        this.edad = edad;
    }
    
    public String presentarse() {
        return "Hola, soy " + nombre;
    }
    
    public void cumplirAnos() {
        edad++;
        System.out.println("¡Feliz cumpleaños! Ahora tengo " + edad + " años");
    }
}',
                'is_active' => true
            ],
            [
                'programming_language_id' => $javaId,
                'language_level_id' => $javaIntermediateId,
                'title' => 'Arrays y Listas',
                'slug' => 'java-intermedio-arrays',
                'description' => 'Utiliza arrays y ArrayList para manejar datos.',
                'code' => 'import java.util.ArrayList;

public class ManejoArrays {
    public static void main(String[] args) {
        int[] numeros = {1, 2, 3, 4, 5};
        ArrayList<Integer> dobles = new ArrayList<>();
        
        for (int num : numeros) {
            dobles.add(num * 2);
        }
        
        System.out.println("Números dobles: " + dobles);
        System.out.println("Total elementos: " + dobles.size());
    }
}',
                'is_active' => true
            ],
            [
                'programming_language_id' => $javaId,
                'language_level_id' => $javaIntermediateId,
                'title' => 'Herencia y Polimorfismo',
                'slug' => 'java-intermedio-herencia',
                'description' => 'Implementa herencia básica entre clases.',
                'code' => 'class Animal {
    protected String nombre;
    
    public Animal(String nombre) {
        this.nombre = nombre;
    }
    
    public void hacerSonido() {
        System.out.println(nombre + " hace un sonido");
    }
}

class Perro extends Animal {
    public Perro(String nombre) {
        super(nombre);
    }
    
    public void hacerSonido() {
        System.out.println(nombre + " dice: Guau guau");
    }
}',
                'is_active' => true
            ],

            // Nivel Avanzado
            [
                'programming_language_id' => $javaId,
                'language_level_id' => $javaAdvancedId,
                'title' => 'Interfaces y Abstracción',
                'slug' => 'java-avanzado-interfaces',
                'description' => 'Implementa interfaces para abstracción.',
                'code' => 'interface Calculable {
    int calcular(int a, int b);
}

class Suma implements Calculable {
    public int calcular(int a, int b) {
        return a + b;
    }
}

class Multiplicacion implements Calculable {
    public int calcular(int a, int b) {
        return a * b;
    }
}

public class TestCalculadora {
    public static void main(String[] args) {
        Calculable suma = new Suma();
        Calculable mult = new Multiplicacion();
        
        System.out.println("Suma: " + suma.calcular(5, 3));
        System.out.println("Multiplicación: " + mult.calcular(5, 3));
    }
}',
                'is_active' => true
            ],
            [
                'programming_language_id' => $javaId,
                'language_level_id' => $javaAdvancedId,
                'title' => 'Genéricos',
                'slug' => 'java-avanzado-generics',
                'description' => 'Utiliza genéricos para crear código reutilizable.',
                'code' => 'class Contenedor<T> {
    private T valor;
    
    public void establecer(T valor) {
        this.valor = valor;
    }
    
    public T obtener() {
        return valor;
    }
}

public class TestGenericos {
    public static void main(String[] args) {
        Contenedor<String> textos = new Contenedor<>();
        textos.establecer("Hola Java");
        
        Contenedor<Integer> numeros = new Contenedor<>();
        numeros.establecer(42);
        
        System.out.println("Texto: " + textos.obtener());
        System.out.println("Número: " + numeros.obtener());
    }
}',
                'is_active' => true
            ],
            [
                'programming_language_id' => $javaId,
                'language_level_id' => $javaAdvancedId,
                'title' => 'Streams y Lambdas',
                'slug' => 'java-avanzado-streams-lambdas',
                'description' => 'Implementa streams y expresiones lambda.',
                'code' => 'import java.util.Arrays;
import java.util.List;
import java.util.stream.Collectors;

public class TestStreams {
    public static void main(String[] args) {
        List<Integer> numeros = Arrays.asList(1, 2, 3, 4, 5, 6, 7, 8, 9, 10);
        
        List<Integer> paresDobles = numeros.stream()
            .filter(n -> n % 2 == 0)
            .map(n -> n * 2)
            .collect(Collectors.toList());
        
        System.out.println("Pares dobles: " + paresDobles);
        
        int suma = numeros.stream()
            .mapToInt(Integer::intValue)
            .sum();
        
        System.out.println("Suma total: " + suma);
    }
}',
                'is_active' => true
            ],

            // === C++ EXERCISES ===
            // Nivel Básico
            [
                'programming_language_id' => $cppId,
                'language_level_id' => $cppBasicId,
                'title' => 'Hello World C++',
                'slug' => 'cpp-basico-hello-world',
                'description' => 'Escribe un programa que imprima "Hello World" en C++.',
                'code' => '#include <iostream>

int main() {
    std::cout << "Hello World!" << std::endl;
    return 0;
}',
                'is_active' => true
            ],
            [
                'programming_language_id' => $cppId,
                'language_level_id' => $cppBasicId,
                'title' => 'Variables y Tipos',
                'slug' => 'cpp-basico-variables',
                'description' => 'Declara variables de diferentes tipos en C++.',
                'code' => '#include <iostream>
#include <string>

int main() {
    std::string nombre = "Juan";
    int edad = 25;
    bool esEstudiante = true;
    
    std::cout << "Mi nombre es " << nombre << std::endl;
    std::cout << "Tengo " << edad << " años" << std::endl;
    std::cout << "¿Soy estudiante? " << esEstudiante << std::endl;
    return 0;
}',
                'is_active' => true
            ],
            [
                'programming_language_id' => $cppId,
                'language_level_id' => $cppBasicId,
                'title' => 'Funciones',
                'slug' => 'cpp-basico-funciones',
                'description' => 'Crea funciones que realicen operaciones básicas.',
                'code' => '#include <iostream>

int sumar(int a, int b) {
    return a + b;
}

int main() {
    int resultado = sumar(5, 3);
    std::cout << "La suma es: " << resultado << std::endl;
    return 0;
}',
                'is_active' => true
            ],

            // Nivel Intermedio
            [
                'programming_language_id' => $cppId,
                'language_level_id' => $cppIntermediateId,
                'title' => 'Clases y Objetos',
                'slug' => 'cpp-intermedio-clases',
                'description' => 'Implementa clases con constructores y métodos.',
                'code' => '#include <iostream>
#include <string>

class Persona {
private:
    std::string nombre;
    int edad;

public:
    Persona(std::string n, int e) : nombre(n), edad(e) {}
    
    std::string presentarse() {
        return "Hola, soy " + nombre;
    }
    
    void cumplirAnos() {
        edad++;
        std::cout << "¡Feliz cumpleaños! Ahora tengo " << edad << " años" << std::endl;
    }
};',
                'is_active' => true
            ],
            [
                'programming_language_id' => $cppId,
                'language_level_id' => $cppIntermediateId,
                'title' => 'Vectores y STL',
                'slug' => 'cpp-intermedio-vectores',
                'description' => 'Utiliza vectores y algoritmos de STL.',
                'code' => '#include <iostream>
#include <vector>
#include <algorithm>

int main() {
    std::vector<int> numeros = {1, 2, 3, 4, 5};
    std::vector<int> dobles;
    
    for (int num : numeros) {
        dobles.push_back(num * 2);
    }
    
    std::cout << "Números dobles: ";
    for (int num : dobles) {
        std::cout << num << " ";
    }
    std::cout << std::endl;
    
    return 0;
}',
                'is_active' => true
            ],
            [
                'programming_language_id' => $cppId,
                'language_level_id' => $cppIntermediateId,
                'title' => 'Punteros y Referencias',
                'slug' => 'cpp-intermedio-punteros',
                'description' => 'Trabaja con punteros y referencias.',
                'code' => '#include <iostream>

void intercambiar(int* a, int* b) {
    int temp = *a;
    *a = *b;
    *b = temp;
}

void duplicar(int& numero) {
    numero *= 2;
}

int main() {
    int x = 10, y = 20;
    std::cout << "Antes: x=" << x << ", y=" << y << std::endl;
    
    intercambiar(&x, &y);
    std::cout << "Después intercambio: x=" << x << ", y=" << y << std::endl;
    
    duplicar(x);
    std::cout << "Después duplicar x: " << x << std::endl;
    return 0;
}',
                'is_active' => true
            ],

            // Nivel Avanzado
            [
                'programming_language_id' => $cppId,
                'language_level_id' => $cppAdvancedId,
                'title' => 'Templates',
                'slug' => 'cpp-avanzado-templates',
                'description' => 'Implementa templates para código genérico.',
                'code' => '#include <iostream>

template<typename T>
T maximo(T a, T b) {
    return (a > b) ? a : b;
}

template<typename T>
class Contenedor {
private:
    T valor;
public:
    void establecer(T v) { valor = v; }
    T obtener() { return valor; }
};

int main() {
    std::cout << "Máximo enteros: " << maximo(5, 3) << std::endl;
    std::cout << "Máximo doubles: " << maximo(5.5, 3.2) << std::endl;
    
    Contenedor<std::string> texto;
    texto.establecer("Hola C++");
    std::cout << "Contenedor: " << texto.obtener() << std::endl;
    return 0;
}',
                'is_active' => true
            ],
            [
                'programming_language_id' => $cppId,
                'language_level_id' => $cppAdvancedId,
                'title' => 'Smart Pointers',
                'slug' => 'cpp-avanzado-smart-pointers',
                'description' => 'Utiliza smart pointers modernos.',
                'code' => '#include <iostream>
#include <memory>

class Recurso {
public:
    Recurso(int valor) : dato(valor) {
        std::cout << "Recurso creado: " << dato << std::endl;
    }
    
    ~Recurso() {
        std::cout << "Recurso destruido: " << dato << std::endl;
    }
    
    void mostrar() {
        std::cout << "Valor del recurso: " << dato << std::endl;
    }

private:
    int dato;
};

int main() {
    auto unique_ptr = std::make_unique<Recurso>(42);
    unique_ptr->mostrar();
    
    auto shared_ptr1 = std::make_shared<Recurso>(100);
    auto shared_ptr2 = shared_ptr1;
    
    std::cout << "Referencias compartidas: " << shared_ptr1.use_count() << std::endl;
    return 0;
}',
                'is_active' => true
            ],
            [
                'programming_language_id' => $cppId,
                'language_level_id' => $cppAdvancedId,
                'title' => 'Lambdas y Algoritmos',
                'slug' => 'cpp-avanzado-lambdas',
                'description' => 'Implementa lambdas con algoritmos STL.',
                'code' => '#include <iostream>
#include <vector>
#include <algorithm>

int main() {
    std::vector<int> numeros = {1, 2, 3, 4, 5, 6, 7, 8, 9, 10};
    
    // Lambda para verificar si es par
    auto esPar = [](int n) { return n % 2 == 0; };
    
    // Contar pares
    int cantidadPares = std::count_if(numeros.begin(), numeros.end(), esPar);
    std::cout << "Números pares: " << cantidadPares << std::endl;
    
    // Transformar con lambda
    std::transform(numeros.begin(), numeros.end(), numeros.begin(),
                   [](int n) { return n * n; });
    
    std::cout << "Números al cuadrado: ";
    for (int num : numeros) {
        std::cout << num << " ";
    }
    std::cout << std::endl;
    return 0;
}',
                'is_active' => true
            ],

            // === PHP EXERCISES ===
            // Nivel Básico
            [
                'programming_language_id' => $phpId,
                'language_level_id' => $phpBasicId,
                'title' => 'Hello World PHP',
                'slug' => 'php-basico-hello-world',
                'description' => 'Escribe un programa que imprima "Hello World" en PHP.',
                'code' => '<?php

function greet() {
    echo "Hello World!";
}

greet();

?>',
                'is_active' => true
            ],
            [
                'programming_language_id' => $phpId,
                'language_level_id' => $phpBasicId,
                'title' => 'Variables y Tipos',
                'slug' => 'php-basico-variables',
                'description' => 'Declara variables de diferentes tipos en PHP.',
                'code' => '<?php

$nombre = "Juan";
$edad = 25;
$esEstudiante = true;

echo "Mi nombre es $nombre\n";
echo "Tengo $edad años\n";
echo "¿Soy estudiante? " . ($esEstudiante ? "Sí" : "No") . "\n";

?>',
                'is_active' => true
            ],
            [
                'programming_language_id' => $phpId,
                'language_level_id' => $phpBasicId,
                'title' => 'Funciones',
                'slug' => 'php-basico-funciones',
                'description' => 'Crea funciones que realicen operaciones básicas.',
                'code' => '<?php

function sumar($a, $b) {
    return $a + $b;
}

$resultado = sumar(5, 3);
echo "La suma es: $resultado\n";

?>',
                'is_active' => true
            ],

            // Nivel Intermedio
            [
                'programming_language_id' => $phpId,
                'language_level_id' => $phpIntermediateId,
                'title' => 'Arrays y Bucles',
                'slug' => 'php-intermedio-arrays',
                'description' => 'Trabaja con arrays y estructuras de control.',
                'code' => '<?php

$numeros = [1, 2, 3, 4, 5];
$dobles = [];
$suma = 0;

foreach ($numeros as $numero) {
    $dobles[] = $numero * 2;
    $suma += $numero;
}

echo "Números dobles: " . implode(", ", $dobles) . "\n";
echo "Suma total: $suma\n";

?>',
                'is_active' => true
            ],
            [
                'programming_language_id' => $phpId,
                'language_level_id' => $phpIntermediateId,
                'title' => 'Clases y Objetos',
                'slug' => 'php-intermedio-clases',
                'description' => 'Implementa clases con propiedades y métodos.',
                'code' => '<?php

class Persona {
    private $nombre;
    private $edad;
    
    public function __construct($nombre, $edad) {
        $this->nombre = $nombre;
        $this->edad = $edad;
    }
    
    public function presentarse() {
        return "Hola, soy " . $this->nombre;
    }
    
    public function cumplirAnos() {
        $this->edad++;
        echo "¡Feliz cumpleaños! Ahora tengo " . $this->edad . " años\n";
    }
}

$persona = new Persona("Ana", 30);
echo $persona->presentarse() . "\n";
$persona->cumplirAnos();

?>',
                'is_active' => true
            ],
            [
                'programming_language_id' => $phpId,
                'language_level_id' => $phpIntermediateId,
                'title' => 'Arrays Asociativos',
                'slug' => 'php-intermedio-arrays-asociativos',
                'description' => 'Utiliza arrays asociativos y funciones de array.',
                'code' => '<?php

$estudiante = [
    "nombre" => "Pedro",
    "edad" => 22,
    "materias" => ["PHP", "JavaScript", "MySQL"]
];

foreach ($estudiante as $clave => $valor) {
    if (is_array($valor)) {
        echo "$clave: " . implode(", ", $valor) . "\n";
    } else {
        echo "$clave: $valor\n";
    }
}

echo "Cantidad de materias: " . count($estudiante["materias"]) . "\n";

?>',
                'is_active' => true
            ],

            // Nivel Avanzado
            [
                'programming_language_id' => $phpId,
                'language_level_id' => $phpAdvancedId,
                'title' => 'Namespaces y Autoload',
                'slug' => 'php-avanzado-namespaces',
                'description' => 'Utiliza namespaces para organizar código.',
                'code' => '<?php

namespace MiApp\Utilidades;

class Calculadora {
    public static function sumar($a, $b) {
        return $a + $b;
    }
    
    public static function multiplicar($a, $b) {
        return $a * $b;
    }
}

class Validador {
    public static function esEmail($email) {
        return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
    }
}

// Uso de las clases
echo Calculadora::sumar(5, 3) . "\n";
echo "¿Es email válido? " . (Validador::esEmail("test@ejemplo.com") ? "Sí" : "No") . "\n";

?>',
                'is_active' => true
            ],
            [
                'programming_language_id' => $phpId,
                'language_level_id' => $phpAdvancedId,
                'title' => 'Traits y Composición',
                'slug' => 'php-avanzado-traits',
                'description' => 'Implementa traits para reutilización de código.',
                'code' => '<?php

trait Timestamp {
    public function setTimestamp() {
        $this->created_at = date("Y-m-d H:i:s");
    }
    
    public function getTimestamp() {
        return $this->created_at ?? "No establecido";
    }
}

class Usuario {
    use Timestamp;
    
    private $nombre;
    private $created_at;
    
    public function __construct($nombre) {
        $this->nombre = $nombre;
        $this->setTimestamp();
    }
    
    public function getNombre() {
        return $this->nombre;
    }
}

$usuario = new Usuario("Carlos");
echo "Usuario: " . $usuario->getNombre() . "\n";
echo "Creado en: " . $usuario->getTimestamp() . "\n";

?>',
                'is_active' => true
            ],
            [
                'programming_language_id' => $phpId,
                'language_level_id' => $phpAdvancedId,
                'title' => 'Closures y Callbacks',
                'slug' => 'php-avanzado-closures',
                'description' => 'Utiliza closures y funciones de callback.',
                'code' => '<?php

$multiplicador = function($factor) {
    return function($numero) use ($factor) {
        return $numero * $factor;
    };
};

$porDos = $multiplicador(2);
$porTres = $multiplicador(3);

$numeros = [1, 2, 3, 4, 5];

// Usar con map
$dobles = array_map($porDos, $numeros);
$triples = array_map($porTres, $numeros);
$cuadruples = array_map($multiplicador(4), $numeros);

echo "Originales: " . implode(", ", $numeros) . "\n";
echo "Dobles: " . implode(", ", $dobles) . "\n";
echo "Triples: " . implode(", ", $triples) . "\n";
echo "Cuádruples: " . implode(", ", $cuadruples) . "\n";

// Closure con variables locales
$multiplicador = 10;
$closure = function($x) use ($multiplicador) {
    return $x * $multiplicador;
};

$resultado = array_map($closure, $numeros);
echo "Multiplicados por $multiplicador: " . implode(", ", $resultado) . "\n";

// Diferencia entre proc y lambda con argumentos
try {
    $porDos(1, 2, 3);  // No da error
    echo "Proc acepta argumentos extra\n";
} catch (TypeError $e) {
    echo "Error en Proc: " . $e->getMessage() . "\n";
}

?>',
                'is_active' => true
            ],

            // === RUBY EXERCISES ===
            // Nivel Básico
            [
                'programming_language_id' => $rubyId,
                'language_level_id' => $rubyBasicId,
                'title' => 'Hello World Ruby',
                'slug' => 'ruby-basico-hello-world',
                'description' => 'Escribe un programa que imprima "Hello World" en Ruby.',
                'code' => 'def greet
    puts "Hello World!"
end

greet',
                'is_active' => true
            ],
            [
                'programming_language_id' => $rubyId,
                'language_level_id' => $rubyBasicId,
                'title' => 'Variables y Tipos',
                'slug' => 'ruby-basico-variables',
                'description' => 'Declara variables de diferentes tipos en Ruby.',
                'code' => 'nombre = "Juan"
edad = 25
es_estudiante = true

puts "Mi nombre es #{nombre}"
puts "Tengo #{edad} años"
puts "¿Soy estudiante? #{es_estudiante ? "Sí" : "No"}"',
                'is_active' => true
            ],
            [
                'programming_language_id' => $rubyId,
                'language_level_id' => $rubyBasicId,
                'title' => 'Métodos',
                'slug' => 'ruby-basico-metodos',
                'description' => 'Crea métodos que realicen operaciones básicas.',
                'code' => 'def sumar(a, b)
    a + b
end

def saludar(nombre = "Mundo")
    "Hola, #{nombre}!"
end

resultado = sumar(5, 3)
puts "La suma es: #{resultado}"
puts saludar
puts saludar("Ruby")',
                'is_active' => true
            ],

            // Nivel Intermedio
            [
                'programming_language_id' => $rubyId,
                'language_level_id' => $rubyIntermediateId,
                'title' => 'Arrays y Hashes',
                'slug' => 'ruby-intermedio-arrays-hashes',
                'description' => 'Trabaja con arrays y hashes usando métodos Ruby.',
                'code' => 'numeros = [1, 2, 3, 4, 5]
persona = {
    nombre: "Ana",
    edad: 30,
    ciudad: "Madrid"
}

dobles = numeros.map { |n| n * 2 }
pares = numeros.select { |n| n.even? }
suma = numeros.sum

puts "Números dobles: #{dobles}"
puts "Números pares: #{pares}"
puts "Suma total: #{suma}"

persona.each { |clave, valor| puts "#{clave}: #{valor}" }',
                'is_active' => true
            ],
            [
                'programming_language_id' => $rubyId,
                'language_level_id' => $rubyIntermediateId,
                'title' => 'Clases y Objetos',
                'slug' => 'ruby-intermedio-clases',
                'description' => 'Implementa clases con atributos y métodos.',
                'code' => 'class Persona
    attr_accessor :nombre, :edad
    
    def initialize(nombre, edad)
        @nombre = nombre
        @edad = edad
    end
    
    def presentarse
        "Hola, soy #{@nombre}"
    end
    
    def cumplir_anos
        @edad += 1
        puts "¡Feliz cumpleaños! Ahora tengo #{@edad} años"
    end
    
    def to_s
        "#{@nombre}, #{@edad} años"
    end
end

persona = Persona.new("Ana", 30)
puts persona.presentarse
persona.cumplir_anos
puts persona',
                'is_active' => true
            ],
            [
                'programming_language_id' => $rubyId,
                'language_level_id' => $rubyIntermediateId,
                'title' => 'Bloques y Yield',
                'slug' => 'ruby-intermedio-bloques-yield',
                'description' => 'Utiliza bloques, yield y iteradores.',
                'code' => 'def repetir_tres_veces
    yield 1
    yield 2
    yield 3
end

def medir_tiempo
    inicio = Time.now
    yield
    fin = Time.now
    puts "Operación tardó: #{fin - inicio} segundos"
end

repetir_tres_veces do |numero|
    puts "Ejecutando iteración #{numero}"
end

medir_tiempo do
    (1..1000).each { |i| i * i }
    puts "Calculé 1000 cuadrados"
end',
                'is_active' => true
            ],

            // Nivel Avanzado
            [
                'programming_language_id' => $rubyId,
                'language_level_id' => $rubyAdvancedId,
                'title' => 'Módulos y Mixins',
                'slug' => 'ruby-avanzado-modulos-mixins',
                'description' => 'Implementa módulos para reutilización y namespacing.',
                'code' => 'module Saludable
    def saludar
        "¡Hola desde el módulo!"
    end
    
    def despedirse
        "¡Adiós desde el módulo!"
    end
end

module Matematicas
    def self.factorial(n)
        n <= 1 ? 1 : n * factorial(n - 1)
    end
    
    def self.es_primo?(n)
        return false if n < 2
        (2..Math.sqrt(n)).none? { |i| n % i == 0 }
    end
end

class Persona
    include Saludable
    
    def initialize(nombre)
        @nombre = nombre
    end
end

persona = Persona.new("Juan")
puts persona.saludar
puts persona.despedirse

puts "Factorial de 5: #{Matematicas.factorial(5)}"
puts "¿7 es primo? #{Matematicas.es_primo?(7)}"',
                'is_active' => true
            ],
            [
                'programming_language_id' => $rubyId,
                'language_level_id' => $rubyAdvancedId,
                'title' => 'Metaprogramación',
                'slug' => 'ruby-avanzado-metaprogramacion',
                'description' => 'Utiliza metaprogramación para crear código dinámico.',
                'code' => 'class ConfiguracionDinamica
    def method_missing(method_name, *args)
        if method_name.to_s.start_with?("set_")
            atributo = method_name.to_s.gsub("set_", "")
            instance_variable_set("@#{atributo}", args.first)
        elsif method_name.to_s.start_with?("get_")
            atributo = method_name.to_s.gsub("get_", "")
            instance_variable_get("@#{atributo}")
        else
            super
        end
    end
    
    def respond_to_missing?(method_name, include_private = false)
        method_name.to_s.start_with?("set_", "get_") || super
    end
end

config = ConfiguracionDinamica.new
config.set_nombre("Mi App")
config.set_version("1.0.0")
config.set_debug(true)

puts "Nombre: #{config.get_nombre}"
puts "Versión: #{config.get_version}"
puts "Debug: #{config.get_debug}"',
                'is_active' => true
            ],
            [
                'programming_language_id' => $rubyId,
                'language_level_id' => $rubyAdvancedId,
                'title' => 'Procs, Lambdas y Bloques',
                'slug' => 'ruby-avanzado-procs-lambdas',
                'description' => 'Trabaja con Procs, lambdas y closures.',
                'code' => 'mi_proc = Proc.new { |x| x * 2 }
mi_lambda = lambda { |x| x * 3 }
mi_lambda_corto = ->(x) { x * 4 }

numeros = [1, 2, 3, 4, 5]

# Usar con map
dobles = numeros.map(&mi_proc)
triples = numeros.map(&mi_lambda)
cuadruples = numeros.map(&mi_lambda_corto)

puts "Originales: #{numeros}"
puts "Dobles: #{dobles}"
puts "Triples: #{triples}"
puts "Cuádruples: #{cuadruples}"

# Closure con variables locales
multiplicador = 10
closure = Proc.new { |x| x * multiplicador }

resultado = numeros.map(&closure)
puts "Multiplicados por #{multiplicador}: #{resultado}"

# Diferencia entre proc y lambda con argumentos
begin
    mi_proc.call(1, 2, 3)  # No da error
    puts "Proc acepta argumentos extra"
rescue => e
    puts "Error en Proc: #{e.message}"
end'
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