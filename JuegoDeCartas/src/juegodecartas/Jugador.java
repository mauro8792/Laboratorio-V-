/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package juegodecartas;

/**
 *
 * @author mauro
 */
public class Jugador {
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
    }

    public int getPuntos() {
        return puntos;
    }

    public void setPuntos(int puntos) {
        this.puntos = puntos;
    }

    public Carta getCarta() {
        return carta;
    }

    public void setCarta(Carta carta) {
        this.carta = carta;
    }

   public void sumarPunto(){
       this.puntos= this.puntos+1;
   }
    
   
    
    
    
}
