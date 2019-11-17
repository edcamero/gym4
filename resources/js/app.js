/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

Vue.prototype.$permisos=[];

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))


Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('tipo-cliente', require('./components/TipoClienteComponent').default);
Vue.component('tipo-empleado', require('./components/TipoEmpleadoComponent').default);
Vue.component('horario', require('./components/Horario/HorarioComponent').default);
Vue.component('calendario', require('./components/Horario/CalendarioComponent').default);
Vue.component('listar-empleado', require('./components/Empleado/ListarComponent').default);
Vue.component('crear-empleado', require('./components/Empleado/CreateComponent').default);
Vue.component('show-empleado', require('./components/Empleado/ShowComponent').default);
Vue.component('cargar-empleado', require('./components/Empleado/editarComponent').default);
Vue.component('horario-empleado', require('./components/Empleado/HorarioComponent').default);
Vue.component('tipo-documento', require('./components/TipoDocumento/TipoDocumentoComponent').default);
Vue.component('crear-role', require('./components/Role/CreateComponente').default);



Vue.directive('can', function (el, binding, vnode) {
   
    vector=binding.expression.split(['||']);
    
    vector.forEach(function(element) {

        
        elemento=element.replace("'","");
        elemento=elemento.replace("'","");
        
        if(Vue.prototype.$permisos.indexOf(elemento) !== -1){
            return vnode.elm.hidden = false;
         }else{
            return vnode.elm.hidden = true;
         }
        
    });
    
})
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    data:{
        permisos:[],
    },
    methods: {
        getPermisos:function(){
            
            axios.get('/permission/check')
            .then(res=>{
               //this.permisos=res.data;
               Vue.prototype.$permisos =res.data;
            })
        },
       
    },
    created: function(){
        //this.getSession()
    
       
        this.getPermisos();
       
        
       },
},
);
