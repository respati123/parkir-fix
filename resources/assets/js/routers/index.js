import VueRouter from 'vue-router'
import axios from 'axios'

import indexRoles from '../components/User/roles/rolesIndex'

import createRoles from '../components/User/roles/rolesCreate'

import editRoles from '../components/User/roles/rolesEdit'

import permissionsIndex from '../components/User/permissions/permissionsIndex'

import createPermissions from '../components/User/permissions/permissionsCreate'

import editPermissions from '../components/User/permissions/permissionsEdit'



//import view list-customers

import listCustomersIndex from '../components/Customers/list-costumers/listCustomersIndex'

import createListCustomers from '../components/Customers/list-costumers/listCustomersCreate'

import editListCustomers from '../components/Customers/list-costumers/listCustomersEdit'



//import loyalty

import indexLoyalty from '../components/Customers/loyalty-customers/indexLoyalty'

import createLoyalty from '../components/Customers/loyalty-customers/createLoyalty'

import editLoyalty from '../components/Customers/loyalty-customers/editLoyalty'



//import location

import indexLocation from '../components/Parking/Location/indexLocation.vue'

import createLocation from '../components/Parking/Location/createLocation.vue'

import editLocation from '../components/Parking/Location/editLocation.vue'



//import category

import indexCategory from '../components/Parking/Categories/indexCategory.vue'

import createCategory from '../components/Parking/Categories/createCategory.vue'

import editCategory from '../components/Parking/Categories/editCategory.vue'



//import classes

import indexClasses from '../components/Parking/Classes/indexClasses.vue'

import createClasses from '../components/Parking/Classes/createClasses.vue'

import editClasses from '../components/Parking/Classes/editClasses.vue'



//import Building

import indexBuilding from '../components/Parking/Building/indexBuilding.vue'

import createBuilding from '../components/Parking/Building/createBuilding.vue'

import editBuilding from '../components/Parking/Building/editBuilding.vue'



//types

import indexVehicleTypes from '../components/Vehicles/Types/indexVehiclesTypes.vue'

import createVehicleTypes from '../components/Vehicles/Types/createVehiclesTypes.vue'

import editVehicleTypes from  '../components/Vehicles/Types/editVehiclesTypes.vue'



//brands

import indexVehicleBrands from  '../components/Vehicles/Brands/indexVehiclesBrands.vue'

import createVehicleBrands from  '../components/Vehicles/Brands/createVehiclesBrands.vue'

import editVehicleBrands from '../components/Vehicles/Brands/editVehiclesBrands.vue'



//dashboard

import dashboardIndex from '../components/Dashboard/Dashboard.vue'

//Menus

import indexMenus from  '../components/User/menus/indexMenus.vue'
import createMenus from  '../components/User/menus/createMenus.vue'
import editMenus from  '../components/User/menus/editMenus.vue'

//tariff

import indexTariff from '../components/Financial/Tariff/indexTariff.vue'
import createTariff from '../components/Financial/Tariff/createTariff.vue'
import editTariff from '../components/Financial/Tariff/editTariff.vue'

//voucher 
import indexVoucher from '../components/Financial/Voucher/indexVoucher.vue'
import editVoucher from '../components/Financial/Voucher/editVoucher.vue'
import createVoucher from '../components/Financial/Voucher/createVoucher.vue'

//users
import indexUser from '../components/User/users/indexUser.vue'
import createUser from '../components/User/users/createUser.vue'
import editUser from '../components/User/users/editUser.vue'

//login
import indexLogin from '../components/login.vue'
//register
import indexRegisterAdmin from '../components/register_admin.vue'

import indexAdmin from '../components/admin.vue'
const router = new VueRouter({
    
    linkActiveClass: "active",
    routes: [
        // roles
        {
            path: '/',
            components: {
                parentIndex: indexAdmin
            },
            name: 'indexAdmin',
            beforeEnter: (to, from, next) => {
                let sessionData = window.sessionStorage.getItem('user');
                if (sessionData === null) {
                    next(window.location = '/login')
                }
                next()
                            
            },
            children: [
                 {
                     path: '/dashboard',
                     component: dashboardIndex,
                     name: 'dashboard'
                 },

                 // {path: '/roles', components: {componentsIndex: indexRoles}, name: 'rolesIndex'},
                 {
                     path: '/roles',
                     components: {
                         componentsIndex: indexRoles,
                     },
                     name: 'rolesIndex'
                 },

                 {
                     path: '/roles/create',
                     component: createRoles,
                     name: 'createRoles'
                 },

                 {
                     path: '/roles/edit/:id',
                     component: editRoles,
                     name: 'editRoles'
                 },
                 //users

                 {
                    path: '/users',
                    components: {
                        componentsIndex: indexUser,
                    },
                    name: 'indexUser'
                },

                {
                    path: '/users/create',
                    component: createUser,
                    name: 'createUser'
                },

                {
                    path: '/users/edit/:id',
                    component: editUser,
                    name: 'editUser'
                },

                 //permissions

                 {
                     path: '/permissions',
                     components: {
                         componentsIndex: permissionsIndex
                     },
                     name: 'indexPermissions'
                 },

                 {
                     path: '/permissions/create',
                     component: createPermissions,
                     name: 'createPermissions'
                 },

                 {
                     path: '/permissions/edit/:id',
                     component: editPermissions,
                     name: 'editPermissions'
                 },



                 //customers

                 {
                     path: '/listcustomer',
                     components: {
                         componentsIndex: listCustomersIndex
                     },
                     name: 'indexListCustomers'
                 },

                 {
                     path: '/listcustomer/create',
                     component: createListCustomers,
                     name: 'createListCustomers'
                 },

                 {
                     path: '/listcustomer/edit/:id',
                     component: editListCustomers,
                     name: 'editListCustomers'
                 },



                 //loyalty

                 {
                     path: '/loyalty',
                     components: {
                         componentsIndex: indexLoyalty
                     },
                     name: 'indexLoyalty'
                 },

                 {
                     path: '/loyalty/create',
                     component: createLoyalty,
                     name: 'createLoyalty'
                 },

                 {
                     path: '/loyalty/edit/:id',
                     component: editLoyalty,
                     name: 'editLoyalty'
                 },



                 //location

                 {
                     path: '/location',
                     components: {
                         componentsIndex: indexLocation
                     },
                     name: 'indexLocation'
                 },

                 {
                     path: '/location/create',
                     component: createLocation,
                     name: 'createLocation'
                 },

                 {
                     path: '/location/edit/:id',
                     component: editLocation,
                     name: 'editLocation'
                 },



                 //categories

                 {
                     path: '/categories',
                     components: {
                         componentsIndex: indexCategory
                     },
                     name: 'indexCategory'
                 },

                 {
                     path: '/categories/create',
                     component: createCategory,
                     name: 'createCategory'
                 },

                 {
                     path: '/categories/edit/:id',
                     component: editCategory,
                     name: 'editCategory'
                 },



                 //classes

                 {
                     path: '/classes',
                     components: {
                         componentsIndex: indexClasses
                     },
                     name: 'indexClasses'
                 },

                 {
                     path: '/classes/create',
                     component: createClasses,
                     name: 'createClasses'
                 },

                 {
                     path: '/classes/edit/:id',
                     component: editClasses,
                     name: 'editClasses'
                 },



                 //Buildings

                 {
                     path: '/building',
                     components: {
                         componentsIndex: indexBuilding
                     },
                     name: 'indexBuilding'
                 },

                 {
                     path: '/building/create',
                     component: createBuilding,
                     name: 'createBuilding'
                 },

                 {
                     path: '/building/edit/:id',
                     component: editBuilding,
                     name: 'editBuilding'
                 },

                 //Types

                 {
                     path: '/vehicletypes',
                     components: {
                         componentsIndex: indexVehicleTypes
                     },
                     name: 'indexVehicleTypes'
                 },

                 {
                     path: '/vehicletypes/create',
                     component: createVehicleTypes,
                     name: 'createVehicleTypes'
                 },

                 {
                     path: '/vehicletypes/edit/:id',
                     component: editVehicleTypes,
                     name: 'editVehicleTypes'
                 },



                 //brands

                 {
                     path: '/vehiclebrands',
                     components: {
                         componentsIndex: indexVehicleBrands
                     },
                     name: 'indexVehicleBrands'
                 },

                 {
                     path: '/vehiclebrands/create',
                     component: createVehicleBrands,
                     name: 'createVehicleBrands'
                 },

                 {
                     path: '/vehiclebrands/edit/:id',
                     component: editVehicleBrands,
                     name: 'editVehicleBrands'
                 },

                 //Menus

                 {
                     path: '/menus',
                     components: {
                         componentsIndex: indexMenus
                     },
                     name: 'indexMenus'
                 }, {
                     path: '/menus/create',
                     component: createMenus,
                     name: 'createMenus'
                 }, {
                     path: '/menus/edit/:id',
                     component: editMenus,
                     name: 'editMenus'
                 },

                 //tariff

                 {
                     path: '/tariff',
                     components: {
                         componentsIndex: indexTariff
                     },
                     name: 'indexTariff'
                 }, {
                     path: '/tariff/create',
                     component: createTariff,
                     name: 'createTariff'
                 }, {
                     path: '/tariff/edit/:id',
                     component: editTariff,
                     name: 'editTariff'
                 },

                 //vouchers
                 {
                     path: '/voucher',
                     components: {
                         componentsIndex: indexVoucher
                     },
                     name: 'indexVoucher'
                 }, {
                     path: '/voucher/create',
                     component: createVoucher,
                     name: 'createVoucher'
                 }, {
                     path: '/voucher/edit/:id',
                     component: editVoucher,
                     name: 'editVoucher'
                 },

                 // ]
                 //register
                //   {
                //       path: '/register/admin',
                //       component: indexRegisterAdmin,
                //       name: 'registerAdmin'
                //   },

                 //root
                 // {path: '/roles', component: {
                 //     template: "<h1>ROLESS anjingg</h1>"
                 // }},
                 {
                     path: 'cobaa',
                     name: 'root',
                     component: {
                         template: '<h1>ANJINGGGGG</h1>'
                     }
                 }
            ]
        }
               
    ],

    mode: 'history'

});

export default router;

