/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package juegodecartas;

import java.util.HashMap;

/**
 *
 * @author mauro
 */
public class Ronda {
    private final HashMap<Jugador,Carta> ronda = new HashMap<>();
    private Jugador ganadorDeVuelta = new Jugador();
    
    public void agregarMano( Jugador A, Carta K){
        this.ronda.put(A, K);
    }
    public Carta verCartaDelJugador(Jugador A){
        return this.ronda.get(A);
    }

    public Jugador getGanadorDeVuelta() {
        return ganadorDeVuelta;
    }

    public void setGanadorDeVuelta(Jugador ganadorDeVuelta) {
        this.ganadorDeVuelta = ganadorDeVuelta;
    }

    
    
    
    
}
