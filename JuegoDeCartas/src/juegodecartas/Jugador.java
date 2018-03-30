/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package juegodecartas;

import java.util.Observable;

/**
 *
 * @author mauro
 */
public class Jugador extends Observable{
    private String  nombre;
    private int puntos;
    private Carta carta;
    
    public Jugador(String nombre) {
        this.nombre = nombre;
    }

    Jugador() {
       
    }
    
    public String getNombre() {
        return nombre;
    }

    public void setNombre(String nombre) {
        this.nombre = nombre;
        setChanged();
        notifyObservers();
    }

    public int getPuntos() {
        return puntos;
    }

    public void setPuntos(int puntos) {
        this.puntos = puntos;
        setChanged();
        notifyObservers();
    }

    public Carta getCarta() {
        return carta;
    }

    public void setCarta(Carta carta) {
        this.carta = carta;
        setChanged();
        notifyObservers();
    }

   public void sumarPunto(){
       this.puntos= this.puntos+1;
   }
    
   public String toSTring(){
        String mensaje= "Nombre: "+ getNombre()+","+
                        " Puntos: "+ getPuntos()+","+
                        " Carta: "+getCarta();
        return mensaje;
    }
   
    
    
    
}
