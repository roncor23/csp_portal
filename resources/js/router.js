import VueRouter from 'vue-router'

// Pages
import Home from './pages/Home'
import Register from './pages/Register'
import Login from './pages/Login'
import Dashboard from './pages/user/Dashboard'
import AdminDashboard from './pages/admin/Dashboard'
import AdminActionList from './pages/admin/table/ActionList'
import NotFound from './pages/admin/404/404'

import StudentInformation from './pages/user/StudentInformation'
import StudentStatus from './pages/user/StudentStatus'

import ChedCoordinator from './pages/chedcoordinator/dashboard'
import ChedCoordinatorListOfApplicants from './pages/chedcoordinator/table/ched_listofapplicant'
import ChedCoordinatorListOfEnrolledApplicants from './pages/chedcoordinator/table/ched_listofenrolledapplicant'
import ChedCoordinatorListOfNotEnrolledApplicants from './pages/chedcoordinator/table/ched_listofnotenrolledapplicant'

import HeiCoordinator from './pages/heicoordinator/dashboard'
import HeiCoordinatorListOfApplicants from './pages/heicoordinator/hei_listofapplicant'

import SuperAdmin from './pages/superadmin/dashboard'
import SuperAdminAddAccount from './pages/superadmin/AddAccount'

// Routes
const routes = [
  {
    path: '/',
    name: 'home',
    component: Home,
    meta: {
      auth: false
    }
  },
  {
    path: '/register',
    name: 'register',
    component: Register,
    meta: {
      auth: false
    }
  },
  {
    path: '/login',
    name: 'login',
    component: Login,
    meta: {
      auth: false
    }
  },
  // STUDENT ROUTES
  {
    path: '/student-dashboard',
    name: 'dashboard',
    component: Dashboard,
    meta: {
      auth: {roles: 1, redirect: {name: 'login'}, forbiddenRedirect: '/403'}
    }
  },
  {
    path: '/student-information',
    name: 'student_information',
    component: StudentInformation,
    meta: {
      auth: {roles: 1, redirect: {name: 'login'}, forbiddenRedirect: '/403'}
    }
  },
  {
    path: '/student-status',
    name: 'student_status',
    component: StudentStatus,
    meta: {
      auth: {roles: 1, redirect: {name: 'login'}, forbiddenRedirect: '/403'}
    }
  },
  // CHED COORDINATOR ROUTES
  {
    path: '/ched-coordinator',
    name: 'ched_coordinator.dashboard',
    component: ChedCoordinator,
    meta: {
      auth: {roles: 2, redirect: {name: 'login'}, forbiddenRedirect: '/403'}
    }
  },
  {
    path: '/ched-coordinator/list-of-applicants',
    name: 'ched_coordinator.list_of_applicants_dashboard',
    component: ChedCoordinatorListOfApplicants,
    meta: {
      auth: {roles: 2, redirect: {name: 'login'}, forbiddenRedirect: '/403'}
    }
  },
  {
    path: '/ched-coordinator/list-of-enrolled-applicants',
    name: 'ched_coordinator.list_of_enrolled_applicants_dashboard',
    component: ChedCoordinatorListOfEnrolledApplicants,
    meta: {
      auth: {roles: 2, redirect: {name: 'login'}, forbiddenRedirect: '/403'}
    }
  },
    {
    path: '/ched-coordinator/list-of-not-enrolled-applicants',
    name: 'ched_coordinator.list_of_not_enrolled_applicants_dashboard',
    component: ChedCoordinatorListOfNotEnrolledApplicants,
    meta: {
      auth: {roles: 2, redirect: {name: 'login'}, forbiddenRedirect: '/403'}
    }
  },
  {
    path: '/404',
    name: '404',
    component: NotFound,
    meta: {
      auth: {roles: 2, redirect: {name: 'login'}, forbiddenRedirect: '/403'}
    }
  },
  // HEI ROUTES
  {
    path: '/hei-coordinator',
    name: 'hei_coordinator.dashboard',
    component: HeiCoordinator,
    meta: {
      auth: {roles: 3, redirect: {name: 'login'}, forbiddenRedirect: '/403'}
    }
  },
  {
    path: '/hei-coordinator/list-of-applicants',
    name: 'hei_coordinator.list_of_applicants_dashboard',
    component: HeiCoordinatorListOfApplicants,
    meta: {
      auth: {roles: 3, redirect: {name: 'login'}, forbiddenRedirect: '/403'}
    }
  },
  // SUPER_ADMIN ROUTES
  {
    path: '/super-admin',
    name: 'super_admin.dashboard',
    component: SuperAdmin,
    meta: {
      auth: {roles: 4, redirect: {name: 'login'}, forbiddenRedirect: '/403'}
    }
  },
  {
    path: '/add-account',
    name: 'super_admin.add_account',
    component: SuperAdminAddAccount,
    meta: {
      auth: {roles: 4, redirect: {name: 'login'}, forbiddenRedirect: '/403'}
    }
  },
]

const router = new VueRouter({
  history: true,
  mode: 'history',
  routes,
})

export default router


