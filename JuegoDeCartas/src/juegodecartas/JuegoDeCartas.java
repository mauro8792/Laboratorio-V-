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
        Referi Elizondo = new Referi();
        
        Jugador Pedro = new Jugador("Pedro");
        Pedro.addObserver(Elizondo);
        
        Jugador Lara = new Jugador("Lara");
        Lara.addObserver(Elizondo);
        
        Jugador German = new Jugador("German");
        German.addObserver(Elizondo);
        
        Jugador Gustavo = new Jugador("Gustavo");
        Gustavo.addObserver(Elizondo);
        
        //jugadores.add(new Jugador("Lara"));
        //jugadores.add(new Jugador("Oscar"));
        //jugadores.add(new Jugador("Pepe"));     
        //jugadores.add(new Jugador("Pedro"));
        
        jugadores.add(Pedro);
        jugadores.add(Lara);
        jugadores.add(German);
        jugadores.add(Gustavo);
        
        
        
        
                

        Simulador simulador = new Simulador(jugadores);

        simulador.simularPartido();
    }
    
}
