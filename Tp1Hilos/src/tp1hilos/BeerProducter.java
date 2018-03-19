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
    private Random aleatorio;
    private BeerHouse stock;
    private int idProductor;
    private final int tiempoEspera=1500;
    
     public BeerProducter(BeerHouse stock, int idProductor) {
         this.stock=stock;
         this.idProductor=idProductor;
         aleatorio = new Random();
                
    }

    public Random getAleatorio() {
        return aleatorio;
    }

    public void setAleatorio(Random aleatorio) {
        this.aleatorio = aleatorio;
    }

    public BeerHouse getStock() {
        return stock;
    }

    public void setStock(BeerHouse stock) {
        this.stock = stock;
    }

    public int getIdProductor() {
        return idProductor;
    }

    public void setIdProductor(int idProductor) {
        this.idProductor = idProductor;
    }

    @Override
    public void run() {
        while(Boolean.TRUE){
            int poner = aleatorio.nextInt(100);
            stock.put(poner);
            System.out.println("El BeerProducter "+ idProductor + "pone"+poner);
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
