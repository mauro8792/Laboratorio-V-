package tp1hilos;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 *
 * @author mauro
 */
public class BeerHouse {

    private int stock;
    private boolean contenedorLleno = Boolean.FALSE;

    public synchronized int get() {
        while (!contenedorLleno) {
            try {
                wait();
            } catch (InterruptedException e) {
                System.err.println("Contenedor Error en get ->" + e.getMessage());

            }
        }
        contenedorLleno = Boolean.FALSE;
        notifyAll();
        return stock;
    }

    public synchronized void put(int value) {
        while (contenedorLleno) {
            try {
                wait();
            } catch (InterruptedException e) {
                System.err.println("Contenedor Error en put->" + e.getMessage());

            }
        }
           // stock += value;
            stock = value;
            contenedorLleno = Boolean.TRUE;
            notifyAll();
        
    }
}
