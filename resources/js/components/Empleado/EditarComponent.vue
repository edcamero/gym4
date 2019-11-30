<template>
    <div class="card">

        <div class="card-header">
                <h4 class="text-center mb-2 card-title">EDITAR EMPLEADO</h4>
        </div>
       <div class="card-body">
            <div class="form-group row">
            <!-- /.Div para el tipo de documento -->
                <div class="col-md-6">
                    <select class="form-control" v-model="empleado.persona.tipo_doc">
                        <option disabled value="">Selecione un tipo de documento</option>
                        <option v-for="item in tipoDocumentos" v-bind:key="item.id" v-bind:value="item.id">{{ item.nombre }}</option>
                    </select>
                </div>
                
                <!-- /.Div para digitar y buscar el numero del documento -->
                <div class="col">
                    <input type="text" v-model="empleado.persona.documento" class="form-control "   required  
                        placeholder="Documento">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>   
            </div>
                
                     
            <!-- /.Row para nombre y apellido -->
            <div class="row form-group">
                <div class="col-md-6">
                    <input id="firstname" type="text" class="form-control " placeholder="Nombres" v-model="empleado.persona.nombre"  autofocus>
                </div>

                <div class="col-md-6">
                    <input id="lastname" type="text" class="form-control " placeholder="Apellidos" v-model="empleado.persona.apellido"  required autofocus>            
                </div>
            </div>
                    
                
            <!-- /.Row para sexo y altura-->  
                <div class="row form-group">
                    <div class="col">
                        <input type="date" v-model="empleado.persona.fecha_nac" class="form-control" autocomplete="off"
                         placeholder="Fecha de Nacimiento">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>          
                </div>

                    <div class="col">
                        <SELECT v-model = "empleado.persona.sexo" class="form-control " autocomplete="off">
                            <option v-for = "item in genero" v-bind:key="item.text">{{ item.text }}</option>
                        </SELECT>
                    </div>

                   <div class="col ">
                        <input type="text" v-model="empleado.persona.altura" class="form-control"  autocomplete="off" 
                            placeholder="Altura">
                            <span class="glyphicon glyphicon-user form-control-feedback"></span>
                               
                    </div>
                </div>


                <!-- /.Row para telefono y direcion  -->  
                <div class="row form-group">
                    <div class="col">
                        <input type="text" v-model="empleado.persona.telefono"  class="form-control " autocomplete="off" 
                            placeholder="Telefono">
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    </div>

                    <div class="col">
                        <input type="text" v-model="empleado.persona.direccion" class="form-control " autocomplete="off" 
                            placeholder="Direccion">
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    </div>

                </div>


                 <!-- /.Div para el nickname -->
                        
                            <!-- /.col -->
                <div class="form-group row mb-0">
                    <div class="col-md-6">
                        <select class="form-control" v-model="empleado.tipo_emple">
                            <option disabled value="">Selecione un tipo de empleado</option>

                            <option v-for="item in tipoEmpleados" v-bind:key="item.id" v-bind:value="item.id">{{ item.nombre }}</option>
                        </select>
                    </div>


                    <div class="col-md-6 text-center">
                        <button  v-on:click = "editar(empleado)" class="btn btn-primary">EDITAR
                        </button>
                    </div>

                </div>
        </div>

</div>



    
</template>


<script>
export default {
    mounted(){
        console.log("se monto el componente agregar empleado");
    },
    data(){
        return{
            tipoEmpleados:[],
            tipoDocumentos:[],

            empleados:[],
            personas:[],
            genero:[
                {id:0,text:'Sexo'},
                {id:1,text:'Masculino'},
                {id:2,text:'Femenino'}
            ],

            

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

                    user:{
                        nickname:'',
                        email:'',
                        password:'',
                        password_confirmation:'',
                    },
                },
                tipo_emple:{
                        id:'',
                        nombre:'',
                    },
            },
        }
        
        
    },

   

created(){
    axios.get(window.location).then(res=>{
        //console.log(res.data);
        this.empleado = res.data;
    }),

    axios.get('/TipoEmpleado')
    .then(res=>{
        this.tipoEmpleados = res.data;
    }),

    axios.get('/TipoDocumento')
    .then(res=>{
        this.tipoDocumentos = res.data;
    })
},

methods: {

        buscar(){
        //console.log(this.empleado.persona.documento);
        //console.log('hola');
            axios.get('/Persona/' + this.empleado.persona.documento).
            then(res=>{
            let person = res.data[0];
            this.empleado.persona = person;
           // console.log(person)
                   // console.log(res.data);
                    //console.log(res.data['0']['nombre'])
            })
        },


        editar(empleado){

            if(!this.Validar()){
                const params = {

                emp_id:empleado.id,
                per_id:empleado.persona.id,
                tipo_doc:empleado.persona.tipo_doc,
                documento:empleado.persona.documento,
                nombre:empleado.persona.nombre,
                apellido:empleado.persona.apellido,
                fecha_nac:empleado.persona.fecha_nac,
                sexo:empleado.persona.sexo,
                telefono:empleado.persona.telefono,
                direccion:empleado.persona.direccion,
                altura:empleado.persona.altura,
                email:empleado.persona.user.email,
                tip_emp_id:empleado.tipo_emple,
            }

            console.log(empleado);
                axios.put('/Empleado/' + empleado.id, params)
                .then(res=>{

                     this.empleado.persona.tipo_doc            = '';
                     this.empleado.persona.documento          = '';
                     this.empleado.persona.nombre          = '';
                     this.empleado.persona.apellido        = '';
                     this.empleado.persona.fecha_nac          = '';
                     this.empleado.persona.sexo         = '';
                     this.empleado.persona.telefono         = '';
                     this.empleado.persona.direccion          = '';
                     this.empleado.persona.altura          = '';
                     this.empleado.persona.user.nickname          = '';
                     this.empleado.persona.user.email         = '';
                     this.empleado.persona.tipo_emple         = '';

                     this.editarActivo = false;
                     console.log(res.data);
                     alert('el empleado se ha modificado con exito');
                })
                
            }
            else {
                alert('el empleado no se ha modificado');
            }
            
        },

        ver(){
                console.log('entro al evento');
        },

        Validar(){

            if(this.empleado.persona.tipo_doc == null || this.empleado.persona.tipo_doc == 'Seleccione un tipo de documento'){
                    alert('seleccione un tipo de documento');
                    return false;
            }
            else if(this.empleado.persona.documento == null || this.empleado.persona.documento.length == 0 || /^\s+$/.test(this.empleado.persona.documento)){
                alert('ERROR: no debe campos vacíos o lleno de solamente espacios en blanco');
                return false;
            }
            else if ((this.empleado.persona.documento).length > 35){
                alert('ERROR: el nombre no debe tener mas de 35 caracteres');
                this.empleado.persona.documento = '';
                return false;
            }
            else if(this.empleado.persona.nombre == null || this.empleado.persona.nombre.length == 0 || /^\s+$/.test(this.empleado.persona.nombre)){
                    alert('ERROR: no debe campos vacíos o lleno de solamente espacios en blanco');
                    return false;
            }
            else if ( /^[a-zA-ZÑñÁáÉéÍíÓóÚúÜü\s]+$/.test(this.empleado.persona.nombre) == false) {
                        alert ('el nombre solo debe tener letras');
                        this.empleado.persona.nombre = '';
                        return false;
            }
            else if ((this.empleado.persona.nombre).length > 35){
                    alert('ERROR: el nombre no debe tener mas de 35 caracteres');
                    this.empleado.persona.nombre = '';
                    return false;
            }
            else if(this.empleado.persona.apellido == null || this.empleado.persona.apellido.length == 0 || /^\s+$/.test(this.empleado.persona.apellido)){
                    alert('ERROR: no debe campos vacíos o lleno de solamente espacios en blanco');
                    return false;
            }
            else if ( /^[a-zA-ZÑñÁáÉéÍíÓóÚúÜü\s]+$/.test(this.empleado.persona.apellido) == false) {
                        alert ('el nombre solo debe tener letras');
                        this.empleado.persona.apellido = '';
                        return false;
            }
            else if ((this.empleado.persona.apellido).length > 35){
                    alert('ERROR: el nombre no debe tener mas de 35 caracteres');
                    this.empleado.persona.apellido = '';
                    return false;
            }
            else if(!isNaN(this.empleado.persona.fecha_nac)){
                alert('ERROR: selecccione la fecha de nacimiento');
                return false;
            }
            else if(this.empleado.persona.sexo == null || this.empleado.persona.sexo == 'Sexo'){
                    alert('seleccione el sexo');
                return false;
            }
            else if(this.empleado.persona.altura == null || this.empleado.persona.altura.length == 0 || /^\s+$/.test(this.empleado.persona.altura)){
                    alert('ERROR: no debe campos vacíos o lleno de solamente espacios en blanco');
                    return false;
            }
            else if (isNaN(this.empleado.persona.altura)){
                alert('la altura debe ser un numero');
                //this.limpiar();
                return false;
            }
            else if ((this.empleado.persona.altura) > 220 || (this.empleado.persona.altura) < 60){
                alert('ERROR: la altura debe ser menor de 220 cm 0 mayor a 60cm');
                //this.limpiar();
                return false;
            }

            else if (isNaN(this.empleado.persona.telefono)){
                alert('el telefono debe ser un numero');
                //this.limpiar();
            }
            else if(this.empleado.persona.telefono == null || this.empleado.persona.telefono.length == 0 || /^\s+$/.test(this.empleado.persona.telefono)){
                    alert('ERROR: no debe tener campos vacíos o lleno de solamente espacios en blanco');
                    return false;
            }
            else if ((this.empleado.persona.telefono) > 9999999999){
                alert('ERROR: el telefono debe tener 10 numeros');
                //this.limpiar();
                return false;
            }
            else if(this.empleado.persona.direccion == null || this.empleado.persona.direccion.length == 0 || /^\s+$/.test(this.empleado.persona.direccion)){
                    alert('ERROR: no debe tener campos vacíos o lleno de solamente espacios en blanco');
                    return false;
            }
            else if(this.empleado.tipo_emple == null || this.empleado.tipo_emple == 'Seleccione un tipo de empleado'){
                    alert('seleccione el tipo de empleado');
                return false;
            }
        }


    },
}


</script>


}