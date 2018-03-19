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
    private BeerHouse stock;
    private int idConsumidor;
    
    public BeerConsumer(BeerHouse stock, int idConsumidor){
            this.stock= stock;
            this.idConsumidor = idConsumidor;
      }
    
          
     

    public BeerHouse getStock() {
        return stock;
    }

    public void setStock(BeerHouse stock) {
        this.stock = stock;
    }

    public int getIdConsumidor() {
        return idConsumidor;
    }

    public void setIdConsumidor(int idConsumidor) {
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

