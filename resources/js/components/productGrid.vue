<template>
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-12">
                <!--sidebar widget start-->
                <aside class="sidebar_widget">
                    <div class="widget_inner">
                        <div class="widget_list widget_categories">
                            <h2>دسته بندی ها</h2>
                            <ul>
                                <li v-for="category in categories">
                                    <input type="checkbox"  v-model="category.checked" v-bind:value="category['slug']" v-on:change="categoriesCheckboxChanged($event)">
                                    <a v-bind:href="'?category='+category.slug">{{category.name}}</a>
                                    <span class="checkmark"></span>
                                </li>
                            </ul>
                        </div>
                        <div class="widget_list widget_categories">
                            <h2>سازنده</h2>
                            <ul>
                                <li v-for="brand in brands">
                                    <input type="checkbox"  v-model="brand.checked" v-bind:value="brand['slug']" v-on:change="brandsCheckboxChanged($event)">
                                    <a href="#">{{brand.name}}</a>
                                    <span class="checkmark"></span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </aside>
                <!--sidebar widget end-->
            </div>
            <div class="col-lg-9 col-md-12">
                <!--shop wrapper start-->
                <!--shop toolbar start-->
                <div class="shop_title" id="scrollToTopPoint">
                    <h1>فروشگاه</h1>
                </div>
                <div class="shop_toolbar_wrapper">
                    <div class="shop_toolbar_btn">

                        <button data-role="grid_3" type="button" class="active btn-grid-3" data-toggle="tooltip" title="3"></button>

                        <button data-role="grid_4" type="button" class=" btn-grid-4" data-toggle="tooltip" title="4"></button>

                        <button data-role="grid_list" type="button" class="btn-list" data-toggle="tooltip" title="لیست"></button>
                    </div>
                    <div class=" niceselect_option">

                        <form class="select_option" action="#">
                            <select name="orderby" id="short">

                                <option selected value="1">مرتب سازی بر اساس میانگین امتیاز</option>
                                <option value="2">مرتب سازی بر اساس محبوبیت</option>
                                <option value="3">مرتب سازی بر اساس جدید بودن</option>
                                <option value="4">مرتب سازی بر اساس قیمت: پایین تا بالا</option>
                                <option value="5">مرتب سازی بر اساس قیمت: بالا تا پایین</option>
                                <option value="6">نام محصول: الف</option>
                            </select>
                        </form>


                    </div>
                    <div class="page_amount">
                        <p>نمایش {{productNumberStart+1}}–{{afterFilteredProducts.length + pageNumber*countShowingProducts}} از {{products.length}} نتیجه</p>
                    </div>
                </div>
                <!--shop toolbar end-->

                <div class="row shop_wrapper">
                    <div class="col-lg-4 col-md-4 col-sm-6 col-12" v-for="product in afterFilteredProducts">
                        <div class="single_product">
                            <div class="product_thumb">
                                <a class="primary_img" v-bind:href="product.productUrl"><img v-bind:src="product.image1Url" alt=""></a>
                                <a class="secondary_img" v-bind:href="product.productUrl"><img v-bind:src="product.image2Url" alt=""></a>

                                <template v-if="product.price != 0">
                                    <template v-if="product.discount != 0">
                                        <div class="label_product" >
                                            <span class="label_sale">-{{product.discount}}%</span>
                                        </div>
                                    </template>
                                </template>

                                <div class="action_links">
                                    <ul>
                                        <li class="quick_button"><a href="#" v-bind:data-product-id="product.id" title="نمایش سریع"> <i class="icon-eye"></i></a></li>
                                    </ul>
                                </div>
                                <div class="add_to_cart">
                                    <a href="tel:0989129218431" title="افزودن به سبد">تماس با پشتیبان</a>
                                </div>
                            </div>
                            <div class="product_content grid_content">
                                <p class="manufacture_product"><a href="#">عنوان محصول</a></p>
                                <h4><a v-bind:href="product.productUrl">{{product.title.substr(0,30) + '...'}}</a></h4>
                                <div class="price_box" v-if="product.price != 0">
                                    <template v-if="product.discount != 0">
                                        <span class="old_price">{{product.price | formatNumber}} تومان</span>
                                        <span class="current_price">{{product.price - (product.price * product.discount /100) | formatNumber}} تومان</span>
                                    </template>
                                    <template v-else>
                                        <span class="current_price">{{product.price | formatNumber}} تومان</span>
                                    </template>
                                </div>
                            </div>
                            <div class="product_content list_content">
                                <div class="left_caption">
                                    <p class="manufacture_product"><a href="#">عنوان محصول</a></p>
                                    <h4><a v-bind:href="product.productUrl">{{product.title.substr(0,39) + '...'}}</a></h4>
                                    <div class="product_desc">
                                        <p>{{product.description.substr(0,200) + '...'}}</p>
                                    </div>
                                </div>
                                <div class="right_caption">
                                    <div class="text_available">
                                        <p>در دسترس: <span>{{product.in_stock}} موجود در انبار</span></p>
                                    </div>
                                    <div class="price_box" v-if="product.price != 0">
                                        <template v-if="product.discount != 0">
                                            <span class="old_price">{{product.price | formatNumber}} تومان</span>
                                            <span class="current_price">{{product.price - (product.price * product.discount /100) | formatNumber}} تومان</span>
                                        </template>
                                        <template v-else>
                                            <span class="current_price">{{product.price | formatNumber}} تومان</span>
                                        </template>
                                    </div>
                                    <div class="cart_links_btn">
                                        <a href="tel:0989129218431" title="افزودن به سبد">تماس با پشتیبان</a>
                                    </div>
                                    <div class="action_list_links">
                                        <ul>
                                            <li class="quick_button"><a href="#" v-bind:data-product-id="product.id" title="نمایش سریع"> <i class="icon-eye"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="shop_toolbar t_bottom" v-if="afterFilteredProducts.length >0">
                    <div class="pagination">
                        <ul>
                            <li v-bind:class="{'next':true, 'disabled':previousPageClassStatus}">
                                <a v-on:click.prevent="prevPage()">قبلی</a>
                            </li>
                            <li v-if="pageNumber >1"><a v-on:click.prevent="changePageNumber(1)">1</a></li>
                            <li v-if="pageNumber >=4">...</li>
                            <li v-if="pageNumber >2"><a v-on:click.prevent="changePageNumber(pageNumber-1)">{{pageNumber-1}}</a></li>
                            <li v-if="pageNumber >0"><a v-on:click.prevent="changePageNumber(pageNumber)">{{pageNumber}}</a></li>
                            <li class="current">{{pageNumber+1}}</li>
                            <li v-if="totalPageNumber-pageNumber>1"><a v-on:click.prevent="changePageNumber(pageNumber+2)">{{pageNumber+2}}</a></li>
                            <li v-if="totalPageNumber-pageNumber>2"><a v-on:click.prevent="changePageNumber(pageNumber+3)">{{pageNumber+3}}</a></li>
                            <li v-if="totalPageNumber-pageNumber >=5">...</li>
                            <li  v-if="totalPageNumber-pageNumber>3"><a v-on:click.prevent="changePageNumber(totalPageNumber)">{{totalPageNumber}}</a></li>
                            <li v-bind:class="{'next':true, 'disabled':nextPageClassStatus}">
                                <a v-on:click.prevent="nextPage()">بعدی</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!--shop toolbar end-->
                <!--shop wrapper end-->
            </div>
        </div>
    </div>
</template>

<script>
    let numeral = require('numeral');
    import VueSlider from 'vue-slider-component'
    import 'vue-slider-component/theme/default.css'

    export default {
        name: "ProductGrid",
        data(){
            return{
                products:window.products,CSRF_Token:window.CSRF_Token,categories:window.categories,brands:window.brands,countShowingProducts:12,
                selectedCategories:{},selectedBrands:{}, pageNumber: 0, totalPageNumber:1, productNumberStart:0, productNumberEnd:1, radioAvailable:false,orderBy:"default",
                nextPageClassStatus:false,previousPageClassStatus:true,
            }
        },
        created(){
            let selectedBrandsFromUrl=[];
            let brandsFilterImagesAndSlug=[];

            $.each(this.brands , function (index , brand) {
                selectedBrandsFromUrl.push(brand['slug']);

                if (new URL(location.href).searchParams.get('brand') == null) {
                    brand['checked']="checked";
                    brandsFilterImagesAndSlug.push(brand);
                }else{
                    if (new URL(location.href).searchParams.get('brand') === brand['slug']) {
                        brand['checked']="checked";
                        brandsFilterImagesAndSlug.push(brand);
                    }else{
                        brand['checked']="";
                        brandsFilterImagesAndSlug.push(brand);
                    }
                }

            });

            this.brands= brandsFilterImagesAndSlug;

            if (new URL(location.href).searchParams.get('brand') == null){
                this.selectedBrands = selectedBrandsFromUrl;
            }else{
                this.selectedBrands = [new URL(location.href).searchParams.get('brand')];
            }

            let selectedCategoriesFromUrl=[];
            let categoriesFilterImagesAndSlug=[];

            $.each(this.categories, function (index , category) {
                selectedCategoriesFromUrl.push(category['slug']);

                if (new URL(location.href).searchParams.get('category') == null) {
                    category['checked']="checked";
                    categoriesFilterImagesAndSlug.push(category);
                }else{
                    if (new URL(location.href).searchParams.get('category') === category['slug']) {
                        category['checked']="checked";
                        categoriesFilterImagesAndSlug.push(category);
                    }else{
                        category['checked']="";
                        categoriesFilterImagesAndSlug.push(category);
                    }
                }

            });

            this.categories = categoriesFilterImagesAndSlug;

            if (new URL(location.href).searchParams.get('category') == null){
                this.selectedCategories = selectedCategoriesFromUrl;
            }else{
                this.selectedCategories = [new URL(location.href).searchParams.get('category')];
            }
        },
        filters:{
            'formatNumber':function (value) {
                return numeral(value).format("0,0");
            }
        },
        methods:{
            countShowingProductsChanged:function(data){
                this.countShowingProducts=parseInt(data.target.value);
                this.pageNumber=0;
                this.navigateToTopFirst();
            },
            orderChanged:function (data) {
                this.orderBy = data.target.value;
                this.pageNumber=0;
                this.navigateToTopFirst();
            },
            categoriesCheckboxChanged:function (data) {
                if (data.target.checked === false){
                    this.selectedCategories = jQuery.grep(this.selectedCategories, function(value) {
                        return value !== data.target.value;
                    });
                }else{
                    this.selectedCategories.push(data.target.value);
                }
                this.pageNumber=0;
                this.navigateToTopFirst();
            },
            brandsCheckboxChanged:function (data) {
                if (data.target.checked === false){
                    this.selectedBrands = jQuery.grep(this.selectedBrands, function(value) {
                        return value !== data.target.value;
                    });
                }else{
                    this.selectedBrands.push(data.target.value);
                }
                this.pageNumber=0;
                this.navigateToTopFirst();
            },
            nextPage(){
                if (this.pageNumber+1 < this.totalPageNumber){
                    this.pageNumber++;
                    this.navigateToTopFirst();
                }
            },
            prevPage(){
                if (this.pageNumber+1 > 1){
                    this.pageNumber--;
                    this.navigateToTopFirst();
                }
            },
            changePageNumber:function (data) {
                this.pageNumber = data-1;
                this.navigateToTopFirst();
            },
            onlyAvailableChanged:function (data) {
                this.radioAvailable = data.target.checked;
                this.navigateToTopFirst();
            },
            navigateToTopFirst:function () {
                document.getElementById("scrollToTopPoint").scrollIntoView({behavior: "smooth"});
            }
        },
        computed:{
            afterFilteredProducts:function(){
                let products =[];
                let vueComponent = this;

                $.each(vueComponent.products , function (index , product) {
                    if ($.inArray(product['category_slug'] , vueComponent.selectedCategories) !== -1){
                        if ($.inArray(product['brand_slug'] , vueComponent.selectedBrands) !== -1){
                            if (! vueComponent.radioAvailable){
                                products.push(product);
                            }else{
                                if (product['in_stock'] > 0){
                                    products.push(product);
                                }
                            }
                        }
                    }
                });

                products.sort(function (a, b) {
                    if (vueComponent.orderBy === "default"){
                        if (a.id >= b.id){
                            return -1;
                        }else{
                            return 1;
                        }
                    }else if (vueComponent.orderBy === "mostPoints"){
                        if (a['points_average'] >= b['points_average']){
                            return -1;
                        }else{
                            return 1;
                        }
                    }else if (vueComponent.orderBy === "mostSold"){
                        if (a['sales_number'] >= b['sales_number']){
                            return -1;
                        }else{
                            return 1;
                        }
                    }else if (vueComponent.orderBy === "lowestPrice"){
                        if (a['price'] >= b['price']){
                            return 1;
                        }else{
                            return -1;
                        }
                    }else{
                        if (a.id >= b.id){
                            return -1;
                        }else{
                            return 1;
                        }
                    }
                });

                this.totalPageNumber = Math.ceil(products.length / this.countShowingProducts);
                this.productNumberStart = this.pageNumber * this.countShowingProducts;
                this.productNumberEnd= this.productNumberStart + this.countShowingProducts;

                if (this.pageNumber === 0){this.previousPageClassStatus=true;}else{this.previousPageClassStatus=false;}
                if (this.pageNumber+1 === this.totalPageNumber){this.nextPageClassStatus=true;}else{this.nextPageClassStatus=false;}

                return products.slice(this.productNumberStart, this.productNumberEnd);
            }
        },
        components: {
            VueSlider
        },
        mounted() {
            const axios = require('axios');
            let vueComponent=this;
            axios.defaults.headers.post['X-CSRF-TOKEN'] = this.CSRF_Token;
            async function fetchAllProducts() {
                try {
                    axios({
                        method: 'post',
                        url: window.asyncFetchProductsUrl
                    }).then(function (response) {
                        vueComponent.products=response.data;
                    });
                } catch (error) {
                    console.error(error);
                }
            }
            fetchAllProducts();
        }
    }
</script>

<style scoped>

</style>
