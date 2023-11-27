const { createApp } = Vue;

createApp({
    data() {
        return {
            todos: []
        }
    },
    methods: {
        fetchToDoArray() {
            axios.get('server.php').then(res => {
                this.todos = res.data.results;
            })
        }
    },
    created() {
        this.fetchToDoArray()
    }
}).mount('#app');