/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package juegodecartas;

import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;
import java.util.Observable;

/**
 *
 * @author mauro
 */
public final class Jugador  extends Observable implements Runnable{
    private int id;
    private String nombre;
    private int puntos;
    private Carta carta;
    private Baraja mazo;

    public Jugador(String nombre, Baraja mazo) {
        this.nombre = nombre;
        this.mazo= mazo;
        insertJugador(nombre);
    }

    Jugador() {
    }

    public int getId() {
        return id;
    }

    public void setId(int id) {
        this.id = id;
    }
/*
    Jugador(String nombre, Simulador simulador) {
        this.nombre = nombre;
        //this.mazo=simulador.getPartido().baraja;
    }
*/
    public void insertJugador(String nombre) {
        Conectar cc = new Conectar();
        Connection cn = cc.conexion();
        String sql = "";
        nombre = this.getNombre();
       
        sql = "Insert into Jugadores (nombre)" + "values(?)";
        PreparedStatement pst;
       
        try {
            pst = cn.prepareStatement(sql, Statement.RETURN_GENERATED_KEYS);
            pst.setString(1, nombre);
            int n = pst.executeUpdate();
            if (n > 0) {
                
                ResultSet generatedKeys = pst.getGeneratedKeys();

                if (generatedKeys.next()) {
                    this.id = (int) generatedKeys.getLong(1);
                }
                else {
                    throw new SQLException("Creating user failed, no ID obtained.");
                }
                
                System.out.println("Jugador: "+ this.nombre+ " cargado con ID: " + this.id);
            }
                   
        } catch (Exception ex) {
            System.out.println("No se pudo cargar "+ex);
        }
    }

    public String getNombre() {
        return nombre;
    }

    public void setNombre(String nombre) {
        this.nombre = nombre;
        setChanged();
        notifyObservers();
    }

    public int getPuntos() {
        return puntos;
    }

    public void setPuntos(int puntos) {
        this.puntos = puntos;
        setChanged();
        notifyObservers();
    }

    public Carta getCarta() {
        return carta;
    }

    public void setCarta(Carta carta) {
        this.carta = carta;
        setChanged();
        notifyObservers();
    }

    public void sumarPunto() {
        this.puntos = this.puntos + 1;
    }

    public String toSTring() {
        String mensaje = "Nombre: " + getNombre() + ","
                + " Puntos: " + getPuntos() + ","
                + " Carta: " + getCarta();
        return mensaje;
    }

    @Override
    public void run() {
        
        
            this.setCarta(mazo.desapilarCarta());            
        
    }

}
