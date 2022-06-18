<template>
    <div >
        <input type="text"  placeholder="Search course ..." v-model="keyword"  @keyup="searchCourse()" class="form-control" >
        <div class="card-footer" v-if="results.length">
            <ul class="list-group">
                <li v-for="result in results" :key="result" class="list-group-item" >
                    <a  :href="result.title +'.'+ 'html' ">
                        {{ result.title }}
                        <br>
                        <small class="badge badge-success">{{result.position}}</small>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                keyword:'',
                results:[]
            }
        },
        methods:{
            searchCourse(){
                this.results=[];
                if(this.keyword.length > 1){
                    axios.get('/course/search',{params:{keyword:this.keyword}}).then(response=>{this.results=response.data;});
                }
            }
        }
    }

</script>
