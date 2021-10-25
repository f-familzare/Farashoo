import Dashboard from '../../components/Dashboard.vue';
import Account from '../../components/Panel/Account.vue';
import AddBusiness from '../../components/Panel/AddBusiness.vue';
import AddRezume from '../../components/Panel/AddRezume.vue';
import RezumeList from '../../components/Site/RezumeList.vue';
import SingleRezume from '../../components/Site/SingleRezume.vue';
import SingleBusiness from '../../components/Site/SingleBusiness.vue';
import BusinessList from '../../components/Site/BusinessList.vue';
import BusinessRequest from '../../components/Panel/BusinessRequest.vue';
import RequestResult from '../../components/Panel/RequestResult.vue';
import DefineRole from '../../components/Panel/DefineRole.vue';


const allUrl = [
    {path:'/farasho',name:'Dashboard',component:Dashboard,
        children:[
            {path:'Account',name:'Account',component:Account},
            {path:'AddBusiness',name:'AddBusiness',component:AddBusiness},
            {path:'AddRezume',name:'AddRezume',component:AddRezume},
            {path:'SingleRezume/:id',name:'SingleRezume',component:SingleRezume},
            {path:'RezumeList/:id',name:'RezumeList',component:RezumeList},
            {path:'BusinessList/:id',name:'BusinessList',component:BusinessList},
            {path:'SingleBusiness/:id',name:'SingleBusiness',component:SingleBusiness},
            {path:'BusinessRequest',name:'BusinessRequest',component:BusinessRequest},
            {path:'RequestResult',name:'RequestResult',component:RequestResult},
            {path:'DefineRole',name:'DefineRole',component:DefineRole},
        ]
    },

];
export default allUrl;