<template>
<div class="card">
    <div class="card-header">
        <div class="d-flex justify-content-between">
            <h3 class="card-title">Pending</h3>
            <button class="btn btn-outline-primary btn-sm" @click="modalHideShow(1)"><i class="fas fa-folder-plus"></i> Add</button>
        </div>

    </div>
    <div class="card-body">

        <div class="d-flex justify-content-between">
            <div class="form-group">
                <label for="sel1">Status Category</label>
                <select class="custom-select custom-select" name="status" v-cloak v-model="reference_id" @change="getAllReference(1)">
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
                    <th class="font-weight-bolder" align="center" v-for="column in columns" :key="column.name" @click="sortBy(column.name)">
                        {{column.label}}
                    </th>
                    <th class="font-weight-bolder" colspan="2" style="text-align:center;">Action</th>
                </tr>
            </thead>
            <tbody v-if="referencesdata.length != 0">
                <tr v-for="reference in filteredReference" :key="reference.reference_id">
                    <td class="p-2" align="center">{{ reference.reference_id }}</td>
                    <td class="p-2" align="center">{{ reference.reference_groupname }}</td>
                    <td class="p-2" align="center">{{ reference.reference_shortcodename }}</td>
                    <td class="p-2" align="center">{{ reference.reference_longcodename }}</td>
                    <td class="p-2" align="center">
                        <div class="d-flex justify-content-start">
                            <a class="btn btn-outline-info info btn-sm" @click="showEdit(reference)" data-toggle="modal" data-target="#modalreference" ><i class="fas fa-edit "></i></a>
                        </div>

                    </td>
                </tr>
            </tbody>
            <tbody v-else>
                <td class="p-2" align="center" colspan="5">No Data Found</td>
            </tbody>
        </table>
        <div class="d-flex justify-content-center">
            <ul class="pagination" v-if="referencesdata.length != 0">
                <li :class="!pagination.prev_page_url ? 'disabled':''" class="page-item "><a class="page-link" @click="fetchPaginate(pagination.prev_page_url)">Previous</a></li>
                <li :class="pagination.current_page == page ? 'active':''" class="page-item" v-for="page in pagination.last_page" :key="page.index">
                    <a class="page-link" @click="getAllReference(1, `/getreference?page=${page}`)">{{ page }}</a>
                </li>
                <li :class="!pagination.next_page_url ? 'disabled':''" class="page-item"><a class="page-link" @click="fetchPaginate(pagination.next_page_url)">Next</a></li>
            </ul>
        </div>
        <div class="modal fade" id="modalreference" style="padding-right:0px!important;">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">

                    <div class="modal-header">
                        <h4 class="modal-title">Create Reference</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <div class="modal-body">
                        <div id="app">
                            <form id="form-blog" method="POST" action="">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="title">Reference Name</label>
                                            <input type="text" class="form-control" name="reference_groupname" id="title" v-model="formData.reference_groupname" placeholder="Enter reference Name..">
                                        </div>

                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="title">Reference Short Code</label>
                                            <input type="text" class="form-control" name="meta-desc" id="meta-desc" v-model="formData.reference_short" placeholder="Enter reference Code...">
                                        </div>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="author">Reference Long Code</label>
                                            <input type="text" class="form-control" name="author" id="author" v-model="formData.reference_long" placeholder="Enter reference Long Code...">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group" :hidden="hide">
                                            <select class="custom-select custom-select-sm" name="reference" v-cloak v-model="formData.reference_status">
                                                <option v-for="post in tablereference" v-bind:value="post.reference_id" :key="post.reference_id">{{ post.reference_longcodename }}</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="text-right">

                                    <button type="button" class="btn btn-sm btn-primary" @click="createUpdateReference(1)">Save</button>
                                    <button type="button" class="btn btn-sm btn-warning" @click="resetForm" id="btn-blogclear">Clear</button>
                                    <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Close</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>

</div>

</template>
<script>
export default {
    data() {
        let sortOrders = {};
        let columns = [
            {label: 'Reference ID', name: 'reference id' },
            {label: 'Reference Group Name', name: 'reference group name'},
            {label: 'Reference Short Code	', name: 'reference short code '},
            {label: 'Reference Long Code	', name: 'reference long code '},
        ];
        columns.forEach((column) => {
           sortOrders[column.name] = -1;
        });

        return {
            search:'',
            columns: columns,
            reference_status: 1,
            referencesdata: [],
            title:'',
            body:'',
            blog_id:'',
            hide:true,
            url: '/getreference',
            postStatus:[],
            nextUrl: null,
            pagination:[],
            formData:{
                reference_groupname: '',
                reference_short: '',
                reference_long: '',
                reference_status: '',
            }
        }
    },
    created() {
        this.getReference(1);
        this.getAllReference(1);
    },

    methods: {
        createUpdateReference(e, data){
            switch (e) {
                case 1:
                    if(this.formData.reference_groupname == ''){
                        return this.$toast.warning('Reference Group Name is required.', "Warning", {timeout: 2000, position:'topRight'});
                    }
                    if(this.formData.reference_short == ''){
                        return this.$toast.warning('Reference Short Code is required.', "Warning", {timeout: 2000, position:'topRight'});
                    }
                    if(this.formData.reference_long == ''){
                        return this.$toast.warning('Reference Long Code is required.', "Warning", {timeout: 2000, position:'topRight'});
                    }
                    // console.log(data)
                    this.callAxios('/savereference', this.formData, 1);
                break;
                case 2:
                    this.$toast.success(data.message, "Success", {timeout: 2000, position:'topRight'});
                    this.resetForm();
                    this.modalHideShow(2)
                    this.getStatus(1,null,'/getstatus')
                    this.hide = true
                    // console.log(data);
                break;
                default:
                break;
            }
        },
         modalHideShow(e){
            switch (e) {
                case 1:
                    $('#modalreference').modal('show')
                    this.resetForm()
                    break;
                case 2:
                    $('#modalreference').modal('hide')

                    break;

                default:
                    break;
            }
        },
        resetForm(){
            this.formData.reference_id = null;
            this.formData.reference_groupname = '';
            this.formData.reference_short = '';
            this.formData.reference_long = '';
            this.formData.reference_status = '' ;
        },
        showEdit(data){
            this.formData.reference_id = data.reference_id;
            this.formData.reference_groupname = data.reference_groupname;
            this.formData.reference_short = data.reference_shortcodename;
            this.formData.reference_long = data.reference_longcodename;
            this.formData.reference_status = data.reference_status;

        },
        resetPagination(){
            this.pagination.current_page = 1;
            this.pagination.prev_page_url = '';
            this.pagination.next_page_url = '';
        },
        fetchPaginate(url){
            this.url = url
            this.getAllReference(1, '/getreference')
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
        updateBlog(e, data){
            switch (e) {
                case 1:
                    this.callAxios('post', `/administrator/updateblog/${data}`, {'status': 2}, 3)
                break;
                case 2:
                    this.$toast.success(data.message, "Success", {timeout: 2000, position:'topRight'});
                    this.referencesdata = []
                    this.getAllReference(1, '/getreference')
                break;
                default:
                    break;
            }
        },
        getReference(e, data){
            switch (e) {
                case 1:
                    this.callAxios('/getreference', {'reference': 'TABLESTATUS'}, 4)
                    break;
                case 2:
                    this.postStatus.push(...data.data);
                    this.reference_status = this.postStatus[0].reference_id
                    break;
                default:
                    break;
            }
        },
        getAllReference(e, data){
            switch (e) {
                case 1:
                    this.callAxios('/getreference', {'reference': '', 'reference_status': this.reference_status}, 2)
                break;
                case 2:
                    console.log(data);
                    this.referencesdata = []
                    this.referencesdata.push(...data.data)
                    this.makePagination(data.data)
                    this.nextUrl = data.data.next_page_url;

                break;

                default:
                    break;
            }

        },
        show(id){
            var $this = this;
            axios.post(`/media/${id}`)
            .then(({data}) =>{
                $this.title = data.data.title;
                $this.body = data.data.body;
                $this.blog_id = data.data.blog_id;
            })
        },
        approve(e, data){
            switch (e) {
                case 1:
                    this.callAxios('post', `/administrator/approve/${this.blog_id}`, {'reference_status': 4}, 1)
                    break;
                case 2:
                    this.$toast.success(data.message, "Success", {timeout: 2000, position:'topRight'});
                    this.referencesdata = [];
                    this.getAllReference(1, '/getreference')
                    break;
                default:
                    break;
            }
        },

        callAxios(url, data, e){
            var $this = this;
            axios({method: 'post', url: url,data: data,})
                .then(({data}) =>{
                    switch (e) {
                        case 1:
                            $this.approve(2, data)
                        break;
                        case 2:
                            $this.getAllReference(2, data)
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
        endpoint(){
            return '/getreference';
        },
        filteredReference() {
            let referencesdata = this.referencesdata;
            if (this.search) {

                referencesdata = referencesdata.filter((row) => {
                    return Object.keys(row).some((key) => {
                        return String(row[key]).toLowerCase().indexOf(this.search.toLowerCase()) > -1;
                    })
                });
            }
            return referencesdata
        },
    },
}
</script>
