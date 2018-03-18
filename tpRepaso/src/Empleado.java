/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author mauro
 */
public abstract class Empleado {
    private int  id_empleado;
    private String  nombre;
    private int anioIngreso;
    private static int cantidad;

    public Empleado (int idEmpleado, String nombre, int ingreso){
    cantidad++;
    this.setNombre(nombre);
    this.setId_empleado(cantidad);
    this.setAnioIngreso(ingreso);    
}
    
    public String getNombre() {
        return nombre;
    }

    public void setNombre(String nombre) {
        this.nombre = nombre;
    }

    public int getId_empleado() {
        return id_empleado;
    }

    public void setId_empleado(int id_empleado) {
        this.id_empleado = id_empleado;
    }

    public int getAnioIngreso() {
        return anioIngreso;
    }

    public void setAnioIngreso(int anioIngreso) {
        this.anioIngreso = anioIngreso;
    }

    public static int getCantidad() {
        return cantidad;
    }

    public static void setCantidad(int cantidad) {
        Empleado.cantidad = cantidad;
    }

    public abstract float getSueldo();
}
