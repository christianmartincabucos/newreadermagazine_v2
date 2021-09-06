<template>
    <div>
        <div class="modal fade" id="createblog" style="padding-right:0px!important;">
            <div class="modal-dialog modal-xl modal-dialog-centered">
                <div class="modal-content">

                    <div class="modal-header bg-red">
                        <h4 class="modal-title gotham-bold">Create Blog</h4>
                        <button type="button" class="close text-white" data-dismiss="modal">&times;</button>
                    </div>

                    <div class="modal-body">
                        <div class="col-md-12">
                        </div>
                        <form id="form-blog" enctype="multipart/form-data"  method="POST" action="">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="gotham-bold font-weight-bolder" for="title">
                                            Title
                                            <a data-toggle="tooltip"
                                                title="Reel in your target audience by creating clickbaity titles! Readers and writers don’t like to miss out on interesting information, so here’s some sure-fire tip: create how-to’s, question titles, and listicles (list articles). It’s always best to keep them intrigued by what they have yet to know."
                                                data-placement="right">
                                                <i class="text-red fas fa-info-circle"></i>
                                            </a>
                                            <!-- <span class="badge badge-pill bg-red small" data-toggle="tooltip" data-placement="right" title="Hooray!">
                                                <i class="fas fa-info"></i>
                                            </span> -->
                                        </label>
                                        <input type="text" class="form-control" name="title"  v-model="formData.title" placeholder="Enter title...">
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="gotham-bold font-weight-bolder" for="title">
                                            Meta Description
                                            <a
                                                data-toggle="tooltip"
                                                title="Have you tried searching for an article online and see not only the title of the article but also some information underneath? That is what is called a “meta description.” It is a snippet of your blog or site that will further urge the reader to click on your link. Keep it at about 50-160 characters long, including spaces, so they don’t appear truncated."
                                                data-placement="right">
                                                <i class="text-red fas fa-info-circle"></i>

                                            </a>
                                        </label>
                                        <input type="text" class="form-control" name="meta-desc" v-model="formData.meta_desc" placeholder="Enter meta description...">
                                    </div>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="gotham-bold font-weight-bolder" for="main">
                                            Main Keyword
                                            <a
                                                data-toggle="tooltip"
                                                title="Readers frequently just type in a word or two in search engines. In order to optimize your article’s reach, it is best to identify a main keyword and build your article around it. This way, your blog will make it to the top results when readers type in the main keyword in their searches. This will increase the chances of them clicking on your blog first. Pen it multiple times within your piece so search engines won’t miss it out!"
                                                data-placement="right">
                                                <i class="text-red fas fa-info-circle"></i>

                                            </a>
                                        </label>
                                        <input type="text" class="form-control" v-model="formData.mainkey"  placeholder="Enter Main Keyword ...">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="gotham-bold font-weight-bolder" for="secondary">
                                            Secondary Keyword
                                            <a
                                                data-toggle="tooltip"
                                                title="Main keywords consist of only one word or a single phrase. To maximize the blog’s reach, it is most helpful to put in secondary keywords. These words and phrases aren’t used as much as main keywords but still hold significant support to stimulate more engagement and traffic to your site."
                                                data-placement="right">
                                                <i class="text-red fas fa-info-circle"></i>

                                            </a>
                                        </label>
                                        <input type="text" class="form-control" v-model="formData.secondkey"  placeholder="Enter Secondary Keyword ...">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="gotham-bold font-weight-bolder" for="author">
                                            Author
                                            <a
                                                data-toggle="tooltip"
                                                title="Here you may put your complete name or a pseudonym you most likely want to be known. Your initials would also work just fine! Just remember that the author’s name is the identity you want your masterpieces to be identified with and credited for."
                                                data-placement="right">
                                                <i class="text-red fas fa-info-circle"></i>

                                            </a>
                                        </label>
                                        <input type="text" class="form-control" name="author"  v-model="formData.author" placeholder="Enter author...">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group" :hidden="isAdmin">
                                        <label class="gotham-bold font-weight-bolder" for="sel1" >Category</label>
                                        <select class="form-control text-uppercase" name="category" v-model="formData.category" @change="checkCategory(formData.category)">
                                            <option value="0" :disabled="true">Select Blog Category</option>
                                            <option v-for="category in blogcategories" v-bind:value="category.category_id" :key="category.blog_category_id">{{ category.category_name }}</option>

                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="gotham-bold font-weight-bolder" for="author">
                                            Image
                                            <a
                                                data-toggle="tooltip"
                                                title="Images are great visual candies… until it is a copyright problem... yikes! You may or may not include them in, but if you do, make sure those pictures are yours or have permission to use them. If paying for an image limits you, don’t worry. There are a handful of royalty-free image sites with quality photos, like Unsplash, Pexels, and Pixabay, to name a few. Just don’t forget to credit the owners! "
                                                data-placement="right">
                                                <i class="text-red fas fa-info-circle"></i>

                                            </a>
                                        </label>
                                        <input type="file" class="form-control-file border" name="image"  ref="image" @change="onFileChange"  placeholder="Browse image...">
                                    </div>
                                </div>
                                <div class="col-md-6" :hidden="isAdmin">
                                    <div class="form-group" :hidden="formData.category < 5">
                                        <label class="gotham-bold font-weight-bolder" for="author">Select Date Range</label><br>

                                        <date-range-picker
                                            ref="picker"
                                            :locale-data="{ firstDay: 1, format: 'YYYY-MM-DD' }"
                                            :timePicker="true"
                                            :singleDatePicker="singleDatePicker"
                                            :timePicker24Hour="timePicker24Hour"
                                            :showWeekNumbers="showWeekNumbers"
                                            :showDropdowns="showDropdowns"
                                            v-model="dateRange"
                                        >
                                        <template v-slot:input="picker" style="min-width: 350px;">
                                            {{ picker.startDate | date }} - {{ picker.endDate | date }}
                                        </template>
                                        </date-range-picker>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="gotham-bold font-weight-bolder" for="blog-editor">Description:</label>
                                <tinymce v-model="formData.body"
                                    tinymce-script-src="/js/addpp.js"
                                    :plugins="myPlugins"
                                    :toolbar ="myToolbar1"
                                    :init="myInit"
                                    >
                                </tinymce>
                            </div>
                            <div class="text-right">
                                <button type="button" class="btn btn-primary" @click="imageSaveBlog(1)"><i class="far fa-save"></i> Save</button>
                                <button type="button" class="btn btn-warning" v-if="formData.body" @click="resetForm"><i class="far fa-trash-alt"></i> Clear</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="far fa-times-circle"></i> Close</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- <span v-if="!formData.image || !formData.image.length">No files selected</span>
        <ul v-else>
            <li v-for="file in formData.image" :key="file.name">{{file.name}}</li>
        </ul> -->
    </div>
</template>
<style lang="scss">
    .tooltip{
        opacity: 1!important;
        .tooltip-inner {
            background-color: #c01f22!important;
            box-shadow: 0 1rem 3rem rgb(0 0 0 / 18%) !important;
            line-height: 1;
            text-align: left !important;
            padding: 1rem;
        }
        @media only screen and (min-width: 992px) {
            .tooltip-inner {
                min-width: 400px!important;
            }
        }
    }
</style>
<script>
import Editor from '@tinymce/tinymce-vue'
import tinymce from 'tinymce/tinymce'
import DateRangePicker from 'vue2-daterange-picker'
//you need to import the CSS manually (in case you want to override it)
export default {
    props:['usertype', 'blogdata'],
    components: {
        'tinymce': Editor,
        DateRangePicker,
    },
    data() {
        let startDate = new Date();
        let endDate = new Date();
        endDate.setDate(endDate.getDate() + 15)
        return {
            user_type: this.usertype,
            id: 'editor_' + _.random(10000, 99999),
            blogcategories: [],
            dateRange: {startDate, endDate},
            singleDatePicker : '',
            timePicker24Hour : '',
            showWeekNumbers : '',
            showDropdowns : '',
            formData:{
                title: '',
                meta_desc:'',
                author:'',
                category:11,
                image:null,
                mainkey: '',
                secondkey: '',
                body:'',

            },
            myModel:'',
            theme: "modern",
            myToolbar1: 'insertfile undo redo | formatselect | bold italic underline forecolor backcolor emoticons | alignleft aligncenter alignright alignjustify | hr bullist numlist outdent indent | removeformat link image table | print fullscreen | code preview',
            myPlugins: "link image code preview imagetools table lists textcolor hr wordcount| print fullscreen",

            myInit: {

                images_dataimg_filter: function(img) {
                    return false;
                    return img.hasAttribute('internal-blob');
                },

                content_css: [
                    '/css/app.css',
                    '/mdbootstrap/css/bootstrap.css',
                    '/css/mdb.min.css',
                ],
                /* setup : function(ed) {
                    ed.onInit.add(function(ed, evt) {

                        // Load a script from a specific URL using the global script loader
                        tinymce.ScriptLoader.load('somescript.js');

                        // Load a script using a unique instance of the script loader
                        var scriptLoader = new tinymce.dom.ScriptLoader();

                        scriptLoader.load('somescript.js');

                    });
                }, */
                external_plugins:{'testt':'http://127.0.0.1:8000/js/secret.js'},
                convert_urls : false,
                height:500,
                automatic_uploads: true,
                images_upload_base_path: '/../../',
                relative_urls : false,

                // override default upload handler to simulate successful upload
                file_picker_types: 'image',
                images_upload_handler: function (blobInfo, success, failure) {
                    let data = new FormData();
                    data.append('file', blobInfo.blob(), blobInfo.filename());
                    axios.post('/tinymce/upload', data)
                        .then(function (res) {
                            success(res.data.location);
                        })
                        .catch(function (err) {
                            failure('HTTP Error: ' + err.message);
                        });
                }
            }
        }
    },
    watch: {
        model() {
        if (this.formData.body == null)
            tinymce.editors[this.id].setContent(value);
        },
        blogData(){
            return [
            (this.formData.title = this.blogdata.title),
            (this.formData.meta_desc = this.blogdata.meta_desc),
            (this.formData.author = this.blogdata.author_id),
            (this.formData.category = this.blogdata.category_id),
            (this.formData.image = this.blogdata.cover_image),
            (this.formData.body = this.blogdata.body),
            (this.formData.mainkey = this.blogdata.primary_key),
            (this.formData.secondkey = this.blogdata.secondary_key),
            // this.dateRange.startDate = this.blogdata.startDate;
            // this.dateRange.endDate = this.blogdata.endDate;
            // this.$refs.image.value= null;
            ]
        }
    },
    mounted() {
       
    },
    filters: {
      date(val) {
        return val ? val.toLocaleString() : ''
      }
    },
    computed:{
        blogdata(){
            return [
            (this.formData.title = this.blogdata.title),
            (this.formData.meta_desc = this.blogdata.meta_desc),
            (this.formData.author = this.blogdata.author_id),
            (this.formData.category = this.blogdata.category_id),
            (this.formData.image = this.blogdata.cover_image),
            (this.formData.body = this.blogdata.body),
            (this.formData.mainkey = this.blogdata.primary_key),
            (this.formData.secondkey = this.blogdata.secondary_key),
            // this.dateRange.startDate = this.blogdata.startDate;
            // this.dateRange.endDate = this.blogdata.endDate;
            // this.$refs.image.value= null;
            ]
        },
        isAdmin(){
            return this.user_type == 'default' ? true : false;
        },
        isEmpty: function () {
            return jQuery.isEmptyObject(this.formData)
        }
        // this.dateRange.endDate == null ? null : this.dateRange.endDate
    },
    methods: {
        checkCategory(categoryId){
            if(categoryId < 5){

                this.dateRange.endDate = null ;
                this.dateRange.startDate = null;
            }
        },
        onFileChange(e) {
            var files = e.target.files || e.dataTransfer.files;
            this.formData.image = e.target.files[0]
            if (!files.length)
                return;
        },
        resetForm(){
            this.formData.title = '';
            this.formData.meta_desc = '';
            this.formData.author = '';
            this.formData.category = 11;
            this.formData.image = '';
            this.formData.body = '';
            this.formData.mainkey = '';
            this.formData.secondkey = '';
            this.dateRange.startDate = '';
            this.dateRange.endDate = '';
            this.$refs.image.value= null;

        },

        imageSaveBlog(e, data) {
            switch (e) {
                case 1:
                    // return console.log(this.dateRange.startDate.toISOString().slice(0, 19).replace('T', ' '),this.dateRange.endDate.toISOString().slice(0, 19).replace('T', ' '))
                    if(this.formData.title == ''){
                        return this.$toast.warning('Title is required.', "Warning", {timeout: 2000, position:'topRight'});
                    }
                    if(this.formData.meta_desc == ''){
                        return this.$toast.warning('Meta Description is required.', "Warning", {timeout: 2000, position:'topRight'});
                    }
                    if(this.formData.category == 0){
                        return this.$toast.warning('Category is required.', "Warning", {timeout: 2000, position:'topRight'});
                    }
                    if(this.formData.category == 0){
                        return this.$toast.warning('Category is required.', "Warning", {timeout: 2000, position:'topRight'});
                    }
                    if(this.formData.body == ''){
                        return this.$toast.warning('Body Description is required.', "Warning", {timeout: 2000, position:'topRight'});
                    }
                    let formData = new FormData();
                        formData.append('image', this.formData.image);
                        formData.append('title', this.formData.title);
                        formData.append('meta_desc', this.formData.meta_desc);
                        formData.append('author', this.formData.author);
                        formData.append('category', this.formData.category);
                        formData.append('body', this.formData.body);
                        formData.append('start_date',(this.dateRange.startDate == null? this.dateRange.startDate : this.dateRange.startDate.toISOString().slice(0, 19).replace('T', ' ')));
                        formData.append('end_date', (this.dateRange.endDate == null? this.dateRange.endDate : this.dateRange.endDate.toISOString().slice(0, 19).replace('T', ' ')));
                        formData.append('mainkey', this.formData.mainkey);
                        formData.append('secondkey', this.formData.secondkey);
                        this.callAxios('post', '/formSubmit', formData, 1)
                break;
                case 2:
                    this.resetForm();
                    this.$toast.success(data.message, "Success", {timeout: 2000, position:'topRight'});
                    $('#myModal').modal('hide')
                default:
                break;
            }

        },
        callAxios(http, url, data, e){
            let $this = this;

            const config = {
                headers: { 'content-type': 'multipart/form-data' }
            }
            axios({method: http,url: url,data: data, config})
                .then(function (response) {
                    switch (e) {
                        case 1:
                            $this.imageSaveBlog(2, response.data)
                        break;
                        default:
                            break;
                    }
                })
                .catch(function (error) {
                    // handle error
                    console.log(error);
                });
        },
    },
}
</script>
