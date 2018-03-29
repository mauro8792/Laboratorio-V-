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
public class Carta {
    private int numero;
    private String palo;

    public Carta(int numero, String palo) {
        this.numero = numero;
        this.palo = palo;
    }

    public int getNumero() {
        return numero;
    }

    public void setNumero(int numero) {
        this.numero = numero;
    }

    public String getPalo() {
        return palo;
    }

    public void setPalo(String palo) {
        this.palo = palo;
    }
     public int compareTo(Carta otra) {
        /*
            Utilizo un HashMap como herramienta para establecer una jerarquia
            entre los diferentes palos. Asignando como valor clave el nombre del palo,
            y como valor un entero, siendo 4 el valor de jerarquia maximo.
         */
        final HashMap<String, Integer> jerarquia = new HashMap<>();
        jerarquia.put(Palos.Espada, 4);
        jerarquia.put(Palos.Oro, 3);
        jerarquia.put(Palos.Basto, 2);
        jerarquia.put(Palos.Copa, 1);

        //miCarta almacena la jerarquia de la carta que invoca el metodo compareTo.
        final int miCarta = jerarquia.get(this.getPalo());
        final int otraCarta = jerarquia.get(otra.getPalo());

        //Si tienen el mismo palo
        if (miCarta == otraCarta) {
            //Entonces comparo por numero.
            if (this.getNumero() < otra.getNumero()) {
                return 1;
            } else {
                return -1;
            }
        } else {
            // Caso contrario, comparo utilizando la jerarquia.
            if (miCarta < otraCarta) {
                return -1;
            } else {
                return 1;
            }
        }
    }
}
