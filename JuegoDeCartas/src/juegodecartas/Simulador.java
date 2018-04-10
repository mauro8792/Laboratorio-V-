/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package juegodecartas;

import java.util.ArrayList;

/**
 *
 * @author mauro
 */
public class Simulador {

    private Partido partido;

    public Simulador(ArrayList<Jugador> jugadores) {
        this.partido = new Partido(jugadores);
    }

    public Partido getPartido() {
        return partido;
    }

    public void simularVuelta() {
        imprimirVuelta(partido.jugarUnaVuelta());
    }

    public void simularPartido() {
        while (!partido.partidoTerminado()) {
            simularVuelta();
        }
        imprimirPuntajes(partido);
    }

    public void imprimirVuelta(Ronda vuelta) {
        //System.out.println("========\n\nVuelta: ");
        /*for (Jugador jugador : getPartido().getJugadores()) {
            System.out.println(" Jugador: " + jugador.getNombre());
            System.out.println(" " + vuelta.verCartaDelJugador(jugador));
        }*/
        System.out.println("\nEl ganador de la vuelta es: " + vuelta.getGanadorDeVuelta().getNombre() + " tiene " + vuelta.getGanadorDeVuelta().getPuntos() + " puntos.");
        System.out.println("Con la siguiente " + vuelta.getGanadorDeVuelta().getCarta());
        System.out.println(" ");
        //System.out.println("========\n\nVuelta: ");
    }

    public void imprimirPuntajes(Partido partido) {
        System.out.println("\nEl partido termino, el ganador es " + partido.getGanador().getNombre());
        System.out.println("Puntajes:");
        for (Jugador jugador : partido.getJugadores()) {
            System.out.println("" + jugador.getNombre() + " tiene " + jugador.getPuntos() + " puntos.");
        }
    }

    public void limpiarConsola() {

    }

    public void controlarSimulacion() {

    }
}
