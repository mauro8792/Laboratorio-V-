/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package tp1hilos;

/**
 *
 * @author mauro
 */
public class Tp1Hilos {
    private static BeerHouse stock;
    private static Thread productor;
    private static Thread[] consumidores;
    private static final int cantidadConsumidores = 85;
    
    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        stock = new BeerHouse();
        productor = new Thread(new BeerProducter(stock, 1));
        consumidores = new Thread[cantidadConsumidores];
 
        for(int i = 0; i < cantidadConsumidores; i++)
        {
            consumidores[i] = new Thread(new BeerConsumer(stock, i));
            consumidores[i].start();
        }
         
        productor.start();
        
        
        
    }
    
}
