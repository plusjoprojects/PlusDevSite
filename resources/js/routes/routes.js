
// Routes

// Home Page 
import Home from '../Pages/Home/index.vue'
import Login from '../Pages/Auth/Login.vue'
import Loader from '../Pages/Loading/Loader.vue'
import Document from "../Pages/Document/index.vue";
import Files from '../Pages/Files/index.vue'
const routes = [
    {
        path: "/",
        component: Loader,
        name: "Loader"
    },
    {
        path: "/home",
        component: Home,
        name: "Home"
    },
    {
        path: "/Login",
        component: Login,
        name: "Login"
    },
    {
        path: "/document",
        component: Document,
        name: "Document"
    },
    {
        path:"/files",
        component:Files,
        name:'Files'
    }
];

export default routes;