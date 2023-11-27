const { createApp } = Vue;

createApp({
    data() {
        return {
            todos: [],
            newTask: ''
        }
    },
    methods: {
        fetchToDoArray() {
            axios.get('./server.php').then(res => {
                this.todos = res.data.results;
            })
        },
        addNewTask() {
            if(this.newTask) {
                const data = {
                    'text': this.newTask,
                }
                axios.post('./store.php', data, {
					    headers: {
						    'Content-Type': 'multipart/form-data',
					    },
                    }).then(res => {
                        this.todos = res.data.results;
                    })
            }else {
                return
            }
            this.newTask = '';
        },
        taskDone(index) {
            const data = {
                "index": index
            }
            axios
                .post('./complete.php', data, {
                    headers: {
                        'Content-Type': 'multipart/form-data',
                    },
                })
                .then(res => {
                    this.todos = res.data.results;
                })
        },
        destroyTask(index) {
            const data = {
                'index': index
            }
            axios.post('./destroy.php', data, {
                headers: {
                    'Content-Type': 'multipart/form-data',
                },
            }).then(res => {
                this.todos = res.data.results;
                // console.log(res.data);
            })
        }
    },
    created() {
        this.fetchToDoArray()
    }
}).mount('#app');