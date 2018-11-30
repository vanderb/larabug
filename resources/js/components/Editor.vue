<template>
    <div>
         <vue-editor v-model="content"></vue-editor>
        <input type="hidden" v-model="content" :name="name">
    </div>
</template>

<script>
    import { VueEditor, Quill } from "vue2-editor";

    export default {
        props: ['value', 'name'],
        data() {
            return {
                content: this.value || ''
            }
        },
        components: {
            VueEditor
        }
    }
</script>
