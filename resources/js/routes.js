import VueRouter from 'vue-router';
import Home from './components/DashboardComponent.vue';
import Login from './components/LoginComponent.vue';
import Profile from './components/ProfileComponent.vue';
import Users from './components/UsersComponent.vue';
import TestComponent from './components/TestComponent.vue';
import DriverComponent from './components/driversComponent.vue';
import ParentComponent from './components/parentsComponent.vue';
import BusComponent from './components/bussesComponent.vue';
import RoutesComponent from './components/routesComponent.vue';
import AllNotificationComponent from './components/AllNotificationComponent.vue';
import ConductorComponent from './components/ConductorComponent.vue';


let routes = [
  	{ 	
  		path: '/', 
  		component: Login,
      name : 'Login'
    },
    { 	
  		path: '/home', 
  		component: Home,
      name : 'Dashboard'
	  },
  	{ 	
  		path: '/profile', 
  		component: Profile,
  		name : 'Profile'
  	},
    {   
      path: '/users', 
      component: Users,
      name : 'Users'
    },
    {   
      path: '/test', 
      component: TestComponent,
      name : 'test'
    },
    {   
      path: '/drivers', 
      component: DriverComponent,
      name : 'drivers'
    },
    {   
      path: '/parents', 
      component: ParentComponent,
      name : 'parents'
    },
    {   
      path: '/busses', 
      component: BusComponent,
      name : 'busses'
    },
    {   
      path: '/routes', 
      component: RoutesComponent,
      name : 'routes'
    },
    {   
      path: '/all_notifications', 
      component: AllNotificationComponent,
      name : 'all_notifications'
    },
    {   
      path: '/conductor', 
      component: ConductorComponent,
      name : 'conductor'
    },

]


export default new VueRouter({
	base: 'http://localhost:8080/busapp/',
	// mode: 'history',
    routes
});