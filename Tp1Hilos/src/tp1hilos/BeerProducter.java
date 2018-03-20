package tp1hilos;

import java.util.Random;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author mauro
 */
public class BeerProducter implements Runnable {
    private final Random aleatorio;
    private final BeerHouse stock;
    private final int idProductor;
    private final int tiempoEspera=1500;
    // list de cerveza, 
    
     public BeerProducter(BeerHouse stock, int idProductor) {
         this.stock=stock;
         this.idProductor=idProductor;
         aleatorio = new Random();
                
    }

    @Override
    public void run() {
        while(Boolean.TRUE){
            int poner = aleatorio.nextInt(100);
            stock.put(poner);
            System.out.println("El BeerProducter "+ idProductor + " pone "+poner);
            try
            {
                Thread.sleep(tiempoEspera);
            } 
            catch (InterruptedException e) 
            {
                System.err.println("Productor " + idProductor + ": Error en run -> " + e.getMessage());
            }
        }
    
   
    }

   
}
