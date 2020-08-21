<template>
    <div>
        <modal name="show" class="rounded-lg" height="auto">
            <h1 class="text-xl font-normal mb-16 text-center">Let's start something new</h1>
            <form action="" @submit.prevent="submit">
            <div class="flex">
                <div class="flex-1 ml-8 mr-4 mb-6">
                    <div class="mb-4">
                        <label class="block mb-2" for="title">Title</label>
                        <input v-model="form.title" :class="errors.title ? 'border-red-500' : ''" class="border rounded block border-muted-light py-2 px-2 w-full" id="title" type="text" name="title" value="">
                        <p class="text-red-500 text-sm" v-if="errors.title">{{errors.title[0]}}</p>
                    </div>
                    <div>
                        <label class="block mb-2" for="desc">Description</label>
                        <textarea v-model="form.desc" id="desc" rows="7" :class="errors.desc ? 'border-red-500' : ''" class="border rounded block border-muted-light py-2 px-2 w-full" type="text" name="desc"> </textarea>
                        <p class="text-red-500 text-sm" v-if="errors.desc">{{errors.desc[0]}}</p>
                    </div>
                </div>
                <div class="flex-1 mr-8 ml-4">
                    <div class="mb-4">
                        <label class="block mb-2">Add task</label>
                        <template v-for="(task,index) in form.tasks">
                            <input class="border mb-2 rounded block border-muted-light py-2 px-2 w-full"
                                   type="text"
                                   name="body"
                                   :placeholder="'Task '+(index+1)"
                            v-model="task.value">
                        </template>
                        <button @click="addTask" class="mt-4 border border-gray-300 rounded-lg p-3">
                            Add New Task Field
                        </button>
                    </div>
                </div>

            </div>
            <footer class="mb-6 mr-8 flex justify-end">
                <button class="text-white bg-blue-300 rounded-lg p-3 shadow text-decoration-none" @click.prevent="$modal.hide('show')">Cancel</button>
                <button class="ml-4 text-white bg-blue-300 rounded-lg p-3 shadow text-decoration-none">Create Project</button>
            </footer>
            </form>
        </modal>
        <a href="" @click.prevent="$modal.show('show')">show</a>

    </div>
</template>

<script>
export default {

    data(){
        return{
            form:{
                title:'',
                desc:'',
                tasks:[
                    {value:''}
                ]
            },
            errors:{}
        }
    },
methods:{
    addTask(){
        this.form.tasks.push({value:''})
    },
    submit(){
      axios.post('/projects',this.form)
      .then(response=>{
            location = '/projects'
      })
      .catch(error=>{
            this.errors=error.response.data.errors
      });
    }
}
}
</script>

<style scoped>

</style>
