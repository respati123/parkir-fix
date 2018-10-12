import { Bar } from 'vue-chartjs'

export default ({
    extends: Bar,
    mounted(){
        this.renderChart({
            labels: ['jan','feb','mar','apr','may','june'],
            datasets: [
                {label: 'My Activities', backdropColor: '#dd4b39', data: [40,50,44,55,55,22]}
            ]
        }, {responsive: true, maintainAspectRatio: false})
    }
});
