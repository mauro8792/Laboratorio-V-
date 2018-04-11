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
        Baraja mazo= new Baraja();
        
        
        Jugador Pedro = new Jugador("Pedro",mazo);
        Pedro.addObserver(Elizondo);
        
        Jugador Lara = new Jugador("Lara",mazo);
        Lara.addObserver(Elizondo);
        
        Jugador German = new Jugador("German",mazo);
        German.addObserver(Elizondo);
        
        Jugador Gustavo = new Jugador("Gustavo",mazo);
        Gustavo.addObserver(Elizondo);
      
        jugadores.add(Pedro);
        jugadores.add(Lara);
        jugadores.add(German);
        jugadores.add(Gustavo);
        
          
        Pedro.run();
        Lara.run();
        German.run();
        Gustavo.run();
        
        Simulador simulador = new Simulador(jugadores);
        simulador.simularPartido();
    }
    
}
