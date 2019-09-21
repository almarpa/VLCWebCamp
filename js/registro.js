// JQUERY
(function() {
    // Menu responsive (menu desplegable)
    $('.menu-movil').on('click', function() {
        $('.navegacion-principal').slideToggle();
    });
})();

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

        // Botones y divs 
        var calcular = document.getElementById('calcular');
        var errorDiv = document.getElementById('error');
        var botonRegistro = document.getElementById('btnRegistro');
        var lista_productos = document.getElementById('lista-productos');
        var suma = document.getElementById("suma-total");

        // Extras 
        var camisas = document.getElementById('camisa_evento');
        var etiquetas = document.getElementById('etiquetas');

        // EventListeners
        calcular.addEventListener('click', calcularPrecio);

        pase_dia.addEventListener('blur', mostrarDias);
        pase_dos_dias.addEventListener('blur', mostrarDias);
        pase_completo.addEventListener('blur', mostrarDias);

        nombre.addEventListener('blur', validarCampos);
        apellido.addEventListener('blur', validarCampos);
        email.addEventListener('blur', validarCampos);
        email.addEventListener('blur', validarMail);

        function validarCampos() {
            if(this.value == '') {
                errorDiv.style.display = 'block';
                errorDiv.innerHTML = "Este campo es obligatorio";
                this.style.border = '1px solid red';
                errorDiv.style.color = 'red';
            }else {
                errorDiv.style.display = 'none';
                this.style.border = '1px solid #cccccc';
            }
        }

        function validarMail() {
            if(this.value != '') {
                if(this.value.indexOf("@") > -1) {
                    errorDiv.style.display = 'none';
                    this.style.border = '1px solid #cccccc';
                }else {
                    errorDiv.style.display = 'block';
                    errorDiv.innerHTML = "El campo email debe contener un '@'";
                    this.style.border = '1px solid red';
                    errorDiv.style.color = 'red';
                }
            }
        }

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
                    listadoProductos.push(boletos2Dias + ' Pases por 2 días');
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

                lista_productos.style.display = "block";
                lista_productos.innerHTML = '';
                for (var i = 0; i< listadoProductos.length; i++) {
                    lista_productos.innerHTML += listadoProductos[i] + '<br/>';
                }
                suma.innerHTML = "$ " + totalAPagar.toFixed(2);
            }
        }

        function mostrarDias() {
            var boletosDia = parseInt(pase_dia.value, 10)|| 0,
                boletos2Dias = parseInt(pase_dos_dias.value, 10)|| 0,
                boletosCompleto = parseInt(pase_completo.value, 10)|| 0;
            var diasElegidos = [];

            if(boletosDia > 0) {
                diasElegidos.push('viernes');
            }
            if(boletos2Dias > 0) {
                diasElegidos.push('viernes','sabado');
            }
            if(boletosCompleto > 0) {
                diasElegidos.push('viernes', 'sabado', 'domingo');
            }
            for(var i = 0; i < diasElegidos.length; i++) {
                document.getElementById(diasElegidos[i]).style.display = 'block';
            }
        }
    }); 
})();