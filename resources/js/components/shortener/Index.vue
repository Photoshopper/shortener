<template>
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Shortener</div>

                    <div class="card-body">
                        <form @submit.prevent="generateLink">
                            <div class="mb-3">
                                <input v-model="url" type="url" class="form-control" placeholder="URL">
                            </div>

                            <div v-if="shortlink" class="mb-3">
                                <a :href="shortlink" target="_blank">
                                    {{ shortlink }}
                                </a>
                            </div>

                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <button @click="clear" type="button" class="btn btn-light">Clear</button>
                            </div>

                            <a href="https://testsafebrowsing.appspot.com/" target="_blank">
                                Safe Browsing Testing Links
                            </a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                url: '',
                shortlink: ''
            }
        },
        methods: {
            generateLink() {
                axios.post('/links', {
                    url: this.url
                }).then(resp => {
                    this.shortlink = resp.data.data.url;
                    this.url = ''
                });
            },
            clear() {
                this.shortlink = ''
                this.url = ''
            }
        }

    }
</script>
