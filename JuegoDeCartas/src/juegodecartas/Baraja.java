/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package juegodecartas;

import java.util.ArrayList;
import java.util.Collections;
import java.util.Stack;

/**
 *
 * @author mauro
 */
public final class Baraja {
    private final ArrayList<Carta> cartasUsadas = new  ArrayList<>();
    private final Stack<Carta> mazo = new Stack<>();

    public Baraja() {
        this.inicializar();
    }
    
    public void inicializar(){
        String[] palos = new String[4];
        
        palos[0]=Palos.Basto;
        palos[1]=Palos.Copa;
        palos[2]=Palos.Espada;
        palos[3]=Palos.Oro;
        
        for(String palo : palos){
            
            for(int i=0; i<13 ; i++){
                this.mazo.add(new Carta(i, palo));
            }
        }
        mezclar();
        
    }
    public void mezclar(){
        Collections.shuffle(mazo);
    }
   
    public void agregarCartaUsada(Carta carta){
        this.cartasUsadas.add(carta);
    }
    public Boolean quedanCartas(){
        return  !this.mazo.empty();            
    }
    
    public Carta desapilarCarta(){
        return this.mazo.pop();
    }
    
    public void deUsadaAMazo(){
        if(mazo.empty()){
            mazo.addAll(cartasUsadas);
            mezclar();
        }
    }
            
    
}
