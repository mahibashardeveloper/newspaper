<template>

    <Doughnut :data="data" :options="options" />

</template>

<script>

import { Chart as ChartJS, ArcElement, Tooltip, Legend } from 'chart.js'
import { Doughnut } from 'vue-chartjs'
ChartJS.register(ArcElement, Tooltip, Legend)

export default {

    components: {

        Doughnut

    },

    data(){

        return{

            data: {
                labels: ['Visiting', 'Reading News', 'Comment'],
                datasets: [
                    {
                        backgroundColor: ['#ff005a', '#f5ff00', '#7925C7', '#ffae00', '#20C178', '#FF8080', '#04364A'],
                        data: [100, 90, 70]
                    }
                ]
            },

            options: {
                responsive: true,
                maintainAspectRatio: false
            }

        }

    },

    mounted() {



    },

    methods: {



    }

}

</script>
