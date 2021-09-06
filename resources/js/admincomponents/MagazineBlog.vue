<template>
<div class="card">
    <div class="card-header">
        <div class="d-flex justify-content-between">
            <h3 class="card-title">Magazine List</h3>
            <!-- <button class="btn btn-outline-primary btn-sm" @click="modalHideShow(1)"><i class="fas fa-folder-plus"></i> Add</button> -->
        </div>

    </div>
    <div class="card-body">

        <div class="d-flex justify-content-between">
            <div class="form-group">
                <label for="sel1">Status Category</label>
                <select class="custom-select custom-select" name="status" v-cloak v-model="reference_status" @change="getallblogs(1, '/getallblogs')">
                    <option v-for="post in postStatus" v-bind:value="post.reference_id" :key="post.reference_id">{{ post.reference_longcodename }}</option>
                </select>
            </div>
            <div class="form-group">
                <label for="sel1">Search</label>
                <input class="form-control form-control" type="text" v-model="search" @input="resetPagination" placeholder="Search...">
            </div>
        </div>

        <table id="example1" class="table table-bordered table-hover table-striped rounded" v-cloak>
            <thead>

                <tr>
                    <th class="font-weight-bold" style="text-align:center;" v-for="column in columns" :key="column.name" @click="sortBy(column.name)">
                        {{column.label}}
                    </th>
                    <th class="font-weight-bold" colspan="2" style="text-align:center;">Action</th>
                </tr>
            </thead>
            <tbody v-if="blogs.length != 0">
                <tr v-for="blog in filteredpost" :key="blog.blog_id">
                    <td class="p-2" align="center">{{ blog.title }}</td>
                    <td class="p-2" align="center">{{ blog.meta_desc }}</td>
                    <td class="p-2" align="center">{{ blog.author == ''? 'anonymous':  blog.author }}</td>
                    <td class="p-2" align="center">Media</td>
                    <td class="p-2" align="">
                        <div class="d-flex justify-content-center">

                            <a class="btn btn-outline-info info btn-sm" @click="showEdit(blog)" data-toggle="modal" data-target="#createblog" ><i class="fas fa-edit "></i></a>
                            <a
                                v-if="blog.post_status == 4" class="btn btn-outline-warning btn-sm"
                                @click="updateBlog(1, blog.blog_id)">
                                <i class="fas fa-trash "></i>
                            </a>
                            <a
                                v-else class="btn btn-outline-primary btn-sm"
                                @click="show(blog.blog_id)" data-toggle="modal" data-target="#mediaModal">
                                <i class="fas fa-eye"></i>
                            </a>
                        </div>

                    </td>
                </tr>
            </tbody>
            <tbody v-else>
                <td class="p-2" align="center" colspan="5">No Data Found</td>
            </tbody>
        </table>
        <div class="d-flex justify-content-center">
            <ul class="pagination" v-if="blogs.length != 0">
                <li :class="!pagination.prev_page_url ? 'disabled':''" class="page-item "><a class="page-link" @click="fetchPaginate(pagination.prev_page_url)">Previous</a></li>
                <li :class="pagination.current_page == page ? 'active':''" class="page-item" v-for="page in pagination.last_page" :key="page.index">
                    <a class="page-link" @click="getAllBlogs(1, `/getallblogs?page=${page}`)">{{ page }}</a>
                </li>
                <li :class="!pagination.next_page_url ? 'disabled':''" class="page-item"><a class="page-link" @click="fetchPaginate(pagination.next_page_url)">Next</a></li>
            </ul>
        </div>
        <edit-blogs :blogdata="blogdata"></edit-blogs>
        <div class="modal fade" id="mediaModal">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Media | Checking</h4>
                        <button type="button" class="btn bg-gradient-primary btn-xs" @click="approve(1)" data-dismiss="modal"><i class="fas fa-thumbs-up"></i>&nbsp;Approve</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                    <h3 class="text-center"><strong>{{ title }}</strong></h3>
                            <div v-html="body"></div>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>

                </div>
            </div>
        </div>

    </div>

</div>

</template>
<script>
import EditBlogs from './CreateBlog'
export default {
    data() {
        let sortOrders = {};
        let columns = [
            {label: 'Title', name: 'title' },
            {label: 'Meta Description', name: 'meta description'},
            {label: 'Author', name: 'author'},
            {label: 'Category', name: 'category'},
        ];
        columns.forEach((column) => {
           sortOrders[column.name] = -1;
        });

        return {
            postStatus:[],
            blogdata:[],
            reference_status:1,
            editblog:[],
            search:'',
            columns: columns,
            post_status: '',
            blogs: [],
            title:'',
            body:'',
            blog_id:'',
            url: '/getallblogs',
            postStatus:[],
            nextUrl: null,
            pagination:[],
        }
    },
    components:{
        'edit-blogs' : EditBlogs,
    },
    created() {
        this.getReference(1, '/getreference');
        this.getAllBlogs(1, '/getallblogs');
    },

    methods: {
        showEdit(data){
            this.blogdata = [];
            this.blogdata = data;
        },
        resetPagination(){
            this.pagination.current_page = 1;
            this.pagination.prev_page_url = '';
            this.pagination.next_page_url = '';
        },
        fetchPaginate(url){
            this.url = url
            this.getAllBlogs(1, '/getallblogs')
        },
        makePagination(data){
            let pagination = {
                current_page: data.current_page,
                last_page: data.last_page,
                next_page_url: data.next_page_url,
                prev_page_url:data.prev_page_url,
            }
            this.pagination = pagination
        },
        /* updateBlog(e, data){
            switch (e) {
                case 1:
                    this.callAxios(`/administrator/updateblog/${data}`, {'status': 2}, 3)
                break;
                case 2:
                    this.$toast.success(data.message, "Success", {timeout: 2000, position:'topRight'});
                    this.blogs = []
                    this.getAllBlogs(1, '/getallblogs')
                break;
                default:
                    break;
            }
        }, */
        getReference(e, data){
            switch (e) {
                case 1:
                    this.callAxios('/getreference', {'reference': 'TABLESTATUS'}, 4)
                    break;
                case 2:
                    console.log(data);
                    this.postStatus.push(...data.data);
                    this.reference_status = this.postStatus[0].reference_id
                    break;
                default:
                    break;
            }
        },
        getAllBlogs(e, data){
            switch (e) {
                case 1:
                    this.callAxios(data,{'reference_status': this.reference_status}, 2)
                break;
                case 2:
                    this.blogs = []
                    this.blogs.push(...data.data)
                    this.makePagination(data.data)
                    this.nextUrl = data.data.next_page_url;

                break;

                default:
                    break;
            }
            
        },
        /* show(id){
            var $this = this;
            axios.post(`/media/${id}`)
            .then(({data}) =>{
                $this.title = data.data.title;
                $this.body = data.data.body;
                $this.blog_id = data.data.blog_id;
            })
        }, */
        /* approve(e, data){
            switch (e) {
                case 1:
                    this.callAxios(`/administrator/approve/${this.blog_id}`, {'post_status': 4}, 1)
                    break;
                case 2:
                    this.$toast.success(data.message, "Success", {timeout: 2000, position:'topRight'});
                    this.blogs = [];
                    this.getAllBlogs(1, '/getallblogs')
                    break;
                default:
                    break;
            } 
        },*/

        callAxios(url, data, e){
            var $this = this;
            axios({method: 'post', url: url,data: data,})
                .then(({data}) =>{
                    switch (e) {
                        case 1:
                            $this.approve(2, data)
                        break;
                        case 2:
                            $this.getAllBlogs(2, data)
                        break;
                        case 3:
                            $this.updateBlog(2, data)
                        break;
                        case 4:
                            $this.getReference(2, data)
                        break;
                        default:
                            break;
                    }
                })
                .catch(function (error) {
                    // handle error
                    console.log(error)
                });
        }
    },

    computed:{
        filteredpost() {
            let blogs = this.blogs;
            if (this.search) {

                blogs = blogs.filter((row) => {
                    return Object.keys(row).some((key) => {
                        return String(row[key]).toLowerCase().indexOf(this.search.toLowerCase()) > -1;
                    })
                });
            }
            return blogs
        },
    },
}
</script>
