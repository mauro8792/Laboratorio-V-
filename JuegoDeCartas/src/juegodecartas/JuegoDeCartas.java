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
public class JuegoDeCartas {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        ArrayList<Jugador> jugadores = new ArrayList<>();
        jugadores.add(new Jugador("Pedro"));
        jugadores.add(new Jugador("Lara"));
        jugadores.add(new Jugador("Oscar"));
        jugadores.add(new Jugador("Pepe"));

        Simulador simulador = new Simulador(jugadores);

        simulador.simularPartido();
    }
    
}
