<template>
    <div class="card">
        <div class="card-header text-center">
            <h4>Datos de Cliente</h4>
        </div>

        <div class="card-body">
            <div class="form-row border justify-content-between px-2">
                <label ><strong>Identificacion de cliente:</strong></label>
                <label >{{this.cliente.id}}</label>
            </div>

            <div class="form-row border justify-content-between px-2">
                <label ><strong>Nombre de usuario:</strong></label>
                <label >{{this.cliente.persona.user.nickname}}</label>
            </div>

            <div class="form-row border justify-content-between px-2">
                <label ><strong>Tipo de Documento:</strong></label>
                <label >{{this.cliente.persona.tipo_doc}}</label>
            </div>

            <div class="form-row border justify-content-between px-2">
                <label ><strong>Numero de Documento:</strong></label>                
                <label >{{this.cliente.persona.documento}}</label>
            </div>

            <div class="form-row border justify-content-between px-2">
                <label ><strong>Nombre:</strong></label>
                <label >{{this.cliente.persona.nombre}}</label>
            </div>

            <div class="form-row border justify-content-between px-2">
                
                <label ><strong>Apellido:</strong></label>
                <label >{{this.cliente.persona.apellido}}</label>
            </div>

            <div class="form-row border justify-content-between px-2">
                <label ><strong>Tipo cliente:</strong></label>
                <label >{{this.cliente.tipocliente.nombre}}</label>
            </div>

            <div class="form-row border justify-content-between px-2">
                <label ><strong>Fecha de Nacimiento:</strong></label>
                <label >{{this.cliente.persona.fecha_nac}}</label>
            </div>

            <div class="form-row border justify-content-between px-2">
                <label ><strong>Email:</strong></label>
                <label >{{this.cliente.persona.user.email}}</label>
            </div>

            <div class="form-row border justify-content-between px-2">
                <label ><strong>Telefono:</strong></label>
                <label >{{this.cliente.persona.telefono}}</label>
            </div>

            <div class="form-row border justify-content-between px-2">
                <label ><strong>Direccion:</strong></label>
                <label >{{this.cliente.persona.direccion}}</label>
            </div>

            <div class="form-row border justify-content-between px-2">
                <label ><strong>Sexo:</strong></label>
                <label >{{this.cliente.persona.sexo}}</label>
            </div>

            
            
        </div>
        
                
    </div>

    
</template>



<script>
export default {
    data(){
        return {

         cliente:{
                persona:{
                    tipo_doc:'',
                    documento:'',
                    nombre:'',
                    apellido:'',
                    fecha_nac:'',
                    sexo:'',
                    telefono:'',
                    direccion:'',
                    altura:'',
                    tipo_documento:{
                        id:'',
                        nombre:''
                    },
                    user:{
                        nickname:'',
                        email:'',
                        password:'',
                        password_confirmation:'',
                    },
                },

                tipocliente:{
                    id:'',
                    nombre:''
                },
            }
    }
    },


    created(){
    
    
    axios.get(window.location).then(res=>{
        console.log(res.data);
        this.cliente = res.data;
    });

    },
methods:{
    

}
    

}
</script>