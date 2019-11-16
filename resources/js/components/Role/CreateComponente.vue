<template>
    <div class="card">

        <div class="card-header">
                <h4 class="text-center mb-2 card-title">Agregar Empleado</h4>
        </div>
       <div class="card-body">
            <div class="form-group row">
            <!-- /.Div para el tipo de documento -->
                
                <div class="col-md-4">
                    <label ><strong>Nombre del role:</strong></label>
                </div>

                <div class="col-md-8 form-group" >
                    <input type="text" v-model="role.nombre" class="form-control "   required  
                            placeholder="Role">
                </div>
                

                
                
                <div class="col-md-12 form-group">
                    <label ><strong>Permisos especiales:</strong></label>
                </div>

                <div class="col-md-6 form-group">
                    <input type="checkbox" id="checkbox"  value = "">
                    <label for="checkbox">{{ "Acceso total" }}</label>
                </div>



                <div class="col-md-6 form-group">
                    <input type="checkbox" id="checkbox" >
                    <label for="checkbox">{{ "Ningun Acceso" }}</label>
                </div>

                <div class="col-md-12 form-group">
                    <label ><strong>Lista de permisos:</strong></label>
                </div>

                <div class="col">
                        <SELECT v-model="e" class="form-control " autocomplete="off">
                            <option v-for = "item in modulos" v-bind:key="item.key" data-toggle="modal" data-target="#Permisos+'item.id'">{{ item}}</option>
                        </SELECT>
                </div>
            <div class="container-fluid" v-for="item in  modulos" v-bind:key="item.key">
                    <div class="form-group">
                        <button class="form-control btn btn-primary" type="button" data-toggle="collapse" :data-target="'#'+item" aria-expanded="false" v-bind:aria-controls="item">{{item}}</button>
                    </div>
                    <div class="collapse" v-bind:id="item">
                            <div class="card card-body">
                                <div class="row  form-line">
                                    <div class="col-3"  v-for="permiso in mpermisos" v-bind:key="permiso"> 
                                                <input type="checkbox" id="checkbox" value = "">
                                                <label for="checkbox">{{permiso}}</label>
                                        </div> 
                                </div>
                            </div>
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
            },
            e:'',

            permisos:[],
            descripciones:[
                {id:0,text:'Seleccione'},
                {id:1,text:'Permisos de cliente'},
                {id:2,text:'Permisos de empleado'},
                {id:3,text:'Permisos de tipo de clienetes'},
                {id:4,text:'Permisos de tipo de empleados'},
                {id:5,text:'Permisos de los roles'},
                {id:6,text:'Permisos de horarios'},
                {id:7,text:'Permisos de tipos de documentos'},
            ],
            modulos:[],
            mpermisos:['listar','guardar','editar','eliminar']
        }
        
        
    },

   

created(){
    axios.get('/permission')
    .then(res=>{
        this.modulos = res.data;
        console.log(res.data)

    })

    
    

    
},

methods: {

        

    },

}


</script>


}