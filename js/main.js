(function() {
    "use strict";

    var regalo = document.getElementById('regalo');
    document.addEventListener('DOMContentLoaded', function(){
    
        // Campos datos de usuario
        var nombre = document.getElementById('nombre');
        var apellido = document.getElementById('apellido');
        var email = document.getElementById('email');   
        
        // Campos pases
        var pase_dia = document.getElementById('pase_dia');    
        var pase_dos_dias = document.getElementById('pase_dos_dias');    
        var pase_completo = document.getElementById('pase_completo');    

        //Botones y divs 
        var calcular = document.getElementById('calcular');
        var errorDiv = document.getElementById('error');
        var botonRegistro = document.getElementById('btnRegistro');
        var lista_productos = document.getElementById('lista-productos');

        //Extras 
        var camisas = document.getElementById('camisa_evento');
        var etiquetas = document.getElementById('etiquetas');

        calcular.addEventListener('click', calcularPrecio);

        function calcularPrecio(event){
            event.preventDefault();
            if(regalo.value === '') {
                alert("Debes elegir un regalo");
                regalo.focus();
            }else {
                var boletosDia = parseInt(pase_dia.value, 10)|| 0,
                    boletos2Dias = parseInt(pase_dos_dias.value, 10)|| 0,
                    boletosCompleto = parseInt(pase_completo.value, 10)|| 0,
                    cantCamisas = parseInt(camisas.value, 10)|| 0,
                    cantEtiquetas = parseInt(etiquetas.value, 10)|| 0;
                
                var totalAPagar = (boletosDia * 30 + boletos2Dias *40 + boletosCompleto *50) + cantCamisas * 10 * 0.93 + cantEtiquetas * 2;
                
                var listadoProductos = [];

                if(boletosDia >= 1) {
                    listadoProductos.push(boletosDia + ' Pases por día');
                }
                if(boletos2Dias >= 1) {
                    listadoProductos.push(boletas2Dias + ' Pases por 2 días');
                }
                if(boletosCompleto >= 1) {
                    listadoProductos.push(boletosCompleto + ' Pases completos');
                }
                if(cantCamisas >= 1) {
                    listadoProductos.push(cantCamisas + ' Camisetas');
                }
                if(cantEtiquetas >= 1) {
                    listadoProductos.push(cantEtiquetas + ' Etiquetas');
                }

                lista_productos.innerHTML = '';
                for (var i = 0; i< listadoProductos.length; i++) {
                    lista_productos.innerHTML += listadoProductos[i] + '<br/>';
                }
                console.log(listadoProductos);
            }
        }
    }); 
})();