/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package juegodecartas;

import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.SQLException;
import java.util.Observable;

/**
 *
 * @author mauro
 */
public final class Jugador extends Observable {

    private String nombre;
    private int puntos;
    private Carta carta;

    public Jugador(String nombre) {
        this.nombre = nombre;
        insertJugador(nombre);
    }

    public void insertJugador(String nombre) {
        Conectar cc = new Conectar();
        Connection cn = cc.conexion();
        String sql = "";
        nombre = this.getNombre();
       
        sql = "Insert into Jugadores (nombre)" + "values(?)";
        System.out.println("hola wacho");
        PreparedStatement pst;
        try {
            pst = cn.prepareStatement(sql);
            pst.setString(1, nombre);
            System.out.println("ppp");
            int n = pst.executeUpdate();
            if (n > 0) {
                System.out.println("Jugador cargado");
            }
        } catch (SQLException ex) {
            System.out.println("No se pudo cargar "+ex);
        }

    }

    Jugador() {

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

}
