<!-- views/NotFound.vue -->
<template>
  <div class="jumbotron">
            <div class="display-3 mt-5">Page not found.</div>
            <div class="grey--text lighten-5">
              The page you are trying to get to never existed in this reality,
              or has migrated to a parallel universe.
            </div>
            <div class="paragraph-text mt-2">
              <br />
              <br />Try going back to home page and repeating your action. Or,
              contact helpdesk for support.
            </div>
            <router-link to="/student-dashboard" v-if="$auth.check(1)">Back</router-link>
            <router-link to="/hei-coordinator" v-if="$auth.check(3)">Back</router-link>
            <router-link to="/ched-coordinator" v-if="$auth.check(2)">Back</router-link>
  </div>
</template>

<style scoped>
.paragraph-text {
  font-size: 18px;
}
</style>