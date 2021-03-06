import VueRouter from 'vue-router'

// Pages
import Home from './pages/Home'
import Register from './pages/Register'
import Login from './pages/Login'
import Dashboard from './pages/user/Dashboard'
import ForgotPassword from './pages/forgotpassword.vue'

import StudentInformation from './pages/user/StudentInformation'
import StudentStatus from './pages/user/StudentStatus'
import StudentChangePassword from './pages/user/changepassword'
import StudentUploadDocuments from './pages/user/uploaddocuments'

import ChedCoordinator from './pages/chedcoordinator/dashboard'
import ChedCoordinatorListOfApplicants from './pages/chedcoordinator/table/ched_listofapplicant' 
import ChedCoordinatorListOfUnverifiedApplicants from './pages/chedcoordinator/table/ched_listofunverifiedapplicant' 
import ChedCoordinatorListOfApplicantsByHEI from './pages/chedcoordinator/table/ched_listofapplicantbyhei'
import ChedCoordinatorListOfEnrolledApplicants from './pages/chedcoordinator/table/ched_listofenrolledapplicant'
import ChedCoordinatorListOfNotEnrolledApplicants from './pages/chedcoordinator/table/ched_listofnotenrolledapplicant'
import ChedCoordinatorListOfHEI from './pages/chedcoordinator/table/ched_listofheis'
import ChedCoordinatorListOfApplicantsByCSPRank from './pages/chedcoordinator/table/ched_listofapplicantbycsprank'
import ChedCoordinatorListOfApplicantsByTDPRank from './pages/chedcoordinator/table/ched_listofapplicantbytdprank'
import ChedCoordinatorListOfValidatedApplicants from './pages/chedcoordinator/table/ched_listofvalidatedapplicant'
import AdminChangePassword from './pages/chedcoordinator/changepassword'
import AdminResetPassword from './pages/chedcoordinator/reset_password'
import AdminForceVerified from './pages/chedcoordinator/force_verified'


import OJT from './pages/OJT/dashboard'
import OJTListOfUnverifiedApplicants from './pages/OJT/ojt_listofunverifiedapplicant'
import OJTListOfVerifiedApplicants from './pages/OJT/ojt_listofverifiedapplicant'
import OJTResetPassword from './pages/OJT/reset_password'
import OJTForceVerified from './pages/OJT/force_verified'
import OJTChangePassword from './pages/OJT/change_password'



import HeiCoordinator from './pages/heicoordinator/dashboard'
import HeiCoordinatorListOfApplicants from './pages/heicoordinator/hei_listofapplicant'
import HEIChangePassword from './pages/heicoordinator/changepassword'

import SuperAdmin from './pages/superadmin/dashboard'
import SuperAdminAddAccount from './pages/superadmin/AddAccount'
import SuperAdminResetPassword from './pages/superadmin/resetpassword'

// Routes
const routes = [
  {
    path: '/',
    name: 'home',
    component: Home,
    meta: {
      auth: undefined
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
  {
    path: '/forgot-password',
    name: 'forgot_password',
    component: ForgotPassword,
    meta: {
      auth: false
    }
  },
    // OJT ROUTES
  {
    path: '/OJT-dashboard',
    name: 'OJT.dashboard',
    component: OJT,
    meta: {
      auth: {roles: 5, redirect: {name: 'login'}, forbiddenRedirect: '/403'}
    }
  },
  {
    path: '/OJT-dashboard/list-of-unverified-applicants',
    name: 'OJT.list_of_unverified_applicants_dashboard',
    component: OJTListOfUnverifiedApplicants,
    meta: {
      auth: {roles: 5, redirect: {name: 'login'}, forbiddenRedirect: '/403'}
    }
  },
  {
    path: '/OJT-dashboard/list-of-verified-applicants',
    name: 'OJT.list_of_verified_applicants_dashboard',
    component: OJTListOfVerifiedApplicants,
    meta: {
      auth: {roles: 5, redirect: {name: 'login'}, forbiddenRedirect: '/403'}
    }
  },
  {
    path: '/OJT-dashboard/reset-password',
    name: 'ojt_dashboard_reset_password',
    component: OJTResetPassword,
    meta: {
      auth: {roles: 5, redirect: {name: 'login'}, forbiddenRedirect: '/403'}
    }
  },
  {
    path: '/OJT-dashboard/force-verified',
    name: 'ojt_dashboard_force_verified',
    component: OJTForceVerified,
    meta: {
      auth: {roles: 5, redirect: {name: 'login'}, forbiddenRedirect: '/403'}
    }
  },
  {
    path: '/OJT-dashboard/change-password',
    name: 'ojt_dashboard_change_password',
    component: OJTChangePassword,
    meta: {
      auth: {roles: 5, redirect: {name: 'login'}, forbiddenRedirect: '/403'}
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
    path: '/student-dashboard/upload-documents',
    name: 'dashboard_upload',
    component: StudentUploadDocuments,
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
  {
    path: '/student-dashboard/change-password',
    name: 'student_dashboard_change_password',
    component: StudentChangePassword,
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
    path: '/ched-coordinator/list-of-unverified-applicants',
    name: 'ched_coordinator.list_of_unverified_applicants_dashboard',
    component: ChedCoordinatorListOfUnverifiedApplicants,
    meta: {
      auth: {roles: 2, redirect: {name: 'login'}, forbiddenRedirect: '/403'}
    }
  },
  {
    path: '/ched-coordinator/list-of-ched-validated-applicants',
    name: 'ched_coordinator.list_of_validated_applicants_dashboard',
    component: ChedCoordinatorListOfValidatedApplicants,
    meta: {
      auth: {roles: 2, redirect: {name: 'login'}, forbiddenRedirect: '/403'}
    }
  },
  {
    path: '/ched-coordinator/list-of-applicants-by-hei/:hei_id',
    name: 'ched_coordinator.list_of_applicants_by_hei_dashboard',
    component: ChedCoordinatorListOfApplicantsByHEI,
    meta: {
      auth: {roles: 2, redirect: {name: 'login'}, forbiddenRedirect: '/403'}
    }
  },
  {
    path: '/ched-coordinator/list-of-applicants-by-csp-rank',
    name: 'ched_coordinator.list_of_applicants_by_csp_rank',
    component: ChedCoordinatorListOfApplicantsByCSPRank,
    meta: {
      auth: {roles: 2, redirect: {name: 'login'}, forbiddenRedirect: '/403'}
    }
  },
  {
    path: '/ched-coordinator/list-of-applicants-by-tdp-rank',
    name: 'ched_coordinator.list_of_applicants_by_tdp_rank',
    component: ChedCoordinatorListOfApplicantsByTDPRank,
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
    path: '/ched-coordinator/list-of-heis',
    name: 'ched_coordinator.list_of_heis',
    component: ChedCoordinatorListOfHEI,
    meta: {
      auth: {roles: 2, redirect: {name: 'login'}, forbiddenRedirect: '/403'}
    }
  },
  {
    path: '/ched-coordinator/change-password',
    name: 'ched_coordinator_change_password',
    component: AdminChangePassword,
    meta: {
      auth: {roles: 2, redirect: {name: 'login'}, forbiddenRedirect: '/403'}
    }
  },
  {
    path: '/ched-coordinator/reset-password',
    name: 'ched_coordinator_reset_password',
    component: AdminResetPassword,
    meta: {
      auth: {roles: 2, redirect: {name: 'login'}, forbiddenRedirect: '/403'}
    }
  },
  {
    path: '/ched-coordinator/force-verified',
    name: 'ched_coordinator_force_verified',
    component: AdminForceVerified,
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
  {
    path: '/hei-coordinator/change-password',
    name: 'hei_coordinator_change_password',
    component: HEIChangePassword,
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
  {
    path: '/reset-password',
    name: 'super_admin.reset_password',
    component: SuperAdminResetPassword,
    meta: {
      auth: {roles: 4, redirect: {name: 'login'}, forbiddenRedirect: '/403'}
    }
  },
  {
  path: "*",
  component: () => import("./pages/NotFound.vue")
  }

]

const router = new VueRouter({
  history: true,
  mode: 'history',
  routes,

  scrollBehavior (to, from, savedPosition) {
  return { x: 0, y: 0 }
  }

})

export default router


