<template>
    <div  class="card">
        <div class="card-header">
                <h4 class="text-center mb-2 card-title">Tipo Cliente</h4>
        </div>
        
        <div class="card-body" v-can="'guardar-tipo-cliente'">
            <form @submit.prevent="editar(tipocliente)" v-if="editarActivo" >
                    <div class="row">
                            <div class="col-5">
                                <input type="text" placeholder="Nombre" class="form-control mb-2" v-model="tipocliente.nombre">
                            </div>
                            <div class="col-5">
                                <input type="text" placeholder="Descuento" class="form-control mb-2" v-model="tipocliente.descuento">
                            </div>

                            <div class="col-2">
                                 <button  class="btn btn-success mr-2" type="submit" @click="Validar()">Editar</button>
                            </div>
                    </div>
                    
                   
             </form>


             <form @submit.prevent="agregar" v-else>
                    <div class="row">
                            <div class="col-5">
                                <input type="text" placeholder="Nombre" class="form-control mb-2" v-model="tipocliente.nombre">
                            </div>
                            <div class="col-5">
                                <input type="text" placeholder="Descuento" class="form-control mb-2" v-model="tipocliente.descuento">
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
                            <th>Descuento</th>
                            <th v-can="'editar-tipo-cliente'||'eliminar-tipo-cliente'" >Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(tipocliente,index) in tipoClientes" :key="index"> <!-- Recorremos nuestro array -->
                            <td >{{tipocliente.id}}</td> 
                            <td >{{tipocliente.nombre}}</td> <!--En la primera columna mostramos el nombre-->
                            <td v-text="tipocliente.descuento"></td> <!--En la segunda mostramos el apellido-->
                            <td v-can="'editar-tipo-cliente'||'eliminar-tipo-cliente'"> 
                                <button v-can="'editar-tipo-cliente'" class="btn btn-success btn-sm" @click="editarForm(tipocliente,index)">Editar</button>
                                <button v-can="'eliminar-tipo-cliente'" class="btn btn-danger btn-sm" @click="eliminar(tipocliente,index)">Eliminar</button>
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
            tipoClientes:[],
            tipocliente:{
                nombre:'',
                descuento:''
            },
            editarActivo:false
        }
    },
created(){
    axios.get('/TipoCliente')
    .then(res=>{
        this.tipoClientes=res.data;
    })
},
    methods: {
        agregar(){

            if(this.tipocliente.nombre.trim() === '' || this.tipocliente.descuento.trim() === ''){
                alert('Debes completar todos los campos antes de guardar');
                return;
            }
           // console.log(this.tipocliente.nombre,this.tipocliente.descuento);
            const params={nombre:this.tipocliente.nombre,descuento:this.tipocliente.descuento}
            this.tipocliente.nombre='';
            this.tipocliente.descuento='';
            axios.post('/TipoCliente',params)
                .then(res=>{
                    if(res.data == null){
                        alert('el tipo de cliente no se ha registrado')
                    }else{
                        alert('el tipo de cliente se ha registrado')
                    }
                    this.tipoClientes.push(res.data)
                });
        },
        eliminar(tipocliente,index){
            
            const confirmacion = confirm(`Confirma Eliminar Tipo Cliente: ${tipocliente.nombre}`);
                if(confirmacion){
                        
                        axios.delete('/TipoCliente/'+tipocliente.id)
                        .then(()=>{
                                this.tipoClientes.splice(index,1);
                                alert('el tipo de cliente se ha eliminado con exito')
                        });
                    }
        },


        editarForm(tipocliente){
            this.editarActivo=true;
            this.tipocliente.nombre=tipocliente.nombre;
            this.tipocliente.descuento=tipocliente.descuento;
            this.tipocliente.id=tipocliente.id;

        },


        editar(tc){
            const params={
                nombre:tc.nombre,
                descuento:tc.descuento
                
            }
            console.log(tc);
                axios.put('/TipoCliente/'+tc.id,tc)
                .then(res=>{
                     const index=this.tipoClientes.findIndex(buscar=>buscar.id==tc.id);
                     console.log(res.data.status);
                     this.tipoClientes[index].nombre=tc.nombre;
                     this.tipoClientes[index].descuento=tc.descuento;
                     this.tipocliente.nombre='';
                     this.tipocliente.descuento='';
                     this.editarActivo=false;
                     alert('el tipo de cliente se ha editado con exito')
                })
        },

        Validar(){
            
            if(this.tipocliente.nombre == null || this.tipocliente.nombre == 0 || /^\s+$/.test(this.tipocliente.nombre)){
                alert('ERROR: El campo nombre no debe ir vacío o lleno de solamente espacios en blanco');
                return false;
            }
            else if ( /^[a-z][a-z]*/.test(this.tipocliente.nombre) == true || /^[a-z][a-z]*/.test(this.tipocliente.nombre) == false) {
                alert ('el nombre solo debe tener letras');
                this.limpiar();
                return false;
            }
            else if ((this.tipocliente.nombre).length > 35){
                alert('ERROR: el nombre no debe tener mas de 35 caracteres');
                this.limpiar();
                return false;
            }
            else if (this.tipocliente.descuento == null || /^\s+$/.test(this.tipocliente.descuento)){
                alert('ERROR: El campo descuento no debe ir vacío o lleno de solamente espacios en blanco');
                return false;
            }
            else if (isNaN(this.tipocliente.descuento)){
                alert('el descuento debe ser un numero');
                this.limpiar();
            }
            else if ((this.tipocliente.descuento) > 100){
                alert('ERROR: el descuento debe ser menor del 100%');
                this.limpiar();
                return false;
            }
            
        },

        limpiar(){
            this.tipocliente.nombre = '';
            this.tipocliente.descuento = '';
        }

    },
}
</script>