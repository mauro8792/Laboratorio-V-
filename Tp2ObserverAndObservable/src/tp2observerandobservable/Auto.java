/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package tp2observerandobservable;

import java.util.Observable;

/**
 *
 * @author mauro
 */
public class Auto extends Observable{

    private String nivelAceite;
    private float presionNeumaticos;
    private String nivelAgua;

    
    public Auto(String nivelAceite, float presionNeumaticos, String nivelAgua) {
        this.nivelAceite = nivelAceite;
        this.presionNeumaticos = presionNeumaticos;
        this.nivelAgua = nivelAgua;
    }

    public String getNivelAceite() {
        return nivelAceite;
    }

    public void setNivelAceite(String nivelAceite) {
        this.nivelAceite = nivelAceite;
        setChanged();
        notifyObservers();
    }

    public float getPresionNeumaticos() {
        return presionNeumaticos;
    }

    public void setPresionNeumaticos(float presionNeumaticos) {
        this.presionNeumaticos = presionNeumaticos;
        setChanged();
        notifyObservers();
    }

    public String getNivelAgua() {
        return nivelAgua;
    }

    public void setNivelAgua(String nivelAgua) {
        this.nivelAgua = nivelAgua;
        setChanged();
        notifyObservers();
        //notifyObservers(System.out.println("Nuevo Mensaje: "+this.getNivelAgua()));
    }
    
    public String toSTring(){
        String mensaje= "Aceite: "+ getNivelAceite()+
                        " Presion: "+ getPresionNeumaticos()+
                        " Agua: "+getNivelAgua();
        return mensaje;
    }

  
    
  

    

    
}
