<template>
    <div>
        <div>
          <transition name="fade" mode="out-in" v-on:after-enter="afterEnter" appear>
            <router-view></router-view>
          </transition>
        </div>
    </div>
</template>

<script>
 // import Header from './components/header.vue'
  export default {
    data() {
      return {
        //
      }
    },
    methods: {
      afterEnter: function( el ) {
      // how to have this per-route
        console.log( 'Route entered' );
      }
    },
    components: {
      
    }
  }
</script>

<style scoped>

.fade-enter-active, .fade-leave-active {
  transition: opacity 0.2s
}

.fade-enter, .fade-leave-active {
  opacity: 0
}

</style>
