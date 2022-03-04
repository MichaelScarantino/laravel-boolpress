<template>
    <section>
        <div class="container">

            <h2>I Post</h2>

            <div class="row row-cols-2">
                <div v-for="post in posts" :key="post.id" class="col">
                    <div class="card my-3">
                        <!-- <img src="..." class="card-img-top" alt="..."> -->
                        <div class="card-body">
                            <h5 class="card-title">{{post.title}}</h5>
                            <p class="card-text">{{truncateText(post.content, 50)}}</p>
                        </div>
                        <!-- <ul class="list-group list-group-flush">
                            <li class="list-group-item">An item</li>
                            <li class="list-group-item">A second item</li>
                            <li class="list-group-item">A third item</li>
                        </ul> -->
                        <div class="card-body">
                            <router-link :to="{ name: 'post-details', params: { slug: post.slug } }">Leggi articolo</router-link>
                        </div>
                    </div>
                </div>
            </div>
            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center">
                    <li class="page-item" :class="{ 'disabled' : currentPage == 1 }">
                        <a @click="getPosts(currentPage - 1)" class="page-link">Previous</a>
                    </li>
                    <li v-for="n in lastPage" :key="n" class="page-item" :class="{ 'active' : currentPage == n }">
                        <a @click="getPosts(n)" class="page-link">{{ n }}</a>
                    </li>
                    <li class="page-item" :class="{ 'disabled' : currentPage == lastPage }">
                        <a @click="getPosts(currentPage + 1)" class="page-link">Next</a>
                    </li>
                </ul>
            </nav>
        </div>
    </section>
</template>

<script>
export default {
    name: 'Posts',
    data: function() {
        return {
            posts: [],
            currentPage: 1,
            lastPage: false
        }
    },
    methods: {
        getPosts: function(pageNumber) {
            axios.get('/api/posts', {
                params: {
                    page: pageNumber
                }
            })
            .then((response) => {
                this.posts = response.data.results.data;
                this.currentPage = response.data.results.current_page;
                this.lastPage = response.data.results.last_page;
            })
        },
        truncateText: function(text, maxCharsNumber) {
            if(text.length > maxCharsNumber) {
                return text.substr(0,maxCharsNumber) + '...';
            }
            return text;
        }
    },
    created: function() {
        this.getPosts(1);
    }
}
</script>