<template>

    <Bar :data="data" :options="options" style="height:300px;"/>

</template>

<script>

import {
    Chart as ChartJS,
    Title,
    Tooltip,
    Legend,
    BarElement,
    CategoryScale,
    LinearScale
} from 'chart.js'
import {Bar} from 'vue-chartjs'

ChartJS.register(CategoryScale, LinearScale, BarElement, Title, Tooltip, Legend)
export default {

    components: {

        Bar

    },

    data(){

        return{

            data: {
                labels: [
                    '2024',
                    '2025',
                    '2026',
                    '2027',
                    '2028',
                    '2029',
                    '2030',
                    '2031',
                    '2032',
                    '2034',
                    '2035',
                ],
                datasets: [
                    {
                        label: 'Visiting',
                        backgroundColor: '#0368d5',
                        data: [35, 39, 46, 53, 57, 63, 69, 74, 89, 93, 99]
                    },
                    {
                        label: 'Read News',
                        backgroundColor: '#f5ff00',
                        data: [32, 35, 42, 50, 52, 55, 61, 68, 77, 83, 66]
                    },
                    {
                        label: 'Comment',
                        backgroundColor: '#ff005a',
                        data: [25, 30, 35, 40, 48, 42, 52, 51, 60, 65, 55]
                    },
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
