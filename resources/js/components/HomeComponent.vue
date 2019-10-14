<template>
    <div>
        <h1 class="h3 mb-4 text-gray-800">Home Page</h1>
        <div v-for="cat in categories">
            <div>
                {{ cat.coinCategory}}
                <a href="#"><img :src="getAvatar(cat.coinCategory)" style="width: 90px; height: auto;" class="logo"></a>
            </div>
        </div>
    </div>
</template>


<script>
    // {{ cat.coinCategory | imgHash}}
    Vue.filter('imgHash', function (str) {
        return str.replace(/ /g, '_');
    });
    export default {

        data() {
            return {
                categories: [],
                categoriesImg: [],
                endpoint: 'api/getCats'
            };
        },

        created() {
            this.fetch();
        },

        methods: {
            fetch() {
                axios.post(this.endpoint)
                    .then(({data}) => {
                        this.categories = data.categories;
                        this.categoriesImg = this.categories.forEach( function(value, index){
                            value.replace(' ','_');
                        });
                        console.log(this.categories)
                    });
            },
            removeSpace: function() {
                this.categoriesImg = this.categories.replace(' ','_');
            },
            getAvatar(str){
                return "http://cdn.dev-php.site/public/img/coins/" + str.replace(/ /g, '_') + ".jpg";
            },
        }
    }
</script>
