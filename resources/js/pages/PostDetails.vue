<template>
    <div class="container">
        <h1>{{ post.title }}</h1>
        <div v-if="post.category">Categoria: {{ post.category.name }}</div>
        <div v-if="post.tags">
            <div class="badge bg-warning text-dark mx-1" v-for="tag in post.tags" :key="tag.id">
                {{ tag.name }}
            </div>
        </div>
        <div>{{ post.content }}</div>
    </div>
</template>

<script>

export default {
   name: "PostDetails",
   data: function() {
       return {
           post: false
       };
    },
    methods: {
        getPost() {
            axios.get('/api/posts/' + this.$route.params.slug)
            .then((response) => {
                if(response.data.success) {
                    this.post = response.data.results;
                } else {
                    this.$router.push({ name: 'not-found' });
                }
            });
        }
    },
    created: function() {
        this.getPost();
    }

}
</script>