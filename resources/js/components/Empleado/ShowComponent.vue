<template>
    <div class="card">
        <div class="card-header text-center">
            <h4>Datos de Empleado </h4>
        </div>
        <div class="card-body">
            <div class="form-row border justify-content-between px-2">
                
                <label ><strong>Identificacion de Empleado:</strong></label>
                <label >{{this.empleado.id}}</label>
            </div>
            <div class="form-row border justify-content-between px-2">
                
                <label ><strong>Nombre de usuario:</strong></label>
                <label >{{this.empleado.persona.user.nickname}}</label>
            </div>
            <div class="form-row border justify-content-between px-2">
                
                <label ><strong>Tipo de Documento:</strong></label>
                <label >{{this.empleado.persona.tipo_documento.nombre}}</label>
            </div>
            <div class="form-row border justify-content-between px-2">
                
                
                <label ><strong>Numero de Documento:</strong></label>                
                <label >{{this.empleado.persona.documento}}</label>
            </div>
            <div class="form-row border justify-content-between px-2">
                
                <label ><strong>Nombre:</strong></label>
                <label >{{this.empleado.persona.nombre}}</label>
                
            </div>
            <div class="form-row border justify-content-between px-2">
                
                <label ><strong>Apellido:</strong></label>
                <label >{{this.empleado.persona.apellido}}</label>
                
            </div>
            <div class="form-row border justify-content-between px-2">
                <label ><strong>Tipo Empleado:</strong></label>
                <label >{{this.empleado.tipo_empleado.nombre}}</label>
                
            </div>
            <div class="form-row border justify-content-between px-2">
                <label ><strong>Fecha de Nacimiento:</strong></label>
                <label >{{this.empleado.persona.fecha_nac}}</label>
                
            </div>
            <div class="form-row border justify-content-between px-2">
                <label ><strong>Email:</strong></label>
                <label >{{this.empleado.persona.user.email}}</label>
                
            </div>
            <div class="form-row border justify-content-between px-2">
                <label ><strong>Telefono:</strong></label>
                <label >{{this.empleado.persona.telefono}}</label>
                
            </div>
            <div class="form-row border justify-content-between px-2">
                <label ><strong>Direccion:</strong></label>
                <label >{{this.empleado.persona.direccion}}</label>
                
            </div>
            <div class="form-row border justify-content-between px-2">
                <label ><strong>Sexo:</strong></label>
                <label >{{this.empleado.persona.sexo}}</label>
                
            </div>
            <div class="form-row mt-2">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalHorario">
                Ver Horario
            </button>
            </div>
            
        </div>
        
                <div class="modal fade" id="ModalHorario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Horario de {{empleado.persona.nombre}} {{empleado.persona.apellido}}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        ...
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-primary">Guardar</button>
                    </div>
                    </div>
                </div>
                </div>
    </div>

    
</template>
<script>
export default {
    data(){
        return {
         empleado:{
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

                tipo_empleado:{
                	id:'',
                	nombre:''
                },
            },
    }
    },


    created(){
    
    axios.get(window.location).then(res=>{
        //console.log(res.data);
        this.empleado=res.data;
       
       
        
    }),

    axios.get('/TipoEmpleado')
    .then(res=>{
        this.tipoEmpleados = res.data;
        

    }),

    axios.get('/TipoDocumento')
    .then(res=>{
        this.tipoDocumentos = res.data;
    });


    
}
}
</script>