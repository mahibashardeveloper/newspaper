<template>

    <section class="container py-5">
        <div class="profile">
            <div class="profile-group-link">
                <router-link :to="{name: 'details'}" class="profile-link">
                    Details
                </router-link>
            </div>
            <div class="profile-content">
                <router-view/>
            </div>
        </div>
    </section>

</template>

<script>

export default {

    data(){

        return{



        }

    },

    mounted() {



    },

    methods: {



    }

}

</script>
