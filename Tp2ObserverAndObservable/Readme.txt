Ciclo de ejecucion de los metodos del patron utilizado:



El cliclo empieza cuando el objeto observable notifica al observador, 
este ultimo dispara su metodo  update, y  asi poder realizar la funcion 
que se le indicó.





Que argumentos se pasan al metodo update() y en que momento se ejecuta dicho metodo:



En el momento que se ejecuta este metodo es cuando
 en la clase que extiende de Observable
se ejecuta el método " notifyObservers(); "
 u "notifyObservers(arg);". 
Y los argumentos que se pasan son un Observable que es donde se produjo el evento 
y un Object a modo de arguemnto que el objeto observable envia.