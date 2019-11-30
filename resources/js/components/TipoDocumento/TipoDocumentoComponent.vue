<template>
    <div  class=" card">
        <div class="card-header">
                <h4 class="text-center mb-2 card-title">Tipo Documento</h4>
        </div>
        
        
         <div class="card-body justify-content-center" v-can="'guardar-tipo-documento'">
            <form  @submit.prevent="editar(tipoDocumento)" v-if="editarActivo">
                    <div class="col  center-block">
                            <div class="col-5">
                                <input type="text" placeholder="Nombre" class="form-control mb-2" v-model="tipoDocumento.nombre">
                            </div>
                            
                            <div class="col-5">
                                 <button  class="btn btn-success mr-2" type="submit" @click="Validar()">Editar</button>
                            </div>
                    </div>
                    
                   
             </form>


             <form @submit.prevent="agregar" v-else>
                    <div class="row center-block">
                            <div class="col-5">
                                <input type="text" placeholder="Nombre" class="form-control mb-2" v-model="tipoDocumento.nombre">
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
                            <th v-can="'editar-tipo-documento'||'eliminar-tipo-documento'">Opciones</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr v-for="(tipoDocumento,index) in tipoDocumentos" :key="index"> <!-- Recorremos nuestro array -->
                            <td >{{tipoDocumento.id}}</td> 
                            <td >{{tipoDocumento.nombre}}</td> <!--En la primera columna mostramos el nombre-->
                           
                            <td v-can="'editar-tipo-documento'||'eliminar-tipo-documento'"> 
                                <button v-can="'editar-tipo-documento'" class="btn btn-success btn-sm" @click="editarForm(tipoDocumento,index)">Editar</button>
                                <button v-can="'eliminar-tipo-documento'" class="btn btn-danger btn-sm" @click="eliminar(tipoDocumento,index)">Eliminar</button>
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
            tipoDocumentos:[],
            tipoDocumento:{
                nombre:''
            },
            editarActivo:false
        }
    },




created(){
    axios.get('/TipoDocumento')
    .then(res=>{
        this.tipoDocumentos=res.data;
    })
},



    methods: {
        agregar(){

            /*if(this.tipoDocumento.nombre.trim() === '' ){
                alert('Debes completar todos los campos antes de guardar');
                return;
            }
            */
           // console.log(this.tipoEmpleado.nombre,this.tipoEmpleado.descuento);
            const params={nombre:this.tipoDocumento.nombre}
            this.tipoDocumento.nombre='';
            axios.post('/TipoDocumento',params)
                .then(res=>{
                    if(res.data == null){
                        alert('el tipo de documento no se ha registrado')
                    }else{
                        alert('el tipo de documento se ha registrado')
                    }
                    console.log(res.data)
                    this.tipoDocumentos.push(res.data)
                });
        },
        eliminar(tipoDocumento,index){
            
            const confirmacion = confirm(`Confirma Eliminar Tipo Documento: ${tipoDocumento.nombre}`);
                if(confirmacion){
                        
                        axios.delete('/TipoDocumento/'+tipoDocumento.id)
                        .then(()=>{
                                this.tipoDocumentos.splice(index,1);
                                alert('el tipo de documento se ha eliminado con exito')
                        });
                    }
        },


        editarForm(tipoDocumento){
            this.editarActivo=true;
            this.tipoDocumento.nombre = tipoDocumento.nombre;
            this.tipoDocumento.id     = tipoDocumento.id;
        },


        editar(tc){
            const params={
                nombre:tc.nombre,
            }

            console.log(tc);
                axios.put('/TipoDocumento/'+tc.id,tc)
                .then(res=>{
                     const index=this.tipoDocumentos.findIndex(buscar=>buscar.id==tc.id);
                     console.log(res.data.status);
                     this.tipoDocumentos[index].nombre=tc.nombre;
                     this.tipoDocumento.nombre='';
                     this.editarActivo=false;
                     alert('el tipo de documento se ha editado con exito')
                })
        },

        Validar(){
            if(this.tipoDocumento.nombre == null || this.tipoDocumento.nombre.length == 0 || /^\s+$/.test(this.tipoDocumento.nombre)){
                alert('ERROR: El campo nombre no debe ir vacío o lleno de solamente espacios en blanco');
                return false;
            }
            else if ( /^[a-zA-ZÑñÁáÉéÍíÓóÚúÜü\s]+$/.test(this.tipoDocumento.nombre) == false) {
                    alert ('el nombre solo debe tener letras');
                    this.tipoDocumento.nombre = '';
                    return false;
            }
            else if ((this.tipoDocumento.nombre).length > 35){
                alert('ERROR: el nombre no debe tener mas de 35 caracteres');
                this.tipoDocumento.nombre = '';
                return false;
            }
            
        }

    },
}
</script>