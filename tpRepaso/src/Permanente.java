
import java.util.Calendar;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author mauro
 */
public class Permanente extends Empleado{
    private float sueldo;// sueldoBasico+ sueldo basico* plus antiguedad
    private float sueldoBasico;
    private float plusAntiguedad;

     public Permanente(int idEmpleado, String nombre, int ingreso, float sueldo,
             float sueldoBasico, float plusAntiguedad) {
        super(idEmpleado, nombre, ingreso);
        this.setSueldoBasico(sueldoBasico);
        this.setPlusAntiguedad(plusAntiguedad);
        this.setSueldo(ingreso);
        
    }
    
    public float getSueldoBasico() {
        return sueldoBasico;
    }

    public void setSueldoBasico(float sueldoBasico) {
        this.sueldoBasico = sueldoBasico;
    }

    public float getPlusAntiguedad() {
        return plusAntiguedad;
    }

    public void setPlusAntiguedad(float plusAntiguedad) {
        this.plusAntiguedad = plusAntiguedad;
    }
    
    public int getAñoActual(){
        Calendar cal= Calendar.getInstance();

        int year= cal.get(Calendar.YEAR);
        return year;
    }
    public float calcularAntiguedad(){
        int year = this.getAñoActual();
        int antiguedad = year - this.getAnioIngreso();
        
        return antiguedad;
    }
   public float calcularSueldo(int ingreso){
       float aumento=(sueldoBasico*this.getPlusAntiguedad()*this.calcularAntiguedad());
       return this.sueldoBasico+aumento;
   }
    public void setSueldo(int ingreso) {
        this.sueldo = this.calcularSueldo(ingreso);
    }
    
    public float getSueldo(int ingreso) {
        return this.calcularSueldo(ingreso);
    }

    @Override
    public float getSueldo() {
        throw new UnsupportedOperationException("Not supported yet."); //To change body of generated methods, choose Tools | Templates.
    }

    
    
    
}
