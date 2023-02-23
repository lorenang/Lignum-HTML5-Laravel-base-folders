class Pelicula {
    titulo;
    anio;
    duracion;

    #resumen;

    constructor(titulo, anio, duracion) {
        this.titulo = titulo;
        this.anio = anio;
        this.duracion = duracion;
    }

    play() {
        console.log("¡Play!")
    }
    pause() {
        console.log("Pelicula pausada")
    }

    setResumen(res) {
        this.#resumen = res;
    }
    resumen() {
        console.log(this.#resumen);
    }
}

let pelicula1 = new Pelicula("Capitan America", 2011, "260 minutos");

pelicula1.play();
pelicula1.pause();
pelicula1.setResumen("Tras tres meses de someterse a un programa de entrenamiento físico y táctico, encomiendan a Steve Rogers su primera misión como Capitán América. Armado con un escudo indestructible, emprende la guerra contra la perversa organización HYDRA");
pelicula1.resumen();

