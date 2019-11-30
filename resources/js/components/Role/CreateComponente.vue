<template>
    <div class="card">




        <div class="card-header">
                <h4 class="text-center mb-2 card-title">Agregar rol</h4>
        </div>
       <div class="card-body">



            <div class="form-group row">
            <!-- /.Div para el tipo de documento -->
                
                <div class="col-md-4">
                    <label ><strong>Nombre del rol:</strong></label>
                </div>

                <div class="col-md-8 form-group" >
                    <input type="text" v-model="role.nombre" class="form-control "   required  placeholder="Rol">
                </div>

                <div class="col-md-12 form-group">
                    <label ><strong>Lista de permisos:</strong></label>
                </div>

                
            <div class="container-fluid " v-for="item in  modulos" v-bind:key="item.key">
                    <div class="form-group mb-1">
                        <button class="form-control btn btn-primary" type="button" data-toggle="collapse" :data-target="'#'+item" aria-expanded="false" v-bind:aria-controls="item">{{item}}</button>
                    </div>
                    <div class="collapse" v-bind:id="item">
                            <div class="card card-body">
                                <div class="row  form-line">
                                    <div class="col-3"  v-for="permiso in mpermisos" v-bind:key="permiso"> 
                                                <input type="checkbox" id="checkbox" v-model="selecionados" :value = "permiso +'-'+ item">
                                                <label for="checkbox">{{permiso}}</label>
                                        </div> 
                                </div>
                            </div>
                    </div>
            </div>
            
           <div class="container-fluid">
               <div class="form-group">
                   <b-button @click = "guardar()"  class="btn btn-success">Guardar Rol</b-button>
               </div>
           </div>
                

         </div>

                <!-- /.Div para digitar y buscar el numero del documento -->
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
            role:{
                nombre:'',
                permisos:[]
            },
            e:'',
            selecionados:[],
            permisos:[],
            modulos:[],
            mpermisos:['listar','guardar','editar','eliminar'],

        }
        
        
    },

   

created(){
    const params={
        nombre:this.role.nombre,
        permisos:this.selecionados
        }
        
    axios.get('/permission')
    .then(res=>{
        this.modulos = res.data;
        console.log(res.data)

    })

    
    

    
},

methods: {



    guardar(){
        if(!this.Validar()){
            const params = {nombre:this.role.nombre, permisos:this.selecionados}
            axios.post('/Role',params)
                        .then(res=>{
                           // this.horarios.push(res.data)
                           alert('El rol se ha creado con exito');
                        
                        });
            console.log(this.selecionados)
        }else{
            alert('No se creo el rol');
        }
        

        
    },

    Validar(){
        if(this.role.nombre == null || this.role.nombre.length == 0 || /^\s+$/.test(this.role.nombre)){
            alert('ERROR: El campo nombre no debe ir vacío o lleno de solamente espacios en blanco');
            return false;
        }
        else if ( /^[a-zA-ZÑñÁáÉéÍíÓóÚúÜü\s]+$/.test(this.role.nombre) == false) {
            alert ('el nombre solo debe tener letras');
            this.role.nombre = '';
            return false;
        }
        else if ((this.role.nombre).length > 35){
            alert('ERROR: el nombre no debe tener mas de 35 caracteres');
            this.role.nombre = '';
             return false;
        }
    }


},
}


</script>

}