<template>
    <div>
        <h1>Contact us</h1>
        <form @submit.prevent="submitMessage">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" id="name" class="form-control" v-model="name" >
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" id="email" class="form-control" v-model="email">
            </div>
            <div class="mb-3">
                <label for="message" class="form-label">Message</label>
                <textarea name="message" id="message" class="form-control" cols="30" rows="10" v-model="message"></textarea>
            </div>
            <div>
                <input type="checkbox" class="form-check-input" name="newsletter" id="newsletter" v-model="mailinglist">
                <label class="form-check-label" for="newsletter">Iscrivimi alla newsletter</label>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Send</button>
        </form>
    </div>
</template>

<script>
export default {
    name: 'PageContacts',
    data() {
        return {
            name: '',
            email: '',
            message: '',
            mailinglist: true
        }
    },

    methods: {
        submitMessage() {
            axios.post('/api/leads', {
                name: this.name,
                email: this.email,
                message: this.message,
                mailinglist: this.mailinglist
            })
            .then(res => console.log(res.data));
        }
    }
}
</script>

<style lang="scss" scoped>

</style>
