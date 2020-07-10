
        $(function(){
            $('#form-empleados').validate({
                rules :{
                    nombre : {
                        required : true,
                        minlength : 3, //para validar campo con minimo 3 caracteres
                        maxlength : 9  //para validar campo con maximo 9 caracteres
                    },
                    mi_edad : {
                        required : true,
                        number : true   //para validar campo solo numeros
                    },
                    mi_pais : {
                        required :true,
                    }
        
                }
            });  
        }