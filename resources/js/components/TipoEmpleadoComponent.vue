<template>
    <div  class=" card">
        <div class="card-header">
                <h4 class="text-center mb-2 card-title">Tipo Empleado</h4>
        </div>
        
        

         <div class="card-body justify-content-center" v-can="'guardar-tipo-cliente'||'editar-tipo-empleado'">

            <form  @submit.prevent = "editar(tipoEmpleado)" v-if="editarActivo" >
                    <div class="col  center-block">
                            <div class="col-5">
                                <input type="text" placeholder="Nombre" class="form-control mb-2" v-model="tipoEmpleado.nombre">
                            </div>
                            
                            <div class="col-5">
                                 <button  class="btn btn-success mr-2" type="submit" @click="Validar()">Editar</button>
                            </div>
                    </div>
             </form>

             <form @submit.prevent = "agregar()" v-else v-can="'guardar-tipo-cliente'">
                    <div class="row center-block">
                            <div class="col-5">
                                <input type="text" placeholder="Nombre" class="form-control mb-2" v-model="tipoEmpleado.nombre">
                            </div>
                            

                            <div class="col-2">
                                 <button  class="btn btn-primary mr-2" type="submit" @click="Validar()">Agregar</button>
                            </div>
                    </div> 
             </form>
        </div>

        
        <div class="card-body">
                <table class="table text-center">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>Nombre</th>
                            <th v-can="'editar-tipo-empleado'||'eliminar-tipo-empleado'">Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(tipoEmpleado,index) in tipoEmpleados" :key="index"> <!-- Recorremos nuestro array -->
                            <td >{{tipoEmpleado.id}}</td> 
                            <td >{{tipoEmpleado.nombre}}</td> <!--En la primera columna mostramos el nombre-->
                           
                            <td v-can="'editar-tipo-empleado'||'eliminar-tipo-empleado'"> 
                                <button v-can="'editar-tipo-empleado'" class="btn btn-success btn-sm" @click="editarForm(tipoEmpleado,index)">Editar</button>
                                <button v-can="'eliminar-tipo-empleado'" class="btn btn-danger btn-sm" @click="eliminar(tipoEmpleado,index)">Eliminar</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
        </div>


    </div>
</template>


<script>
export default {
    data(){
        return {
            tipoEmpleados:[],
            tipoEmpleado:{
                nombre:''
            },
            editarActivo:false
        }
    },
created(){
    axios.get('/TipoEmpleado')
    .then(res=>{
        this.tipoEmpleados=res.data;
    })
},
    methods: {
        agregar(){

           // console.log(this.tipoEmpleado.nombre,this.tipoEmpleado.descuento);
            const params={
                nombre:this.tipoEmpleado.nombre
            }
            this.tipoEmpleado.nombre = '';

            axios.post('/TipoEmpleado',params)
                .then(res=>{
                    if(res.data == null){
                        alert('el tipo de empleado no se ha registrado con exito')
                    }else{
                        alert('el tipo de empleado se ha registrado')
                    }
                    console.log(res.data)
                    this.tipoEmpleados.push(res.data)
        });
    },


        eliminar(tipoEmpleado,index){
            
            const confirmacion = confirm(`Confirma Eliminar Tipo Cliente: ${tipoEmpleado.nombre}`);
                if(confirmacion){
                        
                        axios.delete('/TipoEmpleado/'+tipoEmpleado.id)
                        .then(()=>{
                                this.tipoEmpleados.splice(index,1);
                                alert('el tipo de empleado se ha eliminado con exito')
                        });
                    }
        },


        editarForm(tipoEmpleado){
            this.editarActivo=true;
            this.tipoEmpleado.nombre=tipoEmpleado.nombre;
            this.tipoEmpleado.descuento=tipoEmpleado.descuento;
            this.tipoEmpleado.id=tipoEmpleado.id;
        },


        editar(tc){
            const params = {
                nombre:tc.nombre,
                descuento:tc.descuento
                
            }
            console.log(tc);
                axios.put('/TipoEmpleado/' + tc.id, tc)
                .then(res=>{
                     const index = this.tipoEmpleados.findIndex(buscar=>buscar.id==tc.id);
                     console.log(res.data.status);
                     this.tipoEmpleados[index].nombre=tc.nombre;
                     this.tipoEmpleados[index].descuento=tc.descuento;
                     this.tipoEmpleado.nombre='';
                     this.tipoEmpleado.descuento='';
                     this.editarActivo=false;
                     alert('el tipo de empleado se ha editado con exito')
                })
        },

        Validar(){
            if(this.tipoEmpleado.nombre == null || this.tipoEmpleado.nombre.length == 0 || /^\s+$/.test(this.tipoEmpleado.nombre)){
                alert('ERROR: El campo nombre no debe ir vacío o lleno de solamente espacios en blanco');
                return false;
            }
            else if ( /^[a-zA-ZÑñÁáÉéÍíÓóÚúÜü\s]+$/.test(this.tipoEmpleado.nombre) == false) {
                    alert ('el nombre solo debe tener letras');
                    this.tipoEmpleado.nombre = '';
                    return false;
            }
            else if ((this.tipoEmpleado.nombre).length > 35){
                alert('ERROR: el nombre no debe tener mas de 35 caracteres');
                this.tipoEmpleado.nombre = '';
                return false;
            }
        }

    },
}
</script>