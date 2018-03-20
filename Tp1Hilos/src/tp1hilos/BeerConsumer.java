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
public class BeerConsumer implements Runnable{
    private final BeerHouse stock;
    private final int idConsumidor;
    
    public BeerConsumer(BeerHouse stock, int idConsumidor){
            this.stock= stock;
            this.idConsumidor = idConsumidor;
      }
    

    @Override
    public void run() {
        while(Boolean.TRUE)
        {
            System.out.println("El consumidor " + idConsumidor + " consume: " + stock.get());
        }
    }
    
}

