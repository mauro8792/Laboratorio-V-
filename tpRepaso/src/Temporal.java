/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author mauro
 */
public class Temporal extends Empleado{
    
    private float sueldo;// horas x $
    private float cantHoras;
    private float honorario;

    public Temporal(int idEmpleado, String nombre, int ingreso, float cantHoras,
                    float honorario, float sueldo) {
        super(idEmpleado, nombre, ingreso);
        this.setCantHoras(cantHoras);
        this.setHonorario(honorario);
        this.setSueldo(this.cantHoras,this.honorario);
        
    }

    Temporal() {
        throw new UnsupportedOperationException("Not supported yet."); //To change body of generated methods, choose Tools | Templates.
    }
    
    
   
    @Override
    public float  getSueldo() {
        return sueldo;
    }

    public void setSueldo(float horas, float paga) {
        this.sueldo = this.calcularSueldo(horas, paga);
    }

    public float getCantHoras() {
        return cantHoras;
    }

    public void setCantHoras(float cantHoras) {
        this.cantHoras = cantHoras;
    }

    public float getHonorario() {
        return honorario;
    }

    public void setHonorario(float honorario) {
        this.honorario = honorario;
    }
    
    
    public float calcularSueldo(float Horas, float Paga){
        float salario= Horas*Paga;
        return salario;
        
    }
}
