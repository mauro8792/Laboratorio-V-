/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package juegodecartas;

import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.SQLException;
import java.util.ArrayList;

/**
 *
 * @author mauro
 */
public class Partido {

    private ArrayList<Jugador> jugadores = new ArrayList<>();
    private ArrayList<Ronda> rondas = new ArrayList<>();
    public Baraja baraja;

    public Partido(ArrayList<Jugador> jugadores) {
        this.jugadores = jugadores;
        this.baraja = new Baraja();
    }

    public ArrayList<Jugador> getJugadores() {
        return jugadores;
    }

    public void setJugadores(ArrayList<Jugador> jugadores) {
        this.jugadores = jugadores;
    }

    public ArrayList<Ronda> getRondas() {
        return rondas;
    }

    public void setRondas(ArrayList<Ronda> rondas) {
        this.rondas = rondas;

    }

    public void agregarJugadores(Jugador A) {
        this.jugadores.add(A);
    }

    public Boolean partidoTerminado() {
        for (Jugador jugador : jugadores) {
            if (jugador.getPuntos() == 10) {
                return true;
            }
        }
        return false;
    }

    private void identificarGanadorVuelta(Ronda vuelta) {
        Jugador ganador = jugadores.get(0);
        for (int i = 1; i < jugadores.size(); i++) {
            Jugador jugador = jugadores.get(i);
            Carta delJugador = vuelta.verCartaDelJugador(jugador);
            Carta delGanador = vuelta.verCartaDelJugador(ganador);
            if (delGanador.compareTo(delJugador) < 0) {
                ganador = jugador;
            }
        }
        ganador.sumarPunto();
        this.updatePuntajePorVuelta(ganador);

        vuelta.setGanadorDeVuelta(ganador);
    }

    public void updatePuntajePorVuelta(Jugador ganador) {
        Conectar cc = new Conectar();
        Connection cn = cc.conexion();
        String sql = "";
        int puntos = ganador.getPuntos();

        try {
            PreparedStatement pps = cn.prepareStatement("UPDATE Jugadores SET puntaje='" + ganador.getPuntos() + "' WHERE  id_jugador='" + ganador.getId() + "'");
            pps.executeUpdate();
        }catch(SQLException ex){
            System.out.println("Hubo un error");
        }
    }

    public Ronda jugarUnaVuelta() {
        Ronda vuelta = new Ronda();

        for (Jugador jugador : jugadores) {
            if (baraja.quedanCartas()) {
                Carta carta = baraja.desapilarCarta();
                jugador.setCarta(carta);
                vuelta.agregarMano(jugador, carta);
            } else {
                baraja.deUsadaAMazo();
                Carta carta = baraja.desapilarCarta();
                jugador.setCarta(carta);
                vuelta.agregarMano(jugador, carta);
            }
        }
        
        identificarGanadorVuelta(vuelta);
        rondas.add(vuelta);

        for (Jugador jugador : jugadores) {
            baraja.agregarCartaUsada(jugador.getCarta());
        }
        return vuelta;
    }

    public Jugador getGanador() {
        if (partidoTerminado()) {
            for (Jugador jugador : jugadores) {
                if (jugador.getPuntos() == 10) {

                    return jugador;
                }
            }
        }
        return null;
    }

}
