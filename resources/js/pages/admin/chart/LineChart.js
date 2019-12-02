import { Line } from 'vue-chartjs'

export default {
  extends: Line,
  props: {
    chartdata: {
      type: Object,
      default: null
    },
    options: {
      responsive: true,
      maintainAspectRatio: false
    }
  },
  mounted () {
    this.renderChart(this.chartdata, this.options)
  }
}