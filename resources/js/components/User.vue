<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <a href="javascript:;" @click="toggleLike(user)" v-if="user.like === null">
                    Like
                </a>
                <a href="javascript:;" @click="toggleLike(user)" v-else>
                    unlike
                </a>
            </div>
        </div>
    </div>
</template>

<script>
    export default {

        props: ['userId'];
        mounted() {
            console.log('Component mounted.')
        }

        toggleLike(user) {
            axios.user('/api/user/$(user.id)/like')
            .then(response => {
                post.like = response.data.like;
            });
        }
    }
</script>
