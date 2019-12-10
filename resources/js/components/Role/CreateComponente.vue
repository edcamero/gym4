<template>
    <div class="card">




        <div class="card-header">
                <h4 class="text-center mb-2 card-title">Agregar rol</h4>
        </div>
       <div class="card-body">



<div class="alert alert-primary" role="alert">
  This is a primary alert—check it out!
</div>


        <div class="alert alert-success dismissible show">
            

        
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
              <strong>Holy guacamole!</strong> You should check in on some of those fields below.
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
        </div>

        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
  <span aria-hidden="true">&times;</span>
</button>


























            <div class="form-group row">
            <!-- /.Div para el tipo de documento -->
           
            
           
               
                
                <div class="col-md-4">
                    <label ><strong>Nombre del role:</strong></label>
                </div>



                <div class="col-md-8 form-group" >
                    <input type="text" v-model="role.nombre" class="form-control "   required  placeholder="Rol">
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

                
            <div class="container-fluid " v-for="item in  modulos" v-bind:key="item.key">
                    <div class="form-group mb-1">
                        <button class="form-control btn btn-primary" type="button" data-toggle="collapse" :data-target="'#'+item" aria-expanded="false" v-bind:aria-controls="item">{{item}}</button>
                    </div>
                    <div class="collapse" v-bind:id="item">
                            <div class="card card-body">
                                <div class="row  form-line">
                                    <div class="col-3"  v-for="permiso in mpermisos" v-bind:key="permiso"> 
                                                <input type="checkbox" id="checkbox" v-model="selecionados" :value = "permiso+'-'+item">
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

            

            mensaje:{
                color:'',
                texto:''
            },





        dismissSecs: 10,
        dismissCountDown: 0,
        showDismissibleAlert: false
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
    const params={nombre:this.role.nombre, permisos:this.selecionados}
    axios.post('/Role',params)
                .then(res=>{
                   // this.horarios.push(res.data)
                
                });
    console.log(this.selecionados)
    },


countDownChanged(dismissCountDown) {
        this.dismissCountDown = dismissCountDown
      },
      showAlert() {
        this.dismissCountDown = this.dismissSecs
      },












},

}


</script>


}