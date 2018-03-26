/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package tp2observerandobservable;

/**
 *
 * @author mauro
 */
public class Tp2ObserverAndObservable {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        
            Auto fiat = new Auto("medio", 30, "normal");
            Mecanico roberto = new Mecanico();
            
            fiat.addObserver(roberto);
            
            fiat.setNivelAceite("alto");
            fiat.setPresionNeumaticos(20);
            fiat.setNivelAgua("bajo");
            
        
           
        
        
        
        
        
        
        
        
        
    }
    
}
